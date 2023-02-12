<?php
    function check($str) {
        $pattern = '/^[a-zA-Z0-9@]{6,20}$/';
        if(preg_match($pattern,$str)) {
            return true;
        } else {
            return false;
        }
    }

    echo check('asasa@sasa');




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php?ab=12" method="post">
        <input type="text" name="ab">
        <input type="submit" name="save" id="save" value="save">
    </form>
    <?php
        $ab = "";
        if(isset($_GET["ab"])) {
            $ab = $_GET["ab"];
        }
        if($ab == "12") {
            echo "yes";
        } else {
            echo "no";
        }

    ?>
</body>
</html>