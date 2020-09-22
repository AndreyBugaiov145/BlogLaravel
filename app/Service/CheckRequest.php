<?php

namespace App\Http\Service;

class CheckRequest
{
    public function checkFileType($file)
    {
        var_dump($file);
        /*if($file('img')!=null){
            $file=$reg->file('img');
            $article->img_src=$file->getClientOriginalName();
            $destinationPath = 'userImg';
            $file->move($destinationPath,$file->getClientOriginalName());
        }*/
    }
}