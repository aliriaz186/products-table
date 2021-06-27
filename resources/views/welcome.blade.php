<!DOCTYPE html>
<!-- COMMON TAGS -->
<meta charset="utf-8">



@extends('layouts.landing-app')
<!--====== BANNER PART START ======-->
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{url('')}}/assets/css/works.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        .respmargintopbtn{
            margin-top: -360px!important;
        }
        .resppaddding1{
            padding: 50px;
        }
        .logomargin1{
            margin-top: 90px
        }
        .logomargin2{
            margin-left: 10px
        }
        .logosizeresp1{
            height: 80px;width: 100px;
        }
        .logosizeresp2{
            height: 80px;width: 80px;
        }
        .resppaddingiconsmain{
            padding: 30px;
        }
        .servicemargin{
            height: 380px;
        }
        @media screen and (max-width: 600px) {
            .respmargintopbtn{
                margin-top: -150px!important;
            }
            .resptopbtn1{
                margin-left: -20px;
            }
            .resppaddding1{
                padding: 0px;
            }
            .logomargin1{
                margin-top: 150px
            }
            .logosizeresp1{
                width: 80px;
                height: 60px;
            }
            .respfontsizelogotext{
                font-size: 14px;
            }
            .logosizeresp2{
                height: 65px;width: 70px;
            }
            .logomargin2{
                margin-left: 0px
            }
            .resppaddingiconsmain{
                padding: 17px;
            }
            .servicemargin{
                height: 470px;
            }
            .btnbottommarginleft{
                margin-left: -64px;
            }
            .btnbottommarginlef2t{
                margin-left: -50px;
            }
        }




                .autocomplete-items {

                position: absolute;
                border: 1px solid #d4d4d4;
                border-bottom: none;
                border-top: none;
                z-index: 99;
                /*position the autocomplete items to be the same width as the container:*/
                top: 100%;
                left: 0;
                right: 0;
                }

                .autocomplete-items div {
                padding: 10px;
                cursor: pointer;
                background-color: #fff;
                border-bottom: 1px solid #d4d4d4;
                }

                /*when hovering an item:*/
                .autocomplete-items div:hover {
                background-color: #e9e9e9;
                }

                /*when navigating through the items using the arrow keys:*/
                .autocomplete-active {
                background-color: DodgerBlue !important;
                color: #ffffff;
                }
    </style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <section  style="padding-top: 200px;">
{{--        <div class="banner__bg"></div>--}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 style="text-align: center;background-image: linear-gradient(to right, #f495e1, #2979ff);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;margin-bottom:20px;font-family: cursive;">DISKODE ENTRIES</h2>
                    <div class="px-5">
                        <label>SHOW ROWS</label>
                       <select id="length" onchange="getFilteredData()">
                           <option value="15" selected>15</option>
                           <option  value="30">30</option>
                           <option  value="45">45</option>
                           <option  value="60">60</option>
                           <option  value="75">75</option>
                       </select>

                       {{-- <label onclick="switchFilters()" style="margin-left: 20px;padding:5px;background:#d3d3d385;border-radius:5px;cursor: pointer;" ><i class="fa fa-filter"></i> Filters</label> --}}
                       <div style="padding: 10px;" id="filtersdiv">
                            {{-- <input type="text" placeholder="Search by Influencer" id="influencer" > --}}
                            <select id="influencer" style="margin-left:10px;padding:5px" onchange="getFilteredData()">
                                <option value="" >Search Influencer</option>
                                @foreach ($influencers as $item)
                                <option value="{{$item->influencer}}">{{$item->influencer}}</option>
                                @endforeach
                            </select>
                            <select  style="margin-left:10px;padding:5px" id="product" onchange="getFilteredData()">
                                <option value="" >Search Product</option>
                                @foreach ($products as $item)
                                <option value="{{$item->product}}">{{$item->product}}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" placeholder="Search by Product Name" style="margin-left:10px" id="product" onkeydown="searchInfoOnKeyDown()"> --}}
                            <select style="margin-left:10px;padding:5px" id="category" onchange="getFilteredData()">
                                <option value="" >Select Category</option>
                                @foreach ($categories as $item)
                                <option value="{{$item->product_type}}">{{$item->product_type}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="sort_influencer" value="0">
                            <input type="hidden" id="sort_product" value="0">
                            <input type="hidden" id="sort_type" value="0">
                       </div>
                    </div>



                                        <div class="px-5 table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>LOGO</th>
                                                    <th>INFLUENCER <i style="color: pointer" class="fa fa-chevron-down" id="sort_influencer1" onclick="setSortInfluencer('sort_influencer')"><i></th>
                                                    <th>PRODUCT <i style="color: pointer" class="fa fa-chevron-down" id="sort_product1" onclick="setSortProduct('sort_product')"><i></th>
                                                    <th>TYPE <i style="color: pointer" class="fa fa-chevron-down" id="sort_type1" onclick="setSortType('sort_type')"><i></th>
                                                    <th>PROMOCODE</th>
                                                    <th>CODE WORKS</th>
                                                    <th>WORKED</th>
                                                    <th>INFO</th>

                                                </tr>
                                                </thead>
                                                <tbody id="tbodyId">
                                                {{-- @if(count($entries) != 0)
                                                    @foreach($entries as $key => $item)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td><img src="{{url('show-image')}}/{{$item->id}}" style="height: 24px;
                                                                width: 24px;
                                                                border-radius: 12px;"></td>
                                                            <td>{{$item->influencer}}</td>
                                                            <td>{{$item->product}}</td>
                                                            <td>{{$item->product_type}}</td>
                                                            <td>{{$item->promo_code}}</td>
                                                            <td>{{$item->worked}}</td>
                                                            <td>{{$item->notwordked}}</td>

                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-center">No Entries Found Yet!</td>
                                                        <td></td>
                                                    </tr>
                                                @endif --}}
                                                </tbody>
                                            </table>
                                        </div>






            </div> <!-- row -->
        </div>


          <!-- The Modal -->
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Promo Code</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                 <h1 id="PromoCodeDiv"></h1>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
    </section>
    <script>
        $(document).ready(function(){
            getFilteredData();
            $('#influencer').select2();
            $('#product').select2();
            $('#category').select2();


        });
        let switchF = false;
        let influencerSort = 0;
        let productSort = 0;
        let typeSort = 0;
        function setSortInfluencer(type){
            if(influencerSort === 0){
                resetSort();
                document.getElementById(type).value = 1;
                document.getElementById('sort_influencer' + '1').classList.remove('fa-chevron-down');
                document.getElementById(type + '1').classList.add('fa-chevron-up');
                influencerSort = 1;
            }else{
                resetSort();
                document.getElementById(type).value = 0;
                influencerSort = 0;
            }

            getFilteredData();

        }

        function setSortProduct(type){
            if(productSort === 0){
                resetSort();
                document.getElementById(type).value = 1;
                document.getElementById('sort_product' + '1').classList.remove('fa-chevron-down');
                document.getElementById(type + '1').classList.add('fa-chevron-up');
                productSort = 1;
            }else{
                resetSort();
                document.getElementById(type).value = 0;
                productSort = 0;
            }

            getFilteredData();

        }

        function setSortType(type){
            if(typeSort === 0){
                resetSort();
                document.getElementById(type).value = 1;

                document.getElementById('sort_type' + '1').classList.remove('fa-chevron-down');
                document.getElementById(type + '1').classList.add('fa-chevron-up');
                typeSort = 1;
            }else{
                resetSort();
                document.getElementById(type).value = 0;
                typeSort = 0;
            }

            getFilteredData();

        }

        function resetSort(){
            document.getElementById('sort_influencer' + '1').classList.remove('fa-chevron-up');
            document.getElementById('sort_product' + '1').classList.remove('fa-chevron-up');
            document.getElementById('sort_type' + '1').classList.remove('fa-chevron-up');
            document.getElementById('sort_influencer' + '1').classList.remove('fa-chevron-down');
            document.getElementById('sort_product' + '1').classList.remove('fa-chevron-down');
            document.getElementById('sort_type' + '1').classList.remove('fa-chevron-down');

            document.getElementById('sort_influencer' + '1').classList.add('fa-chevron-down');
            document.getElementById('sort_product' + '1').classList.add('fa-chevron-down');
            document.getElementById('sort_type' + '1').classList.add('fa-chevron-down');

            document.getElementById('sort_influencer').value = 0;
            document.getElementById('sort_product').value = 0;
            document.getElementById('sort_type').value = 0;

            influencerSort = 0;
            productSort = 0;
            typeSort = 0;
        }

        function switchFilters(){
            if(switchF == false){
                document.getElementById('filtersdiv').style.display = 'block';
                switchF = true;
            }
            else if(switchF == true){
                document.getElementById('filtersdiv').style.display = 'none';
                switchF = false;
            }

        }
        let typingTimer;
        function searchInfoOnKeyDown(){
            clearTimeout(typingTimer);
            typingTimer = setTimeout(function () {
                getFilteredData();
            }, 1000);
            return true;
        }

        function getFilteredData(){
            let influencer = document.getElementById('influencer').value;
            let product = document.getElementById('product').value;
            let category = document.getElementById('category').value;
            let length = document.getElementById('length').value;
            let sort_influencer = document.getElementById('sort_influencer').value;
            let sort_product = document.getElementById('sort_product').value;
            let sort_type = document.getElementById('sort_type').value;

            let formData = new FormData();
            formData.append('influencer', influencer);
            formData.append('product', product);
            formData.append('category', category);
            formData.append('length', length);
            formData.append('sort_influencer', sort_influencer);
            formData.append('sort_product', sort_product);
            formData.append('sort_type', sort_type);
            formData.append("_token", "{{ csrf_token() }}");
            document.getElementById('tbodyId').innerHTML = 'Filtering data...';
            $.ajax({
                url: `{{env('APP_URL')}}/search-entries`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {

                    if (result.status === true) {
                       console.log(result.data);
                       showData(result.data)

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: result.message,
                        });
                    }
                },
                error: function (data) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "server Error",
                    });
                }
            });
        }

        function showData(entries){
            document.getElementById('tbodyId').innerHTML = '';
            for(let i=0;i<entries.length;i++){
                let tr = document.createElement('tr');
                let td1 = document.createElement('td');
                let td2 = document.createElement('td');
                let td3 = document.createElement('td');
                let td4 = document.createElement('td');
                let td5 = document.createElement('td');
                let td6 = document.createElement('td');
                let td7 = document.createElement('td');
                let td8 = document.createElement('td');
                let tdoptions = document.createElement('td');
                td1.innerText = i + 1;
                let img = document.createElement('img');
                img.src = `{{url('show-image')}}` + '/' + entries[i].id;
                img.style = "height: 30px;width: 30px;border-radius: 12px;";

                let promobutton = document.createElement('button');
                promobutton.setAttribute('type', 'button');
                // promobutton.setAttribute('data-toggle', 'modal');
                // promobutton.setAttribute('data-target', '#myModal');
                promobutton.classList.add('btn', 'btn-primary');
                promobutton.innerText = "Get Code";
                // promobutton.style = "background: blue";
                promobutton.addEventListener("click", function() {
                    document.getElementById('promo_code' + entries[i].id).innerText = entries[i].promo_code;
                    getCodeApi(entries[i].id);
                });

                let info = document.createElement('a');
                info.setAttribute('href', entries[i].info);
                info.setAttribute('target', '_blank');
                let linkIcon = document.createElement('i');
                linkIcon.classList.add('fa', 'fa-link');
                linkIcon.style.fontSize = '20px';
                info.appendChild(linkIcon);
                td2.appendChild(img);
                td3.innerText = entries[i].influencer;
                td4.innerText = entries[i].product;
                td5.innerText = entries[i].product_type;
                td6.setAttribute('id', 'promo_code' + entries[i].id)
                td6.appendChild(promobutton);
                if(entries[i].worked !== 'N/A'){
                    td7.innerText =  entries[i].worked + '%';
                }else{
                    td7.innerText =  entries[i].worked;
                }
                // if(entries[i].notwordked !== 'N/A'){
                //     td8.innerText =  entries[i].notwordked + '%';
                // }else{
                //     td8.innerText =  entries[i].notwordked;
                // }
                td8.appendChild(info);
                let likebtn = document.createElement('i');
                likebtn.classList.add('fa', 'fa-thumbs-up');
                likebtn.style.cursor = 'pointer';
                likebtn.style.color = 'green';
                likebtn.style.fontSize = '25px';
                likebtn.setAttribute('title', 'Worked');
                likebtn.addEventListener('click', function() {
                    likebtnFunc(entries[i].id);
                });

                let unlikebtn = document.createElement('i');
                unlikebtn.classList.add('fa', 'fa-thumbs-down');
                unlikebtn.addEventListener('click', function() {
                    unlikebtnFunc(entries[i].id);
                });
                unlikebtn.style.marginLeft = '10px';
                unlikebtn.style.cursor = 'pointer';
                unlikebtn.style.color = 'red';
                unlikebtn.style.fontSize = '25px';
                unlikebtn.setAttribute('title', 'Not Worked');
                tdoptions.appendChild(likebtn);
                tdoptions.appendChild(unlikebtn);


                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                tr.appendChild(td5);
                tr.appendChild(td6);
                tr.appendChild(tdoptions);
                tr.appendChild(td7);
                tr.appendChild(td8);
                document.getElementById('tbodyId').appendChild(tr);
            }
        }

        function getCodeApi(id){
            let formData = new FormData();
            formData.append('id', id);
            formData.append('useragent',  navigator.userAgent);

            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: `{{env('APP_URL')}}/code-get`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {

                    if (result.status === true) {
                    //    console.log(result.data);


                    } else {

                    }
                },
                error: function (data) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "server Error",
                    });
                }
            });
        }

        function likebtnFunc(id){

            let formData = new FormData();
            formData.append('status', 'liked');
            formData.append('id', id);
            formData.append('useragent',  navigator.userAgent);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: `{{env('APP_URL')}}/like-btn`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    if(result === true){
                        swal("Success", "Liked");
                    }else{
                        swal("Error", "You Already gave the feedbackfor this entry.");
                    }

                    getFilteredData();
                },
                error: function (data) {


                }
            });
        }

        function unlikebtnFunc(id){


            let formData = new FormData();
            formData.append('status', 'unliked');
            formData.append('id', id);
            formData.append('useragent',  navigator.userAgent);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: `{{env('APP_URL')}}/unlike-btn`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    if(result === true){
                        swal("Success", "Liked");
                    }else{
                        swal("Error", "You Already gave the feedbackfor this entry.");
                    }
                    getFilteredData();

                },
                error: function (data) {


                }
            });
        }

    </script>
@endsection
