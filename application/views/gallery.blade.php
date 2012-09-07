@layout('layouts.default2')
@section('title')
Hakkımızda
@endsection
@section('content')
	<div id="content">

		<!-- WELCOME TEXT -->
			<div class="hr"></div>
		
 
 



<ul class="gallery1 clearfix">
				<li><a href="../images/fullscreen/1.jpg" rel="prettyPhoto[gallery1]" title="You can add caption to pictures. You can add caption to pictures. You can add caption to pictures."><img src="../images/thumbnails/t_1.jpg" width="60" height="60" alt="Red round shape" /></a></li>
				<li><a href="../images/fullscreen/2.jpg" rel="prettyPhoto[gallery1]"><img src="../images/thumbnails/t_2.jpg" width="60" height="60" alt="Nice building" /></a></li>
				<li><a href="../images/fullscreen/3.jpg" rel="prettyPhoto[gallery1]"><img src="../images/thumbnails/t_3.jpg" width="60" height="60" alt="Fire!" /></a></li>
				<li><a href="../images/fullscreen/4.jpg" rel="prettyPhoto[gallery1]"><img src="../images/thumbnails/t_4.jpg" width="60" height="60" alt="Rock climbing" /></a></li>
				<li><a href="../images/fullscreen/5.jpg" rel="prettyPhoto[gallery1]"><img src="../images/thumbnails/t_5.jpg" width="60" height="60" alt="Fly kite, fly!" /></a></li>
				<li><a href="../images/fullscreen/6.jpg" rel="prettyPhoto[gallery1]"><img src="../images/thumbnails/t_2.jpg" width="60" height="60" alt="Nice building" /></a></li>
			</ul>
        <a href="{{ URL::to("img/glyphicons-halflings.png") }}" rel="prettyPhoto[gallery1]">
    {{ HTML::image('img/glyphicons-halflings.png', 'Rock climbing', array('height' => '60', 'width' => '60')) }}
    </a>
	
			<!-- SIMPLE HORIZONTAL LINE -->
			<div class="hr2"></div>
			<!-- PURCHASE BUTTON -->
			<!-- FEATURE TEXTS WITH SMALL ICONS -->			
				</div>
				<!-- #content ends -->
@endsection
