@layout('layouts.default')
@section('content')
 <div id="content">
	 <h1>Haber Giriş ya da Düzenleme için Giriş yapın</h1>
		<div class="hr"></div>
    {{ Form::open('login') }}
        <!-- check for login errors flash var -->
        @if (Session::has('login_errors'))
            {{ Alert::error("Username or password incorrect.") }}
        @endif
        <!-- username field -->
        <p>{{ Form::label('username', 'Kullanıcı Adı') }}</p>
        <p>{{ Form::text('username') }}</p>
        <!-- password field -->
        <p>{{ Form::label('password', 'Şifre') }}</p>
        <p>{{ Form::password('password') }}</p>
        <!-- submit button -->
        <p>{{ Form::submit('Giriş', array('class' => 'btn-large')) }}</p>
    {{ Form::close() }}
<!-- SIMPLE HORIZONTAL LINE -->
					<div class="hr2"></div>
					<!-- PURCHASE BUTTON -->
					<!-- FEATURE TEXTS WITH SMALL ICONS -->
 </div>
@endsection
