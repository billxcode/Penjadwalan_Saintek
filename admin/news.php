<?php
include "../controllpage/database.php";
$berita = $_POST['news_data'];
$controll = new database();
$controll->simpan_berita($berita);
header("location:admin.php?controll=news");
?>
    
