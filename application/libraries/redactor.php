    <?php
    class Redactor
    {
    public static $dir = 'path_to_public_images';
    public static function store_image( $img )
    {
    $img['type'] = strtolower($img['type']);
    // validation should be done outside of this tho, in some validation
    if ($img['type'] == 'image/png'
    || $img['type'] == 'image/jpg'
    || $img['type'] == 'image/gif'
    || $img['type'] == 'image/jpeg'
    || $img['type'] == 'image/pjpeg')
    {
    // setting file's mysterious name
    $file = static::$dir.md5(date('YmdHis')).'.jpg';
    // copying
    copy($img['tmp_name'], $file);
    // displaying file
    $array = array(
    'filelink' => '/images/'.$file
    );
    echo stripslashes(json_encode($array));
    }
    }
    }
    ?>
