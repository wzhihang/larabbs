@foreach ( ['success','danger','message'] as $msg )
    @if ( session()->has($msg) )
    <div class="alert alert-{{ $msg }}">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session()->get($msg) }}
    </div>
    @endif
@endforeach