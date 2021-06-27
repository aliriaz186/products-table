



@extends('layouts.landing-app')
@section('content')

    <section class="testimonial-area" style="margin-top: 100px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <h2 style="text-align: center;background-image: linear-gradient(to right, #f495e1, #2979ff);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;font-family: cursive;">Reviews</h2>

{{--                    <div class="section-title text-center">--}}
{{--                        <span>Testimonial / Reviews</span>--}}
{{--                        <h3 class="title"><span>Check What’s Our</span> Client Say <span>About Us!</span></h3>--}}
{{--                    </div> <!-- SECTION TITLE -->--}}
                </div>


            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="testimonial-item mt-30">
                        <img src="{{url('')}}/assets/images/testimonial-1.jpg" alt="">
                        <h3 class="title">Adam Smith</h3>
                        <span>Wp Developer</span>
                        <p>Quick and easy service. All my codes are secured from copyright infringment. Highly rated! </p>
                        <div class="icon">
                            <img src="{{url('')}}/assets/images/shape.svg" alt="">
                        </div>
                    </div> <!-- testimonial item -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="testimonial-item item-2 mt-30">
                        <img src="{{url('')}}/assets/images/testimonial-2.jpg" alt="">
                        <h3 class="title">Maria Ven</h3>
                        <span>writer</span>
                        <p>As a writer i tend to have different ideas and keep writing original contents. Protecting my work with copyright cover gives me ultimate assurance that my hard work is getting looked after.</p>
                        <div class="icon">
                            <img src="{{url('')}}/assets/images/shape.svg" alt="">
                        </div>
                    </div> <!-- testimonial item -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="testimonial-item item-3 mt-30">
                        <img src="{{url('')}}/assets/images/testimonial-3.jpg" alt="">
                        <h3 class="title">Desel Mulate</h3>
                        <span>Digital Marketer</span>
                        <p>Highly pleased with the website ease of use. As i run multiple websites. I have used this service on all my websites to deter content thieves. </p>
                        <div class="icon">
                            <img src="{{url('')}}/assets/images/shape.svg" alt="">
                        </div>

                    </div> <!-- testimonial item -->
                </div>
            </div> <!-- row -->
        </div>

    </section>



@endsection
