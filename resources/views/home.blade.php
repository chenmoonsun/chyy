@extends('layouts.index')
<style>
    .post {
        padding: 35px;
        background: #fff;
        margin-bottom: 35px;
        position: relative;
        overflow: hidden;
    }
    .post .post-head {
        text-align: center;
    }
    .post .post-content {
        margin: 30px 0;
    }
    .post-content {
        font: 400 18px/1.62 Georgia,"Xin Gothic","Hiragino Sans GB","Droid Sans Fallback","Microsoft YaHei",sans-serif;
        color: #444443;
    }
    .post .post-footer {
        margin-top: 30px;
        border-top: 1px solid #ebebeb;
        padding: 21px 0 0;
    }
    .btn-default-red {
        border: 1px solid #f4645f;
        background: #f4645f;
        color: #fff;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }

    .btn {
        padding: 7px 14px;
        border-radius: 2px;
    }
    .sidebar .widget {
        background: #fff;
        padding: 21px 30px;
    }

    .widget {
        margin-bottom: 35px;
    }


    .pagination a {
        text-align: center;
        display: inline-block;
        color: #fff;
        background: #f4645f;
        border-radius: 2px;
    }
    a {
        color: #f4645f;
        outline: 0;
    }

    .pagination a i {
        width: 36px;
        height: 36px;
        line-height: 36px;
    }
    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        transform: translate(0, 0);
    }
    .pagination .page-number {
        background: #f4645f;
        color: #fff;
        margin: 0 3px;
        display: inline-block;
        line-height: 36px;
        padding: 0 14px;
        border-radius: 2px;
    }
    .pagination {
        display:inherit !important;
        margin: 0 0 35px;
        text-align: center;
        display: block;
    }
    .fa-angle-left::before {

       /* content: "\f104";*/
        content: "<";

    }
    .fa-angle-right::before{
        /*content: "\f104";*/
        content: ">";
    }
</style>
<script>
    var _hmt = _hmt || [];
</script>
@section('content-wrap')
    <div class="container">
        <div class="row">
            <main class="col-md-8 main-content">
                @foreach ($articles as $article)
                <article class="post">
                    <div class="post-head">
                        <h1 class="post-title"><a href="{{ url('article/'.$article->id) }}">{{$article->title}}</a></h1>
                        <div class="post-meta"><span class="author">作者：<a href="https://www.chenyueyang.com.cn/" target="_blank">陈月阳</a></span> • <time class="post-date" datetime="" title="">{{date('Y年m月d日',strtotime($article->updated_at))}}</time></div>
                    </div>
                    {{--<div class="featured-media">
                        <a href="/post/laravel-5-6-is-now-released/"><img src="/assets/images/laravel-5.6.png" alt="Laravel 5.6 版本正式发布"></a>
                    </div>--}}
                    <div class="post-content">
                        <p></p><p>{{$article->description}}</p><p></p>
                    </div>
                    <div class="post-permalink"><a href="{{ url('article/'.$article->id) }}" class="btn btn-default-red">阅读全文</a></div>
                    <footer class="post-footer clearfix"></footer>
                </article>
                @endforeach
                    <nav class="pagination" role="navigation">
                        <a class="newer-posts" href="{{$articles->previousPageUrl()}}"><i class="fa fa-angle-left"></i></a>
                        <span class="page-number">第 {{$articles->currentPage()}} 页 / 共 {{$articles->lastPage()}} 页</span>
                        <a class="older-posts" href="{{$articles->nextPageUrl()}}"><i class="fa fa-angle-right"></i></a>
                    </nav>

                    {{--{{ $articles->links() }}--}}
            </main>
            <aside class="col-md-4 sidebar">
                <div class="widget">
                    <h4 class="title">联系方式</h4>
                    <div class="content community">
                        <p>QQ：331043671</p>
                        <p><a href="https://weibo.com/u/2732626082" title="陈月阳的新浪微博" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '新浪微博'])"><i class="fa fa-comments"></i> 新浪微博</a></p>
                        <p><a href="http://t.qq.com/chenyuey_331043671" title="陈月阳的腾讯微博" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '腾讯微博'])"><i class="fa fa-comments"></i> 腾讯微博</a></p>
                    </div>
                </div>

                <div class="widget">
                    <h4 class="title">推荐Bolg</h4>
                    <div class="content community">
                        <p><a href="https://ninghao.net/" title="宁皓的博客" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '宁浩的博客'])"><i class="fa fa-comments"></i> 宁浩的博客</a></p>
                        <p><a href="http://www.laruence.com/" title="Laruence的博客" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '风雪之隅'])"><i class="fa fa-comments"></i> 风雪之隅</a></p>
                        <p><a href="http://rango.swoole.com/" title="韩天峰(Rango)的博客" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '韩天峰(Rango)的博客'])"><i class="fa fa-comments"></i> 韩天峰(Rango)的博客</a></p>
                    </div>
                </div>

                <div class="widget">
                    <h4 class="title">AI平台</h4>
                    <div class="content community">
                        <p><a href="https://open.aligenie.com/" title="阿里语音开放平台" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '阿里语音开放平台'])"><i class="fa fa-comments"></i> 阿里语音开放平台</a></p>
                        <p><a href="http://ai.baidu.com/" title="百度AI开放平台" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '百度Ai'])"><i class="fa fa-comments"></i> 百度AI开放平台</a></p>
                        <p><a href="https://dev.mi.com/console/cloud/" title="小米AI开放平台" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '小米AI开放平台'])"><i class="fa fa-comments"></i> 小米AI开放平台</a></p>
                        <p><a href="https://amazonaws-china.com/cn/events/amazon-ai/" title="Amazon AI平台" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', 'Amazon AI平台'])"><i class="fa fa-comments"></i> Amazon AI平台</a></p>
                        <p><a href="https://software.intel.com/zh-cn/ai-academy/" title="Intel AI平台" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', 'Intel AI平台'])"><i class="fa fa-comments"></i> Intel AI平台</a></p>
                        <p><a href="https://ai.163.com/#/m/overview" title="网易AI平台" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '网易AI平台'])"><i class="fa fa-comments"></i> 网易AI平台</a></p>
                        <p><a href="https://ai.qq.com/" title="腾讯AI平台" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '腾讯AI平台'])"><i class="fa fa-comments"></i> 腾讯AI平台</a></p>
                        <p><a href="https://www.xfyun.cn/" title="讯飞AI平台" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '讯飞AI平台'])"><i class="fa fa-comments"></i> 讯飞AI平台</a></p>


                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection


{{--
@section('content')
    <div id="title" style="text-align: center;">
        <h1>Learn Laravel 5</h1>
        <div style="padding: 5px; font-size: 16px;">Learn Laravel 5</div>
    </div>
    <hr>
    <div id="content">
        <ul>
            @foreach ($articles as $article)
                <li style="margin: 50px 0;">
                    <div class="title">
                        <a href="{{ url('article/'.$article->id) }}">
                            <h4>{{ $article->title }}</h4>
                        </a>
                    </div>
                    <div class="body">
                        <p>{{ $article->body }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection--}}
