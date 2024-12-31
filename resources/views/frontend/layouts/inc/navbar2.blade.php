<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
    <div class="container">
        <a class="" href="{{ route('home') }}">
            <span class="navbar-logo py-2">
                <img src="{{ optional($generalSetting)->logo }}" class="logo-light" alt=""/>
                <img src="{{ asset('frontend/assets/images/logo-dark.png') }}" class="logo-dark" alt=""/>
            </span>
        </a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontend.about') }}"
                       class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}">
                        <span>About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontend.resume') }}"
                       class="nav-link {{ request()->routeIs('frontend.resume') ? 'active' : '' }}">
                        <span>Resume</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontend.services') }}"
                       class="nav-link {{ request()->routeIs('frontend.services') ? 'active' : '' }}">
                        <span>Services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.projects')}}"
                       class="nav-link {{ request()->routeIs('frontend.projects') ? 'active' : '' }}">
                        <span>Projects</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontend.blogs.index') }}"
                       class="nav-link  {{ request()->routeIs('frontend.blogs.index') ? 'active' : '' }}">
                        <span>Blog</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ request()->routeIs('frontend.contact') ? 'active' : '' }}"
                       href="{{ route('frontend.contact') }}">
                        <span>Contact</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
