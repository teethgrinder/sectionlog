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
						<h1 style="text-align: center;"> KIRMIZI ETÜT MERKEZİ</h1>
						<!-- ELEGANT HORIZONTAL LINE -->
						<div class="hr"></div>
 

						
	<p class="justify">
<span class="dropcap">M</span>
{{ $subject->body}}	
				<div class="hr">
								</div>
								 <blockquote class="center">
										 <h2 style="text-align: center;">Bizden Haberler</h2><br />

 <h6><a href="./post.html">{{$posts-> title }} </a></h6>
			<p class=""><p>{{ Str::words(strip_tags($posts->body) ,5) }}<br />
			<a href="<?php echo URL::to('view/'.$posts->id); ?>">devamı</a>
</blockquote>
						<div class="hr"></div>
				<ul class="blog-medium">
			@foreach($articles as $article)
<li>	
		<div class="blog-medium-text">
			<h1><a href="./post.html">{{$article-> title }} </a></h1>
			<p class="blog-medium-excerpt"><p>{{ Str::words($article->content ,9) }}&#8230;<br />
			<a href="{{ URL::to('hizmetlerimiz') }}">devamı</a>
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
