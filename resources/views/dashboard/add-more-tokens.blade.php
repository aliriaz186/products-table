@extends('layouts.dashboard')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    {{--    <div>--}}
    <div class="container" style="max-width: 900px;margin-top: 30px;margin-bottom: 50px">
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
        <h3 style="letter-spacing: 3px" class="mt-4 mb-3">ADD MORE CERTIFICATE TOKENS</h3>
        <p style="font-size: 13px;">Please select the number of certificate tokens you would like to buy and your payment details. Certificate tokens cost £1 each.
        </p>
        <form method="post" action="{{url("/save-new-token")}}">
            {{csrf_field()}}
            <div class="form-group row" style="width: 600px;margin-top: 30px;margin-bottom: 30px">
                <div class="col-lg-6">
                    <select onchange="calculateCertificateToken(this.value)" name="certificateToken"
                            style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                        <option value="45">45</option>
                        <option value="50">50</option>
                        <option value="55">55</option>
                        <option value="60">60</option>
                        <option value="65">65</option>
                        <option value="70">70</option>
                        <option value="75">75</option>
                        <option value="80">80</option>
                        <option value="85">85</option>
                        <option value="90">90</option>
                        <option value="95">95</option>
                        <option value="100">100</option>
                    </select>
{{--                    <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title" required>--}}
                </div>
            </div>
            <div class="container">
                <div class="mt-60" style="font-weight: bolder;font-size: 18px;color: #6b9ce8">PAYMENT SUMMARY</div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div style="font-size: 15px;font-weight: bold">Extra Certificate Tokens</div>
                        </div>
{{--                        <div class="login-title" style="padding-top: 40px!important;">--}}
{{--                            <div style="font-size: 15px;font-weight: bold">Vat @ 20%</div>--}}
{{--                        </div>--}}
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div style="font-size: 15px;font-weight: bold">Total Payable Now</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div style="font-size: 15px">£ <span id="extraCertificateTokens">5</span>.00</div>
                        </div>
{{--                        <div class="login-title" style="padding-top: 40px!important;">--}}
{{--                            <div style="font-size: 15px">£ <span id="vat20%">1.00</span></div>--}}
{{--                        </div>--}}
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div style="font-size: 15px">£ <span id="totalPayableNow">5.00</span></div>
                        </div>
                        <input type="hidden" name="totalAmount" id="totalAmount" value="5.00">
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="mt-60" style="font-weight: bolder;font-size: 18px;color: #6b9ce8">YOUR CARD</div>
                <p>you can change card details from billing section anytime.</p>
                <div>
                    <p style="font-size: 20px"><span>*****{{substr($cardNumber, -4)}}</span> <span style="margin-left: 20px">{{$month}}/{{$year}}</span></p>
                </div>
            </div>
            <br>
            <div class="form-group" >
                <button type="submit"
                        style="background: #6b9ce8;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                    Pay
                </button>
            </div>
        </form>
    </div>
    <script>
        function setName(fileId, inputId) {
            var files = document.getElementById(fileId).files;
            if (files.length> 0 )
            {
                document.getElementById(inputId).value = files[0].name;
            }
        }
        function calculateCertificateToken(value) {
            document.getElementById('extraCertificateTokens').innerText = value;
            let num;
            // let num22;
            num = (parseInt(value));
            // num = num * 0.2;
            // num22 = num + parseInt(value);
            // alert(parseInt(num))
            document.getElementById('totalPayableNow').innerText = num.toFixed(2);
            // document.getElementById('vat20%').innerText = num.toFixed(2);

            document.getElementById('totalAmount').value = num.toFixed(2);
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
// Prepare the preview for profile picture
            $("#photo").change(function () {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photopreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
