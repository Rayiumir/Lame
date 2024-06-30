@extends('Lame::layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 offset-md-3">
            <div class="card rounded-5 shadow-sm mt-5">
                <div class="card-body">
                    <form>
                        <div class="mt-3 mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingInput" placeholder="">
                                <label for="floatingInput">نام</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-4" id="floatingInput" placeholder="">
                                <label for="floatingInput">آدرس ایمیل</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">رمز عبور</label>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary rounded-5">ثبت نام</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
