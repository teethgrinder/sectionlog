
RAWFORKNEW
<?php
class Admin_Gallery_Controller extends Base_Controller {
	public $restful = true;
	function __construct()
	{
		parent::__construct();
		$this->filter('before', 'is_admin');
		//$this->filter('before', 'csrf')->on('post');
	}
	public function get_index()
	{
		$albums = GallerysAlbum::with('photos')->get();
		return View::make('admin.gallery.index')->with('albums',$albums);
	}
	public function get_create_album()
	{
		$album = new GallerysAlbum;
		$album->online = 0;
		$album->title = 'Nouveau dossier';
		$album->save();
		Session::flash('success','Album crÃ©Ã©.');
		return Redirect::to('admin/gallery');
	}
	public function post_edit_album($id)
	{
		$rules = array(
				'title' => 'required|between:3,100',
				'online' => 'numeric',
			);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails()) 
			return Redirect::to('admin/gallery/edit_album/'.$id)->with_errors($validation)->with_input();
		$album = GallerysAlbum::find($id);
		$album->online = Input::get('online');
		$album->title = Input::get('title');
		$album->save();
		Session::flash('success','Album enregistrÃ©.');
		return Redirect::to('admin/gallery');
	}
	public function get_delete_album($id)
	{
		$album = GallerysAlbum::find($id);
		Session::flash('success','Album "' . $album->title . '" supprimÃ©.');
		foreach ($album->photos as $p)
			File::rmdir('public/img/gallery/'.$p->id);
		DB::table('gallerys')->where('galeries_albums_id', '=', $album->id)->delete();
		$album->delete();
		return Redirect::to('admin/gallery');
	}
	public function get_view_album($id)
	{
		$albums = GallerysAlbum::all();
		$album = GallerysAlbum::find($id);
		return View::make('admin.gallery.view_album')->with('album',$album)->with('albums',$albums);
	}
	public function post_add($id)
	{	
		$ext = Input::file('file');
		$ext = File::extension($ext['name']);
		$validation = Validator::make(Input::all(), array('file' => 'mimes:jpg,gif,png'));
		if ($validation->fails())
			die('{"error":true, "message" : "Le fichier doit Ãªtre au format jpg, gif ou png"}');
		$validation = Validator::make(Input::all(), array('file' => 'image|max:6144'));
		if ($validation->fails())
			die('{"error":true, "message" : "Image trop grande (> 5mo)"}');
		$photo = new Gallery;
		$photo->filename = uniqid().'.'.$ext;
		$photo->galeries_albums_id = $id;
		$photo->save();
		$path = 'public/img/gallery/'.$photo->id.'/';
		Input::upload('file', $path, $photo->filename);
		$success = Resizer::open( $path.$photo->filename )
					->resize( 100 , 75 , 'crop' )
					->save( $path.'thumb-'.$photo->filename , 90 );
		$success = Resizer::open( $path.$photo->filename )
					->resize( 800 , 600 , 'auto' )
					->save( $path.'/large-'.$photo->filename , 90 );
		
		die('{"success":true, "message" : "Image ajoutÃ©e", "file":"'.$photo->filename.'", "id": "'.$photo->id.'"}');
	}
	public function get_delete($id) {
		$photo = Gallery::find($id);
		File::rmdir('public/img/gallery/'.$photo->id.'/');
		$photo->delete();
		die('{"success":1,"id":'.(int)$id.'}');
	}
	public function post_move() {
		$ids = explode(',', trim(Input::get('ids'),','));
		DB::table('gallerys')->where_in('id', $ids)->update(array('gallerys_albums_id' =>  Input::get('dest_folder')));
		die();
	}
}
