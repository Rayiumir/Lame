@extends('Lame::layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 offset-md-3 mt-5">
            <div class="card rounded-5 shadow-sm mt-5">
                <div class="card-body">
                    <a href="{{ route('login') }}" type="button" class="btn btn-primary rounded-5">ورود با ایمیل</a>
                    <figure class="text-center mt-3">
                        <img src="{{asset('/icon/phone-sms.png')}}" width="100" height="100" alt="" srcset="">
                    </figure>
                    <div class="mt-5">
                        <form class="mb-3" id="mobileForm">
                            <input type="number" id="mobileInput" class="form-control rounded-5" placeholder="شماره تلفن همراه را وارد کنید">
                            <div id="mobileInputErrorText" class="text-danger mt-3">
                                <strong id="mobileInputErrorText"></strong>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary rounded-5 mt-5">دریافت کد تایید</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#mobileForm').submit(function(event){
            event.preventDefault();
            $.post("{{ url('/login/mobile') }}",
                {
                    '_token' : "{{ csrf_token() }}",
                    'mobile' : $('#mobileInput').val()

                } , function(response , status){
                    console.log(response , status);

                }).fail(function(response){
                $('#mobileInput').addClass('mb-1');
                $('#mobileInputError').fadeIn();
                $('#mobileInputErrorText').html(response.responseJSON.errors.mobile[0]);
            })
        });
    </script>
@endsection
