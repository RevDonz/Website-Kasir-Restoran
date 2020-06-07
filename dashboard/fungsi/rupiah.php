<?php  
// fungsi untuk membuat format rupiah
function rupiah($angka) {
	$hasil_rupiah = number_format($angka,2,',','.');
	return $hasil_rupiah;
}

?>