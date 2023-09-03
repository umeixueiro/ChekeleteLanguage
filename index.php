<?php

use app\inclusive\chekelete;

require __DIR__ . '/classLoader.php';

$chekelete = new chekelete();
$original = $_POST['text'] ?? '';
$translation = $chekelete->translate($original);

?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
    <div class="main">
        <div>
            <form action="" method="post">
                <label for="text">Escribe aqui lo que quieras traducir al lenguaje inclusivo de la Doctora
                    Chekelete</label>
                </br>
                <textarea id="text" name="text" rows="10" cols="100"></textarea>
                <br>
                <button class="" type="submit">
                    traduce
                </button>
            </form>
        </div>
        <br>
        <div>
            <div>
                <h3>Texto original:</h3>
                <p>
                    <?php echo $original ?>
                </p>
            </div>
            <div>
                <h3>Traducción inclusiva:</h3>
                <p>
                    <?php echo $translation ?>
                </p>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>

</html>