<?php
$angka = [5,6,4,2,3,7,8,9,0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>materi 2 looping 2</title>
    <style>
        div{
            background-color: grey;
            width: 100px;
            height: 100px;
            float: left;
            margin: 5px;
            text-align: center;
            line-height: 100px;
            transition: 0.5s;
            color: aqua;
        }

        div:hover{
            transform: rotate(360deg);
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <?php for($i = 0; $i < count($angka); $i++){?>
        <div><?= $angka[$i]; ?></div>
    <?php } ?>
</body>
</html>