

    Raw
    Fork
    New

    @layout('layout.admin')
    @section('content')
    <h1>
    Photos de l'album : {{$album->title}}
    </h1>
    <div class="grid">
    <div class="item xlarge">
    <a href="javascript:void(0);" onclick="collapse(this,35);" class="btn-collapse"></a>
    <div class="col">
    <h2>Ajouter des photos</h2>
    <div id="plupload">
    <div id="droparea">
    Glisser-dÃ©poser vos fichiers
    <b>ou</b>
    <button type="button" id="browse">Parcourir</button>
    </div>
    <div id="filelist"></div>
    </div>
    </div>
    <div class="col">
    <h2>Actions pour la sÃ©lection</h2>
    <form>
    <div class="row">
    <label>DÃ©placer vers :</label>
    <select id="selector">
    <option value=""></option>
    @foreach($albums as $a)
    <?php if($a->id == $album->id) continue; ?>
    <option value="<?= $a->id ?>"><?= $a->title ?></option>
    @endforeach
    </select>
    </div>
    <div class="row">
    <label><a href="javascript:void(0);" onclick="del()">Supprimer</a></label>
    </div>
    </form>
    </div>
    <div class="col last">
    <h2>Infos de l'album</h2>
    {{Form::open('admin/gallery/edit_album/'.$album->id,'POST',array('id' => 'datForm'))}}
    {{Form::token()}}
    <div class="row">
    {{Form::label('title', "Titre de l'album")}}
    {{Form::text('title', Input::old('title', $album->title))}}
    {{$errors->first('title','<span class="error">:message</span>')}}
    </div>
    <div class="row">
    {{Form::hidden('online','0')}}
    {{Form::checkbox('online','1', Input::old('online', $album->online))}}
    {{Form::label('online', 'En ligne ?')}}
    {{$errors->first('online','<span class="error">:message</span>')}}
    </div>
    {{Form::button('Enregistrer',array('class' => 'button'))}}
    {{Form::close()}}
    </div>
    </div>
    </div>
    <div id="galeries">
    <div class="grid">
    @foreach($album->photos as $p)
    <div id="{{$p->id}}" class="item thumb">
    <img src="/img/gallery/{{$p->id}}/thumb-{{$p->filename}}">
    <a href="/admin/gallery/infos/{{$p->id}}">Modifier les infos</a>
    </div>
    @endforeach
    </div>
    </div>
    <script type="text/javascript">
    var sup = false;
    function del() {
    if (!confirm('Supprimer les photos ?'))
    return false;
    if (sup)
    return false;
    sup = true;
    var str = '';
    $('#galeries .thumb.selected').each(function(){
    $.get("/admin/gallery/delete/"+$(this).attr('id'), function(data) {
    data = $.parseJSON(data);
    if(data.success) {
    $('#'+data.id).fadeOut(500,function(){
    $('#'+data.id).remove();
    $('.grid').masonry('reload');
    });
    } else if(data.error) {
    alert(data.error);
    } else {
    alert('Erreur lors de la suppression');
    }
    });
    });
    sup = false;
    }
    $(document).ready(function(){
    $('#galeries .thumb').live("click", function(){
    $(this).toggleClass('selected');
    });
    $('#selector').change(function(){
    var a = $(this).find('option:selected');
    if (a.val().length < 1) {
    return $(this).get(0).selectedIndex = 0;
    }
    if (!confirm('DÃ©placer les photos vers : '+a.text()+' ?'))
    return $(this).get(0).selectedIndex = 0;
    var str = '';
    var e = $('#galeries .thumb.selected');
    $(e).each(function(){
    str += $(this).attr('id')+','
    });
    if (str.length < 1) {
    alert('Erreur : SÃ©lection vide.');
    return $(this).get(0).selectedIndex = 0;
    }
    $.post("/admin/gallery/move", { ids: str, dest_folder: a.val() }, function(data) {
    $(e).fadeOut(500,function(){
    $(e).remove();
    $('.grid').masonry('reload');
    });
    });
    return $(this).get(0).selectedIndex = 0;
    });
    });
    </script>
    <script type="text/javascript">
    var uploader = new plupload.Uploader({
    runtimes : 'html5,flash',
    container : 'plupload',
    browse_button : 'browse',
    url : '/admin/gallery/add/{{$album->id}}',
    drop_element : 'droparea',
    flash_swf_url : '/js/plupload/plupload.flash.swf',
    multipart : true,
    urlstream_upload:true,
    filters : [{title : "Images", extensions : "jpg,jpeg,gif,png"}]
    });
    uploader.init();
    uploader.bind('UploadProgress', function (up, file) {
    $('#'+file.id).find('.progress').css('width',file.percent+'%');
    });
    uploader.bind('Error', function (up, err) {
    alert(err.message);
    $('#droparea').removeClass('hover');
    uploader.refresh();
    });
    uploader.bind('FileUploaded', function (up, file, response) {
    data = $.parseJSON(response.response);
    if (data.error)
    $('#'+file.id).append('<div class="error">'+data.message+'</div>').find('.progressbar').remove();
    if (data.success) {
    $('#'+file.id).remove();
    $('#galeries .grid').append('<div id="'+data.id+'" class="item thumb"><img src="/img/gallery/'+data.id+'/thumb-'+data.file+'"><a href="/admin/gallery/infos/'+data.id+'">Modifier les infos</a></div>');
    $('.grid').masonry('reload');
    }
    });
    uploader.bind('FilesAdded',function(up,files) {
    var filelist = $('#filelist');
    for (var i in files) {
    var file = files[i];
    filelist.append('<div id ="'+file.id+'" class="file"><span class="filename">'+file.name+' ('+plupload.formatSize(file.size)+')</span><div class="progressbar"><div class="progress"></div></div></div>');
    }
    $('#droparea').removeClass('hover');
    $('.grid').masonry('reload');
    uploader.start();
    uploader.refresh();
    });
    $(document).ready(function() {
    $('#droparea').bind({
    dragover : function(e) {
    $(this).addClass('hover');
    },
    dragleave : function(e) {
    $(this).removeClass('hover');
    }
    });
    });
    </script>
    @endsection

