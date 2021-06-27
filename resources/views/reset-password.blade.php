<!DOCTYPE html>
<link rel="canonical" href="https://www.copyrightcover.com/login">
<!-- COMMON TAGS -->
<meta charset="utf-8">
<title>Copyright Cover Members Login</title>
<!-- Search Engine -->
<meta name="description" content="Login  for Copyright Cover members.Update your work and view your dashboard">
<meta name="image" content="https://www.copyrightcover.com/assets/images/logo.png">
<meta name="keywords" content="Copyright Review, how to copyright, copyright protection, copyright Cover,UK Copyright Service, registration" />
<meta name="ROBOTS" content="NOYDIR" />
<meta name="ROBOTS" content="NOODP" />
<meta name="copyright" content="Copyright Cover Limited" />
<!-- Schema.org for Google -->
<meta itemprop="name" content="Copyright Cover">
<meta itemprop="description" content="Login  for Copyright Cover members.Update your work and view your dashboard">
<meta itemprop="image" content="https://www.copyrightcover.com/assets/images/logo.png">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Copyright Cover">
<meta name="twitter:description" content="Login  for Copyright Cover members.Update your work and view your dashboard">
<meta name="twitter:site" content="@CoverCopyright">
<meta name="twitter:creator" content="@CoverCopyright">
<meta name="twitter:image:src" content="https://www.copyrightcover.com/assets/images/logo.png">
<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta property="og:title" content="Copyright Cover">
<meta property="og:description" content="Login  for Copyright Cover members.Update your work and view your dashboard">
<meta property="og:image" content="https://www.copyrightcover.com/assets/images/banner.png">
<meta property="og:locale" content="England">
<meta property="og:video" content="https://www.youtube.com/watch?v=g9g4g1wTtZI">
<meta property="fb:admins" content="100011001514131">
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.copyrightcover.com/login">

<meta name="google-signin-client_id" content="407905395044-kr56ephrdivtkbjpd1crpdc1fl7d7oqo.apps.googleusercontent.com">
<style>
    #liab
    {
        display: none;
        background-color: rgb(46, 158, 247);
        padding: 13px;
        cursor: pointer;
        color: white;
        width: 350px;
        margin-top: 20px;
    }
    #liab img
    {
        height: 38px;
        background: white;
        padding: 5px;
        border-radius: 50
    }
    #liab span{margin-left:5px;}
</style>
@extends('layouts.landing-app')
<!--====== LOGIN PART START ======-->


@section('content')
    <section class="login-area singup-area" style="margin-bottom: 100px">
        {{--        <div class="login-bg">--}}
        {{--            <div class="login-shape">--}}
        {{--                <img src="{{url('')}}/assets/images/shapes/login-shape.png" alt="logo">--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div style="margin: 0 auto;max-width: 500px;margin-top: 100px" >
            @if($errors->any())
                <div class="alert alert-danger">
                    <h4>{{$errors->first()}}</h4>
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('msg'))
                <div class="alert alert-success" style="margin-bottom: 0px!important;">
                    <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
                </div>
            @endif
            <br>
            <h3 style="color: black">RESET PASSWORD</h3>
            <form method="post" action="{{url('resetpassword')}}">
                @csrf
                <div class="row" style="margin-top: 30px">
                    <div class="col-md-12">
                        <input  type="hidden" value="{{$email}}" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-md-12">
                        <input  type="password" class="form-control" name="password" placeholder="New Password" required>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <input  type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                        <button class="btn btn-primary">Reset</button>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                    </div>

                </div>
            </form>

        </div>

    </section>



@endsection
<!--====== LOGIN PART ENDS ======-->
