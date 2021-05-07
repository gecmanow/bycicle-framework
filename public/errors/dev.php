<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Ошибка</title>
    </head>
        <body>
            <h1>Произошла ошибка</h1>
            <p><b>Код ошибки:</b> <?= $errNum; ?></p>
            <p><b>Текст ошибки:</b> <?= $errStr; ?></p>
            <p><b>Файл с ошибкой:</b> <?= $errFile; ?></p>
            <p><b>Строка с ошибкой:</b> <?= $errLine; ?></p>
        </body>
</html>