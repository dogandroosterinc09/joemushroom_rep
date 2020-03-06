<header>

    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('public/images/capitol-logo-colored.png') }}" alt="logo">
    </a>

    <nav class="navbar navbar-expand-md navbar-dark sticky-top">
      <!-- One of the primary actions on mobile is to call a business - This displays a phone button on mobile only -->
      <div class="navbar-toggler-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>


      <div class="collapse navbar-collapse flex-column " id="navbar">

        <ul class="navbar-nav navbar-nav--top w-100 justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i> Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> Attendee Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tel:(800) 450-5012"><i class="fas fa-phone"></i> (800) 450-5012</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="#">Request Info</a>
          </li>
          <li class="nav-item register">
            <a class="nav-link text-uppercase" href="#">Register Today!</a>
          </li>

        </ul>

        <ul class="navbar-nav navbar-nav--bottom justify-content-end w-100">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Find a Camp
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Camp Programs
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Year-round Debate
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              About Us
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>


      </div>

    </nav>

</header>


{{-- <section class="search-box">
    <div class="search-box__button"></div>
    <div class="search-box__wrapper container">
        <div class="row">
            <div class="col-md-12">
                <form class="search-form" action="{{ url('/') }}" method="GET">
                    <div class="form-group">
                        <a class="nav-link " type="submit" href="javascript:void(0)">
                            <i class="fa fa-search"></i>
                        </a>
                        <input type="text" name="keyword" id="keyword" placeholder="Search Keyword">

                        <input type="text" name="keyword" id="keyword" placeholder="Search Keyword"
                                   value="{{ !empty($search_params) && isset($search_params['keyword']) ? $search_params['keyword'] : '' }}"
                        spellcheck="false">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> --}}