@layout('layouts.default2')
@section('title')
Haberler
@endsection
@section('content')
	<div id="content">
			<!-- NIVO SLIDER -->
					<!-- WELCOME TEXT -->
			<div class="hr"></div>
			<h3 style="text-align: center;"> 
	 HABERLER</h3>
	 			<div class="hr"></div>
@foreach ($posts as $post)
<div class="post">
<h1>{{ HTML::link('view/'.$post->id, $post->title) }}</h1>
<p>{{ substr($post->body,0, 120).' [..]' }}</p>
<p>{{ HTML::link('view/'.$post->id, 'Devamı &rarr;') }}</p>
</div>

@endforeach
</div>
@endsection
