<x-layout>
    <x-navbar :is-logged-in="$is_logged_in ?? false" current-page="404" :is-authorized="$is_authorized ?? false" />
    <section class="pt-36 pb-md-72 pb-24 bg-white position-relative overflow-hidden">
        <div class="d-none d-md-block position-absolute top-0 start-0 ps-6 h-100 bg-white"></div>


        <div class="container position-relative">
            <div class="ms-md-6 ms-xl-0">
                <div class="d-flex align-items-center mb-24">
                    <span class="display-6 h5 mb-0 text-dark">00</span>
                    <div class="mx-4 bg-light-dark rounded-circle" style="width: 4px; height: 4px;"></div>
                    <span class="display-6 h5 mb-0 text-dark">404</span>
                </div>
                <h2 class="display-1 mb-12">Ups... Requested resource does not exist.</h2>

                <div class="d-flex flex-column flex-md-row align-items-md-center justify-items-md-end">
                    <a class="btn btn-primary" href="/">
                        <span class="me-3">Back to home</span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.9944 2.97487L12.8405 2.94712L12.95 11.4487L1.76042 0.259107L0.257823 1.76171L11.4474 12.9513L2.94584 12.8418L2.97358 14.9957L15.1513 15.1525L14.9944 2.97487Z"
                                fill="currentColor"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <x-footer />
</x-layout>
