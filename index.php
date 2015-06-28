<!DOCTYPE html>
<html>
	<head>
		
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap-responsive.css"/>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="css/halaman_utama.css"/>
		<link rel="stylesheet" href="js/videojs/video-js.css"/>
		<link rel="stylesheet" href="js/videojs/video-js.css" />
		<script src="js/videojs/video.js"></script>
		<script src="css/bootstrap/js/bootstrap.js"></script>
		<script src="js/videojs/video.js"></script>
		<script src="js/angular.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/script.js"></script>
	</head>
	<body>
		<div class="header"><a href="index.php"><!--<img class="logo saintek" src="img/uinmalang.png" />--><div class="title fakultas"><!--Fakultas Sains dan Teknologi--></div><div class="title uin"><!--UIN Maliki Malang--></div></a></div>
		<div>
		<div class="colom slider">
			<div class="head jadwal">
				<div><i class="icon-th-large icon-white"></i>Event</div>
			</div>
			<div id="daftarjadwal" class="daftarjadwal">
				
				
			</div>

            <?php
            include "controllpage/database.php";
			$tgl = date('Y-m-d');
			$controll = new database();
           
        if($controll->lihat_event($tgl)){
            ?>
    <div id="slider-wrapper">
				
      <div class="nivoSlider" id="nivoSlider">
    <?php
            $sql = mysql_query("SELECT * FROM datajadwal WHERE tanggal_acara='$tgl'");
            $jumlah_event = mysql_num_rows($sql);
            if($jumlah_event!=0){
             
            while($rows = mysql_fetch_array($sql)){
                $tanggal = $rows['tanggal_acara'];
                $tempat = $rows['tempat_acara'];
                $namaacara = $rows['nama_acara'];
                ?>
                <a href="#"><img src="source/<?php echo $tanggal.$tempat.'.jpg';?>" alt="" title=<?php echo $namaacara; ?></im>></a>
          <?php
            }
               
            }else{
                
            }
            ?>
       
        </div>
   </div>
          <?php
        }else{
            ?>
        <div id="video_player">
				<video id="videoku" class="video-js vjs-default-skin" autoplay="true" muted="true" loop="true" data-setup={} width="100%" onended="window.location=index.php"  height="500px">
					<source src="source/uptownfunk.mp4" type="video/mp4"></source>
				</video>
			</div>
            <?php
            
        }


?>
		<!--	
			-->
            
            
	

    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/jquery.nivo.slider.min.js"></script>
    <script>
      $(window).load(function() {
        $('#nivoSlider').nivoSlider({
          effect:'sliceUpRight,sliceDownRight'
        });
      });
    </script>
		</div>
		<div class="colom menu">
			<div class="head titlemenu"><i class="icon-th-list icon-white"></i>Agenda Hari Ini</div>
			<?php
			
			$daftarmenu = array('AGENDA 1','AGENDA 2','AGENDA 3','AGENDA 4','AGENDA 5');
			$idmenu = array('auditsel','auditut','rsidfak','rsidti','rsidmat');
		
		for($i=0;$i<5;$i++){
			$sql = mysql_query("SELECT * FROM datajadwal where `tanggal_acara`='$tgl' and `tempat_acara`='".$daftarmenu[$i]."'");
			$jmlh = mysql_num_rows($sql);
			if($jmlh==null){
				
				?>
				<a href="#"><div><div id="<?php echo $idmenu[$i];?>" class="daftarmenu"><i class="icon-ok-sign"></i><?php echo $daftarmenu[$i]; ?></div></div></a>
				<?php
				
			}else{
			while($baris= mysql_fetch_array($sql)){	
				$namaacara = $baris['nama_acara'];
			
				?>
				<a href="#"><div><div id="<?php echo $idmenu[$i];?>" class="daftarmenu"><i class="icon-ok-sign"></i><?php echo $daftarmenu[$i]; ?><?php echo '<br><div class="nama_acara"><i class="icon-tag"></i>'.$namaacara.'</div>'; ?></div></div></a>
				<?php
				}
			
			
			}
			
		}
			?>
		</div>
		</div>
		
		<div class="runningtext"><div class="runningtext batas">Berita</div><div class="runningtext isijadwal"></div><marquee><?php echo $controll->berita();?></marquee></div>
	</body>
</html>

