<?php

require "data.php";

// materi modular
// include
// include_once

//require
//require_once

$i = 0;

while ($i < count($NamaSiswa)) {
    if ($NamaSiswa[$i]["umur"] == 17) {
        echo "Nama : " . $NamaSiswa[$i]
        ["nama"] . "<br>";
        echo "Umur : " . $NamaSiswa[$i]
        ["umur"] . " tahun<br>";
        echo "Alamat : " . $NamaSiswa[$i]
        ["alamat"] . "<br><br>";
    }

    $i++;
}

?>