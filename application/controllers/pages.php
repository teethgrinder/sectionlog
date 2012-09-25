<?php

class Pages_Controller extends Base_Controller {
 
	public $restful = true;
	


		public function get_articles()
		
			{ $subject = Subject::find(3);
				$articles =  DB::table('articles')->order_by('id')->get();
			$posts = Post::with('author')->order_by('id','desc')->first();
		Asset::container('laramce')->scripts();
				return View::make('layouts.default')->nest('content','articles',array('articles'=>$articles,'posts'=>$posts,'subject'=>$subject));
			}
			
		public function get_hakkimizda(){
		$subject = Subject::find(1);
	  return View::make('layouts.default')->nest('content','hakkimizda',array('subject'=>$subject));
		}
		public function get_hizmetlerimiz(){
		$subject = Subject::find(2);
	   return View::make('layouts.default')->nest('content','services',array('subject'=>$subject));
		}
		public function get_neurofeedback(){
		$subject = Subject::find(2);
	   return View::make('layouts.default')->nest('content','neuro',array('subject'=>$subject));
		}
		public function get_biofeedback(){
		$subject = Subject::find(2);
	   return View::make('layouts.default')->nest('content','bio',array('subject'=>$subject));
		}
		public function get_iletisim(){
 
	   return View::make('layouts.default')->nest('content','contact');
		}
		public function get_harita(){
 
	  return View::make('layouts.default')->nest('content','map');
		}
		
		public function get_haberler(){
			$posts = Post::with('author')->order_by('id','desc')->get();
			 return View::make('layouts.default')->nest('content','haberler',array('posts'=>$posts));
		}
		public function get_galeri(){
		 
			  return View::make('layouts.default')->nest('content','gallery');
		}
		public function get_heroes(){
		 
			  return View::make('layouts.default')->nest('content','heroes');
		}
		public function post_photo_upload($page_id) {
		$path = path('base').'/public/img/page/' . (int)$page_id;
		$filename = uniqid() . '.jpg';

		Input::upload('file', $path, Input::file('file.name'));

		$success = Resizer::open( $path . '/' . Input::file('file.name') )
					->resize( 800 , 600 , 'auto' )
					->save( $path . '/' . $filename , 90 );

		File::delete( $path . '/' . Input::file('file.name'));

		die('{ "filelink": "/img/page/' . (int)$page_id . '/' . $filename . '" }');
	}
}
