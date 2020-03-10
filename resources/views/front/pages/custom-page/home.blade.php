<section class="homepage homepage--main">
    @include('front.layouts.sections.header')
    @include('front.pages.custom-page.sections.slider')
    <main id="main" class="main-content">
        {{-- individual section  --}}
        <section class="our-info padding--bottom3em" data-aos="fade-up">
            <div class="row">
                <div class="container">
                    <div class="col-md-12 our-info__item">
                        <div class="our-stories">
                            <div class="stories">
                                <div class="vertical"><h2>Our Stories</h2></div>        
                            </div>                                              
                            <div class="stories__slick">
                                <div class="stories__slick__wrapper">
                                    <div class="slider slider-for">

                                        @foreach(\App\Models\Story::get() as $story)
                                            <div class="stories__item row">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12 text-right mobile--left">
                                                    <div class="image-background"><img src="{{ asset($story->image) }}"></div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12 text-left">
                                                    <div class="stories__content">
                                                        <div class="stories__content--row">                                        
                                                            <div class="text-left">
                                                                <div class="stories__content__text">
                                                                    <h4>{{substr($story->name,0,50)}}..</h4>
                                                                    <p>{{$story->short_description}}</p>
                                                                </div>
                                                                <div class="stories__content__cta padding--top1em">
                                                                    <a href="{{url('stories/'.$story->category->slug.'/'.$story->slug)}}" class="btn btn--primary">Learn More</a>
                                                                </div>
                                                            </div>                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <div class="stories__slick__wrapper stories__slick__wrapper--nav">
                                    <div class="slider slider-nav">
                                        @foreach(\App\Models\Story::get() as $story)
                                            <div class="stories__item">
                                            <div class="image-background"><img src="{{ asset($story->image) }}"></div>
                                            <div class="stories__content">
                                                <div class="stories__content--row">                                        
                                                    <div class="text-left">
                                                        <div class="stories__content__text">
                                                            <h4>{{substr($story->name,0,35)}}..</h4>
                                                        </div>
                                                    </div>                                    
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="stories__slick stories__slick--mobile">
                                <div class="col-sm-10 offset-sm-1 col-xs-12">
                                    <div><h2>Our Stories</h2></div> 
                                    <div class="stories__slick__wrapper stories__slick__wrapper--nav stories__slick__wrapper--nav--mobile">
                                        <div class="slider slider-nav--mobile">
                                            @foreach(\App\Models\Story::get() as $story)
                                                <a href="{{url('stories/'.$story->category->slug.'/'.$story->slug)}}">
                                                    <div class="stories__item">
                                                        <div class="image-background"><img src="{{ asset($story->image) }}"></div>
                                                        <div class="stories__content">
                                                            <div class="stories__content--row">                                        
                                                                <div class="text-left">
                                                                    <div class="stories__content__text">
                                                                        <h4>{{substr($story->name,0,50)}}..</h4>
                                                                    </div>
                                                                </div>                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="research" data-aos="fade-up">
                            <div class="text-center padding--bottom3em"><h2>Our Research</h2></div>
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1 col-sm-12 reseach__wrapper">
                                     
                                    <div class="main">
                                      <div class="slider research__slick slider-for">
                                        @foreach(\App\Models\Research::get() as $research)
                                            <div class="research__item">
                                                <div class="image-background"><img src="{{ asset($research->file) }}"></div>
                                                <a class="research__item--link" href="{{ url('our-research/'.$research->slug) }}">
                                                    <div class="research__item--content" data-aos="zoom-in" data-aos-delay="300">
                                                        <h5>{{$research->name}}</h5>
                                                        <p>{!! substr(strip_tags($research->content),0,200) !!}..</p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                      </div>

                                      <div class="slider research__slick slider-nav">
                                          @foreach(\App\Models\Research::get() as $research)
                                            <div class="research__slick__nav"><h6>{{$research->name}}</h6></div>
                                          @endforeach
                                      </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div> {{-- end of default-content--row --}}
        </section> {{-- end of default-content --}}

        {{-- individual section  --}}
        <section class="about-us image-background" data-aos="fade-up">
            <img src="{{section('About Us Section.data.first.background_image')->asAttachment()}}">
            <div class="about-us__title text-center padding--bottom3em">
                <h4>{!! section('First Section.data.first.center_text') !!}</h4>
            </div>

            <div class="container-fluid default-container">
                <div class="technology padding--bottom5em">                            
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6 col-sm-12">
                                <div class="slider technology__slick slider-nav">
                                    @foreach(section('Technology Content Section.data')->asWhatItIs() as $item)
                                        <div class="technology__slick__nav"><h6>{{strtolower($item->title)}}</h6></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider technology__slick slider-nav slider-nav--mobile">
                        @foreach(section('Technology Content Section.data')->asWhatItIs() as $item)
                            <div class="technology__slick__nav"><h6>{{strtolower($item->title)}}</h6></div>
                        @endforeach
                    </div>
                    <div class="slider technology__slick slider-for">
                        @foreach(section('Technology Content Section.data')->asWhatItIs() as $item)
                        <div class="technology__item">
                            <div class="row equal default-container--row">
                                <div class="col-lg-6 col-sm-12" data-aos="fade">
                                    <div class="image-background technology__item--image"><img src="{{getAttachment($item->image)}}"></div>
                                </div>
                                <div class="col-lg-6 col-sm-12 technology__item--content" data-aos="fade-up" data-aos-delay="300">
                                    <div class="">
                                        <h4>{{$item->title}}</h4>
                                        <p>{{$item->description}}</p>
                                        <div class="technology__item__cta padding--top1em">
                                            <a href="{{$item->link_url}}" class="btn btn--primary">{{$item->link_text}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{--<div class="technology__item">
                            <div class="row equal default-container--row">
                                <div class="col-md-6">
                                    <div class="image-background technology__item--image"><img src="{{ url('public/images/bioinformatics.jpg') }}"></div>
                                </div>
                                <div class="col-md-6 technology__item--content">
                                    <div class="">
                                        <h4>Engineering/Automation</h4>
                                        <p>Lorem ipsum dolor sit amet, a eu et, feugiat amet nascetur amet morbi pharetra quam, et urna iaculis massa. Hendrerit mi, ligula cumque. Erat malesuada lorem inceptos amet in, viverra in amet pellentesque suscipit praesent, rutrum leo massa, vestibulum mauris porta sed dolor consequat, in in nulla sodales duis. Placerat maecenas leo leo sit mattis, mauris litora, metus interdum suscipit donec nibh justo, et non a mauris, luctus dui morbi rutrum ut. Purus at erat adipiscing maecenas ac, imperdiet in, vitae euismod neque elementum turpis wisi. Lorem ipsum dolor sit amet, a eu et, feugiat amet nascetur amet morbi pharetra quam, et urna iaculis </p>
                                        <div class="technology__item__cta padding--top1em">
                                            <a href="#" class="btn btn--primary">Learn More</a>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="technology__item">
                            <div class="row equal default-container--row">
                                <div class="col-md-6">
                                    <div class="image-background technology__item--image"><img src="{{ url('public/images/bioinformatics.jpg') }}"></div>
                                </div>
                                <div class="col-md-6 technology__item--content">
                                    <div class="">
                                        <h4>GNF Systems</h4>                
                                        <p>Lorem ipsum dolor sit amet, a eu et, feugiat amet nascetur amet morbi pharetra quam, et urna iaculis massa. Hendrerit mi, ligula cumque. Erat malesuada lorem inceptos amet in, viverra in amet pellentesque suscipit praesent, rutrum leo massa, vestibulum mauris porta sed dolor consequat, in in nulla sodales duis. Placerat maecenas leo leo sit mattis, mauris litora, metus interdum suscipit donec nibh justo, et non a mauris, luctus dui morbi rutrum ut. Purus at erat adipiscing maecenas ac, imperdiet in, vitae euismod neque elementum turpis wisi. Lorem ipsum dolor sit amet, a eu et, feugiat amet nascetur amet morbi pharetra quam, et urna iaculis </p>
                                        <div class="technology__item__cta padding--top1em">
                                            <a href="#" class="btn btn--primary">Learn More</a>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    </div>        

                </div>
            </div>


            <div class="about-sub">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1">
                            <div class="about-sub__subtitle text-left">
                                <p>{{section('About Us Section.data.first.sub_title')}}</p>
                                <h3>{{section('About Us Section.data.first.title')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="about-sub__video row">
                        <div class="col-lg-5 offset-lg-1 col-sm-12">
                            <div class="about-sub__video--content" data-aos="fade">
                                {{section('About Us Section.data.first.description')}}
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-12">
                            <div class="about-sub__video--embed" data-aos="zoom-in" data-aos-delay="300">
                                <div class="video image-background">
                                    <iframe width="100%" height="100%" src="{{section('About Us Section.data.first.video_url')}}" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 offset-lg-1 col-sm-12">
                            <div class="about-sub__cta padding--top1em">
                                <a href="{{section('About Us Section.data.first.button_url')}}" class="btn btn--primary">{{section('About Us Section.data.first.button_text')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div> {{-- end of default-content--row --}}
        </section> {{-- end of default-content --}}


        {{-- individual section  --}}
        <section class="dotted">
            <div class="container padding--bottom2em">
                <div class="dotted__wrapper">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h6>{{section('Last Section.data.first.center_text')}}</h6>
                        </div>
                    </div>                    
                </div>
            </div> {{-- end of default-content--row --}}
        </section> {{-- end of default-content --}}
        

    </main>
    @include('front.layouts.sections.footer')
</section>