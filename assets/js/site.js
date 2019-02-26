$(function(){

	if($("body").has("#player")){
		const player = new Plyr('#player');
	}

	if($("body").has(".devaminigor")){
		if($(".videoaciklama .metin").height() > 40){
			$(".videoaciklama .metin").css("max-height","40px");
		}else{
			$(".devaminigor a").hide();
		}
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

	$("#begenenler").click(function(){
		$("#modal_begenenler").show();
		$("#modal_begenenler .modalic").hide();
		$("#modal_begenenler .modalic").fadeIn(500);
	});

	$("#yorumyap button.paylas").click(function(){
		if($("#yorumyap textarea").val().trim()){
			var parent = $("#yorumyap input[name='parent']").val();
			var etiket = $("#yorumyap input[name='etiket']").val();
			var yorum = $("#yorumyap textarea").val();
			var video_id = $("#yorumyap input[name='video']").val();
			$.ajax({
				type: 'POST',
				url: ajax_url,
				data: { type:'yeni_yorum', parent:parent, yorum:yorum, video_id:video_id, etiket:etiket },
				success: function(cevap){
					if(cevap == "ok"){
						location.reload();
					}else{
						alert(cevap);
					}
				}
			});

		}else{
			alert("lütfen yorum alanını doldurun");
		}
	});

	$("#yorumyap button.temizle").click(function(){
		$("#yorumyap textarea").val("");
		$("#yorumyap input[name='parent']").val("0");
		$("#yorumyap input[name='etiket']").val("0");
		$("#yorumyap label span").text("");
	});

	$(".yorum .yorumyanitla").click(function(){
		var yorum = $(this).attr("yorum");
		var etiket = $(this).attr("etiket");
		var kanal = $(this).attr("kanal");
		$("#yorumyap label span").text(kanal + " kullanıcısına yanıt veriyorsunuz.");
		$("#yorumyap input[name='parent']").val(yorum);
		$("#yorumyap input[name='etiket']").val(etiket);
		$("html, body").animate({
	        scrollTop: $('#yorumyap').offset().top - 200
	    }, 1000);
	});

});

function hesabim(){
	$(".hesabim").toggle();
	if($(".hesabim").is(":visible")){
		$(".ustmenu .giris a.hesabimbuton").css({'background-color':'#c23616', 'color':'#fff', 'border-color':'#c23616'});
	}else{
		$(".ustmenu .giris a.hesabimbuton").css({'background-color':'#fff', 'color':'#333', 'border-color':'#afadad'});
	}
}

function begeni(video_id,islem){
	var like_ikon = '<i class="fa fa-thumbs-up"></i> ';
	var dislike_ikon = '<i class="fa fa-thumbs-down"></i> ';
	$.ajax({
		type: 'POST',
		url: ajax_url,
		data: { type: 'begeni', video_id:video_id, islem:islem },
		success: function(cevap){
			if(begeni_suan == 1 && cevap == 0){
				begeni_like--;
				$(".begenibilgi .like").removeClass("likeactive");
				$(".begenibilgi .like").html(like_ikon + begeni_like);
			}else if(begeni_suan == 2 && cevap == 0){
				begeni_dislike--;
				$(".begenibilgi .dislike").removeClass("dislikeactive");
				$(".begenibilgi .dislike").html(dislike_ikon + begeni_dislike);
			}else if(begeni_suan == 1 && cevap == 2){
				begeni_dislike++;
				begeni_like--;
				$(".begenibilgi .like").removeClass("likeactive");
				$(".begenibilgi .dislike").addClass("dislikeactive");
				$(".begenibilgi .dislike").html(dislike_ikon + begeni_dislike);
				$(".begenibilgi .like").html(like_ikon + begeni_like);
			}else if(begeni_suan == 2 && cevap == 1){
				begeni_like++;
				begeni_dislike--;
				$(".begenibilgi .like").addClass("likeactive");
				$(".begenibilgi .dislike").removeClass("dislikeactive");
				$(".begenibilgi .dislike").html(dislike_ikon + begeni_dislike);
				$(".begenibilgi .like").html(like_ikon +begeni_like);
			}else if(begeni_suan == 0 && cevap == 1){
				begeni_like++;
				$(".begenibilgi .like").addClass("likeactive");
				$(".begenibilgi .like").html(like_ikon + begeni_like);
			}else if(begeni_suan == 0 && cevap == 2){
				begeni_dislike++;
				$(".begenibilgi .dislike").addClass("dislikeactive");
				$(".begenibilgi .dislike").html(dislike_ikon + begeni_dislike);
			}
			begeni_suan = cevap;
		}
	})
}