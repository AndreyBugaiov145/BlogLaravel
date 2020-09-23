
@extends('template')

@section('content')
<div class="container flex">
    <main class="details">
        <article>
            <div class="img-publication">
                <img src="/userImg/{{$article->img_src}}" alt="">
            </div>

            <div class="content-article">
                <div class="description flex">
                    <h3>{{ $article->header }}</h3>
                    <span class="master">{{$user->name}}
                    	@if( !Auth::guest())
                            <a href="{{route('clonePublication',['id'=>$article->id])}}" style="margin:0 20px">клонировать</a>
                    	@if ( Auth::user()->id ===$article->user_id )
                           <a href="{{route('deletePublication',['id'=>$article->id])}}" id="deletePublication" style="margin:0 20px">удалить</a>
                           <a href="{{route('updatePublication',['id'=>$article->id])}}" style="margin:0 20px">редактировать</a>
                          @endif
                          @endif
                    </span>
                    <span>{{ $article->description }}</span>
                </div>
                <div class="social-tags-bar flex flex-center">
                    <div class="social-bar flex flex-center">
                        <span class="send-icon"></span>
                        <a href="#" onclick="Share.facebook()"><span class="facebook-icon icon"></span></a>
                        <a href="#" onclick="Share.twitter()" ><span class="twitter-icon icon"></span></a>
                        <a href="#" ><span class="google-icon icon"></span></a>
                        <a href="#" onclick="Share.pinterest()" ><span class="pinterest-icon icon"></span></a>
                    </div>
                    <div class="tags-bar">
                        <span class="tag icon">Tag:</span>

                        @foreach($tags as $tag)
                            <span ><a href="{{route('tagPublication',['id'=>$tag->id])}}" style="color:inherit">{{$tag->name}}</a></span>
                        @endforeach

                    </div>
                </div>
            </div>
        </article>
    </main>
</div>
@endsection