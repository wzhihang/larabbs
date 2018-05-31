@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="text-center">
                    作者:{{ $topic->user->name }}
                </div>
                <hr>
                <div class="media">
                    <div  align="center">
                        <a href="{{ route('users.show',$topic->user->id) }}">
                            <img class="thumbnail img-responsive" width="300px" height="300px" src="{{ $topic->user->avatar }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="text-center">
                    {{ $topic->title }}
                </h1>

                <div class="article-meida text-center">
                    {{ $topic->created_at->diffForHumans() }}
                    ⋅
                    <span class="glyphicon glyphicon-commment" aria-hidden="true"></span>
                    {{ $topic->reply_count }}
                </div>

                <div class="topic-body">
                    {!! $topic->body !!}
                </div>

                @can('update',$topic)
                <div class="operate">
                    <hr>
                    <a href="{{ route('topics.edit',$topic->id) }}" class="btn btn-default btn-xs pull-left" role="button">
                        <i class="glyphicon glyphicon-edit"></i>编辑
                    </a>

                    <form action="{{ route('topics.destroy',$topic->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button href="" type="sumbit" class="btn btn-default btn-xs" role="button" style="margin-left: 8px">
                            <i class="glyohicon glyphicon-trash"></i>删除
                        </button>
                    </form>
                </div>
                @endcan
            </div>
        </div>

        {{--用户回复列表--}}
        <div class="panel panel-default topic-reply">
            <div class="panel-body">
                @include('topics._reply_box',['topic'=>$topic])
                @include('topics._reply_list',['replies'=>$topic->replies()->with('user')->get()])
            </div>
        </div>
    </div>
</div>

@endsection
