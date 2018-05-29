@if(count($topics))
    <div class="media-list">
        @foreach($topics as $topic)
            <li class="media">
                <div class="media-left">
                    <a href="{{ route('users.show',$topic->user_id) }}">
                        <img class="media-object img-thumbnail" src="{{ $topic->user->avatar }}" alt="{{ $topic->user->name }}" width="52px;" height="52px;">
                    </a>
                </div>

                <div class="media-body">
                    <div class="media-heading">
                        <a href="{{ route('topics.show',$topic->id) }}" title="{{ $topic->title }}">
                            {{ $topic->title }}
                        </a>
                        <a class="pull-right" href="{{ route('topics.show',[$topic->id]) }}">
                            <span class="badge"> {{ $topic->reply_count }} </span>
                        </a>
                    </div>

                    <div class="media-body meta">
                        <a href="{{ route('categories.show',$topic->category->id) }}" title="{{ $topic->category->name }}">
                            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                            &nbsp;{{ $topic->category->name }}
                        </a>

                        <span>&nbsp;  • &nbsp; </span>
                        <a href="" title="{{ $topic->user->name }}">
                            <span aria-hidden="true" class="glyphicon glyphicon-user" ></span>
                            {{ $topic->user->name }}
                        </a>

                        <span>&nbsp;  • &nbsp; </span>
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                        <span class="timeago" title="最后活跃于">{{ $topic->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </li>

            @if ( ! $loop->last)
                <hr>
            @endif

        @endforeach
    </div>
@else
    <div class="empty-block">
        暂无数据 ~_~
    </div>
@endif