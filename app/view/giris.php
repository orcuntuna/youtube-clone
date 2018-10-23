<div class="container">
		<?php include view('static/sidebar'); ?>
		<div class="site icerik">
			<div class="siteic">

				<div class="girisbox">
					<form id="formgiris">
						<h2>Giriş Yap <i class="fa fa-sign-in"></i></h2>
						<p>Giriş yapmak için e-posta adresinizi ve şifrenizi giriniz.</p>
						<div class="inputbox">
							<input type="text" name="eposta" class="textbox" placeholder="E-posta adresiniz">
							<input type="password" name="sifre" class="textbox" placeholder="Parolanız">
							<label><input type="checkbox" name="benihatirla" checked> Oturumu açık tut</label>
							<button class="submit">Giriş Yap</button>
						</div>
					</form>
				</div>

				<div class="girisbox">
					<form id="formkayit">
						<h2>Hesap Oluştur <i class="fa fa-plus-square-o"></i></h2>
						<p>Henüz bir hesabınız yoksa yeni hesap oluşturabilirsiniz.</p>
						<div class="inputbox">
							<input type="text" name="isim" class="textbox uzuntextbox" placeholder="Adınız Soyadınız">
							<input type="email" name="eposta" class="textbox uzuntextbox" placeholder="E-posta Adresiniz">
							<input type="text" name="kanal" class="textbox uzuntextbox" placeholder="Kanal İsmi">
							<input type="password" name="sifre" class="textbox uzuntextbox" placeholder="Parolanız">
							<input type="password" name="sifre2" class="textbox uzuntextbox" placeholder="Parolanız (Tekrar)">
							<button type="submit" class="uzunbutton submit">Hesap Oluştur</button>
						</div>
					</form>
				</div>

				<div class="girisbox">
					<form>
						<h2>Şifremi Unuttum <i class="fa fa-question-circle-o"></i></h2>
						<p>Parolanızı hatırlamıyorsanız sıfırlayabilirsiniz.</p>
						<div class="inputbox">
							<input type="text" name="isim" class="textbox uzuntextbox" placeholder="E-posta adresiniz">
							<button type="submit" class="uzunbutton">Şifremi Gönder</button>
						</div>
					</form>
				</div>

			</div><!--siteic-->
		</div><!--site-->
	</div><!--container-->