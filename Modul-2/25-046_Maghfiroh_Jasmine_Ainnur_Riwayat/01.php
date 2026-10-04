<?php 
$matkul = ["PTI","ALPRO","DPW","STRUKDAT","JARKOM","PAW","PSBF","RPL"];
$pratikum =  ["JARKOM","PAW"];

$jmlh_mtkul = count($matkul);

for ($i=0; $i < $jmlh_mtkul; $i++) { 
	if (in_array($matkul[$i], $pratikum)) {
		echo "Saya sedang mengambil matkul " . $matkul[$i] . " termasuk pratikumnya<br>";
	} elseif ($i == 6 || $i == 7) {
		echo "Saya belum mengambil matkul " . $matkul[$i] . "<br>";
	} else {
		echo "Saya sudah mengambil matkul " . $matkul[$i] . " semester lalu<br>";
	}
}
 ?>