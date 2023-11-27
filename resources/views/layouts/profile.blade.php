<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Profile</title>
        <link rel="shortcut icon" href="{{asset('profile-website/assets/images/fav.png')}}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="{{asset('profile-website/assets/images/fav.jpg')}}">
        <link rel="stylesheet" href="{{asset('profile-website/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="{{asset('profile-website/assets/css/style.css')}}" />
    </head>
        <header class="head">
            <div class="logo border-bottom">
                <img class="w-100" src="{{asset('profile-website/assets/images/ajiputraprayogi_logo.jpg')}}" alt="" />
                 <a class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </a>
            </div>
            <div id="navbarNav" class="navcol d-none d-lg-block">
                <ul>
                    <li><a href="#"><i class="bi bi-house-door fs-5 me-2"></i> Home</a></li>
                    <li><a href="#about"><i class="bi fs-5 bi-info-square me-2"></i> About</a></li>
                    <li><a href="#service"><i class="bi fs-5 bi-gear me-2"></i> Service</a></li>
                    <li><a href="#portfolio"><i class="bi fs-5 bi-columns-gap me-2"></i> Portfolio</a></li>
                    <li><a href="#testimonial"><i class="bi fs-5 bi-people me-2"></i> Testimonial</a></li>
                    <li><a href="#blog"><i class="bi fs-5 bi-newspaper me-2"></i> Blog</a></li>
                    <li><a href="#contact"><i class="bifs-5  bi-envelope me-2"></i> Contact</a></li>
                </ul>
            </div>
        </header>
        <div  class="main-content">
            
            @include('profile.home')
            @include('profile.about')
            @include('profile.service')
            @include('profile.portofolio')
            @include('profile.testimonial')
            @include('profile.blog')
            @include('profile.contact')
             
        </div>
    <body>
</body>

<script src="{{asset('profile-website/assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('profile-website/assets/js/popper.min.js')}}"></script>
<script src="{{asset('profile-website/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('profile-website/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('profile-website/assets/plugins/testimonial/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('profile-website/assets/js/script.js')}}"></script>

</html>