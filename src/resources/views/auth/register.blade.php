@extends('Lame::layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 offset-md-3">
            <div class="card rounded-5 shadow-sm mt-5">
                <div class="card-body">
                    <form action="{{ route('auth.register.store') }}" method="POST">
                        @csrf
                        <div class="mt-3 mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control rounded-4 @error('name') is-invalid @enderror" id="floatingInput" placeholder="">
                                <label for="floatingInput">نام</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control rounded-4 @error('email') is-invalid @enderror" id="floatingInput" placeholder="">
                                <label for="floatingInput">آدرس ایمیل</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control rounded-4 @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">رمز عبور</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary rounded-5">ثبت نام</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
