<?php 

$data = ["Futuh Iqram Multazam", "2307014", "Sistem Informasi", "Garut", "2307014@itg.ac.id"]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>materi 6</title>
</head>
<body>
    <h1>data mahasiswa</h1>
<ul>
    <?php foreach($data as $dm):?>
    <li><?= $dm; ?></li>
    <?php endforeach; ?>
</ul>
<!-- di bawah ini ada lanjutan koding foreach lainnya -->

</body>
</html>