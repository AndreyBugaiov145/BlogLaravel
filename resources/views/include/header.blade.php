<header>
    <div class="head">
        <div class="inform">
            <div class="container flex flex-center flex-space-between">
                <div class="flex flex-center">
                    <span class="info-youremail-com icon">info@youremail.com</span>
                    <span class="border"></span>
                    <a class="my-phone icon" href="tel:+(56)123456546">+(56) 123 456 546</a>

                </div>
                <div class="flex flex-center account">
                    <span class="border"></span>
                     @if (Auth::guest())
                            <span><a href="{{ route('login') }}">Login</a></span>
                            <span class="border"></span>
                            <span><a href="{{ route('register') }}">Register</a></span>
                        @else
                            <span class="my-account" id="user-account">
                                <a href="#" >
                                    {{ Auth::user()->name }}
                                </a>
                            </span>
                            <div  class='user-menu'>
                                 <a href= " {{route('userPublication',['id'=>Auth::user()->id])}}">Мои статьи</a>
                                 <a href= "{{ route('creataPublication')}}">Добавит статью</a>
                            </div>
                            <span class="border"></span>
                            <span> 
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a> 
                            </span>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                </div>
            </div>
        </div>
        <div class="logo flex flex-center">
            <div class="container flex flex-center flex-space-between">
                <div>
                    <a href="{{route('catalog')}}" title="На главную"><img src="/img/Logo.svg" alt=""></a>
                </div>
                <div class="search-field">
                    <input type="text" placeholder="Inter Your Keyword. . .">
                    <div class="search-btn "><span></span></div>
                </div>
            </div>
        </div>
        <nav class="flex flex-center flex-justify-center">
            <div class="container flex flex-center ">
                <div class="subsection flex ">
                    <span>Home</span>
                    <span>Man</span>
                    <span>Women</span>
                    <span>Kids</span>
                    <span>Accoseriese</span>
                    <span>FeatureD</span>
                </div>
                <div class="social flex">
                    <a href="#" ><span class="facebook-icon icon"></span></a>
                    <a href="#" ><span class="twitter-icon icon"></span></a>
                    <a href="#" ><span class="google-icon icon"></span></a>
                    <a href="#" ><span class="pinterest-icon icon"></span></a>
                    <a href="#" ><span class="skype-icon icon"></span></a>
                </div>
            </div>
        </nav>
    </div>
    <div class="poster flex flex-center">
        <div>
            <span class="blog">Blog</span>
            <span class="blog-latest-news">LATEST NEWS</span>
            <div class="block-way">
                <span class="way-to-section way">Home</span>
                <span class="right-arrow icon"></span>
                <span class="way-to-section section">News</span>
            </div>
        </div>
    </div>
</header>