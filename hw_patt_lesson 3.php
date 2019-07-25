<?php
//
// Stab MVC на web-приложения. 
//
// Возможно это моя неопытность, но натягивать сделанный для GUI MVC на web-приложения -
// это тоже самое, как использовать презерватив вместо латексной перчатки. MVC создан для 
// программ, расположенных в одном месте. Web-приложения изначально имеют одного клиента 
// и два сервера - приложений и БД. Чаще всего всё это разделено пространственно. 
// Потому лучше было бы создать свой шаблон, специально для web-приложений. Тем более, 
// что он очевиден.
//

//
// Blind Faith
//
// Я только учусь. Поэтому мне легче показать. Это код глава 5 из Head First PHP&MySQL.
// Хоть данные и получены из своего же сценария admin.php, но их тоже стоит проверить на корректность.
// Как испрвить, узнаю в следующей главе.
//
// Improbability factor.
//
// Более того, здесь ещё и избыточный код, исключив который мы получим 
// ещё один антипаттерн Improbability factor. 
// Событие никогда не наступит, а вдруг случится... 
// 
// Input kludge
// 
// Нет "защиты от дураков", особенно злоумышленников.
// Решается $name = mysqli_real_escape_string ($dbc, trim($_POST['name']));
//
if (isset ($_GET['id']) && isset ($_GET['date']) && isset ($_GET['name']) 
            && isset ($_GET['score']) && isset ($_GET['screenshot'])) {
            
            // Извлечение данных из суперглобального массива $_GET
            $id = $_GET['id'];
            $date = $_GET['date'];
            $name = $_GET['name'];
            $score = $_GET['score'];
            $screenshot = $_GET['screenshot'];
        }
        else if (isset ($_POST['id']) && isset($_POST['name']) && isset($_POST['score'])) {
            // Извлечение данных рейтингов из суперглобального массива $_POST
            $id = $_POST['id'];
            $name = $_POST['name'];
            $score = $_POST['score'];
        }
        // это событие по сценарию никогда не наступит... 
        else {
            echo '<p class="error">Извините, ни одного рейтинга не выбрано для удаления.</p>';
        }

// 
// Hard Code
//
// При каждом подключении приходится вводить одну и ту же информацию в каждом сценарии.
// Исправляется define ('DB_HOST','localhost');
//
$dbc = mysqli_connect("localhost", "root_native", "sdfeor23_!fde", "beighley_elvisst_db") 
        or die ("Ошибка соединения с сервером MySQL");


?>