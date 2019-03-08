@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">新增一篇文章</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>新增失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/article') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="text" name="title" class="form-control" required="required" placeholder="请输入文章标题">
                            <br>
                            <textarea name="description" rows="3" class="form-control" required="required" placeholder="请输入文章描述"></textarea>
                            <br>
                            {{--<textarea name="body" rows="10" class="form-control" required="required" placeholder="请输入文章内容"></textarea>--}}
                            <div id="body-editormd">
                                <textarea name="body" style="display:none;"></textarea>
                            </div>
                            @include('markdown::encode',['editors'=>['body-editormd']])
                            <br>
                            <button class="btn btn-lg btn-info">新增文章</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
