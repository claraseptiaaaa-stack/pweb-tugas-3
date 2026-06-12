<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasar extends CI_Controller {
    public function index() {
		echo "<h1>VARIABLE</h1>";

        $nama = "Fahry";
        $umur = 21;

        echo "Umur si " . $nama . " baru " . $umur . " tahun";

        echo "<h1>OPERATOR</h1>"; 

        $a = 10;
        $b = 5;

        echo "Aritmatika : $a + $b = " . ($a + $b) . "<br>";
        echo "Perbandingan : $a > $b = " . ($a > $b ? "Benar" : "Salah") . "<br>"; 

        echo "<h1>PERCABANGAN</h1>";

        $nilai = 65;

        if ($nilai >= 90) {
            echo "Grade Anda adalah A";
        } elseif ($nilai >= 80) {
            echo "Grade Anda adalah B";
        } elseif ($nilai >= 70) {
            echo "Grade Anda adalah C";
        } elseif ($nilai >= 60) {
            echo "Grade Anda adalah D";
        } else {
            echo "Grade Anda adalah E";
        }

        echo "<h1>PERULANGAN</h1>";

        for ($i=1; $i <= 3; $i++) { 
            echo "Baris ke-$i <br>";
        }
        
        $j = 1;
        while ($j <= 3) {
            echo "Baris ke-$j <br>";
            $j++;
        }

        $array = [1, 2, 3, 4, 5];
        foreach ($array as $key => $value) {
            echo "Baris ke-$value <br>";
        }
	}

    public function baru() {
        echo "DASAR BARU NI || OR AND";
    }
}