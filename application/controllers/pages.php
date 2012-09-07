<?php

class Pages_Controller extends Base_Controller {
	 
		public function get_articles()
			{ $articles =  DB::table('articles')->order_by('id')->get();
				$this->layout->nest('content','articles',array('articles'=>$articles));
			}
			
		public function get_abouts(){
		$subject = Subject::find(1);
	  $this->layout->nest('content','abouts',array('subject'=>$subject));
		}
		public function get_services(){
		$subject = Subject::find(2);
	  $this->layout->nest('content','services',array('subject'=>$subject));
		}
		public function get_neuro(){
		$subject = Subject::find(2);
	  $this->layout->nest('content','neuro',array('subject'=>$subject));
		}
		public function get_bio(){
		$subject = Subject::find(2);
	  $this->layout->nest('content','bio',array('subject'=>$subject));
		}
		public function get_contact(){
 
	  $this->layout->nest('content','contact');
		}
		public function get_map(){
 
	  $this->layout->nest('content','map');
		}
		
		public function get_haberler(){
			$posts = Post::with('author')->all();
			 $this->layout->nest('content','haberler',array('posts'=>$posts));
		}
		public function get_gallery(){
		 
			 $this->layout->nest('content','gallery');
		}
}
