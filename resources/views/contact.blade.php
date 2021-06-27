

@extends('layouts.landing-app')
@section('content')


    <section class="faq-area mt-30" style="margin-top: 200px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <h2 style="text-align: center;background-image: linear-gradient(to right, #f495e1, #2979ff);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;font-family: cursive;">CONTACT US</h2>

                </div>
            </div> <!-- row -->
            <p style="margin-top: 40px">
                Please see our contact details below. Feel free to email our tech support directly using the form underneath. We aim to respond within 1 working day. If you are missing an email from us, please check your junk mail before contacting us.

<div class="trustedsite-trustmark" data-type="211" data-width="120"  data-height="50"></div>
            </p>
            <form method="post" action="{{url("/sendmessage")}}" onsubmit="return validateForm()">
                {{csrf_field()}}
                <div class="container">
                    <div class="row" style="padding-top: 50px">
                        <div class="col-lg-6">
                            <div>
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <h4 style="color: black;font-size: 14px">{{$errors->first()}}</h4>
                                    </div>
                                @endif
                                @if(\Illuminate\Support\Facades\Session::has('msg'))
                                    <div class="alert alert-success" style="margin-bottom: 0px!important;">
                                        <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
                                    </div>
                                @endif
                                    <h6 class="title" style="font-size: 30px!important;margin-top: 10px">CONTACT <span>US</span>
                                    </h6>
                            </div>
                            <div class="login-form">
                                <div class="input-box">
                                    <input type="text" placeholder="Name*" name="name" required>
                                </div>
                                <div class="input-box mt-30">
                                    <input type="email" placeholder="Email*" name="email" required>
                                </div>
                                <div class="input-box mt-30">
                                    <input type="text" placeholder="Subject*" name="subject" required>
                                </div>
                                <div class="input-box mt-30">
                                    <textarea type="text" class="form-control" placeholder="Message*" name="message" required></textarea>
                                </div>


                                <div style="margin-top: 20px">
                                    <button type="submit" class="main-btn" style="background-image: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);">
                                        SUBMIT
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div style="margin-top: 100px;margin-left: 50px">
                                {{-- <div style="padding: 5px;">
                                    Phone : <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a>
                                </div> --}}
                                <div style="padding: 5px;">
                                    EMAIL : <a href="mailto:diskode.help@gmail.com">diskode.help@gmail.com</a>
                                </div>
                                <div style="padding: 5px;">
                                    Instagram : _Diskode <br>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>

    <script>
        function validateForm()
        {
            var v = grecaptcha.getResponse();
            if(v.length === 0)
            {
                document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
                return false;
            }
            else
            {
                document.getElementById('captcha').innerHTML="Captcha completed";
                return true;
            }
        }
    </script>


@endsection
