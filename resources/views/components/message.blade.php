<div class="modal d-block">
    <div class="modal__wrapp message col-12 col-md-6 shadow bg-dark rounded-lg hide">
        <div class="modal__background position-relative top-left col-12 col-md-12 hide">
            <img src="{{ asset('/img/favicon/twitter.png') }}" alt="congratulations" class="position-absolute">
        </div>
        <h5 class="text-center text-light">{{ $title }}</h5>
        <div class="pl-3 pr-3 pb-3">
            <p class="text-light">{{ $slot }}</p>
            <p class="mt-5 text-light"><i>С уважением, {{ config('app.name') }}</i></p>
            <div class="close c-p">
                <img width="30" height="30" src="/img/icon/cancel.svg">
            </div>
        </div>
    </div>
</div>