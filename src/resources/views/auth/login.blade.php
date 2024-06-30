@extends('Lame::layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 offset-md-3 mt-5">
            <div class="card rounded-5 shadow-sm mt-5">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-pills nav-fill gap-2 p-1 small rounded-5 shadow-sm" id="nav-tab" role="tablist">
                            <button class="nav-link rounded-5 active" id="nav-one" data-bs-toggle="tab" data-bs-target="#nav-One" type="button" role="tab" aria-controls="nav-one" aria-selected="true">ایمیل</button>
                            <button class="nav-link rounded-5" id="nav-two" data-bs-toggle="tab" data-bs-target="#nav-Two" type="button" role="tab" aria-controls="nav-two" aria-selected="false">موبایل</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-One" role="tabpanel" aria-labelledby="nav-one" tabindex="0">
                            <div class="mt-3 mb-3">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">آدرس ایمیل</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">رمز عبور</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary rounded-5">ورود به سایت</button>
                        </div>
                        <div class="tab-pane fade" id="nav-Two" role="tabpanel" aria-labelledby="nav-two" tabindex="0">
                            <div class="mt-3 m-3">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">شماره موبایل</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary rounded-5">دریافت کد تایید</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
