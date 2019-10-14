<div class="modal__wrapp__hide">
    <div class="noscroll">
        <div class="inside__scroll">
            <div class="p-md-5 pt-5 pb-5 pr-2 pl-2">
                <h5 class="text-light text-center">Добавить в список врача</h5>
                <p class="text-light">Все сообщения перед публикацией проходят модерацию. Старайтесь писать лаконично.</p>
                <form class="mt-5" method="POST" action="{{ route('add.blacklist', [ 'info' => 'doctors' ]) }}">
                    
                @csrf
                
                    <div class="form-group">
                        <label class="color-main">ФИО врача</label>
                        <input type="text" name="name" class="d-block form-control border-main bg-dark placeholder-main text-light" placeholder="ФИО врача" required>
                    </div>
                    <div class="form-group">
                        <label class="color-main">Название компании</label>
                        <input type="text" name="company" class="d-block form-control border-main bg-dark placeholder-main text-light" placeholder="Название компании" required>
                    </div>
                    <div class="form-group">
                        <label class="color-main">Адрес компании</label>
                        <input type="text" name="address" class="d-block form-control border-main bg-dark placeholder-main text-light" placeholder="Адрес компании" required>
                    </div>
                    <div class="form-group">
                        <label class="color-main">Сфера деятельности</label>
                        <input type="text" name="position" class="d-block form-control border-main bg-dark placeholder-main text-light" placeholder="Сфера деятельности" required>
                    </div>
                    <div class="form-group">
                        <label class="color-main">Комментарий по компании</label>
                        <textarea name="comment" class="d-block form-control border-main bg-dark placeholder-main text-light" placeholder="Введите комментарий" required></textarea>
                    </div>

                    <div class="d-flex justify-content-center col-12 col-md-12">
                        <div class="col-8 col-md-8 mt-3 position-relative" id="photo">
                            <input type="hidden" name="photo" value="" class="preview">
                            <img src="{{ asset('img/icon/camera.svg') }}" class="preview col-12 col-md-12" />
                            <div class="photo position-absolute">
                                <input type="file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="color-main">Ваше Имя и Фамилия</label>
                        <input type="text" name="applicant" class="d-block form-control border-main bg-dark placeholder-main text-light" placeholder="Ваше Имя и Фамилия" required>
                    </div>

                    <div class="form-group">
                        <label class="color-main">Ваш email</label>
                        <input type="email" name="applicant_email" class="d-block form-control border-main bg-dark placeholder-main text-light" placeholder="Ваш email" required>
                    </div>

                    <button type="submit" class="btn border-main color-main mt-4 col-12 col-md-12">Отправить на модерацию</button>
                </form>
            </div>
        </div>
    </div>
</div>