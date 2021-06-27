@extends('layouts.dashboard')

@section('content')
    <section class="sevices-area" style="margin-top: 30px">
        <div class="container">
            <div class="row justify-content-center">

            </div> <!-- row -->
            <div class="row justify-content-center" style="margin: 0 auto;max-width: 800px">

                <div class="col-lg-6 col-md-6 col-sm-9">
                        <div class="sevices-item" style="height: 300px;padding: 30px;border: 2px solid #6b9ce8">
                            <h4 class="title" style="padding-top: 0px">ENTRIES</h4>
                            <p>
                                YOU HAVE {{$entries ?? 0}} TOTAL ENTRIES
                            </p>
                            <p>
                                YOU HAVE {{$codeViews}} TOTAL VIEWS
                            </p>
                            <p>
                                YOU HAVE {{$likes}} TOTAL LIKES
                            </p>
                            <p>
                                YOU HAVE {{$dislikes}} TOTAL DISLIKES
                            </p>
                        </div>
                </div>


            </div>

    </section>
@endsection
