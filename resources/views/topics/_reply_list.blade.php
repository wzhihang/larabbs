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

                    <div class="meta pull-right">
                        <a href="" title="删除回复">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </div>

                    <div class="reply-content">
                        {!! $reply->content !!}
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>