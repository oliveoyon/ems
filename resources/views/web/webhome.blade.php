@extends('web.layouts.web-layouts')

@section('webcontent')
@push('admincss')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
@endpush
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner" role="listbox">

            @foreach ($sliders as $slider)
            <div class="carousel-item active" style="background-image: url({{ asset('storage/img/slider/' . $slider->upload) }});">
                @if ($slider->title)
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2>{{ $slider->title }}</h2>
                        <p>{{ $slider->desc }}</p>
                        {{-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> --}}
                    </div>
                </div>
                @endif
            </div>
            @endforeach

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center text-lg-left">
                    <h3 class="mb-4"><span>কলেজের ইতিহাস</span></h3>
                    @if($histories)
                    <p>{!! $histories->history !!}</p>
                    @endif
                    {{-- <a class="cta-btn align-middle mt-4" href="#">আরও পড়ুন</a> --}}
                </div>

            </div>

        </div>
    </section><!-- End Cta Section -->


    <section class="principal-message-section">
        <div class="container principal-container">
            <div class="row">
                @if($messages)
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <div class="image-container" data-aos="fade-right">
                        <img src="{{ asset('storage/img/message_img/' . $messages->upload) }}" height="200" class="principal-image float-left" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="principal-message" data-aos="fade-left">
                        
                        <h2>{{ $messages->message_type }}</h2>
                        <p>{!! $messages->message_desc !!}</p>
                        
                        
                        <!-- Add more content or styling as needed -->
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>


    <section id="features" class="features mt-5">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2><strong>নোটিশ বোর্ড</strong></h2>
                <p>সকল নোটিশ, ইভেন্ট, সেমিনার, ওয়ার্কশপ ও অন্যান্য তথ্য</p>
                <hr>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-right" style="border-right: 1px solid rgb(189, 189, 189)">
                    <ul class="nav nav-tabs flex-column">
                        
                    </ul>
                </div>

                <div class="col-lg-8 ml-auto" data-aos="fade-left" data-aos-delay="100">
                    <div class="tab-content">
                        
                    </div>
                </div>
            </div>


        </div>
    </section><!-- End Features Section -->


    <section class="menu-section">
        <div class="container">
            <div class="row">
                


            </div>


        </div>
    </section>



    <!-- ======= Services Section ======= -->
    <section class="custom-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-lg-left">
                    <h3 class="mb-4"><strong>ডাউনলোড</strong></h3>
                    <div class="card-body table-container">
                        <!-- Notice List -->
                        <table class="custom-table table-striped">
                            <tr>
                                <th>নং</th>
                                <th>শিরোনাম</th>
                                <th>বর্ণনা</th>
                                <th>তারিখ</th>
                                <th>একশন</th>
                            </tr>
                            @foreach ($uploads as $upload)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $upload->title }}</td>
                                <td>{!! Str::substr($upload->description, 0, 100) !!}</td>
                                <td>{{ date('M j, Y', strtotime($upload->created_at)) }}</td>
                                <td><a href="{{ url('download/' . $upload->url) }}" class="btn btn-sm btn-success">বিস্তারিত</a></td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="show-all-notices">
                            <a href="{{ route('alldownload') }}" class="btn btn-success show-all-button btn-sm">সকল
                                ডাউনলোড</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    </div>
    </section><!-- End Services Section -->

    <section style="padding: 0; margin:0">
        <div class="message-box">
            <a href="{{ route('mujib-corner') }}"><img width="100%" class="image-responsive img-fluid" src="{{ asset('web/assets/img/mujib-corner.jpg') }}" alt="মুজিব কর্ণার"></a>
        </div>
    </section>

    <!-- ======= Portfolio Section ======= -->


    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients" style="background-color:#f2f2f2">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>আমাদের <strong>ক্লাবসমূহ</strong></h2>
                <p>ছাত্র-ছাত্রীদের উন্নতির জন্য কার্য্যকর ক্লাব-সমুহের তালিকা</p>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

                <div class="col-lg-3 col-md-4 col-xs-6 mb-2">
                    <div class="client-logo">
                        {{-- <img src="{{asset('web/assets/img/clients/client-1.png')}}" class="img-fluid" alt=""> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        {{-- <img src="{{asset('web/assets/img/clients/client-2.png')}}" class="img-fluid" alt=""> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        {{-- <img src="{{asset('web/assets/img/clients/client-3.png')}}" class="img-fluid" alt=""> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        {{-- <img src="{{asset('web/assets/img/clients/client-4.png')}}" class="img-fluid" alt=""> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        {{-- <img src="{{asset('web/assets/img/clients/client-5.png')}}" class="img-fluid" alt=""> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        {{-- <img src="{{asset('web/assets/img/clients/client-6.png')}}" class="img-fluid" alt=""> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        {{-- <img src="{{asset('web/assets/img/clients/client-7.png')}}" class="img-fluid" alt=""> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        {{-- <img src="{{asset('web/assets/img/clients/client-8.png')}}" class="img-fluid" alt=""> --}}
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Our Clients Section -->

    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                    <h3 class="mb-4"><strong>একাডেমিক ক্যালেন্ডার</strong></h3>

                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div id="fullCalendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h3 class="mb-4"><strong>গুরুত্বপূর্ণ লিঙ্ক</strong></h3>

                    <div class="card important-links-card">
                        <div class="card-body">
                            <ul class="menus">

                               
                                <!-- Add more links as needed -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection