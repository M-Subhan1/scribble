<x-layout>
    <x-navbar :is-logged-in="$is_logged_in ?? false" current-page="login" :is-authorized="$is_authorized ?? false" />
    <x-slot:title>
        Login
        </x-slot>
        <section class="position-relative bg-white overflow-hidden">
            <img class="d-none d-md-block position-absolute top-0 start-0 col-5 h-100 img-fluid"
                style="object-fit: cover;" src="wrexa-assets/images/mom-and-son-big-picture.png" alt="">
            <div class="container">
                <form action="/login" method="post" id="login-form">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-7 col-lg-8 ms-auto">
                            <div class="ps-md-10 ps-lg-36 pt-16 pb-14 pb-md-36">
                                <div
                                    class="d-flex flex-column flex-sm-row mb-6 justify-content-end align-items-end align-items-sm-center">
                                    <span class="small text-secondary-dark mb-4 mb-sm-0 me-sm-4">I don't have an
                                        account</span>
                                    <a class="btn p-0 d-flex align-items-center text-success" href="#">
                                        <a class="me-3" href="/register">Sign in</a>
                                        <svg width="14" height="11" viewbox="0 0 14 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.89471 0L6.81484 0.972812L11.0771 4.8125L0 4.8125L0 6.1875L11.0771 6.1875L6.81484 10.0272L7.89471 11L14 5.5L7.89471 0Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </a>
                                </div>
                                <a class="btn p-0 mb-8 d-flex align-items-center text-dark" href="/welcome">
                                    <svg width="14" height="11" viewbox="0 0 14 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.10529 11L7.18516 10.0272L2.92291 6.1875L14 6.1875L14 4.8125L2.92291 4.8125L7.18516 0.972813L6.10529 -6.90178e-07L4.80825e-07 5.5L6.10529 11Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="ms-4">Back Home</span>
                                </a>
                                <div class="mw-md mb-20">
                                    <h2 class="display-5 mb-8">Log in</h2>
                                    <!-- <p class="lh-lg">The house like a sense of truth that comes from within.</p> -->
                                </div>
                                <div class="form-floating mb-6">
                                    <input class="form-control" name="email" type="email"
                                        placeholder="support@shuffle.dev" value="">
                                    <label for="">Your email</label>
                                </div>
                                <div class="form-floating mb-12">
                                    <input class="form-control" name="password" type="password"
                                        placeholder="Your password">
                                    <label for="">Your password</label>
                                </div>
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </div>
                    </div>
                </form>

                @isset($alert)
                    <div class="m-4 position-fixed bottom-0 end-0 toast align-items-center text-white bg-{{ $alert->type }}-dark border-0"
                        role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{ $alert->message }}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endisset
            </div>
            <!-- <img class="d-md-none img-fluid" style="object-fit: cover;" src="wrexa-assets/images/mom-and-son-big-picture.png" alt=""> -->
        </section>
        <x-footer />
</x-layout>
