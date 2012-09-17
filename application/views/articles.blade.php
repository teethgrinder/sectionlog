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
						<h3 style="text-align: center;"> KIRMIZI ETÜT MERKEZİ</h3>
						<!-- ELEGANT HORIZONTAL LINE -->
						<div class="hr"></div>
						<p>This is a quote in a lorem ipsum text. Vivamus varius, risus vel euismod tempor!</p>
									 <blockquote class="align_right">
										 <h4 style="text-align: center;"> Son Haber</h4><br />

 <h6><a href="./post.html">{{$posts-> title }} </a></h6>
			<p class=""><p>{{ Str::words($posts->body ,5) }}<br />
			<a href="<?php echo URL::to('article/'.$posts->id); ?>">devamı</a>
</blockquote>
						
	<p class="justify">
<span class="dropcap">L</span>
orem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id rhoncus orci. Mauris elementum, quam sed volutpat iaculis, nisi mauris tempor erat, sit amet vestibulum lectus neque quis justo. Duis purus purus, semper eu consectetur nec, interdum id felis. In at nulla sit amet velit sollicitudin cursus at id magna. Pellentesque lorem tellus, sollicitudin in mollis eu, gravida sit amet nunc. Cras sit amet tristique eros. Etiam porttitor ultricies lacus id ornare. Phasellus lorem velit, suscipit nec ullamcorper scelerisque, condimentum at urna.
</p>		
				<div class="hr">
								</div>
				<ul class="blog-medium">
			@foreach($articles as $article)
<li>	
		<div class="blog-medium-text">
			<h1><a href="./post.html">{{$article-> title }} </a></h1>
			<p class="blog-medium-excerpt"><p>{{ Str::words($article->content ,9) }}&#8230;<br />
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
