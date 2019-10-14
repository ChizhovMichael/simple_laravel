@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($list as $item)
    @component('admin.components.list', [ 'list' => $item ])
    @endcomponent
    @endforeach

    <div class="mt-5 text-center">
        <div class="d-inline-block">
            @if ($agent->isDesktop())
            {!! $list->links() !!}
            @else
            {!! $list->onEachSide(1)->links() !!}
            @endif
        </div>
    </div>

</div>
@endsection