<div class="reply-list">
    @foreach($replies as $reply)
        <div class="media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
            <div class="avatar pull-left">
                <a href="{{ route('users.show',$reply->user_id) }}">
                    <img class="media-object img-responsive" src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" width="48px" height="48px">
                </a>
            </div>

            <div class="infos">
                <div class="media-heading">
                    <a href="{{ route('users.show',$reply->user_id) }}" title="{{ $reply->user->name }}">
                        {{ $reply->user->name }}
                    </a>

                    <span> • </span>

                    <span class="meta" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>

                    @can('destroy',$reply)
                    <div class="meta pull-right">
                        <form action="{{ route('replies.destroy',$reply->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-default btn-xs pull-left">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                        </form>
                    </div>
                    @endcan

                    <div class="reply-content">
                        {!! $reply->content !!}
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>