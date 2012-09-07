@layout('layouts.default')
@section('title')
İletişim Formu
@endsection
@section('content')
	<div id="content">
						<!-- NIVO SLIDER -->
				
						<!-- WELCOME TEXT -->
						<h3 style="text-align: center;"> <strong>İLETİŞİM FORMU</strong><br /><br /></h3>
						<h4>Aşağıdaki formu doldurarak bize ulaşabilirsiniz.<br /><br /></h4>  
                        <p>Bir yetkili size en kısa sürede cevap verecektir.<br /><br /></p>
						<!-- ELEGANT HORIZONTAL LINE -->
						<div class="hr">
						</div>
						<!-- NUMBERED LIST -->

			<form action="" id="contact_form" method="post">
				<ul class="contact_form">
					<li><input type="text" id="ub_w_cf1" name="ub_w_cf_name" /><label>Ad Soyad</label></li>
					<li><input type="text" id="ub_w_cf2" name="ub_w_cf_email" /><label>Email</label></li>
					<li><textarea id="ub_w_cf3" rows="" cols="" name="ub_w_cf_msg" class="required"></textarea></li>
					<li><input type="text" id="ub_w_cf4" name="ub_w_cf_captcha" class="required" maxlength="4" /><img src="./captcha.php" id="captcha" alt="" /><label>Captcha</label></li>
					<li id="ub_w_cf_sbtn"><input class="send_button" type="submit" value="Gönder" /></li>
				</ul>
			</form>	
					<!-- SIMPLE HORIZONTAL LINE -->
					<div class="hr2">
					</div>
					<!-- PURCHASE BUTTON -->
					<!-- FEATURE TEXTS WITH SMALL ICONS -->

						</div>
						<!-- #content ends -->
@endsection
