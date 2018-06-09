<h1> Инструкция по настройке рабочего пространства для комфортного обучения на курсе </h1>

<p>Если вы не используете готовые сборки, например OpenServer, и решили установить все по отдельности то эта инструкция для Вас.</p>
<p>Данная инструкция будет полезна начинающим WEB-разработчикам, которые собираются установить на своем ПК с ОС Windows WEB-сервер Nginx с интерпретатором PHP последних версий. <br>Конечно же, намного проще установить сборку или прибегнуть к использованию
    инсталляторов и не париться по поводу настроек. <br> Однако каждый WEB-разработчик <b>обязан</b> понимать процесс работы WEB-сервера, процесс его установки и настройки.</p>

<h2>Подготовительные работы</h2>

<p>Удалите все WEB-серверы, которые устанавливали до этого, зайдите в службы и убедитесь, что там нет служб Apache или IIS. Если у вас уже установлен какой-либо веб-сервер, второй параллельно скорее всего не заработает вовсе.</p>

<p>Если у Вас есть Скайп, обязательно отключите в настройках использование 80 порта. В конечном итоге Вы должны убедиться, что ни одна служба не использует 80й порт.</p>

<p>Для работы очень желательно иметь файловый менеджер, позволяющий создавать файлы с любыми расширениями, либо, что еще лучше, редактор кода, напрмиер <a href="https://atom.io/">Atom</a> или <a href="https://www.jetbrains.com/phpstorm/">PhpStorm</a>.</p>

<p>Структура папок может быть различной, однако данная инструкция написана под определенную структуру и, если ей следовать, всё гарантированно заработает.</p>
<p>Перед тем как начать, создайте на диске C папку server, внутри которой создайте 4 подпапкок: nginx, php, mysql, domains. Именно так. Без указания номеров версий.</p>
<p><img src="img/structura.png" alt=""></p>

<p>В каталоге domains создаем еще 2 папки: localhost и phpmyadmin</p>
<p><img src="img/structura_local.png" alt=""></p>
<p>Создаем индексные файлы (при помощи файлового менеджера или редактора кода), которые будут нужны для проверки того, что все работает и помещаем их в папку localhost:</p>
<ul>
    <li>index.html с содержимым: It works!</li>
    <img src="img/it_works.png" alt="">
    <li>index.php с содержимым:
        <?php phpinfo(); ?>
    </li>
    <img src="img/php_info.png" alt="">
</ul>
<p>Так же в папку host (C:\Windows\System32\drivers\etc), добавьте следующие строки (без знака <b>#</b>): <br>127.0.0.1 localhost <br>
127.0.0.1 phpmyadmin</p>
<p>В будущем, если вы решите создавать свои домены не забудте их прописать в файле host по аналогии.</p>

<h2>Установка Nginx</h2>
<ol>
    <li>
        <p>Переходим  по <a href="https://nginx.ru/ru/download.html">ссылке</a> и скачиваем <b>стабильную версию</b>.</p>
    </li>
    <p><img src="img/ins_nginx.png" alt=""></p>
    <li>
        <p>Распакуем файлы из архива в нашу папку <b>nginx</b>, которая находится в папке <b>server</b>.</p>
    </li>
</ol>
<p>На этом этап установки завершен. Чтобы убедится, что вы все сделали правильно, зайдите в папку nginx и запустит nginx.exe</p>
<p><img src="img/start_ng.png" alt=""></p>
<p>Затем в браузере введите <b>http://localhost</b> и вы должны увидеть следующее:</p>
<p><img src="img/welc_ng.png" alt=""></p>
<p>Для остановки сервера через режим командной строки нажмите сочетание клавишь Windows + R и пропишите команду cmd, затем в появившемся окне введите команду: taskkill /f /IM nginx.exe и нажмите Enter</p>




<h2> Установка PHP </h2>

<ol>
    <li>
        <p><a href="https://windows.php.net/download#php-7.2">Скачать</a> архив (Zip) <br> x86 — версия для 32-битной ОС, x64 — 64-битная версия. Из Thread Safe и Non Thread Safe выбираем Thread Safe (c поддержкой многопоточности). <br>
            <img src="img/inst_php.png" alt="" width="50%" height="80%"></p>
    </li>
    <li>Чтобы установить PHP, просто распакуй скачанный архив в папку php, C:\server\php <br><br>Как должно выглядеть: <br> <img src="img/php_on_C.png" alt="" width="50%" height="70%"></li>

</ol>

<h2> Установка MySQL </h2>
<ol>
    <li><p>Переходим на <a href="https://dev.mysql.com/downloads/mysql/">Официальный сайт MySQL</a> и скачиваем MySQLInstaller MSI </p></li>
    <img src="img/inst_mysql.png" alt="" width="50%" height="80%">
    <hr>
    <img src="img/inst_mysql2.png" width="50%" height="80%" alt="">
    <li>Запускаем установочный файл и выбираем пункт Custom</li>
    <img src="img/mysql_st1.png" alt="">
    <li>В следующем окне выбираем MySQL Server, а так же путь к папке mysql </li>
    <img src="img/mysql_st2.gif" width="50%" height="70%" alt="">
    <li>Далее игнорируем конфликт путей и проcто нажимаем Next</li>
    <img src="img/inst_mysql_conflict.png" width="50%" height="80%" alt="">
    <li>И выполняем установку</li>
    <p><img src="img/mysql_st3.png" alt=""></p>
    <p>Далее следует конфигурация нашего MySQL</p>
    <p>Все разделы оставляем по умолчанию кроме <b>Authentication Method и Accounts and Roles</b></p>
    <p>В первом случае выбираем второй пункт</p>
    <p><img src="img/mysql_st4.png"  width="50%" height="80%" alt=""></p>
    <p>В разделе <b>Accounts and Roles</b> нужно ввести пароль который нужно запомнить! В последующем он нам понадобится для входа в phpmyadmin</p>
    <p><img src="img/mysql_pass.png" alt=""></p>
    <p>В конце конфигурирования должно быть так:</p>
    <p><img src="img/mysql_finish.png"  alt="finish"></p>
</ol>
<p>На этом с установкой все.</p>

<h2>Установка Phpmyadmin</h2>
<p>Переходим на <a href="https://php-myadmin.ru/download/">сайт</a> и скачиваем архив.</p>
<p><img src="img/inst_pma.png"  width="50%" height="80%" alt=""></p>
<p>Файлы из архива распакуем в папку phpmyadmin (c:/server/domains/phpmyadmin)</p>
<p><img src="img/inst_pma2.png"  width="50%" height="80%" alt=""></p>
<p>Логин для входа - root <br>Пароль - тот который указали при установке MySQL</p>

<h2>Настройка Nginx и PHP</h2>

<p>Начнем с Nginx</p>

<p>Откройте файл конфигурации Nginx в редакторе кода</p>
<p><img src="img/con_ng.png"  width="50%" height="80%" alt=""></p>
<p>Подробно описывать каждую строку конфигурации в данной инструкции нет смысла, т.к. на этапе обучения они вам вряд ли понадобятся, но если интересно можете почитать более подробно в официальной документации.</p>
<p>Найдем блок server и заменим его содержиоме на следующтй код:</p>
<pre>server
    {
        listen 80 default;
        server_name ~^(www\.)?(?&lt;domain&gt;.+)$;

        server_tokens off;

        #charset koi8-r;

        #access_log logs/access.log  main;
        location /
        {
            root c:/server/domains/$domain/;
            index index.php index.html index.htm;

            location ~ \.php$
            {
                fastcgi_pass 127.0.0.1:9000;
                fastcgi_index index.php;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                include fastcgi_params;
            }
        }


        #error_page 404 /404.html;

        error_page 500 502 503 504 /50x.html;
        location = /50x.html
        {
            root html;
        }
    }
</pre>

<p>В итоге должно получится так:</p>
<p><img src="img/con_ng2.png" width="50%" height="80%" alt=""></p>

<p>Далее настройки PHP</p>
<p>Перейдем в c:/server/php и найдем файл php.ini (возможно у вас  их будет 2 и они будут с префиксами, тогда просто переимнуйте php.ini-development в php.ini)</p>
<p>Открывем его и нажимаем Ctrl+F, в строке поиска прописываем extension_dir</p>
<p><img src="img/con_php.png" width="50%" height="80%" alt=""></p>
<p>В строке  ;extension_dir = "ext" убираем ";", чтобы получилось как на скриншоте выше.(732 строка)</p>
<p>Далее в строке поиска прописываем "extension=mysqli" и так же убираем ";", чтобы получилось как на скриншоте снизу</p>
<p><img src="img/con_php2.png" alt=""></p>
<p>Сохраняем изменения и закрываем файл.</p>

<h2>Запуск и остановка сервера.</h2>
<p>Для запуска сервера в папке nginx создайте файл start.bat со следующим содержанием:</p>
<pre>
    @ECHO OFF
    start C:\server\nginx\nginx.exe
    start C:\server\php\php-cgi.exe -b 127.0.0.1:9000 -c C:\server\php\php.ini
    ping 127.0.0.1 > NUL
    echo Starting nginx
    ping 127.0.0.1 > NUL
    EXIT
</pre>

<p>И файл stop.bat</p>
<pre>@ECHO OFF
taskkill /f /IM nginx.exe
taskkill /f /IM php-cgi.exe
EXIT</pre>

<p>Теперь для запуска - запускаем start.bat (появится командное окно php-cgi.exe, его нельзя закрывать!! )</p>
<p>Для остановки stop.bat</p>
<p>Все свои проекты создаем в папке domains, чтобы открыть его в браузере, просто вводим http://"название вашей папки"</p>
