<?php 

for($i =0; $i < 5; $i++){ // ini menggunakan looping for
    echo "icam <br>";
}

$i=0; // ini menggunaka while
while ($i<5){
    echo "icam <br>";
$i++;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>materi 2 looping 1</title>
    <style>
        
        table {
            border: black;
        }
    </style>
</head>
<body>
    <table  border="1" cellpadding="10" cellspacing="0">
        <?php 
        /* pelajari lagi sintak di 
        bawah ini ya icam ganteng :) */
        for ($i=1; $i<=3; $i++){ 
            echo "<tr>";
            for($j = 1; $j <= 5; $j++){
                echo "<td>$i,$j</td>";
            }
            echo "</tr>";
        }
        ?>    
    </table>
</body>
</html>