
@extends('template')

@section('content')
<main class="grid">
    @foreach($articles as $article )
    <article>
        <div class="img-publication">
            <img src='/userImg/{{$article->img_src}}' >
        </div>
        <div class="content-article">
            <div class="description">
                <h3>{{ $article->header }}</h3>
                <span>{{ $article->short_description }}</span>
            </div>
            <div class="info-to-publication flex flex-center">
                <div class="see-more">
                    <a href="{{route('publication',['id'=>$article->id] )}}">more</a>
                </div>
            </div>
        </div>
    </article>
    @endforeach
</main>
@endsection