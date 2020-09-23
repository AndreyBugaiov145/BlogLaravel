@extends('template')

@section('content')
<div class="box-create-publication">
    <form class="form-signin" action="{{'creataPublicationSubmit'}}" method="post" enctype="multipart/form-data">
    	{{ csrf_field() }}
        <h1>Добавление статьи</h1>
        <div class="error"></div>
        <div class="form-group form ">
            <label for="header">Введите заголовок статьи</label>
            <input type="text" name="header" id="header" class="form-control" placeholder="заголовок" value="{{ old('header') }}">
        </div>
        <div class="form-group form">
            <label for="short_description">Введите краткое описание (максиммум 100 символов)</label>
            <textarea type="text" name="short_description" id="short_description" class="form-control"placeholder="описание" maxlength="100" rows='3'>{{ old('short_description') }}</textarea>
        </div>
        <div class="form-group form">
            <label for="description">Введите текст статьи</label>
            <textarea type="text" name="description" id="description" class="form-control"placeholder="текст статьи" rows='10'>{{ old('description') }}</textarea>
        </div>
        <div class="form-group form">
            <label for="tag">Добавите тег к вашей статье</label>
            <input type="text" name="tag" id="tag" class="form-control" placeholder="cull" value="{{ old('tag') }}" >
        </div>
        <div class="form-group form">
            <label for="img">Добавить изображение</label>
            <input type="file" name="img" id="img" >
            @if ($errors->has('img'))
                <br>
                <span class="help-block">
                    <strong style="color:red">{{ $errors->first('img') }}</strong>
                </span>
            @endif
        </div>
        <input type="submit" value="Добаить статью" name="submit" class="btn btn-success"
               style="margin-right: 20px">
    </form>
</div>
@endsection
