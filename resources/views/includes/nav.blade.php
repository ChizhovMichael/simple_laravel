<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

    <a class="navbar-brand d-flex align-items-center" href="{{ route('main') }}">
        <img src="{{ asset('img/icon/logo.svg') }}" width="50" height="50" class="d-inline-block align-top" alt="logo">
        {{ config('app.name') }}
    </a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        
            <div class="ml-auto">
                <span class="nav-link btn btn-sm border-main mr-1 mt-1 color-main popup-doctors c-p">
                    + Добавить врача
                </span>
            </div>
            <div>
                <span class="nav-link btn btn-sm border-main mr-1 mt-1 color-main popup-company c-p">
                    + Добавить компанию
                </span>
            </div>
            <div>
                <a class="nav-link text-light" href="{{ route('about') }}">О проекте</a>
            </div>





            <!-- Search -->

            <form class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-light bg-dark border-0" id="basic-addon1">
                            <img src="{{ asset('img/icon/search.svg') }}" alt="search" width="20" height="20">
                        </span>
                    </div>
                    <input class="form-control mr-sm-2 border-main rounded-pill bg-dark placeholder-main text-light" type="text" placeholder="Поиск" id="search">
                </div>
            </form>
    </div>


</nav>