<?php
    function isSiteAvailible($url) {
        // Проверка правильности URL
        if(!filter_var($url, FILTER_VALIDATE_URL)){
            return false;
        }

        // Инициализация cURL
        $curlInit = curl_init($url);

        // Установка параметров запроса
        curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($curlInit,CURLOPT_HEADER,true);
        curl_setopt($curlInit,CURLOPT_NOBODY,true);
        curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
    
        // Получение ответа
        $response = curl_exec($curlInit);
    
        // закрываем CURL
        curl_close($curlInit);
    
        return $response ? true : false;
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вітаємо</title>
    <link href="css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/template.css" rel="stylesheet" type="text/css" />
    <link href="images/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="images/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="images/favicon-180x180.png" rel="apple-touch-icon" sizes="180x180">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <header>
                <div class="row headcol justify-content-center">
                <div class="col-4">
                    <div class="align-block">
                    <a href="http://aviakon.com" target="_blank" class="link">
                        <img src="images/logo.png" alt="Державне підприємство Авіакон" />
                        <br />
                        <span class="head-link-text">ТОВ "Авіакон"</span>
                    </a>
                    </div>
                </div>
                </div>
            </header>
            <main>
                <!-- Строка поиска в интернете через-->
                <?php
                    $URL = 'http://www.google.com';
                    if(isSiteAvailible($URL)){
                ?>
                        <div class="row justify-content-md-center">
                            <div id="search" class="col-8">
                                <form method="get" action="<?php echo $URL ?>/search">
                                        <div class="input-group">
                                            <input type="text" name="q" maxlength="255" placeholder="Введіть ваш пошуковий запит" class="form-control form-control-lg" />
                                            <input type="submit" formtarge="_blank" value="Пошук" class="btn btn-lg btn-primary" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                <?php
                    }
                ?>
                <!-- Блоки сервисов -->
                <div class="row">
                    <div id="glpi" class="col-3 general">
                        <h1>Сайт</h1>
                        <hr />
                        <p>Офіційний web-сайт підприємства</p>
                        <a href="http://aviakon.com" class="btn btn-lg btn-primary" target="_blank"><i class="bi bi-globe"></i>Перейти</a>
                    </div>
                    <div id="glpi" class="col-3 general">
                        <h1>GLPI</h1>
                        <hr />
                        <p>Система контролю виконання завдань</p>
                        <a href="http://it.avi.local/glpi/" class="btn btn-lg btn-primary" target="_blank"><i class="bi bi-calendar2-week"></i>Увійти</a>
                    </div>
                    <div id="docs" class="col-3 general">
                        <h1>DOCS</h1>
                        <hr />
                        <p>Система хмарного зберігання документі та файлів</p>
                        <a href="http://docs.avi.local/" class="btn btn-lg btn-primary" target="_blank"><i class="bi bi-cloud-check"></i>Увійти</a>
                    </div>
                    <div id="email" class="col-3 general">
                        <h1>E-MAIL</h1>
                        <hr />
                        <p>Внутрішня пошта для співробітників</p>
                        <a href="http://mail.aviakon.com/" class="btn btn-lg btn-primary" target="_blank"><i class="bi bi-envelope"></i>Увійти</a>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
</body>
</html>