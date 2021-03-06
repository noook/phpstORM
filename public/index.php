<?php

require_once('./conn.php');

$files = array_values(array_diff(scandir(__DIR__ . '/../docs'), array('..', '.', 'Init.md')));
array_unshift($files, 'Init.md');

for ($i = 0; $i < count($files); $i++) {
    $files[$i] = explode('.', $files[$i])[0];
}

$Parsedown = new Parsedown();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/themes/prism.min.css">
</head>
<style>
    body {
        margin: 10px 10px;
        display: flex;
        justify-content: flex-start;
    }

    ul {
        margin: 30px 0;
    }

    div.main {
        margin: 0 20px;
    }

    div.github {
        margin-left: auto;
        white-space: nowrap;
    }
</style>
<body>
    <ul>
        <?php foreach ($files as $file): ?>
        <li><a href="<?php echo "./?page=$file"; ?>"><?php echo $file; ?></a></li>
        <?php endforeach; ?>
    </ul>

    <div class="main">
        <h1>phpstORM</h1>
        <?php echo isset($_GET['page']) ? $Parsedown->text(file_get_contents(__DIR__ . '/../docs/' . $_GET['page'] . '.md')) : ''; ?>
    </div>
    <div class="github">
        <a href="https://github.com/noook/phpstORM">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Octicons-mark-github.svg/1024px-Octicons-mark-github.svg.png" width="16" height="16" alt="">
        <span>Link to the repo</span>
        </a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/components/prism-markup-templating.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/components/prism-php.js"></script>
</body>
</html>

<?php
