<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - реестр недобросовестных врачей и медицинских учреждений</title>
    <meta name="description" content="Реестр недобросовестных врачей, реестр недобросовестных медицинских учреждений, черный список врачей, черный список медицинских учреждений, черный список мед служащих, реестр недобросовестных медицинских работников">
    <meta name="keywords" content="реестр недобросовестных врачей, реестр недобросовестных медицинских учреждений, черный список врачей, черный список медицинских учреждений, черный список мед служащих, реестр недобросовестных медицинских работников, реестр недобросовестных стоматологических клиник, реестр недобросовестных поставщиков">

    @include('includes.head')

</head>

<body class="bg-dark">

    @include('includes.nav')

    <div class="container-fluid">

        <div class="bg-dark row d-flex align-items-start">
            <div class="col-12 col-md-3 d-flex pt-5 pb-5 pr-5 pl-5 justify-content-center flex-column">
                <div>
                    <a class="nav-link btn btn-sm border-main mr-1 color-main @if(Request::is('/')) bg-main text-dark @endif" href="{{ route('main') }}">
                        Все
                    </a>
                </div>
                <div>
                    <a class="nav-link btn btn-sm border-main mr-1 mt-3 color-main @if(Request::is('doctors')) bg-main text-dark @endif" href="{{ route('main.info', ['info' => 'doctors']) }}">
                        Врачи
                    </a>
                </div>
                <div>
                    <a class="nav-link btn btn-sm border-main mr-1 color-main mt-3 @if(Request::is('company')) bg-main text-dark @endif" href="{{ route('main.info', ['info' => 'company']) }}">
                        Компании
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-9 pt-5 pb-5" id="listContainer">

                @foreach($list as $item)
                    @component('components.list', [ 'list' => $item ])
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
            
        </div>

    </div>


    @include('includes.footer')
</body>

</html>