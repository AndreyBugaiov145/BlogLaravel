<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use App\Service\CheckRequest;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function showAll()
    {
        $article = new Article;

        return view('catalog', ['articles' => $article->all()]);
    }

    public function showPublication($id)
    {
        $article = Article::find($id);
        $user = $article->user;
        $tags = $article->tags;

        return view('publication', ['article' => $article, 'user' => $user, 'tags' => $tags]);
    }

    public function showPublicationByTag($id)
    {
        $tag = Tag::find($id);
        $articles = $tag->articles;

        return view('catalog', ['articles' => $articles]);
    }

    public function showPublicationByUser($id)
    {
        $articles = Article::where('user_id', '=', $id)->get();
        if (!$articles) {
            return redirect()->route('catalog')->with('massege', 'Вы не добовляли статьи');
        }

        return view('catalog', ['articles' => $articles]);
    }

    public function deletePublication($id)
    {
        $article = Article::find($id);
        $article->tags()->detach();
        $article->delete();

        return redirect()->route('catalog')->with('massege', 'Публикация была удалена');
    }

    public function creataPublication()
    {
        return view('createPublication');
    }

    public function creataPublicationSubmit(ArticleRequest $reg)
    {

        $article = new Article;
        $tag = new Tag;
        $file = $reg->file('img');

        $article->header = $reg->input('header');
        $article->short_description = $reg->input('short_description');
        $article->description = $reg->input('description');
        $article->img_src = $file->getClientOriginalName();
        $tag->name = $reg->input('tag');

        $article->save();
        $tag->save();
        $article->tags()->attach($tag->id);

        $destinationPath = 'userImg';
        $file->move($destinationPath, $file->getClientOriginalName());

        return redirect()->route('catalog')->with('massege', 'Публикация была добавлна');
    }

    public function updatePublication($id)
    {
        $article = Article::find($id);

        return view('updatePublication', ['article' => $article]);
    }

    public function updatePublicationSubmit($id, Request $reg)
    {
        if ($reg->file('img') != null) {
            $asImageValidation = CheckRequest::checkFileType($reg->file('img'));
        }
        if (!$asImageValidation) {
            return back()->withInput()->with('massege', 'Выбраный файл не являеться изображением');
        }

        $article = Article::find($id);

        $article->header = $reg->input('header');
        $article->short_description = $reg->input('short_description');
        $article->description = $reg->input('description');

        $file = $reg->file('img');
        $article->img_src = $file->getClientOriginalName();
        $destinationPath = 'userImg';
        $file->move($destinationPath, $file->getClientOriginalName());

        $article->save();

        $user = $article->user;
        $tags = $article->tags;

        return view('publication', ['article' => $article, 'user' => $user, 'tags' => $tags])->with('massege',
            'Публикация была обновлена');
    }
}
