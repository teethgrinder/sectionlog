@layout('layouts.default2')
@section('title')
Hakkımızda
@endsection
@section('content')
	<div id="content">

		<!-- WELCOME TEXT -->
			<div class="hr"></div>
		
 
	<ul>
		<li>
		<h3 style="text-align: center;"> 
		{{ $subject->title }} </h3>
		<div class="hr">	</div>
		{{ $subject->body}}
	</li>
 
			</ul>	
					<!-- SIMPLE HORIZONTAL LINE -->
					<div class="hr2"></div>
					<!-- PURCHASE BUTTON -->
					<!-- FEATURE TEXTS WITH SMALL ICONS -->
						</div>
						<!-- #content ends -->

@endsection
