@extends('web.layouts.web-layouts')

@section('webcontent')

<!-- ======= Our Team Section ======= -->
<section id="team" class="team section-bg">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2><strong>মুজিব কর্ণার</strong></h2>
        <p>বঙ্গবন্ধু শেখ মুজিবুর রহমান স্বপ্ন দেখতে ভালোবাসতেন।</p>
      </div>

      <div class="row">

        @foreach ($mujibs as $mujib)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="{{ asset('storage/img/mujib/' . $mujib->upload) }}" class="img-fluid" alt="">

              </div>
              <div class="member-info">
                <h4><a href="{{ url('mujib-corner-detail/'.$mujib->url) }}">{{ $mujib->title }}</a></h4>
              </div>
            </div>
          </div>
        @endforeach

      </div>

    </div>
  </section><!-- End Our Team Section -->


@endsection
