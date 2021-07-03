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
    <h5 style="padding: 20px;font-family: Times New Roman;color:#007bff">Discount + Promocode from all your favorite Influencers</h5>
    {{--        <div class="banner__bg"></div>--}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    {{-- <h2 style="text-align: center;background-image: linear-gradient(to right, #f495e1, #2979ff);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;margin-bottom:20px;font-family: cursive;">DISKODE ENTRIES</h2>
                    <div class="px-5"> --}}


                       {{-- <label onclick="switchFilters()" style="margin-left: 20px;padding:5px;background:#d3d3d385;border-radius:5px;cursor: pointer;" ><i class="fa fa-filter"></i> Filters</label> --}}
                       <div style="padding: 10px;" id="filtersdiv">
                                {{-- <input type="text" placeholder="Search by Influencer" id="influencer" > --}}
                                <select id="influencer" style="margin-left:10px;padding:5px;width:160px" onchange="getFilteredData()">
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

                                <button class="btn btn-outline-dark" onclick="sortDesc()" id="decending" style="padding-top: 2px;padding-bottom:2px">Sort Decending <i class="fas fa-chevron-down"></i></button>
                                <button class="btn btn-outline-dark" onclick="sortAsc()" id="ascending" style="display:none;padding-top: 2px;padding-bottom:2px">Sort Ascending <i class="fas fa-chevron-up"></i></button>
                                <input type="hidden" id="sort_influencer" value="0">
                                <input type="hidden" id="sort_product" value="0">
                                <input type="hidden" id="sort_type" value="0">
                                <input type="hidden" id="sort_ascending" value="0">


                            <span style="margin-left:5px">
                                <label>SHOW ROWS</label>
                                <select id="length" onchange="getFilteredData()">
                                    <option value="15" selected>15</option>
                                    <option  value="30">30</option>
                                    <option  value="45">45</option>
                                    <option  value="60">60</option>
                                    <option  value="75">75</option>
                                </select>
                                <span style="margin-left: 20px;display:none">
                                    Showing 1 - <span id="show-filtered">0</span> out of <span id="show-total">0</span> total
                                </span>
                            </span>


                       </div>
                    </div>



                                        <div class="table-responsive">
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
            <div>
                Showing 1 - <span id="show-filtered2">0</span> out of <span id="show-total2">0</span> total
            </div>
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

        function sortAsc(){
            resetSort();
            document.getElementById('ascending').style.display = 'none';
            document.getElementById('decending').style.display = 'inline';
            document.getElementById('sort_ascending').value = 0;
            getFilteredData();
        }

        function sortDesc(){
            resetSort();
            document.getElementById('ascending').style.display = 'inline';
            document.getElementById('decending').style.display = 'none';
            document.getElementById('sort_ascending').value = 1;
            getFilteredData();
        }

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

        let openIds = [];

        function getFilteredData(){
            let influencer = document.getElementById('influencer').value;
            let product = document.getElementById('product').value;
            let category = document.getElementById('category').value;
            let length = document.getElementById('length').value;
            let sort_influencer = document.getElementById('sort_influencer').value;
            let sort_product = document.getElementById('sort_product').value;
            let sort_type = document.getElementById('sort_type').value;
            let sort_ascending = document.getElementById('sort_ascending').value;

            let formData = new FormData();
            formData.append('influencer', influencer);
            formData.append('product', product);
            formData.append('category', category);
            formData.append('length', length);
            formData.append('sort_influencer', sort_influencer);
            formData.append('sort_product', sort_product);
            formData.append('sort_type', sort_type);
            formData.append('sort_ascending', sort_ascending);
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

                       openIds = [];
                       showData(result.data);
                       document.getElementById('show-filtered').innerText = result.data.length;
                       document.getElementById('show-total').innerText = result.entriesCount;
                       document.getElementById('show-filtered2').innerText = result.data.length;
                       document.getElementById('show-total2').innerText = result.entriesCount;

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
                promobutton.classList.add('btn', 'btn-primary');
                promobutton.innerText = "Get Code";
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
                if(entries[i].haveManyProducts === 1){
                    let linkInf = document.createElement('a');
                    linkInf.innerText = entries[i].influencer;
                    linkInf.style.color = 'blue';
                    linkInf.style.cursor = 'pointer';
                    linkInf.style.textDecoration = 'underline';
                    entries[i].cliked = false;
                    openIds.push(entries[i].id);
                    linkInf.addEventListener("click", function() {

                        for(let l=0;l<openIds.length;l++){
                                let alltrinners = document.getElementsByName('trinner' + openIds[l]);
                                for(let k=0;k<alltrinners.length;k++){
                                    alltrinners[k].style.display = 'none';
                                }

                        }
                        console.log(entries[i].cliked);
                        if(entries[i].cliked === false){
                            let alltrinners = document.getElementsByName('trinner' + entries[i].id);
                            for(let k=0;k<alltrinners.length;k++){
                                alltrinners[k].style.display = 'table-row';
                            }
                            entries[i].cliked = true;
                        }else{
                            let alltrinners = document.getElementsByName('trinner' + entries[i].id);
                            for(let k=0;k<alltrinners.length;k++){
                                alltrinners[k].style.display = 'none';
                            }
                            entries[i].cliked = false;
                        }

                    });
                    td3.appendChild(linkInf);

                }else{
                    td3.innerText = entries[i].influencer;
                }
                // td3.innerText = entries[i].influencer;
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


                if(entries[i].haveManyProducts === 1){
                    let alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
                    let alphaCount = 0;
                    for(let j=0;j<entries[i].products.length;j++){
                        if(j === 0){
                            alphaCount = 0;
                       continue;
                    }
                            let trinner = document.createElement('tr');
                            trinner.style.background = 'lightgrey';
                            trinner.setAttribute('name', 'trinner' + entries[i].id);
                            trinner.style.display = 'none';
                            let td1inner = document.createElement('td');
                            let td2inner = document.createElement('td');
                            let td3inner = document.createElement('td');
                            let td4inner = document.createElement('td');
                            let td5inner = document.createElement('td');
                            let td6inner = document.createElement('td');
                            let td7inner = document.createElement('td');
                            let td8inner = document.createElement('td');
                            let tdoptionsinner = document.createElement('td');
                            td1inner.innerText = (i+1) + alphabet[alphaCount];
                            alphaCount++;



                            let img = document.createElement('img');
                            img.src = `{{url('show-image')}}` + '/' + entries[i].products[j].id;
                            img.style = "height: 30px;width: 30px;border-radius: 12px;";
                            td2inner.appendChild(img);
                            td3inner.innerText = entries[i].products[j].influencer;


                            let promobutton = document.createElement('button');
                            promobutton.setAttribute('type', 'button');
                            promobutton.classList.add('btn', 'btn-primary');
                            promobutton.innerText = "Get Code";
                            promobutton.addEventListener("click", function() {
                                document.getElementById('promo_code' + entries[i].products[j].id).innerText = entries[i].products[j].promo_code;
                                getCodeApi(entries[i].products[j].id);
                            });

                            let info = document.createElement('a');
                            info.setAttribute('href', entries[i].products[j].info);
                            info.setAttribute('target', '_blank');
                            let linkIcon = document.createElement('i');
                            linkIcon.classList.add('fa', 'fa-link');
                            linkIcon.style.fontSize = '20px';
                            info.appendChild(linkIcon);

                            td4inner.innerText = entries[i].products[j].product;
                            td5inner.innerText = entries[i].products[j].product_type;
                            td6inner.setAttribute('id', 'promo_code' + entries[i].products[j].id)
                            td6inner.appendChild(promobutton);
                            if(entries[i].products[j].worked !== 'N/A'){
                                td7inner.innerText =  entries[i].products[j].worked + '%';
                            }else{
                                td7inner.innerText =  entries[i].products[j].worked;
                            }

                            td8inner.appendChild(info);

                            let likebtn = document.createElement('i');
                            likebtn.classList.add('fa', 'fa-thumbs-up');
                            likebtn.style.cursor = 'pointer';
                            likebtn.style.color = 'green';
                            likebtn.style.fontSize = '25px';
                            likebtn.setAttribute('title', 'Worked');
                            likebtn.addEventListener('click', function() {
                                likebtnFunc(entries[i].products[j].id);
                            });

                            let unlikebtn = document.createElement('i');
                            unlikebtn.classList.add('fa', 'fa-thumbs-down');
                            unlikebtn.addEventListener('click', function() {
                                unlikebtnFunc(entries[i].products[j].id);
                            });
                            unlikebtn.style.marginLeft = '10px';
                            unlikebtn.style.cursor = 'pointer';
                            unlikebtn.style.color = 'red';
                            unlikebtn.style.fontSize = '25px';
                            unlikebtn.setAttribute('title', 'Not Worked');
                            tdoptionsinner.appendChild(likebtn);
                            tdoptionsinner.appendChild(unlikebtn);



                            trinner.appendChild(td1inner);
                            trinner.appendChild(td2inner);
                            trinner.appendChild(td3inner);
                            trinner.appendChild(td4inner);
                            trinner.appendChild(td5inner);
                            trinner.appendChild(td6inner);
                            trinner.appendChild(tdoptionsinner);
                            trinner.appendChild(td7inner);
                            trinner.appendChild(td8inner);

                            document.getElementById('tbodyId').appendChild(trinner);
                    }

                }
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
                        swal("Warning", "You already Liked this entry");
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
                        swal("Success", "UnLiked");
                    }else{
                        swal("Warning", "You Already Unliked this entry.");
                    }
                    getFilteredData();

                },
                error: function (data) {


                }
            });
        }

    </script>
@endsection
