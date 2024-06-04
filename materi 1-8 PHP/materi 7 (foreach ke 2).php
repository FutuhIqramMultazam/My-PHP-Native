<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>materi 7</title>
</head>
<body>
    <h1>Data Warga kampung cibudug</h1>

    <?php 
    $data=[
            ["icam",20,"kuliah"],
            ["sese",17,"SMA"],
            ["dita",20,"kuliah"],
            ["dina mustika", 30, "IRT"],
        ]
    ?>

    <?php foreach($data as $d): ?>
            <ul>
            <li>Nama: <?= $d[0]; ?></li>
            <li>Usia: <?= $d[1]; ?></li>
            <li>Status: <?= $d[2]; ?></li>
            </ul>
    <?php endforeach; ?>
</body>
</html>