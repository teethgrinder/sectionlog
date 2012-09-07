@layout('layouts.default2')

@section('title')
 Haberler
@endsection
@section('content')
		<div id="content">
			<!-- NIVO SLIDER -->
						<div class="hr"></div>
						<h3>Yeni Haber</h3>
						<div class="hr"></div>
{{ Form::open('admin') }}
 <!-- author -->
{{ Form::hidden('author_id', $user->id) }}
<!-- title field -->
<p>{{ Form::label('title', 'Başlık') }}</p>
{{ $errors->first('title', '<p class="error">:message</p>') }}
<p>{{ Form::text('title', Input::old('title')) }}</p>
<!-- body field -->
<p>{{ Form::label('body', 'Makale') }}</p>
{{ $errors->first('body', '<p class="error">:message</p>') }}
<p>{{ Form::textarea('body', Input::old('body')) }}</p>
<!-- submit button -->
<p>{{ Form::submit('Oluştur') }}</p>
{{ Form::close() }}
</div>
@endsection
