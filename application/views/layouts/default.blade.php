<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>@yield('title')</title>
		
		<!-- CSS -->
		
		{{ HTML::style('fonts/sansation.css') }}
		{{ HTML::style('css/style.css') }}
		{{ HTML::style('fancybox/jquery.fancybox-1.3.4.css');}}
		{{ HTML::style('css/nivo-slider.css') }}
		{{ HTML::style('css/styler-farbtastic.css') }}
		
		{{ HTML::style('redactor/redactor.css') }}
 
		<link href='http://fonts.googleapis.com/css?family=Headland+One' rel='stylesheet' type='text/css'>
 
		{{ HTML::script('js/jquery.min.js') }}
		{{ HTML::script('js/jquery-ui-1.8.17.custom.min.js') }}
		{{ HTML::script('fancybox/jquery.fancybox-1.3.4.pack.js') }}
		{{ HTML::script('js/jquery.nivo.slider.js') }}
		{{ HTML::script('js/jquery.bgslider.js') }}
		{{ HTML::script('js/preloader.js') }}
		{{ HTML::script('redactor/tr.js') }}
		{{ HTML::script('redactor/redactor.js') }}
	 
 
 
		{{ HTML::script('js/basic.js') }}

	 


 



			

			<!-- UPDATE BROWSER WARNING IF IE 7 OR LOWER -->
			<!--[if lt IE 8]><link href="css/stop_ie.css" rel="stylesheet" type="text/css" /><![endif]--><!-- JAVASCRIPTS -->
			
		<!-- PAGE OPENING ANIMATION -->
		@if(URI::current() == '/')
		<script type="text/javascript">
			jQuery(document).ready(function()
			{jQuery('#page').css({'display':'inline','width':'300px','overflow':'hidden','margin-right':'340px'});
			jQuery('#sidebar').css({'margin-left':'326px'});});
			jQuery(window).load(function() {jQuery('#hp_preloader').delay(800).animate({'opacity':'0'},1400,function()
			{jQuery('#slider-nivo').nivoSlider(
			{controlNav:true,controlNavThumbs:false,keyboardNav:false,pauseOnHover:false,prevText:'',nextText:'',effect:'fade',animSpeed:300,pauseTime:4000});
			jQuery(this).remove();jQuery('#sidebar').delay(800).animate({'margin-left':'0px'},2100);jQuery('#page').delay(800).animate({'margin-right':'0px','width':'666px'},
			2100);});});
		</script> 
@endif
		<meta charset="UTF-8">
	</head>
	<body>
		<!-- DISPLAY MESSAGE IF JAVA IS TURNED OFF -->
	<noscript>
		<div id="notification">Please turn on javascript in your browser for the maximum experience!</div></noscript>
		<!-- DISPLAY THIS MESSAGE IF USER'S BROWSER IS IE7 OR LOWER -->
		<div id="ie_warning"><img src="./images/warning.png" alt="IE Warning" /><br />
		<strong>Your browser is out of date!</strong><br /><br />This website uses the latest web technologies so it requires an up-to-date, fast browser!<br />Try 
		<a href="http://www.mozilla.org/en-US/firefox/new/?from=getfirefox">Firefox</a> or <a href="https://www.google.com/chrome">Chrome</a>!
		</div>
		<!-- PAGE LOADING -->
		@if(URI::current() == '/')
		<div id="hp_preloader"></div>
		@endif
		<!-- STYLER FOR DEMO -->
 

			<!-- SITE WRAPPER -->
<div id="wrapper">
	<div id="page">
 
@yield('content')
 
				<!-- #content ends -->
</div>
				<!-- #page ends -->
<!-- SIDEBAR -->
<div id="sidebar">
		<div id="sidebar-color">
		</div>
		<!-- SIDEBAR COLOR LAYER -->
		<div id="sidebar-border">
		</div>
		<!-- SIDEBAR BORDER LAYER -->
		<div id="sidebar-light">
		</div>
		<!-- SIDEBAR RADIAL GRADIENT LIGHT LAYER -->
		<div id="sidebar-texture">
		</div>
		<!-- SIDEBAR TEXTURE LAYER -->
		<!-- SIDEBAR CONTENT LAYER -->
		<div id="sidebar-content">
			<!-- LOGO -->
		<div id="logo">
			<a href="<?php echo URL::to('/'); ?>">{{ HTML::image('images/logo.png') }}</a> 
		</div>
		<!-- MENU -->
   <ul id="menu">
   <li class="current"><a href="<?php echo URL::to('/'); ?>">ANASAYFA</a></li>
   <li>{{HTML::link_to_route('hakkimizda', 'HAKKIMIZDA')}}</li>

   <li>HİZMETLERİMİZ
		<ul>
			<li>{{HTML::link_to_route('hizmetlerimiz', 'Eğitim Hizmetlerimiz')}}</li>
			<li>{{HTML::link_to_route('neurofeedback', 'Neurofeedback')}}</li>
			<li>{{HTML::link_to_route('biofeedback', 'Biofeedback')}}</li>
	</ul>	
</li>		
<li>{{HTML::link_to_route('haberler', 'HABERLER')}}</li>
<li>{{HTML::link_to_route('galeri', 'GALERİ')}}</li>
		 
		<li><a href="./blog4.html">SANAL TUR</a></li>
		<li>BİZE ULAŞIN
			<ul>
			<li>{{HTML::link_to_route('iletisim','İletişim')}}</li>
			<li>{{HTML::link_to_route('harita','Harita')}}</li>
			</ul>
		</li>
		
		 
	</ul>
</div>

	<ul id="sidebar-bottom">
		<li><a href="#">{{ HTML::image('images/sidebar_icons/facebook.png') }}</a></li>
		<li><a href="#">{{ HTML::image('images/sidebar_icons/twitter.png') }}</a></li>
			 @if ( Auth::guest() )
<li>{{ HTML::link('admin', 'Giriş') }}</li>
@else
<li>{{ HTML::link('logout', 'Çıkış') }}</li>
@endif
	</ul>
	 

 
											<!-- COPYRIGHT TEXT -->
	<p id="copyright">Site görselleri, sanal tur ve tasarım<a href="http://www.zepphoto.com">Zepphoto</a></p>

	</div>
	<!-- #sidebar ends -->

	</div>
	<!-- #wrapper ends -->
	<!-- BACKGROUND SLIDER -->
	<div id="bg_slider">
		{{ HTML::image('images/bgslider-1.jpg') }}
		{{ HTML::image('images/bgslider-2.jpg') }}
		{{ HTML::image('images/bgslider-3.jpg') }}
		{{ HTML::image('images/bgslider-4.jpg') }}
		{{ HTML::image('images/bgslider-5.jpg') }}
 </div>

<script type="text/javascript">
$(document).ready(function()
{$('#body').redactor({ imageUpload: '/pages/photo_upload/1', lang: 'tr' });});
</script>
</body>
</html>
