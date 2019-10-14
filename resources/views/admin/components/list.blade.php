@if($list->category == 'doctors')
<div class="col-12 col-sd-12 col-md-12 blacklist rounded-lg pr-2 pr-md-5 pl-2 pl-md-4 pt-2 pt-md-3 pb-2 pb-md-3">
        
    <div class="d-flex align-items-start">
        <div>
            @if($list->photo != NULL)
            <img src="{{ $list->photo }}" alt="avatar" class="rounded-circle userphoto">
            @else
            <img src="{{ asset('img/list/user.jpg') }}" alt="avatar" class="rounded-circle userphoto">
            @endif
            <p class="mt-3 mb-0" style="font-size: 0.7rem">Комментарий от:</p>
            <p class="mt-0 mb-0" style="font-size: 0.7rem">{{ $list->applicant }}</p>
            <p style="font-size: 0.7rem">{{ $list->applicant_email }}</p>
        </div>
        <div class="ml-4 ml-md-5">
            <input type="checkbox" id="comment{{ $list->id }}" class="position-absolute comment-checkbox">
            <label for="comment{{ $list->id }}">
                <h4>{{ $list->name }}</h4>
                <p class="m-0">
                    <span class="text-dark">Компания:</span>
                    {{ $list->company }}
                </p>
                <p class="m-0">
                    <span class="text-dark">Адрес работы:</span>
                    {{ $list->address }}
                </p>
                <p class="m-0">
                    <span class="text-dark">Должность:</span>
                    {{ $list->position }}
                </p>
                <div class="mt-2 mt-md-5">
                    @if (!$list->status == 'on')
                    <a href="{{ route('admin.add', [ 'id' => $list->id ]) }}" class="btn btn-sm btn-outline-success">подтвердить</a>
                    <a href="{{ route('admin.delete', [ 'id' => $list->id ]) }}" class="btn btn-sm btn-outline-danger">удалить</a>
                    @else
                    <a href="{{ route('admin.delete', [ 'id' => $list->id ]) }}" class="btn btn-sm btn-outline-danger">удалить</a>
                    @endif
                </div>
            </label>
            <p class="m-0">
                <span class="text-dark">Комментарий:</span>
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
            <p class="mt-3 mb-0" style="font-size: 0.7rem">Комментарий от:</p>
            <p class="mt-0 mb-0" style="font-size: 0.7rem">{{ $list->applicant }}</p>
            <p style="font-size: 0.7rem">{{ $list->applicant_email }}</p>
        </div>
        <div class="ml-4 ml-md-5">
            <input type="checkbox" id="comment{{ $list->id }}" class="position-absolute comment-checkbox">
            <label for="comment{{ $list->id }}">
                <h4>{{ $list->name }}</h4>
                <p class="m-0">
                    <span class="text-dark">Адрес компании:</span>
                    {{ $list->address }}
                </p>
                <p class="m-0">
                    <span class="text-dark">Сфера деятельности:</span>
                    {{ $list->position }}
                </p>
                <div class="mt-2 mt-md-5">
                    @if (!$list->status == 'on')
                    <a href="{{ route('admin.add', [ 'id' => $list->id ]) }}" class="btn btn-sm btn-outline-success">подтвердить</a>
                    <a href="{{ route('admin.delete', [ 'id' => $list->id ]) }}" class="btn btn-sm btn-outline-danger">удалить</a>
                    @else
                    <a href="{{ route('admin.delete', [ 'id' => $list->id ]) }}" class="btn btn-sm btn-outline-danger">удалить</a>
                    @endif
                </div>
            </label>
            <p class="m-0">
                <span class="text-dark">Комментарий:</span>
                {{ $list->comment }}
            </p>
        </div>
    </div>
</div>
@endif