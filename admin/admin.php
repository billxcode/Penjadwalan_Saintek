<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<?php
		include "check_session.php";
		include "../controllpage/database.php";
		new database();
		?>
		<link rel="stylesheet" href="../css/bootstrap/css/bootstrap-responsive.css"/>
		<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="../jquery-ui/css/ui-lightness/jquery-ui-1.9.2.custom.css" />
		<link rel="stylesheet" href="../jquery-ui/development-bundle/demos/demos.css"/>
		<link rel="stylesheet" href="../css/admin.css" />
		<script src="../js/jquery.js"></script>
		<script src="../jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
		
		<script>
			$(function(){
				$(".date").datepicker({
					dateFormat: "yy-mm-dd"
				});
             //  $("textarea").val("");
			});
			
		</script>
	</head>
	<body>
		
		<div class="header"><a href="index.php"><!--<img class="logo saintek"src="../img/uinmalang.png" /><div class="title fakultas">Fakultas Sains dan Teknologi</div><div class="title uin">UIN Maliki Malang</div>--></a></div>
		<br />
        
        <div class="body">
			
			<div>Wellcome Admin</div>
			<br>
			<?php
		
		if(!empty($_GET['hapus'])){
			$hapus = $_GET['hapus'];
			$sql = mysql_query("DELETE FROM datajadwal WHERE `nama_acara`='$hapus'");
			header("location:admin.php?controll=home");
		}elseif(!empty($_GET['hapus_news'])){
           $hapus = $_GET['hapus_news'];
			$sql = mysql_query("DELETE FROM news WHERE `id_news`='$hapus'");
			header("location:admin.php?controll=news"); 
            
        }elseif(!empty($_GET['edit'])){
         $edit = $_GET['edit'];
            ?>
            
            <form action="crud.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_acara" value="<?php echo $_GET['id']; ?>"/>
		<div><input type="text" class="date" name="tglmulai" placeholder="Tanggal Mulai" value="<?php echo $_GET['tglacara']; ?>"/></div>
		<div><textarea name="namaacara" placeholder="Nama/Deskripsi Acara" value=""><?php echo $_GET['acara']; ?></textarea></div>
		<div><input type="text" name="penggunaacara" placeholder="pengguna acara" id="penggunaacara" value="<?php echo $_GET['pengguna']; ?>"/></div>
		<div><select name="pilihan_tempat">
            <option value="">--Pilih Tempat--</option>
           <?php $daftarmenu = array('Auditorium Selatan','Auditorium Utara','Ruang Sidang Fakultas','Ruang Sidang TI','Ruang Sidang MTK'); 
            $tempat = $_GET['tempat'];
            for($i=0;$i<5;$i++){
                
                if($tempat==$daftarmenu[$i]){
                ?>
                <option value="<?php echo $daftarmenu[$i]; ?>" selected="selected"><?php echo $daftarmenu[$i]; ?></option>
            <?php
                }else{
                    ?>
                <option value="<?php echo $daftarmenu[$i]; ?>"><?php echo $daftarmenu[$i]; ?></option>
            <?php
            }
            }
            ?>
			
		</select></div>
		<div><input type="text" name="tanggalpesan" class="date" placeholder="Tanggal Pesan" value="<?php echo $_GET['tglpesan']; ?>"/></div>
		<div><select name="indikator">
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Non Aktif</option>
        </select></div>
        <div><input type="file" name="uploadbanner" class="uploadfile" id="uploadfile"/></div>
		<div><input type="submit" name="submit" class="btn btn-block btn-primary" value="Update"/></div>
		
		<div class="btncontroll"><input type="reset" name="reset" class="btn btn-danger reset" value="Hapus" /><a href="logout.php"><input type="button" name="logout" class="btn btn-danger logout" value="Keluar" /></a></div>
                
		</form>
            
            <?php
          
				
           
        }else{
		?>

		<form action="crud.php" method="post" enctype="multipart/form-data">
		<div><input type="text" class="date" name="tglmulai" placeholder="Tanggal Mulai"/></div>
		<div><textarea name="namaacara"  placeholder="Nama/Deskripsi Acara"></textarea></div>
		<div><input type="text" name="penggunaacara" placeholder="pengguna acara" id="penggunaacara"/></div>
		<div><select name="pilihan_tempat">
			<option value="">--Pilih Tempat--</option>
			<option value="Auditorium Utara">Auditorium Utara</option>
			<option value="Auditorium Selatan">Auditorium Selatan</option>
			<option value="Ruang Sidang Fakultas">Ruang Sidang Fakultas</option>
			<option value="Ruang Sidang TI">Ruang Sidang TI</option>
			<option value="Ruang Sidang MTK">Ruang Sidang MTK</option>
		</select></div>
		<div><input type="text" name="tanggalpesan" class="date" placeholder="Tanggal Pesan"/></div>
        <div><select name="indikator">
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Non Aktif</option>
        </select></div>
		<div><input type="file" name="uploadbanner" class="uploadfile" id="uploadfile"/></div>
		<div><input type="submit" name="submit" class="btn btn-block btn-primary" value="Daftarkan"/></div>
		
		<div class="btncontroll"><input type="reset" name="reset" class="btn btn-danger reset" value="Hapus" /><a href="logout.php"><input type="button" name="logout" class="btn btn-danger logout" value="Keluar" /></a></div>
            
		</form>
           
            <?php
            }

            ?>
             <div><a href="?controll=home"><button class='tab btn left'>Acara</button></a><a href="?controll=news"><button class='tab btn right'>News</button></a></div>
		</div>
            <?php
        if(!empty($_GET['controll'])){
            if($_GET['controll']=="news"){
                ?>
        <div class="form_news">
            <form action="news.php" method="post">
                <!--<div><input type="text" class="tanggal" name="date"/></div>-->
                <div><textarea name="news_data" placeholder="masukkan berita yang akan di tampilkan" class="berita"></textarea></div>
                <div><button type="submit" class="btn btn-primary">Save</button></div>
            </form>
            </div>
        <div class="tableevent">
			<table class="table table-bordered table-hover table-striped">
				<tr><th>No</th><th>Berita</th></tr>
        <?php
                $i=0;
				$sql = mysql_query("SELECT * FROM `news` order by `id_news` desc");
				while($rows=mysql_fetch_array($sql)){
					$i++;
                    $id = nl2br($rows['id_news']);
					$isi = nl2br($rows['isi_news']);
                    echo "<tr><td>".$i."</td><td>".$isi."</td><td><a href='?hapus_news=".$id."'><button class='btn btn-warning'>Delete</button></a></td></tr>";
                
                }
                
            }elseif($_GET['controll']=="home"){
                ?>
		<div class="tableevent">
			<table class="table table-bordered table-hover table-striped">
				<tr><th>No</th><th>Tanggal Acara</th><th>Deskripsi Acara</th><th>Pemesan</th><th>Temacarapat</th><th>Tanggal Pesan</th><th>Tanggal Input</th></tr>
				<?php
				$i=0;
				$sql = mysql_query("SELECT * FROM `datajadwal`");
				while($rows=mysql_fetch_array($sql)){
					$i++;
                    $id = nl2br($rows['id']);
					$tgl_acara = nl2br($rows['tanggal_acara']);
					$nama_acara = nl2br($rows['nama_acara']);
					$pngguna_acara = nl2br($rows['pengguna_acara']);
					$tgl_pesan_acara = nl2br($rows['tanggal_pesan']);
					$tempat_acara = nl2br($rows['tempat_acara']);
					$tgl_input_acara = nl2br($rows['tanggal_input']); 
                    $indikator = nl2br($rows['active_record']);
                    if($indikator==0){
                    $indikator  = "Non Aktif";
                    }else{
                    $indikator = "Aktif";
                    }
					
					echo "<tr><td>$i</td><td>$tgl_acara</td><td>$nama_acara</td><td>$pngguna_acara</td><td>$tempat_acara</td><td>$tgl_pesan_acara</td><td>$tgl_input_acara</td><td>$indikator</td><td><a href='?controll=home&edit=true&id=".$id."&acara=".$nama_acara."&tglacara=".$tgl_acara."&pengguna=".$pngguna_acara."&tglpesan=".$tgl_pesan_acara."&tempat=".$tempat_acara."'><button class='btn btn-success'>Edit</button></a></td><td><a href='?hapus=".$nama_acara."'><button class='btn btn-warning'>Delete</button></a></td></tr>";
				}
				?>
				<tr></tr>
			</table>
		</div>
        
        
        <?php
                
                
            }
        }else{
                
             echo "<div style='margin-top:100px;'><center><h1>WELCOME ADMIN</h1></center></div>";   
            }

        ?>
		
	</body>
</html>



<?php



?>