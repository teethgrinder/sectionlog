@layout('layouts.default')
@section('title')
 Anasayfa
@endsection
@section('content')
		<div id="content">
			<!-- NIVO SLIDER -->
			<div class="slider-nivo-holder">
				<div id="slider-nivo">
					{{ HTML::image('images/nivoslider1.jpg') }}
					{{ HTML::image('images/nivoslider2.jpg') }}
					{{ HTML::image('images/nivoslider3.jpg') }}
					{{ HTML::image('images/nivoslider4.jpg') }}
					{{ HTML::image('images/nivoslider5.jpg') }}
					{{ HTML::image('images/nivoslider6.jpg') }}
					{{ HTML::image('images/nivoslider7.jpg') }}
				</div>
		</div>
		<!-- WELCOME TEXT -->
			<div class="hr"></div>
			@foreach($articles as $article)
	<ul class="blog-medium">
		
					<li>	
		<div class="blog-medium-text">
			<h1><a href="./post.html">{{$article-> title }} </a></h1>
			<p class="blog-medium-excerpt"><p>Tek kişilik sınıflarda YGS - LYS hazırlık programımızda dersler özel&#8230;<br />
			<a href="<?php echo URL::to('article/'.$article->id); ?>">devamı</a>
				</li>	
				@endforeach
		
		</ul>
		
			<!-- SIMPLE HORIZONTAL LINE -->
			<div class="hr2"></div>
			<!-- PURCHASE BUTTON -->
			<!-- FEATURE TEXTS WITH SMALL ICONS -->			
				</div>
				<!-- #content ends -->

@endsection
