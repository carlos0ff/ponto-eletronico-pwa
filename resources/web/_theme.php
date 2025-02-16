<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
        <meta name="mit" content="2023-01-27T22:36:13-03:00+196032">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <link rel="icon" type="image/png" href="<?= asset("/assets/images/favicon.png"); ?>"/>
    <link rel="stylesheet" href="<?= asset("/assets/style.css"); ?>"/>
</head>
<body>



<!--CONTENT-->
<main class="main_content">
    <?= $v->section("content"); ?>
</main>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53658515-18"></script>
<script src="<?= asset("/assets/scripts.js"); ?>"></script>
<?= $v->section("scripts"); ?>

</body>
</html>