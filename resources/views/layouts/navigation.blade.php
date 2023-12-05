
     <!-- Navigation-->
     <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5 ">
            <a class="navbar-brand  text-dark" href="{{url('dashboard')}}">Mobilclean</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link text-dark" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#booking">Booking</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#contact">Contact</a></li>
                    
                    
                    
                    @if (Route :: has('login'))
                        @auth
                        <li class="nav-item dropdown   ">
                            <a class="nav-link dropdown-toggle text-dark " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{ Auth::user()->name }}
                            </a>
                          
                             <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          
                              <li><a class="dropdown-item" href="{{ url('form-pendaftaran') }}">{{ __('Pesan Sekarang') }}</a></li>
                          
                              <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                          
                              <li><hr class="dropdown-divider"></li>
                          
                              <li>
                                <form method="POST" action="{{ route('logout') }}">
                                  @csrf
                          
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                  </a>
                          
                                </form>
                              </li>
                          
                            </ul>
                          
                          </li>
                        @else
                        <li class="nav-item">
                                <a class=" ps-4 pt-1 pb- 1 pe-4 btn btn-warning" href="{{route('login')}}">Pesan Sekarang !</a>
                        </li>
                    @endauth
                    @endif                   
                </ul>
            </div>
        </div>
    </nav>
    
