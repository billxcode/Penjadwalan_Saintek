<?php
include "../controllpage/database.php";
if(empty($_POST['tglmulai']))
{
	echo "Data harus tidak kosong!!";
}else{
	$controll = new database();
    //$id = $controll->keamanan($_POST['id_acara']);
    
	$tanggalA = $controll->keamanan($_POST['tglmulai']);
$deskripsi = $controll->keamanan($_POST['namaacara']);
$pemesan = $controll->keamanan($_POST['penggunaacara']);
$tanggalB = $controll->keamanan($_POST['tanggalpesan']);
$tempat = $controll->keamanan($_POST['pilihan_tempat']);
$indikator = $controll->keamanan($_POST['indikator']);
    
    if($_FILES['uploadbanner']['name']){
    $name = $_FILES['uploadbanner']['name'];
    $size = $_FILES['uploadbanner']['size'];
    $tmp = $_FILES['uploadbanner']['tmp_name'];
    
    $controll->uploadfile($name, $size, $tmp, $pemesan,$tempat, $tanggalA);
    }
    
if($indikator=="aktif"){
    $indikator=1;    
}elseif($indikator=="nonaktif"){
    $indikator=0;
}
    if(empty($id = $controll->keamanan($_POST['id_acara']))){
if($controll->insertdata($tanggalA, $deskripsi, $pemesan, $tempat, $tanggalB,$indikator)==true){
	echo "<script>alert('Data Berhasil di masukkan !!')</script>";
}else{
	echo "<script>alert('Data Gagal di masukkan !!')</script>";
}}else{
 if($controll->update($id,$tanggalA, $deskripsi, $pemesan, $tempat, $tanggalB,$indikator)==true){
	echo "<script>alert('Data Berhasil di update !!')</script>";
}else{
	echo "<script>alert('Data Gagal di update !!')</script>";
}
}
 
}
 header("location:admin.php?controll=home");  
?>