<x-layout>
    <x-navbar :is-logged-in="$is_logged_in ?? false" current-page="about-us" :is-authorized="$is_authorized ?? false" />

    <section class="position-relative pt-24 pt-md-40 bg-light overflow-hidden">
        <div class="container mb-24 mb-md-44">
            <div class="d-flex align-items-center mb-8">
                <span class="display-6 h5 mb-0">02</span>
                <div class="mx-4 bg-light-dark rounded-circle" style="width: 4px; height: 4px"></div>
                <span class="display-6 h5 mb-0">Content</span>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-xl-6 mb-14 mb-xl-0">
                    <div class="mw-lg">
                        <h1 class="display-3 mb-0">About company and our talents</h1>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <p class="mw-lg ms-xl-auto text-muted lh-lg">
                        The house by the pond cras ornare, some chords for a three
                        moments, like a sense of truth that comes from within. The final
                        game. Proin a tempor magna. Pellentesque malesuada nunc non
                        augue fringilla some chords for.
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-20">
            <div class="row align-items-center">
                <div class="col-12 col-md-7 mb-4 mb-md-0">
                    <img class="d-block ms-md-10 img-fluid" src="wrexa-assets/images/furnitures-big-photo.png" alt="" />
                </div>
                <div class="col-12 col-md-5">
                    <img class="d-block ms-auto mx-md-auto img-fluid" src="wrexa-assets/images/women-photo1.png"
                        alt="" />
                </div>
            </div>
            <div
                class="position-relative mw-xl mw-lg-4xl ms-md-auto me-xl-20 py-12 py-xl-24 px-8 px-md-12 px-xl-20 mt-n24 mt-xl-n40 bg-light">
                <h1 class="display-3 mb-10">
                    Wrexa was founded in Farum, Denmark in 1993
                </h1>
                <p class="mw-sm text-muted lh-lg mb-20">
                    The pond cras ornare, some chords for a three moments, like a
                    sense of truth that comes from within.
                </p>
                <a class="btn px-sm-20 btn-primary" href="#">Discover Now</a>
            </div>
        </div>
        <div class="ms-10 bg-dark">
            <div class="ms-20 py-10 py-md-20 border-start"></div>
        </div>
    </section>
    <x-footer />
</x-layout>
