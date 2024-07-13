@extends('Lame::layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 offset-md-3">
            <div class="card rounded-5 shadow-sm mt-5">
                <div class="card-body">
                    <figure class="text-center mt-3">
                        <img src="{{asset('/icon/user-plus.png')}}" width="100" height="100" alt="" srcset="">
                    </figure>
                    <form action="{{ route('auth.register.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mt-3 mb-3">
                            <div class="mb-3">
                                <label for="Name" class="mb-2">نام</label>
                                <input type="text" name="name" class="form-control rounded-5 @error('name') is-invalid @enderror" id="Name" placeholder="">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Email" class="mb-2">آدرس ایمیل</label>
                                <input type="email" name="email" class="form-control rounded-5 @error('email') is-invalid @enderror" id="Email" placeholder="">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="Password" class="mb-2">رمز عبور</label>
                                <input type="password" name="password" class="form-control rounded-5 @error('password') is-invalid @enderror" id="Password" placeholder="">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-5">ثبت نام</button>
                        <a class="btn btn-link text-decoration-none text-secondary" href="{{ route('login') }}">
                            قبلا ثبت نام کردید؟ وارد شوید.
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
