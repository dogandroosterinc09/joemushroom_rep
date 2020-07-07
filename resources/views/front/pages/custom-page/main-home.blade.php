<section class="page homepage--main-page">
    @include('front.layouts.sections.header')
    @include('front.pages.custom-page.sections.slider')
    <main class="main-content">
        {{-- individual section  --}}
        <section class="hp-whatwemake">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2>What We Make</h2>
                        <h3>Every mushroom is handpicked with care & freshness is our top priority</h3>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="btn--primary orange">View All Products</a>
                    </div>
                </div>
            </div>
            <div class="mushroom-slider">
                SLIDER
            </div>
        </section> {{-- end of .hp-whatwemake --}}


        <section class="hp-whoweare">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Find Out Who WE Are</h2>
                        <h3>We are a family business, made up of people dedicated to mushroom culture</h3>
                        <a href="#" class="btn--primary orange">Read Our Story</a>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('public/images/home/video-placeholder.jpg') }}" alt="Video">
                    </div>
                </div>
            </div>
        </section>{{-- end of .hp-whoweare --}}


        <section class="hp-howwegrow">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2>How We Grow</h2>
                        <h3>We grow mushrooms sustainably on locally sourced material</h3>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('public/images/home/banner-logos.png') }}" alt="Logo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('public/images/home/grow-img-big.jpg') }}" alt="Mushrooms">
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </section>{{-- end of .hp-howwegrow --}}
    </main>
    @include('front.layouts.sections.footer')
</section>