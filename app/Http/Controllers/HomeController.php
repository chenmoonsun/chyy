<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');注释掉，去掉登录验证
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home')->withArticles(\App\Article::paginate(5));

        $article = DB::table('articles')->where('is_show','1')->paginate(5);
        return view('home', ['articles' => $article]);
    }
}
