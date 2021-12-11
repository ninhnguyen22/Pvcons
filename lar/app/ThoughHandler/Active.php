<?php

namespace App\ThoughHandler;

class Active
{
    public function handle($content, \Closure $next)
    {
        $content->name = "bar";
//        dd($content, $next);
        return $next($content);
    }
}
