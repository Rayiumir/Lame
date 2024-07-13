@extends('Lame::layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 offset-md-3 mt-5">
            <div class="card rounded-5 shadow-sm mt-5">
                <div class="card-body">
                    <figure class="text-center">
                        <img src="{{asset('/icon/envelope.png')}}" width="100" height="100" alt="" srcset="">
                    </figure>
                    <div class="text-center">
                        <h4 class="fw-bold">تایید ایمیل</h4>
                        <p class="text-muted">یک ایمیل به {{ auth()->user()->email }} ارسال شده است. لطفا روی لینک موجود در ایمیل کلیک کنید.</p>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="#" onclick="event.preventDefault();document.getElementById('verify-resend').submit()" class="btn btn-primary rounded-5">ارسال دوباره لینک تایید ایمیل</a>
                        <form action="{{ route('verify.resend') }}" method="POST" id="verify-resend">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
