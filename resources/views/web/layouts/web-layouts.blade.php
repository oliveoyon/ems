
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $webs->school_title }}</title>
    <meta name="author" content="IconBangla <contact@iconbangla.net>">
    <meta name="description" content="{{ $webs->school_title }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ route('index') }}">
    <meta property="og:title" content="{{ $webs->school_title }}">
    <meta property="og:description" content="{{ $webs->school_title }}">
    <meta property="og:image" content="{{ asset('web/img/mujib-corner.jpg') }}">
    <meta property="og:url" content="{{ route('index') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $webs->school_title }}">
    <meta name="twitter:description" content="{{ $webs->school_title }}">
    <meta property="og:image" content="{{ asset('web/img/mujib-corner.jpg') }}">


    <!-- Favicons -->
    <link href="{{ asset('web/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('web/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('web/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    @stack('admincss')

    <!-- Template Main CSS File -->
    <link href="{{ asset('web/assets/css/style.css') }}" rel="stylesheet">


    <style>
        .bottom-border-table tbody tr {
            border-bottom: 1px solid #ddd;
        }
    </style>


</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="custom-topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="news-container">
                        <div class="news-update">Notice</div>
                        <div class="scroll-container">
                            <div class="scroll-content">
                                @php $count = 0;  @endphp

                                @foreach ($provider_ntcs as $ntcs)
                                    @if ($ntcs->event_type_id == 1)
                                        @if ($count < 10)
                                            <a href="{{ url('notice/' . $ntcs->url) }}" class="notice-item">
                                                <span class="dot"></span>{{ $ntcs->event_title }}
                                            </a>
                                            @php $count++; @endphp
                                        @else
                                        @break
                                    @endif
                                @endif
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.website-section {
    padding: 40px 0;
    background-color: #ffffff;
    /* background: linear-gradient(to right, #dcdcdc, #ffffff); */
}

.text-primary {
    color: #007bff; /* Primary color for the school title */
}

.text-dark {
    color: #343a40; /* Dark color for the text */
}

.col-lg-3 img,
.col-lg-6,
.col-lg-3 img {
    margin: 0; /* Center the content horizontally */
    padding: 0;
}

.col-lg-6 h1 {
    font-size: 35px; /* Adjust the font size as needed */
    color: #4150f1;
    /* font-weight: bold; */
    text-transform: uppercase;
    text-shadow: 1px 1px 0 #000;
    text-align: center;
}

.col-lg-6 p {
    font-size: 20px; /* Adjust the font size as needed */
    margin: 0;
    font-weight: bold;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .col-lg-3,
    .col-lg-6 {
        margin-bottom: 20px; /* Add some space between columns on smaller screens */
    }

    .col-lg-3,
    .col-lg-6,
    .col-lg-3 img {
        width: 100%; /* Make columns and images full width on smaller screens */
        margin: 0; /* Remove margin for images */
    }

    .col-lg-6 h1 {
        font-size: 25px; /* Adjust the font size for mobile */
    }

    .col-lg-6 p {
        font-size: 16px; /* Adjust the font size for mobile */
    }
}



</style>

{{-- <section class="gradient-section" style="padding: 30px 0; background-color:red;">
    <div class="container" style="text-align: center; ">
        <img src="{{ asset('web/assets/img/test1.png') }}" alt="">
    </div>
    <div class="box"></div>
</section> --}}

<section class="website-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 d-none d-md-block">
                <!-- Left logo (hidden on mobile and tablet) -->
                <img height="100" src="{{ asset('storage/img/logo/'.$webs->school_logo) }}" alt="Left Logo">
            </div>
            <div class="col-lg-6 text-center">
                <!-- School information -->
                <h1 class="mb-4">{{$webs->school_title}}</h1>
                <p class="text-dark">{{ $webs->school_address }}</p>
            </div>
            <div class="col-lg-3 d-none d-md-block" style="text-align: right">
                <!-- Right logo (hidden on mobile and tablet) -->
                <img height="100" src="{{ asset('web/assets/img/shikkha.png') }}" alt="Right Logo">
            </div>
        </div>
    </div>
</section>





<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div class="logo">
            {{-- <h1 class="text-light"><a href="index.html">FCC</a></h1> --}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <a href="{{ route('index') }}"><img style="padding:5px 0; height:40px; width: 30px;" src="{{ asset('web/assets/img/home.png') }}" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar">
    <ul>
        <li><a class="active" href="{{ route('index') }}">হোম</a></li>
        @foreach ($provider_menusWithSubMenus as $menu)
            @if ($menu->is_home == 0)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{ $menu->id }}"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $menu->menu_name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start"
                        aria-labelledby="navbarDropdown{{ $menu->id }}">
                        @foreach ($menu->subMenus as $subMenu)
                            @if($subMenu->childMenus->isNotEmpty())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $subMenu->submenu_name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="submenuDropdown{{ $subMenu->id }}">
                                        @foreach ($subMenu->childMenus as $childMenu)
                                            <li><a class="dropdown-item" href="{{ route('submenudesc', ['childSlug' => $childMenu->child_menu_slug]) }}
                                                ">{{ $childMenu->childmenu_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li><a class="dropdown-item"
                                    href="{{ route('menudesc', ['slug' => $subMenu->submenu_slug]) }}">{{ $subMenu->submenu_name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
        <li><a class="active" href="{{ route('contact') }}">যোগাযোগ</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav>


<!-- .navbar -->


    </div>
</header><!-- End Header -->

@yield('webcontent')

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-contact">
                    <h3>{{ $webs->school_title }}</h3>
                    {{-- <img width="50" height="50" src="{{ asset('web/assets/img/fcc.png') }}" alt="" class="img-fluid"> --}}
                    <p style="font-family: solaimanlipi">
                        
                        {{ $webs->school_address }} <br><br>
                        <strong>ফোন:</strong> {{ $webs->school_phone }}<br>
                        <strong>ফোন:</strong> {{ $webs->school_phone1 }}<br>
                        <strong>ইমেইল:</strong> {{ $webs->school_email }}<br>
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>প্রয়োজনীয় লিঙ্ক</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('index') }}">হোম</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a
                                href="{{ route('allnotice', ['cat' => 'all-notice']) }}">একাডেমিক নোটিশ</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a
                                href="{{ route('allnotice', ['cat' => 'all-event']) }}">ইভেন্ট
                                সমুহ</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">যোগাযোগ</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>সুযোগ-সুবিধা</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">অত্যাধুনিক ল্যাব</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">সুবিশাল অডিটোরিয়াম</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">সমৃদ্ধ লাইব্রেরী</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">ক্লাব</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">খেলার মাঠ</a></li>
                    </ul>
                </div>

                {{-- <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div> --}}

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; কপিরাইট <strong><span>{{ $webs->school_title }}</span></strong>. সর্বস্বত্ব
                সংরক্ষিত
            </div>
            <div class="credits">
                Developed By <a href="https://iconbangla.net/">IconBangla</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="{{ $webs->school_facebook }}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('web/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('web/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('web/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('web/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('web/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>




<!-- Template Main JS File -->
<script src="{{ asset('web/assets/js/main.js') }}"></script>

<?php
    if (isset($eventsJson)){}else{$eventsJson = '';}
?>
<script>
    $(document).ready(function() {
        // Use PHP to echo the dynamic data from the controller
        var noticedata = <?php echo $eventsJson; ?>;

        // Initialize FullCalendar
        $('#fullCalendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay',
            },
            events: noticedata,
            eventRender: function(event, element) {
                // Check if the event has a URL
                if (event.url) {
                    // Make the event a clickable link
                    element.css('cursor', 'pointer');
                    element.attr('onclick', "window.location='" + event.url + "'");
                }

                // Set the title attribute for additional information
                element.attr('title', event.title);
                element.css('background-color', event.color);
            },
        });
    });
</script>





</body>

</html>
