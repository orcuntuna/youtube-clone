$(function(){

	if($("#player").lenght){
		const player = new Plyr('#player');
	}

	var devamiacikmi = 0;
	$(".devaminigor a").click(function(){
		if(devamiacikmi == 0){
			$(".devaminigor").parent().find(".metin").css("max-height", "10000px");
			$(".devaminigor a").text("Devamını Gizle");
			devamiacikmi = 1;
		}else{
			$(".devaminigor").parent().find(".metin").css("max-height", "40px");
			$(".devaminigor a").text("Devamını Göster");
			devamiacikmi = 0;
		}
	});

	$(".modal .kapat").click(function(e){
		$(this).parent().parent().parent().hide();
	});

	$("#formgiris button.submit").click(function(e){
		e.preventDefault();
		var eposta = $("#formgiris input[name='eposta']").val();
		var sifre = $("#formgiris input[name='sifre']").val();
		if($("#formgiris input[name='benihatirla']").is(":checked")){
			var benihatirla = 1;
		}else{
			var benihatirla = 0;
		}
		$.ajax({
			type: 'POST',
			data: { type: 'giris', eposta:eposta, sifre:sifre, benihatirla:benihatirla},
			url: ajax_url,
			success: function(gelen){
				if(gelen == 'ok'){
					let parametreler = new URLSearchParams(window.location.search);
					if(parametreler.has('ref')){
						let ref = parametreler.get('ref');
						window.location = site_url + ref;
					}else{
						window.location = site_url;
					}
					//
				}else{
					alert(gelen);
				}
			}
		});
	});

	$("#formkayit button.submit").click(function(e){
		e.preventDefault();
		var isim = $("#formkayit input[name='isim']").val();
		var eposta = $("#formkayit input[name='eposta']").val();
		var kanal = $("#formkayit input[name='kanal']").val();
		var sifre = $("#formkayit input[name='sifre']").val();
		var sifre2 = $("#formkayit input[name='sifre2']").val();
		$.ajax({
			type: 'POST',
			data: { type: 'kayit', isim:isim, eposta:eposta, kanal:kanal, sifre:sifre, sifre2:sifre2 },
			url: ajax_url,
			success: function(gelen){
				if(gelen == 'ok'){
					window.location = site_url;
				}else{
					alert(gelen);
				}
			}
		});
	});

	$(".hata .fa-times").click(function(){
		$(this).parent().slideUp();
		$(this).parent().remove();
	});
	/*
	$("#tabbaslik li:first").addClass("active");
	$("#tabicerik div.tab:first").addClass("active");

	$("#tabbaslik li").click(function(){
		$("#tabbaslik li").removeClass("active");
		$(this).addClass("active");
		$("#tabicerik div.tab").removeClass("active");
		$("#tabicerik div.tab").eq($(this).index()).addClass("active");
	});
	*/

	$("#videolarSiralamaSelect").change(function(){
		var kanal_id = $("#videolarSiralamaSelect").attr("kanal_id");
		var siralama = $("#videolarSiralamaSelect").val();
		window.location = site_url + "kanal/v/?id=" + kanal_id + "&s=" + siralama;
	});

	$("#populerSiralamaSelect").change(function(){
		var kanal_id = $("#populerSiralamaSelect").attr("kanal_id");
		var siralama = $("#populerSiralamaSelect").val();
		window.location = site_url + "kanal/p/?id=" + kanal_id + "&s=" + siralama;
	});

	$("#kanal_abone_ol").click(function(){
		var kanal_id = $(this).attr("kanal_id");
		$.ajax({
			type: 'POST',
			data: { type: 'abonelik', kanal_id:kanal_id },
			url: ajax_url,
			success: function(cevap){
				if(cevap == 1){
					location.reload();
				}else{
					alert("Bir sorun oluştu");
				}
			}
		});
	});

	$("#kanal_abonelikten_cik").click(function(){
		var kanal_id = $(this).attr("kanal_id");
		$.ajax({
			type: 'POST',
			data: { type: 'abonelik', kanal_id:kanal_id },
			url: ajax_url,
			success: function(cevap){
				if(cevap == 2){
					location.reload();
				}else{
					alert("Bir sorun oluştu");
				}
			}
		});
	});

});

function videoya_yorum(video_id, video_baslik){
	$("#modal p.videobilgi").text(video_baslik + ' videosuna yorum yapıyorsunuz.');
	$("#modal").show();
	$("#modal .modalic").hide();
	$("#modal .modalic").fadeIn(500);
}

function hesabim(){
	$(".hesabim").toggle();
	if($(".hesabim").is(":visible")){
		$(".ustmenu .giris a.hesabimbuton").css({'background-color':'#c23616', 'color':'#fff', 'border-color':'#c23616'});
	}else{
		$(".ustmenu .giris a.hesabimbuton").css({'background-color':'#fff', 'color':'#333', 'border-color':'#afadad'});
	}
}
