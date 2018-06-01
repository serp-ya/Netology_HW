<?php

session_start();

include("config.php");
include("function.php");

$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$pdo->exec("SET NAMES utf8;");

//

$login = !empty($_SESSION['login']) ? $_SESSION['login'] : false;

if (empty($login)) {
    header("Location:register.php");
    die;
}

$sql = "SELECT id FROM user WHERE login = ?";
        $stm = $pdo->prepare($sql);
        $stm->execute([
            $login
        ]);

$userId = $stm->fetchColumn();

$description = "";
$action = !empty($_GET['action']) ? $_GET['action'] : null;
$orderBy = "date_added";

$sortVariants = ['date_added', 'description', 'is_done'];

if (isset($_POST['sort']) && !empty($_POST['sort_by']) && in_array($_POST['sort_by'], $sortVariants)) {
    $orderBy = $_POST['sort_by'];
}

if (!isset($_GET['id']) && isset($_POST['save']) && !empty($_POST['description'])) {
    $description = $_POST['description'];
    $sql = "INSERT INTO task (user_id, description, date_added) VALUES (?, ?, NOW())";
    $stm = $pdo->prepare($sql);
    $stm->execute([
        $userId,
        $description
    ]);
    
    redirectToHome();
}

if (!empty($action) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    if ($action == 'delete') {  
        $sql = "DELETE FROM task WHERE id = ? AND user_id = ?";
        $stm = $pdo->prepare($sql);
        $stm->execute([
            $id,
            $userId
        ]);
    }
    
    if ($action == 'done') {
        $sql = "UPDATE task SET is_done = 1 WHERE id = ? AND (user_id = ? OR assigned_user_id = ?)";
        $stm = $pdo->prepare($sql);
        $stm->execute([
            $id,
            $userId,
            $userId
        ]);
        
        redirectToHome();
    }
    
    if (!empty($_POST['description'])) {
        $description = $_POST['description'];
    
        $sql = "UPDATE task SET description = ? WHERE id = ? AND user_id = ?";
        $stm = $pdo->prepare($sql);
        $stm->execute([
            $description,
            $id,
            $userId
        ]);
        
        redirectToHome();
    }
    
    if ($action == 'edit') {
        $sql = "SELECT description FROM tasks WHERE id = ?";
        $stm = $pdo->prepare($sql);
        $stm->execute([$id]);
        
        $description = $stm->fetchColumn();
    }
}

if (!empty($_POST['assign']) && !empty($_POST['assigned_user_id'])) {
    $formData = explode("_", $_POST['assigned_user_id']);
    $assignedUserId = (int)$formData[1];
    $taskId = (int)$formData[3];
    
    if (!empty($userId) && !empty($taskId)) {
        $sql = "UPDATE task SET assigned_user_id = ? WHERE id = ? AND user_id = ?";
        $stm = $pdo->prepare($sql);
        $stm->execute([
            $assignedUserId,
            $taskId,
            $userId
        ]);
        
        redirectToHome();
    }
}

$sql = "SELECT t.*, u.login, u2.login author
        FROM task t
        LEFT JOIN user u ON t.assigned_user_id = u.id
        LEFT JOIN user u2 ON t.user_id = u2.id
        WHERE user_id = ?
        ORDER BY $orderBy";
$stm = $pdo->prepare($sql);
$stm->execute([
    $userId
]);

$myTasks = $stm->fetchAll();

//

$sql = "SELECT t.*, u.login, u2.login author
        FROM task t
        LEFT JOIN user u ON t.assigned_user_id = u.id
        LEFT JOIN user u2 ON t.user_id = u2.id
        WHERE assigned_user_id = ? ORDER BY $orderBy";
$stm = $pdo->prepare($sql);
$stm->execute([
    $userId
]);

$myAssignedTasks = $stm->fetchAll();

//

$sql = "SELECT * FROM user WHERE id <> ?";
$stm = $pdo->prepare($sql);
$stm->execute([
    $userId
]);

$userList = $stm->fetchAll();
$user = [];

foreach ($userList as $item) {
    $user[$item['id']] = $item['login'];
}

?>

<style>
    table { 
        border-spacing: 0;
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    
    table th {
        background: #eee;
    }
    
    form {
        margin: 0;
    }
</style>

<h1>Здравствуйте, <?=$login?>! Вот ваш список дел:</h1>
<div style="float: left; margin-bottom: 20px;">
    <form method="POST">
        <input type="text" name="description" placeholder="Описание задачи" value="<?=$description?>" />
        <input type="submit" name="save" value="<?php echo ($action == 'edit' ? 'Сохранить' : 'Добавить') ?>" />
    </form>
</div>
<div style="float: left; margin-left: 20px;">
    <form method="POST">
        <label for="sort">Сортировать по:</label>
        <select name="sort_by">
            <option value="date_created">Дате добавления</option>
            <option value="is_done">Статусу</option>
            <option value="description">Описанию</option>
        </select>
        <input type="submit" name="sort" value="Отсортировать" />
    </form>
</div>
<div style="clear: both"></div>

<?php printTasks($myTasks, $userId, $user); ?>

<p><strong>Также, посмотрите, что от Вас требуют другие люди:</strong></p>


<?php printTasks($myAssignedTasks, $userId); ?>

<p><a href="logout.php">Выход</a></p>
