@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Topic /
                    @if($topic->id)
                        编辑话题{{$topic->id}}
                    @else
                        创建话题
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($topic->id)
                    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $topic->title ) }}"  placeholder="请填写标题" required/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category_id" required>
                            <option value="" hidden disabled selected>请选择分类</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="body" id="editor" class="form-control" rows="3" placeholder="请填入至少3个字符的内容" required>{{ old('body',$topic->body) }}</textarea>
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary" ><span aria-hidden="true" class="glyphicon glyphicon-ok"></span>保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection