@include('common.errors')
<div class="reply-box">
    <form action="{{ route('replies.store') }}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <div class="form-group">
            <textarea name="content" class="form-control" placeholder="分享你的想法" id=""  rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share"></i>回复</button>
    </form>
</div>
<hr>