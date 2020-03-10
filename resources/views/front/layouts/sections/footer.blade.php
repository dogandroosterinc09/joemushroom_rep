<a href="#" id="to-top"><i class="fas fa-chevron-up"></i></a>
<footer class="footer">

    <div class="footer__top">
        <section class="dotted">
            <div class="padding--bottom2em">
                <div class="dotted__wrapper">
                    <div class="col-md-12 text-center">
                        <h6>{{section('Last Section.data.first.center_text')}}</h6>
                    </div>                    
                </div>
            </div> {{-- end of default-content--row --}}
        </section> {{-- end of default-content --}}
    </div>

    <div class="footer__menu container">
        <div class="footer__wrapper--row row">
            <div class="col-lg-6 footer__item">
                <article>
                    <h4>
                        <a href="{{url('our-research')}}">Our Research</a>
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li><a href="{{url('our-research')}}">Departments</a>  
                                    <ul>
                                        @foreach(\App\Models\Research::get() as $research)
                                            <li><a href="{{url('our-research/'.$research->slug)}}">{{$research->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li><a href="{{url('stories')}}">Stories</a></li>
                                <li><a href="{{url('publications')}}">Publications</a></li>
                                <li><a href="{{url('gallery')}}">Gallery</a></li>
                                <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>                    
                </article>
            </div>
            <div class="col-lg-3 footer__item">
                <article>
                    <h4>
                        <a href="{{url('technology')}}">Our Enabling Technology</a>
                    </h4>
                    <ul>
                        <li><a href="{{url('data-sciences')}}">Data Sciences/Bioinformatics</a></li>
                        <li><a href="{{url('engineering')}}">Engineering/Automation</a></li>
                        <li><a href="{{ url('genomics') }}">Genomics</a></li>
                        <li><a href="{{ url('gnf-systems') }}">GNF Systems</a></li>                        
                    </ul>
                </article>
            </div>
            <div class="col-lg-3 footer__item">
                <article>
                    <h4>
                        <a href="{{url('about-us')}}">About Us</a>
                    </h4>
                    <ul>
                        <li><a href="{{url('about-us')}}">About GNF</a></li>
                        <li><a href="{{url('leadership-team')}}">Leadership</a></li>
                        <li><a href="{{url('careers')}}">Careers</a></li>
                    </ul>
                    <div class="footer__social">
                        <h4>Stay Connected</h4>
                        <ul>
                            <li><a href="{{(\App\Models\SystemSetting::where('code','SS0008')->first()) ? \App\Models\SystemSetting::where('code','SS0008')->first()->value : ''}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{(\App\Models\SystemSetting::where('code','SS0009')->first()) ? \App\Models\SystemSetting::where('code','SS0009')->first()->value : ''}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{(\App\Models\SystemSetting::where('code','SS00010')->first()) ? \App\Models\SystemSetting::where('code','SS00010')->first()->value : ''}}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{(\App\Models\SystemSetting::where('code','SS0011')->first()) ? \App\Models\SystemSetting::where('code','SS0011')->first()->value : ''}}"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <div class="footer__copyright">
        <div class="container">
            <div class="footer__wrapper--row row">
                <div class="col-lg-9 footer__item">
                    © 2019 Novartis AG. Web Design by <a href="https://dogandrooster.com/" target="_blank">Dog and Rooster, Inc.</a>  |  <a href="{{url('terms-of-use')}}">Terms of Use</a>  |  <a href="{{url('privacy-policy')}}">Privacy policy</a>
                </div>
                <div class="col-lg-2 footer__item footer__item__addlinfo text-center">
                    <a href="//www.novartis.com/" target="_blank"><img src="{{ url('public/images/novartis-logo.png') }}"></a>
                    <p><small>GNF is A Novartis Company</small></p>
                </div>
            </div>
        </div>
    </div>
</footer>