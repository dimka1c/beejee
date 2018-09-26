<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="<?= $this->token ?>">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <?php
    foreach ($this->scriptStyleSheet as $styles) {
        foreach ($styles as $style) {
            echo $style;
        }
    }
    ?>
    <title>BeeJee тестовое задание</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/main/index">BeeJee</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/main/add-new-task">Добавить задачу <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/index">Администрирование</a>
                </li>
            </ul>
        </div>
    </nav>

    <?= $content ?>

</div>

<script src="/js/jquery-3.3.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>
<?php
foreach ($this->scriptsTemplate as $scripts) {
    foreach ($scripts as $script) {
        echo $script;
    }
}
?>
</body>
</html>