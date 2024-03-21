@extends('web.layouts.web-layouts')

@section('webcontent')
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>মুজিব কর্ণার</h2>
          <ol>
            <li><a href="{{route('index')}}">হোম</a></li>
            <li>মুজিব কর্ণার</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry">

                @if ($mujibdet->upload)
                    @if (pathinfo($mujibdet->upload, PATHINFO_EXTENSION) === 'pdf')
                        <object data="{{ asset('storage/img/mujib/' . $mujibdet->upload) }}" type="application/pdf" width="100%" height="800">
                            <p>Unable to display PDF file. <a href="{{ asset('storage/img/mujib/' . $mujibdet->upload) }}">Download</a> instead.</p>
                        </object>
                    @else
                        <div class="entry-img">
                            <img src="{{ asset('storage/img/mujib/' . $mujibdet->upload) }}" alt="" class="img-fluid">
                        </div>
                    @endif
                @endif

              <h2 class="entry-title">
                <a href="">{{ $mujibdet->title }}</a>
              </h2>

              <div class="entry-meta">
                <ul>

                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href=""><time>{{ \Carbon\Carbon::parse($mujibdet->created_at)->format('F j, Y') }}
                </time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                    {!! $mujibdet->description !!}
                </p>

              </div>

            </article><!-- End blog entry -->



          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">
              <h3 class="sidebar-title">অন্যান্য নোটিশ</h3>
              <div class="sidebar-item recent-posts">

                @php $count = 0; @endphp

                @foreach ($provider_ntcs as $ntcs)
                        @if ($count < 10)
                            <div class="post-item clearfix">
                                @if ($ntcs->upload)
                                    @if (pathinfo($ntcs->upload, PATHINFO_EXTENSION) === 'pdf')
                                    <img src="{{ asset('web/assets/img/pdf.png') }}" alt="" class="img-fluid">
                                    @else
                                        <div class="entry-img">
                                            <img src="{{ asset('storage/img/events/' . $ntcs->upload) }}" alt="" class="img-fluid">
                                        </div>
                                    @endif
                                @else
                                <img src="{{ asset('web/assets/img/noimg.png') }}" alt="" class="img-fluid">
                                @endif
                                <h4><a href="{{ url('notice/'.$ntcs->url) }}">{{ $ntcs->event_title }}</a></h4>
                                <time>{{ date('F j, Y', strtotime($ntcs->created_at)) }}</time>
                            </div>
                            @php $count++; @endphp
                            @else
                            @break
                        @endif
                @endforeach



              </div><!-- End sidebar recent posts-->



            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

    @endsection
