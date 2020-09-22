<?php

namespace App\Http\Middleware;

use Closure;

class CheckFileImg
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->file('img')!=null){
            $file=$request->file('img');
            $img_src=$file->getClientOriginalExtension();
            echo $img_src;
            return;
        }
        return $next($request);
    }
}
