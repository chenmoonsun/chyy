@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">修改文章</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>修改失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/article',$article->id) }}" method="POST">
                            <input type="hidden" name="_method" value="put"/>
                            {!! csrf_field() !!}
                            <input type="text" name="title" class="form-control" required="required" value="{{$article->title}}" placeholder="请输入标题">
                            <br>
                            <textarea name="description" rows="3" class="form-control" required="required" placeholder="请输入文章描述">{{$article->description}}</textarea>
                            <br>
                            {{--<textarea name="body" rows="10" class="form-control" required="required"  placeholder="请输入内容">{{$article->body}}</textarea>
                            <br>--}}
                            <div id="body-editormd">
                                <textarea name="body" style="display:none;">{{$article->body}}</textarea>
                            </div>
                            @include('markdown::encode',['editors'=>['body-editormd']])
                            <input type="hidden" name="id" value="{{$article->id}}">
                            <button class="btn btn-lg btn-info">修改文章</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
