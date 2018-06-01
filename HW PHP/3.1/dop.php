<?php 

class News{
    
    private $title;
    private $date;
    private $author;
    private $description;
   
    public function setTitle($title)
    {
        $this->title = $title;
    }
   
    public function getTitle()
    {
        return $this->title;
    }
   
    public function setDate($date)
    {
        $this->date = $date;
    }
   
    public function getDate()
    {
        return $this->date;
    }
   
    public function setAuthor($author)
    {
        $this->author = $author;
    }
   
    public function getAuthor()
    {
        return $this->author;
    }
   
    public function setDescription($description)
    {
        $this->description = $description;
    }
   
    public function getDescription()
    {
        return $this->description;
    }
 
    public function getJson($fileName)
    {
        $json = file_get_contents($fileName);
        $data = json_decode($json, true);
        $news = new News();
        $news->setTitle($data['news']['title']);
        $news->setDate($data['news']['date']);
        $news->setAuthor($data['news']['author']);
        $news->setDescription($data['news']['description']);
        return $news;
    }
}
 
$catalog = scandir(__DIR__ . '/article');
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Новости сайта</title>
        <link rel="stylesheet" href="./style.css">
    </head>
<body>
    <div class="content">
        <h2>Последние новости</h2>
        <?php
            $ob1 = new News();
            foreach ($catalog as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) == 'json') {
                    $json = $ob1->getJson('article/' .$file);
                   
                    echo '<div class="news">';
                        echo '<div class="title">';
                            echo $json->getTitle();
                        echo '</div>';
                       
                        echo '<div class="description">';
                            echo $json->getDescription();
                        echo '</div>';
                       
                        echo '<div class="inline-block"><span class="date">Дата:</span>';
                            echo '<span>' . $json->getDate() .'</span>';
                        echo '</div>';
                        echo '<span> | </span>';
                        echo '<div class="inline-block"><span class="date">Добавил:</span>';
                            echo $json->getAuthor();
                        echo '</div>';
                       
                    echo '</div>';
                   
                }
            }  
        ?>
    </div>
</body>
</html>