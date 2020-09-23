<?php

namespace App\Service;

class CheckRequest
{
    static public function checkFileType($file)
    {
        $status =false;
        $typeImgArray = ['jpg','png','jpeg','svg'];
        foreach ($typeImgArray as $typeImg) {
            $typeImg==$file->getClientOriginalExtension()?$status=true:false;
        }

        return $status;
    }
}