@layout('layouts.default')
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
			<div class="hr"></div>
			 <blockquote class="align_right">
<p>Pürdikkat eğitim için</p>
</blockquote>
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
