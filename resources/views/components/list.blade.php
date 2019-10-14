@if($list->category == 'doctors')
<div class="col-12 col-sd-12 col-md-12 blacklist rounded-lg pr-2 pr-md-5 pl-2 pl-md-4 pt-2 pt-md-3 pb-2 pb-md-3 position-relative">
    <div class="d-flex align-items-start">
        <div>
            @if($list->photo != NULL)
            <img src="{{ $list->photo }}" alt="avatar" class="rounded-circle userphoto">
            @else
            <img src="{{ asset('img/list/user.jpg') }}" alt="avatar" class="rounded-circle userphoto">
            @endif
            <p class="text-white-50 mt-3 mb-0" style="font-size: 0.7rem">Комментарий от:</p>
            <p class="color-main mt-0 mb-0" style="font-size: 0.7rem">{{ $list->applicant }}</p>
            <p class="text-light" style="font-size: 0.7rem">{{ $list->applicant_email }}</p>
        </div>
        <div class="ml-4 ml-md-5">
            <input type="checkbox" id="comment{{ $list->id }}" class="position-absolute comment-checkbox">
            <label for="comment{{ $list->id }}">
                <h4 class="text-light">{{ $list->name }}</h4>
                <p class="m-0 text-light">
                    <span class="color-main">Компания:</span>
                    {{ $list->company }}
                </p>
                <p class="m-0 text-light">
                    <span class="color-main">Адрес работы:</span>
                    {{ $list->address }}
                </p>
                <p class="m-0 text-light">
                    <span class="color-main">Должность:</span>
                    {{ $list->position }}
                </p>
            </label>
            <p class="m-0 text-light">
                <span class="color-main">Комментарий:</span>
                {{ $list->comment }}
            </p>
        </div>
    </div>
</div>
@else
<div class="col-12 col-sd-12 col-md-12 blacklist rounded-lg pr-2 pr-md-5 pl-2 pl-md-4 pt-2 pt-md-3 pb-2 pb-md-3">
    <div class="d-flex align-items-start">
        <div>
            @if($list->photo != NULL)
            <img src="{{ $list->photo }}" alt="avatar" class="rounded-circle userphoto">
            @else
            <img src="{{ asset('img/list/user.jpg') }}" alt="avatar" class="rounded-circle userphoto">
            @endif
            <p class="text-white-50 mt-3 mb-0" style="font-size: 0.7rem">Комментарий от:</p>
            <p class="color-main mt-0 mb-0" style="font-size: 0.7rem">{{ $list->applicant }}</p>
            <p class="text-light" style="font-size: 0.7rem">{{ $list->applicant_email }}</p>
        </div>
        <div class="ml-4 ml-md-5">
            <input type="checkbox" id="comment{{ $list->id }}" class="position-absolute comment-checkbox">
            <label for="comment{{ $list->id }}">
                <h4 class="text-light">{{ $list->name }}</h4>
                <p class="m-0 text-light">
                    <span class="color-main">Адрес компании:</span>
                    {{ $list->address }}
                </p>
                <p class="m-0 text-light">
                    <span class="color-main">Сфера деятельности:</span>
                    {{ $list->position }}
                </p>
            </label>
            <p class="m-0 text-light">
                <span class="color-main">Комментарий:</span>
                {{ $list->comment }}
            </p>
        </div>
    </div>
</div>
@endif