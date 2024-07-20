@extends('Lame::layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 offset-md-3 mt-5">
            <div class="card rounded-5 shadow-sm mt-5">
                <div class="card-body">
                    <a href="{{ route('auth.mobile') }}" type="button" class="btn btn-success rounded-5">ورود با شماره موبایل</a>
                    <figure class="text-center mt-3">
                        <img src="{{asset('/icon/user.png')}}" width="100" height="100" alt="" srcset="">
                    </figure>
                    <div class="mt-3 mb-3">
                        <form action="{{ route('auth.login.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="Email" class="mb-2">آدرس ایمیل</label>
                                <input type="email" name="email" class="form-control rounded-5 @error('email') is-invalid @enderror" id="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="mb-2">رمز عبور</label>
                                <input type="password" name="password" class="form-control rounded-5 @error('paswword') is-invalid @enderror" id="Password" placeholder="">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary rounded-5">ورود به سایت</button>
                            <a class="btn btn-link text-decoration-none text-secondary" href="{{ route('auth.register') }}">
                                حساب کاربری ندارید؟ ساخت حساب کاربری
                            </a>
                            <a class="btn btn-link text-decoration-none text-danger" href="{{ route('auth.password.email') }}">
                                بازنشانی رمز عبور؟
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
