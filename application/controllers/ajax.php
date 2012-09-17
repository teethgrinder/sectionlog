<?php

class Ajax_Controller extends Base_Controller {
		public function post_upload($folder = null)
		{
		// Upload and resize the image
		// @returns $url
		$url = Resize::uploadResize(Input::all(), $folder);
		// Insert into images DB (you dont really need this)
		Images::newImage($url);
		// Return JSON response
		return Response::json(array('filelink' => $url));
		}

}
