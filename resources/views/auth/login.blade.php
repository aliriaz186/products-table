@extends('layouts.landing-app')
<!--====== LOGIN PART START ======-->


@section('content')
    <section class="login-area singup-area" style="margin-bottom: 100px">
        {{--        <div class="login-bg">--}}
        {{--            <div class="login-shape">--}}
        {{--                <img src="{{url('')}}/assets/images/shapes/login-shape.png" alt="logo">--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <form method="post" id="login_form" action="{{url("/login-admin")}}">
            {{csrf_field()}}
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-title">
                            <h2 style="text-align: center;    background-image: linear-gradient(to right, #f495e1, #2979ff);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;font-family: cursive;">ADMIN LOGIN</h2>

                            @if($errors->any())
                                <div class="alert alert-danger" style="margin-top: 10px">
                                    <h4 style="color: black;font-size: 14px">{{$errors->first()}}</h4>
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('msg'))
                                <div class="alert alert-success" style="margin-bottom: 0px!important;margin-top: 10px">
                                    <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
                                </div>
                            @endif
                            <p style="margin-top: 30px;color: black;font-weight: bold;font-size: 16px!important;">Please enter your username and your password below.</p>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Email*" id="email" name="email" required>
                            </div>
                            <div class="input-box mt-30">
                                <input type="password" name="password" placeholder="Password*">
                            </div>
                            <input type="hidden" id="google_signin" name="google_signin" value="">
                            <div id="gSignIn" style="margin-top:25px;"></div>
                            <div id="gerror" style="margin-top:25px;display:none;color:red;font-size:15px;"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container" >
                <div class="row">
                    <div class="col-lg-3 mt-30">
                        <button type="submit"
                                style="background-image: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;width: 100%;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                            Login
                        </button>


                        <div class="trustedsite-trustmark" data-type="213" data-width="94"  data-height="39"></div>
                    </div>
                </div>
                <br>
        </form>
    </section>

    <div class="modal" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title" id="selectedUseruser">Forgot Password</h3>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{url('send-reset-password-link')}}" method="post">
                                @csrf
                                <div style="padding: 20px">
                                    <label>Enter your email:</label>
                                    <br>
                                    <input type="email" name="forgotemail" required class="form-group">
                                    <button type="submit" class="btn btn-primary">SEND RESET PASSWORD LINK</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
<!--====== LOGIN PART ENDS ======-->
