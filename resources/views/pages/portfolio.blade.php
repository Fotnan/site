@extends('layouts.master_home')
@section('home_content')


    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Portolio</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Portolio</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up">
            @foreach($images_app as $image)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{$image->image}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$image->title}}</h4>
                        <p>App</p>
                        <a href="{{$image->image}}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$image->title}}"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                @endforeach
                @foreach($images_web as $image)
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="{{$image->image}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$image->title}}</h4>
                        <p>Web</p>
                        <a href="{{$image->image}}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$image->title}}"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                @endforeach
                @foreach($images_card as $image)
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="{{$image->image}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$image->title}}</h4>
                        <p>Card</p>
                        <a href="{{$image->image}}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$image->title}}"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

@endsection
