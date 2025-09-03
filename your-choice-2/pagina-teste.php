<?php
session_start();
include_once 'php/config.php'


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        div {
            background-color: black;
            color: red;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION["email"])) {
        ?>

        <div>
            <h1>eu existo</h1>
        </div>

        <?php
    }
    ?>
</body>

</html>