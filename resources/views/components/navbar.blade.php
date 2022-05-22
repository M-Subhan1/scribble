<section>
    <nav class="position-relative navbar py-2 px-4 px-md-10 navbar-expand-xl navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src={{ asset('wrexa-assets/logos/logo-wrexa.svg') }} alt="" width="auto">
            </a>

            <button
                class="d-xl-none navbar-burger btn btn-light p-0 d-flex justify-content-center align-items-center rounded-circle"
                style="width: 50px; height: 50px;" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <svg width="20" height="9" viewBox="0 0 20 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0.75" y1="1.25" x2="19.25" y2="1.25" stroke="black" stroke-width="1.5"
                        stroke-linecap="round"></line>
                    <line x1="0.75" y1="8.25" x2="13.25" y2="8.25" stroke="black" stroke-width="1.5"
                        stroke-linecap="round"></line>
                </svg>
            </button>
            <div class="position-absolute top-50 start-50 translate-middle mt-6 collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item position-relative">
                        <a class="nav-link pb-4" href="./">Home</a>
                        @if (strcmp($currentPage, '') == 0)
                            <div class="mt-4 pe-10 position-absolute bottom-0 start-0 w-100 bg-success-light"
                                style="height: 3px;"></div>
                        @endif
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link pb-4" href="./pricing">Pricing</a>
                        @if (strcmp($currentPage, 'pricing') == 0)
                            <div class="mt-4 pe-10 position-absolute bottom-0 start-0 w-100 bg-success-light"
                                style="height: 3px;"></div>
                        @endif
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link pb-4" href="./about-us">About Us</a>
                        @if (strcmp($currentPage, 'about-us') == 0)
                            <div class="mt-4 pe-10 position-absolute bottom-0 start-0 w-100 bg-success-light"
                                style="height: 3px;"></div>
                        @endif
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link pb-4" href="./features">Features</a>
                        @if (strcmp($currentPage, 'features') == 0)
                            <div class="mt-4 pe-10 position-absolute bottom-0 start-0 w-100 bg-success-light"
                                style="height: 3px;"></div>
                        @endif
                    </li>
                </ul>
            </div>
            @if (!$isAuthorized)
                <div class="collapse navbar-collapse">
                    <div class="ms-auto">
                        <a class="btn btn-primary mx-3" href="/login">Login</a>
                        <a class="btn btn-outline-light" href="/register">Register</a>
                    </div>
                </div>
            @else
                <div class="collapse navbar-collapse">
                    <div class="ms-auto"><a class="btn btn-outline-light" href="/dashboard">Dashboard</a></div>
                </div>
            @endif
        </div>
    </nav>
    <div class="d-none navbar-menu position-relative" style="z-index: 99;">
        <div class="navbar-backdrop position-fixed top-0 start-0 end-0 bottom-0 bg-dark opacity-75"></div>
        <nav class="position-fixed top-0 start-0 bottom-0 w-75 mw-sm pt-6 bg-light">
            <div class="d-flex flex-column px-6 pb-32 h-100 overflow-auto">
                <div class="d-flex align-items-center mb-8">
                    <a class="me-auto h4 mb-0 text-decoration-none" href="#">
                        <img src="wrexa-assets/logos/logo-wrexa.svg" alt="" width="auto">
                    </a>
                    <button class="navbar-close btn-close" type="button" aria-label="Close"></button>

                </div>
                <div class="my-auto pb-10">
                    <input class="form-control mb-16" placeholder="Type to search...">

                    <ul class="nav flex-column">
                        <li class="nav-item mb-6"><a class="nav-link p-0 text-dark" href="/home">Home</a></li>
                        <li class="nav-item mb-6"><a class="nav-link p-0 text-dark" href="/pricing">Pricing</a></li>
                        <li class="nav-item mb-6"><a class="nav-link p-0 text-dark" href="/privacy-policy">About
                                Us</a></li>
                        <li class="nav-item mb-16"><a class="nav-link p-0 text-dark" href="/features">Features</a></li>
                        @if (!$isAuthorized)
                            <li class="nav-item mb-6"><a class="nav-link p-0 text-dark" href="/login">Register</a></li>
                            <li class="nav-item mb-6"><a class="nav-link p-0 text-dark" href="/login">Login</a></li>
                        @else
                            <li class="nav-item mb-6"><a class="nav-link p-0 text-dark" href="/dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item mb-6"><a class="nav-link p-0 text-dark" href="/logout">Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>
