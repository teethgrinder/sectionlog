<?php
public static function uploadResize($input, $folder = null)
{
// Start bundle
Bundle::start('resizer');
// If the folder var is set create the extra 'folder'
if($folder)
{
$folder = $folder . '/';
}
// Get the image
$img = Input::file('file');
// Create the name based on original image name
$name = Str::slug($img['name']).'.jpg';
// Resize and save the image
Resizer::open( $img )
->resize( 715 , 500 , 'auto' )
->save( 'public/img/uploads/'.$folder.$name , 90 );
// Return URL for database saving
return URL::to_asset('img/uploads/'.$folder.$name);
}
