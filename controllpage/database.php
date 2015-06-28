<?php

class database{
	function __construct(){
		mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("123456siantek") or die(mysql_error());
	}
	function login($user, $pass){
		$sql = mysql_query("SELECT * FROM useradmin where `username`='$user' and `password`='$pass'");
		if(mysql_num_rows($sql)!=null){
			return true;
		}else{
			return false;
		}
		
	}
	function insertdata($tanggalA, $deskripsi, $pemesan, $tempat, $tanggalB,$indikator){
		$sql = mysql_query("INSERT INTO `datajadwal`(`tanggal_acara`, `nama_acara`, `pengguna_acara`, `tanggal_pesan`,`tempat_acara`, `active_record`) VALUES ('$tanggalA','$deskripsi','$pemesan','$tanggalB', '$tempat', '$indikator')");
		if($sql){
			return true;
		}else{
			return false;
		}
	}
    function update($id,$tanggalA, $deskripsi, $pemesan, $tempat, $tanggalB, $indikator){
           $sql = mysql_query("UPDATE `datajadwal` SET tanggal_acara='$tanggalA', nama_acara='$deskripsi', pengguna_acara='$pemesan', tanggal_pesan='$tanggalB', tempat_acara='$tempat', active_record='$indikator' where id='$id'");
		if($sql){
			return true;
		}else{
			return false;
		}  
    }
	function keamanan($data){
		return strip_tags(addslashes(htmlentities(htmlspecialchars($data))));
	}
	function berita(){
		$sql = mysql_query("SELECT * FROM news order by `id_news` Desc");
$nama_acara ="";
while($rows=mysql_fetch_array($sql)){
					$nama_acara .= $rows['isi_news']." - ";
				}
return $nama_acara;
	}
    function simpan_berita($isi){
     $sql = mysql_query("INSERT INTO news (`isi_news`) values('$isi')");   
        if($sql){
        return true;
        }
        else{
        return false;
        }
        
    }
    function lihat_event($date){
        //$data = Date();
        $sql = mysql_query("SELECT * FROM datajadwal where tanggal_acara='$date'");
        $num = mysql_num_rows($sql);
        if($num==0){
         return false;
        }else{
        return true;
        }
    }
    function uploadfile($name, $size, $tmp, $pemesan, $tempat, $tanggalA){
        $target_dir = "../source/";
        //$tgl = date('Y-m-d');
        $target_file = $tanggalA.$tempat;
        $imgtarget = $target_dir.basename($name);
        $uploadOk = 1;
        $imageFileType = pathinfo($imgtarget,PATHINFO_EXTENSION);
        $check = getimagesize($tmp);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".\n";
        $uploadOk = 1;
    } else {
        echo "File is not an image\n";
        $uploadOk = 0;
    }

if (file_exists($target_file)) {
    echo "filenya sudah ada\n";
    $uploadOk = 0;
}

if ($size > 2000000) { 
    echo "file terlalu besar\n";
    $uploadOk = 0;
}
/*
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "tipe file yang di dukung hanya JPG, JPEG, PNG & GIF ";
    $uploadOk = 0;
}*/
        switch($imageFileType){
        case "jpg": $target_file .= ".jpg";break;
        case "png": $target_file .= ".png";break;
        case "jpeg": $target_file .= ".jpeg";break;
        case "gif": $target_file .= ".gif";break;
            default:echo "tipe file yang di dukung hanya JPG, JPEG, PNG & GIF ";
    $uploadOk = 0;
            break;
            
        }

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($tmp, $target_dir.$target_file)) {
        echo "The file ". basename($name). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}   
        
    }
}
?>