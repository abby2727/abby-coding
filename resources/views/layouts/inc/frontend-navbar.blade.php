<div class="global-navbar">
    <div class="container">
        <div class="row">
            <!-- Our navbar LOGO -->
            <!-- d-none(cellphone), d-sm-none(tablet), d-md-inline(desktop) -->
            <div class="col-md-3 d-none d-sm-none d-md-inline">
                @php
                    $setting = App\Models\Setting::find(1);
                @endphp

                @if ($setting)
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('uploads/website-logo/' . $setting->logo) }}" class="w-100" alt="Logo">
                    </a>
                @endif
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Advertisement here</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green mt-4">
        <div class="container">

            <a href="{{ url('/') }}" class="navbar-brand d-inline d-sm-inline d-md-none">
                <img src="{{ asset('assets/img/apple.png') }}" style="width: 140px;" alt="Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    <!-- Get Category Model -->
                    @php
                        $categories = App\Models\Category::where('navbar_status', '0')
                            ->where('status', '0')
                            ->get();
                    @endphp

                    <!-- Display categories at the TOP (our navbar) -->
                    @foreach ($categories as $cat_item)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ url('tutorial/' . $cat_item->slug) }}">{{ $cat_item->name }}</a>
                        </li>
                    @endforeach

                    <!-- Logout session -->
                    @if (Auth::check())
                        <!-- Only show if User/Admin IS Login -->
                        <li>
                            <a class="nav-link btn-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif

                    <!-- Login session -->
                    @if (!Auth::check())
                        <li class="nav-item btn-primary">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
