<!DOCTYPE html>
<html lang="ru">
<head>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
    <link rel="stylesheet" href="/css/template_style.css">
</head>
<body>
<?php include 'application/instruments/header.php' ?>

    <main class="main">
        <?php include 'application/views/'.$content_view; ?>
    </main>

<?php include 'application/instruments/footer.php' ?>
</body>
</html>
