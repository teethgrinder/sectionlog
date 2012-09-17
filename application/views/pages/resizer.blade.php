@layout('layouts.default')

@section('title')
 Haberler
@endsection
@section('content')
		<div id="content">
			<!-- NIVO SLIDER -->
						<div class="hr"></div>
						<h3>Yeni Haber</h3>
						<div class="hr"></div>

 
 {{ Form::open_for_files('resizer') }}
 
  {{  Form::file('picture') }}
 
<p>{{ Form::submit('Oluştur') }}</p>
{{ Form::close() }}
</div>
@endsection
