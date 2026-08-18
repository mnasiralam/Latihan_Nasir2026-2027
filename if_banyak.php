<?php

//$hari = "selasa";

//if ($hari == "senin") {
  //echo "Hari ".$hari."<br>";
  //echo " Seragam : Putih Abu";
 // }elseif ($hari == "selasa" || $hari =="kamis") {
 // echo "Hari ".$hari. "<br>";
  //echo " Seragam : Seragam Jurusan";
 // }elseif ($hari == "rabu") {
//  echo "Hari ".$hari."<br>";
 // echo " Seragam : Almet";
//  }

//$hari = "nyanyq";

//switch ($hari) {
//    case "senin":
//        echo "Hari : " . $hari . "<br>";
//        echo "Seragam : Putih Abu";
//        break;

//    case "selasa":
//    case "kamis":
//        echo "Hari : " . $hari . "<br>";
//        echo "Seragam : Seragam Jurusan";
//        break;

//    case "rabu":
//        echo "Hari : " . $hari . "<br>";
//        echo "Seragam : Almet";
//        break;
        
//    default:
//        echo "Hari : " . $hari . "<br>";
//        echo "Libur";
//        break;
//
//    case "jumat":
//        echo "Hari : " . $hari . "<br>";
//       echo "Seragam : Pramuka";
//        break;
//}


$nilai = 101;

switch (true) {
    case ($nilai >= 91 && $nilai <= 100):
        echo "Nilai : $nilai <br>";
        echo "Grade : A";
        break;

    case ($nilai >= 81 && $nilai <= 90):
        echo "Nilai : $nilai <br>";
        echo "Grade : B";
        break;

    case ($nilai >= 71 && $nilai <= 80):
        echo "Nilai : $nilai <br>";
        echo "Grade : C";
        break;

    case ($nilai >= 61 && $nilai <= 70):
        echo "Nilai : $nilai <br>";
        echo "Grade : D";
        break;

    case ($nilai <=60):
        echo "Nilai : $nilai <br>";
        echo "Grade : E";
        break;
        
}


  ?>