@extends('template')

@section('content')
<div class="box-create-publication">
    <form class="form-signin" action="{{route('clonePublicationSubmit',['id'=>$article->id])}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h1>Создать статью</h1>
        <div class="error"></div>
        <div class="img-publication">
            <img src="/userImg/{{$article->img_src}}" alt="">
        </div>
        <div class="form-group form ">
            <label for="header">Введите заголовок статьи</label>
            <input type="text" name="header" id="header" class="form-control" placeholder="заголовок" value="{{$article->header}}">
        </div>
        <div class="form-group form">
            <label for="short_description">Введите краткое описание (максиммум 100 символов)</label>
            <textarea type="text" name="short_description" id="short_description" class="form-control"placeholder="описание" maxlength="100" rows='3'>{{$article->short_description}}"</textarea>
        </div>
        <div class="form-group form">
            <label for="description">Введите текст статьи</label>
            <textarea type="text" name="description" id="description" class="form-control"placeholder="текст статьи" rows='10'>{{$article->description}}"</textarea>
        </div>
        <div class="form-group form">
            <label for="img">Изменить изображение</label>
            <input type="file" name="img" id="img" class="optional" value="/userImg/{{$article->img_src}}">
        </div>
        <input type="submit" value="Добаить статью" name="submit" class="btn btn-success"
               style="margin-right: 20px">
    </form>
</div>
@endsection