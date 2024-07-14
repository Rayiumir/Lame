@extends('Lame::layouts.app')

@section('content')
    <x-slot name="title">
        - باز نشانی رمز عبور
    </x-slot>
    <section class="col-md-6 offset-3 mt-5">
        <div class="card border-0 rounded-4">
            <div class="card-body">
                <figure class="text-center mt-3">
                    <img src="{{asset('/icon/password.png')}}" width="100" height="100" alt="" srcset="">
                </figure>
                <form action="{{ route('auth.password.send.email') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">ایمیل</label>
                        <input type="email" name="email" class="form-control rounded-5 @error('email') is-invalid @enderror" id="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary rounded-5"> بازنشانی رمز عبور </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <a href="{{ route('auth.register') }}" class="text-decoration-none text-dark">حساب کاربری ندارید؟ ساخت حساب کاربری</a>
            </div>
            <div class="col">
                <a href="{{ route('login') }}" class="text-decoration-none text-dark">ورود به حساب کاربری</a>
            </div>
        </div>
    </section>
@endsection
