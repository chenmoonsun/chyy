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
                <article class="post">
                    <header class="post-head"><h1 class="post-title">{{ $article->title }}</h1><section class="post-meta"><span class="author">作者：<a href="http://www.chenyueyang.com.cn/" target="_blank">陈月阳</a></span> • <time class="post-date" datetime="2018年02月08日" title="2018年02月08日">{{ $article->updated_at }}</time></section></header>
                    <section class="post-content">
                        <div id="doc-content">
                            <textarea style="display:none;">{{$article->body}}</textarea>
                        </div>
                        @include('markdown::decode',['editors'=>['doc-content']])

                    </section>
                    <footer class="post-footer clearfix"></footer>
                </article>

                <div id="comments" style="margin-top: 50px;">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>操作失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <div id="new" style="display: none">
                        <form action="{{ url('comment') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <div class="form-group">
                                <label>Nickname</label>
                                <input type="text" name="nickname" class="form-control" style="width: 300px;" required="required">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" style="width: 300px;">
                            </div>
                            <div class="form-group">
                                <label>Home page</label>
                                <input type="text" name="website" class="form-control" style="width: 300px;">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
                        </form>
                    </div>

                    <script>
                        function reply(a) {
                            var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
                            var textArea = document.getElementById('newFormContent');
                            textArea.innerHTML = '@'+nickname+' ';
                        }
                    </script>

                    <div class="conmments" style="margin-top: 100px;display: none">
                        @foreach ($article->hasManyComments as $comment)

                            <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
                                <div class="nickname" data="{{ $comment->nickname }}">
                                    @if ($comment->website)
                                        <a href="{{ $comment->website }}">
                                            <h3>{{ $comment->nickname }}</h3>
                                        </a>
                                    @else
                                        <h3>{{ $comment->nickname }}</h3>
                                    @endif
                                    <h6>{{ $comment->created_at }}</h6>
                                </div>
                                <div class="content">
                                    <p style="padding: 20px;">
                                        {{ $comment->content }}
                                    </p>
                                </div>
                                <div class="reply" style="text-align: right; padding: 5px;">
                                    <a href="#new" onclick="reply(this);">回复</a>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>


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
                        <p><a href="http://www.laruence.com/" title="Laruence的博客" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '风雪之隅'])"><i class="fa fa-comments"></i> 风雪之隅</a></p>
                        <p><a href="http://rango.swoole.com/" title="韩天峰(Rango)的博客" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '韩天峰(Rango)的博客'])"><i class="fa fa-comments"></i> 韩天峰(Rango)的博客</a></p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection