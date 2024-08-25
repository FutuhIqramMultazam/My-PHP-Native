<?php

/* $nama = "Fadilah Fatwa \n";

file_put_contents("content.txt", $nama, FILE_APPEND);

echo file_get_contents("content.txt"); */

/*
// beda
echo serialize($nama);

$data = [
    [
        "nama" => "futuh iqram",
        "usia" => 20,
        "jenis kelamin" => "pria"
    ],
    [
        "nama" => "Fadilah",
        "usia" => 20,
        "jenis kelamin" => "wanita"
    ]
];

$hasilSerialize = serialize($data);
file_put_contents("content.txt", $hasilSerialize);

$lihatIsi = file_get_contents("content.txt");
$balikinLagi = unserialize($lihatIsi);

var_dump($balikinLagi);

$hasilSerialize = json_encode($data);
file_put_contents("content.txt", $hasilSerialize);

$lihatIsi = file_get_contents("content.txt");
$balikinLagi = json_decode($lihatIsi);

var_dump($balikinLagi); */

// $dataSerilaze = serialize($data);
// file_put_contents("dataSerilaze.txt", $dataSerilaze);

// $isidata = file_get_contents("dataSerilaze.txt");

// var_dump(unserialize($isidata));

// $datajson = json_encode($data);

// file_put_contents("dataJson.json", $datajson);

// $isiDatajson = file_get_contents("dataJson.json");

// var_dump(json_decode($isiDatajson));

// $todos = [];
// if (file_exists('content.txt')) {
//     $ambilFilenya = file_get_contents('content.txt');
//     $todos = unserialize($ambilFilenya);
// }

$todos = [];
if (file_exists('todo.txt')) {
    $file = file_get_contents('todo.txt');
    $todos = unserialize($file);
}


if (isset($_POST['todo'])) {
    $todos[] = $_POST['todo'];
    file_put_contents('todo.txt', serialize($todos));
    header("location:latihan.php");
}

?>

<form action="" method="post">
    <label for="todo">Name</label>
    <input type="text" name="todo" id="todo">
    <button type="submit">kirim</button>
</form>

<?php foreach ($todos as $key => $value): ?>
    <ul>
        <li><?= $value; ?></li>
    </ul>
<?php endforeach; ?>