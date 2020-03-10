<section class="homepage homepage--main">
    @include('front.layouts.sections.header')
{{--    @include('front.pages.custom-page.sections.slider')--}}
    <main class="main-content">
        {{-- individual section  --}}
        <section class="section-name">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 section-name__item">
                        test message
                    </div>
                    <div class="col-md-6 section-name__item">
                        test message
                    </div>
                </div>
            </div> {{-- end of default-content--row --}}
        </section> {{-- end of default-content --}}




        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        {{-- "global-featured-slider --}}
                        <div class="global-featured-slider">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 global-featured-slider__top">

                                        <div class="featured-slider-main featured-slider-main__properties">

                                            {{-- slick  --}}
                                            <div class="global-featured-slider__top--slick">

                                           <div class="global-featured-slider__item">
                                                    <a href="#">
                                                        <div class="global-featured-slider__item--image image-background">
                                                            <img src="{!! asset('public/images/dogandrooster_full_bg.jpg') !!}">
                                                        </div>
                                                    </a>
                                                    <div class="global-featured-slider__description">
                                                        <h2>slider name</h2>
                                                        <p>test</p>
                                                    </div>
                                                </div>
                                                <div class="global-featured-slider__item">
                                                    <a href="#">
                                                        <div class="global-featured-slider__item--image image-background">
                                                            <img src="{!! asset('public/images/dogandrooster_full_bg.jpg') !!}">
                                                        </div>
                                                    </a>
                                                    <div class="global-featured-slider__description">
                                                        <h2>slider name</h2>
                                                        <p>test</p>
                                                    </div>
                                                </div>
                                                <div class="global-featured-slider__item">
                                                    <a href="#">
                                                        <div class="global-featured-slider__item--image image-background">
                                                            <img src="{!! asset('public/images/dogandrooster_full_bg.jpg') !!}">
                                                        </div>
                                                    </a>
                                                    <div class="global-featured-slider__description">
                                                        <h2>slider name</h2>
                                                        <p>test</p>
                                                    </div>
                                                </div>
                                                <div class="global-featured-slider__item">
                                                    <a href="#">
                                                        <div class="global-featured-slider__item--image image-background">
                                                            <img src="{!! asset('public/images/dogandrooster_full_bg.jpg') !!}">
                                                        </div>
                                                    </a>
                                                    <div class="global-featured-slider__description">
                                                        <h2>slider name</h2>
                                                        <p>test</p>
                                                    </div>
                                                </div>--}}


                                                {{-- end of featured-slider-main__item --}}
                                            </div>
                                            {{-- slick  --}}

                                        </div>
                                    </div>


                                    <div class="col-lg-12 global-featured-slider__bottom">
                                        {{-- slick  --}}
                                        <div class="global-featured-slider__bottom--slick">

                                           <div class="global-featured-slider__item">
                                                <div class="global-featured-slider__item--image image-background">
                                                    <img src="{!! asset('public/images/dogandrooster_full_bg.jpg') !!}">
                                                </div>
                                            </div>
                                            <div class="global-featured-slider__item">
                                                <div class="global-featured-slider__item--image image-background">
                                                    <img src="{!! asset('public/images/dogandrooster_full_bg.jpg') !!}">
                                                </div>
                                            </div>
                                            <div class="global-featured-slider__item">
                                                <div class="global-featured-slider__item--image image-background">
                                                    <img src="{!! asset('public/images/dogandrooster_full_bg.jpg') !!}">
                                                </div>
                                            </div>
                                            <div class="global-featured-slider__item">
                                                <div class="global-featured-slider__item--image image-background">
                                                    <img src="{!! asset('public/images/dogandrooster_full_bg.jpg') !!}">
                                                </div>
                                            </div>


                                            {{-- end of featured-slider-main__item --}}
                                        </div>
                                        {{-- slick  --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- "global-featured-slider --}}


                    </div>
                </div>
            </div>
        </section>



    </main>
    @include('front.layouts.sections.footer')
</section>