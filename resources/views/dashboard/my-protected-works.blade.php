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
        <h3 style="letter-spacing: 3px;margin-top: 20px" class="mt-4 mb-3">MY PROTECTED WORKS</h3>
        <p style="font-size: 13px;">Below is a list of all your registered and protected work.</p>
        <div class="px-5 table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>REFERENCE NUMBER</th>
                    <th>TITLE</th>
                    <th>DATE</th>
                    <th>OPTIONS</th>
                    <th>RESET PASSWORD</th>
                </tr>
                </thead>
                <tbody>
                @if(count($certificates) != 0)
                    @foreach($certificates as $key => $item)
                        <tr>
                            <td><a href="{{url('view-certificate')}}/{{$item->id}}">{{$item->id}}</a></td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a href="{{url('/delete-certificate/'.$item->id)}}" style="display: none" id="deletebtn{{$item->id}}">
                                </a>
                                    <button class="btn btn-danger" onclick="deleteCertificate({{$item->id}})">Delete</button>

                            </td>
                            <td>
                                {{--                                <a href="{{url('/delete-certificate/'.$item->id)}}">--}}
                                <div class="dropdown">
                                    <button onclick="resetModal(`{{$item->id}}`,`{{$item->title}}`)" data-toggle="modal" data-target="#myModal" class="btn btn-primary" type="button"
                                            style="background: #32353e;letter-spacing: 4px;width: 136px;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;text-align: center;color: #fff;text-transform: uppercase;padding: 7px 0 7px;font-family: 'futura-normalregular';font-size: 15px;border: none;cursor: pointer;">
                                        RESET</button>
                                </div>
                                {{--                                </a>--}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td></td>
                        <td class="text-center">No Certificate Found Yet!</td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" id="resetheading">Modal Heading</h3>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                   <h5>Reset Password</h5>
                    <form action="{{url('set-certificate-password')}}" method="post">
                        @csrf
                        <input type="hidden" id="certificateId" name="certificateId">
                        <div>
                            <input type="text" placeholder="Password" class="form-control" name="password" required>
                        </div><br>
                        <div>
                            <input type="text"  placeholder="ConfirmPassword" class="form-control" name="conpassword" required>
                        </div><br>
                        <div>
                            <button class="btn btn-secondary">SUBMIT</button>
                        </div>
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        function setName(fileId, inputId) {
            var files = document.getElementById(fileId).files;
            if (files.length > 0) {
                document.getElementById(inputId).value = files[0].name;
            }
        }

        function deleteCertificate(id) {
            if(confirm('Are you sure to delete this certificate (reference no# : ' + id + ')')){
                document.getElementById('deletebtn'+ id).click();
            }
        }

        function resetModal(id, name) {
            document.getElementById('resetheading').innerText = name + " (ref : " + id + ")";
            document.getElementById('certificateId').value = id;
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
