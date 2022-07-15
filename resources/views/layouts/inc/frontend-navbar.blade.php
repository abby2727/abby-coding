<div class="global-navbar">
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-3 d-none d-sm-none d-md-inline">
                @php
                    $setting = App\Models\Setting::find(1);
                @endphp

                @if ($setting)
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('uploads/website-logo/' . $setting->logo) }}" height="150px" alt="Logo">
                    </a>
                @endif
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Advertisement Area</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green mt-2">
        <div class="container">

            {{-- Logo in extra small devices --}}
            <a href="{{ url('/') }}" class="navbar-brand d-inline d-sm-inline d-md-none">
                <img src="{{ asset('assets/img/AbbyCoding Logo 512x512.png') }}" style="width: 100px;" alt="Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>

                    <!-- Category Status -->
                    @php
                        $categories = App\Models\Category::where('navbar_status', '1')
                            ->where('status', '1')
                            ->get();
                    @endphp

                    <!-- CATEGORY -->
                    @foreach ($categories as $cat_item)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ url('tutorial/' . $cat_item->slug) }}">{{ $cat_item->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        {{-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                    @endguest
                </ul>
            </div>

        </div>
    </nav>
</div>
