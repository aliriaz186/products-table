@extends('layouts.landing-app')
@section('content')


    <section class="faq-area mt-30" style="margin-top: 200px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <h2 style="text-align: center;color: #6b9ce8">SEARCH WORK</h2>
                    <div style="margin: 0 auto;max-width: 100px">
                        <div style="border-bottom: 3px solid #6b9ce8;width: 100px" >

                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <p  style="margin-top: 50px">You will need the work reference number and password to use this form. Only the copyright owner can supply you with this.</p>
            <p>All work protected by us, has its own unique reference number. This reference number is issued to the owner at the time of registering the work , along with a unique password.</p>
            <p>When there is a dispute over copyright registration, the owner can provide this unique reference number and password at his discretion, which can be entered below. The results will show the full details of the registration including the date/ time and the files protected.</p>
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
            <form method="post" action="{{url("/findprotectedwork")}}">
                {{csrf_field()}}
                <div class="container">
                    <div class="row" style="padding-top: 50px">
                        <div class="col-lg-6">
                            <div class="login-form">
                                <div class="input-box">
                                    <input type="text" placeholder="Reference Number*" name="id" required>
                                </div>
                                <div class="input-box mt-30">
                                    <input type="text" placeholder="Password*" name="password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 mt-30">
                            <button type="submit"
                                    style="background: #6b9ce8;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;width: 100%;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                                Search Work
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>



@endsection
