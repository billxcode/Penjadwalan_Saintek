$(document).ready(function(){
	$("#progress").hide();
	$("#daftarjadwal").hide();
	function pokoq(){
		$("#daftarjadwal").hide();
		$("#daftarjadwal").slideDown(1000);
		$("#video_player").hide();
        $("#slider-wrapper").hide();
	}

	function ambildata(){
		$("#daftarjadwal").load("");
	}
	function kirim(dataku){
		$.post(
			"controllpage/data.php",{tempat:dataku},function(data,status){
				 $("#daftarjadwal").html(data);
				
			}
		);
	}
	function swapon(){
		$("#progress").show();
		$("#logo").hide();
	}
	function swapoff(){
		$("#progress").hide();
		$("#logo").show();
	}
	$("#auditsel").click(function(){
		swapon();
		pokoq();
		kirim("Auditorium Selatan");
		swapoff();
	});
	$("#auditut").click(function(){
		swapon();
		pokoq();
		kirim("Auditorium Utara");
		swapoff();
	});
	$("#rsidfak").click(function(){
		swapon();
		pokoq();
		kirim("Ruang Sidang Fakultas");
		swapoff();
	});
	$("#rsidti").click(function(){
		swapon();
		pokoq();
		kirim("Ruang Sidang TI");
		swapoff();
	});
	$("#rsidmat").click(function(){
		swapon();
		pokoq();
		kirim("Ruang Sidang MTK");
		swapoff();
	});
	
});
