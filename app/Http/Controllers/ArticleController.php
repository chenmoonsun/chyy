<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function show($id){
        $info = Article::with('hasManyComments')->find($id);
        //dump($info);die;
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }
}
