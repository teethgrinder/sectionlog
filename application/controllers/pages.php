<?php

class Pages_Controller extends Base_Controller {
 
	public $restful = true;
	


		public function get_articles()
			{ $articles =  DB::table('articles')->order_by('id')->get();
			$posts = Post::with('author')->order_by('id','desc')->first();
		Asset::container('laramce')->scripts();
				return View::make('layouts.default')->nest('content','articles',array('articles'=>$articles,'posts'=>$posts));
			}
			
		public function get_abouts(){
		$subject = Subject::find(1);
	  return View::make('layouts.default')->nest('content','abouts',array('subject'=>$subject));
		}
		public function get_services(){
		$subject = Subject::find(2);
	   return View::make('layouts.default2')->nest('content','services',array('subject'=>$subject));
		}
		public function get_neuro(){
		$subject = Subject::find(2);
	   return View::make('layouts.default2')->nest('content','neuro',array('subject'=>$subject));
		}
		public function get_bio(){
		$subject = Subject::find(2);
	   return View::make('layouts.default2')->nest('content','bio',array('subject'=>$subject));
		}
		public function get_contact(){
 
	   return View::make('layouts.default2')->nest('content','contact');
		}
		public function get_map(){
 
	  return View::make('layouts.default2')->nest('content','map');
		}
		
		public function get_haberler(){
			$posts = Post::with('author')->order_by('id','desc')->get();
			 return View::make('layouts.default2')->nest('content','haberler',array('posts'=>$posts));
		}
		public function get_gallery(){
		 
			  return View::make('layouts.default2')->nest('content','gallery');
		}
}
