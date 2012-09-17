@layout('layouts.default')
@section('content')
		<div id="content">
			<!-- NIVO SLIDER -->
						<div class="hr"></div>
						<h3>Haber</h3>
						<div class="hr"></div>
<div class="post">
<h1>{{ HTML::link('view/'.$post->id, $post->title) }}</h1>
<p>{{ $post->body }}</p>
<p>{{ HTML::link('haberler', '&larr; Tümü.') }}</p>
</div>
</div>
@endsection
