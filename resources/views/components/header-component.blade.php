<nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ url('/dashboard') }}">
            <img src="{{ url('storage/117eafc700f042f0b949c1962a9df268_1200_80.webp') }}" alt="">
        </a>
        <button class="navbar-toggler btn btn-dark" style="color: #fff" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light" href="{{ url('/dashboard') }}" role="button" aria-haspopup="true" aria-expanded="false">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light" href="https://social.medivadigital.com" role="button" aria-haspopup="true" aria-expanded="false">
                            Website
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <!--<button style="border: none;height: 40px; width: 40px; border-radius: 50%; background-image: url('{{ Auth::user()->profile_photo_url }}'); background-position: center center; background-repeat: no-repeat; background-size: cover"></button>-->
                            {{-- <img src="{{ Auth::user()->profile_photo_url }}" alt="" height="50px" width="50px" style="border-radius: 50%;"> --}}
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/user/profile') }}" role="button" aria-haspopup="true" aria-expanded="false">
                                Manage Account
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
            </ul>
        </div>
    </div>
</nav>
