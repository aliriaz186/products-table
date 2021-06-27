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
        <h3 style="letter-spacing: 3px" class="mt-4 mb-3">UPDATE YOUR CARD DETAILS</h3>
        <form method="post" action="{{url("/update-card-info")}}">
            {{csrf_field()}}

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Card Holder Name" name="cardHolderName" required>
                            </div>
                            <div class="input-box" style="padding-top: 10px">
                                <input type="text" placeholder="Card Number" required name="cardNumber">
                            </div>
                            <div class="input-box mt-35" style="margin-top: 10px">
                                <input type="text" placeholder="CVV" name="cvv" required>
                            </div>
                            <div class="input-box mt-10 col-lg-6" style="margin-top: 30px">
                                <div>Expiry Month</div>
                                <select name="expiryMonth" required
                                        style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="input-box mt-10 col-lg-6" style="margin-top: 30px">
                                <div>Expiry Year</div>
                                <select name="expiryYear" required
                                        style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                </select>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="form-group" >
                <button type="submit"
                        style="background: #6b9ce8;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                    UPDATE CARD DETAILS
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
            let num22;
            num = (parseInt(value));
            num = num * 0.2;
            num22 = num + parseInt(value);
            // alert(parseInt(num))
            document.getElementById('totalPayableNow').innerText = num22.toFixed(2);
            document.getElementById('vat20%').innerText = num.toFixed(2);

            document.getElementById('totalAmount').value = num22.toFixed(2);
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
