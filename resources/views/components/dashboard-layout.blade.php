<x-layout>
    <nav id='dashboard-nav' class="dashboard-nav py-8 bg-dark align-items-center text-light">
        <ul class="bg-dark list-unstyled text-center">
            <div>
                <li class="nav-item">
                    <a class="d-inline-block mb-10 bg-dark" href='/'>
                        <img class="text-center img-fluid" style="height: 55px;"
                            src={{ asset('wrexa-assets/logos/logo-wrexa.svg') }} alt="Scribble Logo">
                        <span class="px-2 label text-light">
                            Scribble
                        </span>
                    </a>
                </li>
                <li class="nav-item mb-16 d-flex justify-content-center align-items-center">
                    <span class="px-2 label text-light">
                        Toggle Menu
                    </span>
                    <button id="dashboard-hamburger"
                        class="navbar-burger btn btn-light p-0 d-flex justify-content-center align-items-center rounded-circle"
                        style="width: 40px; height: 40px;" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <svg width="20" height="9" viewBox="0 0 20 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="0.75" y1="1.25" x2="19.25" y2="1.25" stroke="black" stroke-width="1.5"
                                stroke-linecap="round"></line>
                            <line x1="0.75" y1="8.25" x2="13.25" y2="8.25" stroke="black" stroke-width="1.5"
                                stroke-linecap="round"></line>
                        </svg>
                    </button>
                </li>

                <li class="nav-item">
                    <a class="btn p-0 mb-6 text-light" href='/dashboard'>
                        <svg width="25" height="25" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="px-2 label text-light">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn p-0 mb-6 text-light" href='/journals'>
                        <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path
                                    d="M17 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H17C18.7 2 20 3.3 20 5V19C20 20.7 18.7 22 17 22Z"
                                    fill="#FFF" />
                                <path d="M15 7H9V11H15V7Z" fill="#000" />
                                <path
                                    d="M15 12H9C8.4 12 8 11.6 8 11V7C8 6.4 8.4 6 9 6H15C15.6 6 16 6.4 16 7V11C16 11.6 15.6 12 15 12ZM10 10H14V8H10V10Z"
                                    fill="#000" />
                            </g>
                        </svg>
                        <span class="px-2 label text-light">
                            Journals
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn p-0 mb-6 text-light" href='/lists'>
                        <svg width="25" height="13" viewBox="0 0 20 9" fill="black" xmlns="http://www.w3.org/2000/svg">
                            <line x1="0.75" y1="1.25" x2="19.25" y2="1.25" stroke="white" stroke-width="1.5"
                                stroke-linecap="round"></line>
                            <line x1="0.75" y1="8.25" x2="13.25" y2="8.25" stroke="white" stroke-width="1.5"
                                stroke-linecap="round"></line>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn p-0 mb-6 text-light" href='/dashboard/tables'>
                        <svg width="25" height="13" viewBox="0 0 20 9" fill="black" xmlns="http://www.w3.org/2000/svg">
                            <line x1="0.75" y1="1.25" x2="19.25" y2="1.25" stroke="white" stroke-width="1.5"
                                stroke-linecap="round"></line>
                            <line x1="0.75" y1="8.25" x2="13.25" y2="8.25" stroke="white" stroke-width="1.5"
                                stroke-linecap="round"></line>
                        </svg>
                    </a>
                </li>
            </div>

            <li class="nav-item mb-20">
                <a class="btn p-0 text-light" href='/logout'>
                    <svg width="25" height="25" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path
                                d="M6.79967 4.63333L7.33301 4.1V7.16667C7.33301 7.56667 7.59967 7.83333 7.99967 7.83333C8.39967 7.83333 8.66634 7.56667 8.66634 7.16667V4.1L9.19967 4.63333C9.33301 4.76667 9.46634 4.83333 9.66634 4.83333C9.86634 4.83333 9.99967 4.76667 10.133 4.63333C10.3997 4.36667 10.3997 3.96667 10.133 3.7L8.46634 2.03333C8.19967 1.76667 7.79967 1.76667 7.53301 2.03333L5.86634 3.7C5.59967 3.96667 5.59967 4.36667 5.86634 4.63333C6.13301 4.9 6.53301 4.9 6.79967 4.63333ZM11.9997 5.5C11.733 5.23333 11.333 5.23333 11.0663 5.5C10.7997 5.76667 10.7997 6.16667 11.0663 6.43333C12.733 8.1 12.733 10.9 11.0663 12.5667C9.39967 14.2333 6.59967 14.2333 4.93301 12.5667C3.26634 10.9 3.26634 8.1 4.93301 6.43333C5.19967 6.16667 5.19967 5.76667 4.93301 5.5C4.66634 5.23333 4.26634 5.23333 3.99967 5.5C2.93301 6.56667 2.33301 8.03333 2.33301 9.5C2.33301 12.6333 4.86634 15.1667 7.99967 15.1667C9.53301 15.1667 10.933 14.5667 11.9997 13.5C14.1997 11.3 14.1997 7.7 11.9997 5.5Z"
                                fill="#fff" />
                        </g>
                    </svg>
                    <span class="px-2 label text-light">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>
    <section id="dashboard-content" class="dashboard-content">
        {{ $slot }}
    </section>

    @push('body-scripts')
        <script src={{ asset('js/jquery.min.js') }}></script>
        <script src={{ asset('js/dashboard.js') }}></script>
    @endpush
</x-layout>
