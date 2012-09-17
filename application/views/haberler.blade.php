@layout('layouts.default')
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
	 @if(Auth::check())
    <a href="{{ URL::to('admin') }}">Yeni Haber Ekle</a>
     	<div class="hr"></div>
    @endif

@foreach ($posts as $post)
<div class="post">
<h1>{{ HTML::link('view/'.$post->id, $post->title) }}</h1>
<p>{{ substr($post->body,0, 120).' [..]' }}</p>
<p>{{ HTML::link('view/'.$post->id, 'Devamı &rarr;') }}</p>
</div>

@endforeach
</div>
@endsection
