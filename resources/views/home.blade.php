<x-layout>
    <x-navbar :is-logged-in="$is_logged_in ?? false" current-page="" :is-authorized="$is_authorized ?? false" />

    <section class="position-relative overflow-hidden bg-light">
        <div class="container">
            <div class="row align-items-center pt-28 pb-14 text-center">
                <div class="col-12 text-center scribble-welcome">
                    <span class="d-inline-block mb-10">Welcome to Scribble App</span>
                </div>

                <div class="col-12 col-md-9 mx-auto mx-lg-20 feature-animate">
                    <h1 class="display-2 mb-0">Boost your Productivity</h1>
                </div>

                <div class="col-12 mt-16 mb-16 mb-lg-0"><a class="btn py-3 px-8 btn-primary" href="/about-us">Discover
                        Now</a>
                </div>
            </div>
            <div class="d-flex flex-column w-100 mb-14 align-items-center">
                <div class="py-9 bg-dark" style="width: 1.5px;"></div>
                <div class="py-5 bg-white" style="width: 1.5px;"></div>
            </div>
            <img class="img-fluid w-100" height="30px" src="/images/productivity.jpg" alt="error">
        </div>

    </section>

    <section class="position-relative pt-32 pb-12 overflow-hidden bg-dark">
        <img class="d-none d-xxl-block position-absolute bottom-0 start-0 col-12 img-fluid"
            src="wrexa-assets/elements/half-circles-with-logo.svg" alt="">
        <img class="d-none d-sm-block d-xxl-none position-absolute top-100 start-50 translate-middle col-12 img-fluid"
            src="wrexa-assets/elements/half-circles-with-logo.svg" alt="">
        <div class="container position-relative">
            <div class="d-flex align-items-center mb-16">
                <div class="mx-4 bg-light-dark rounded-circle" style="width: 4px; height: 4px;"></div>
                <span class="display-6 h5 text-white mb-0">Introduction.</span>
            </div>
            <div class="mw-xl mx-auto mb-24 mb-md-32 text-center">
                <h1 class="display-2 mb-0 text-white">How it works?</h1>
            </div>
            <div class="row mb-32 mb-md-48">
                <div class="col-xl-3 mb-8 mb-xl-0">
                    <div class="mw-sm mx-auto pt-8 pb-14 px-10 bg-dark-light rounded">
                        <span class="text-secondary lh-lg">Step 1</span>
                        <h4 class="text-white fw-bold lh-lg mb-8">Download our Application</h4>
                        <div class="d-flex align-items-center">
                            <span class="text-secondary mb-0">Get started.</span>
                            <a class="btn ms-1 p-0 btn-link text-secondary" href="#">Click here</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-8 mb-xl-0 mt-xxl-48">
                    <div class="mw-sm mx-auto h-100 pt-8 pb-14 px-10 bg-dark-light rounded">
                        <span class="text-secondary lh-lg">Step 2</span>
                        <h4 class="text-white fw-bold lh-lg mb-8">Register your account</h4>
                        <div class="d-flex align-items-center">
                            <span class="text-secondary mb-0">Get started.</span>
                            <a class="btn ms-1 p-0 btn-link text-secondary" href="/register">Click here</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-8 mb-xl-0 mt-xxl-48">
                    <div class="mw-sm mx-auto h-100 pt-8 pb-14 px-10 bg-dark-light rounded">
                        <span class="text-secondary lh-lg">Step 3</span>
                        <h4 class="text-white fw-bold lh-lg mb-8">Find and customise templates</h4>
                        <div class="d-flex align-items-center">
                            <span class="text-secondary mb-0">Get started.</span>
                            <a class="btn ms-1 p-0 btn-link text-secondary" href="#">Click here</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="mw-sm mx-auto pt-8 pb-14 px-10 bg-dark-light rounded">
                        <span class="text-secondary lh-lg">Step 4</span>
                        <h4 class="text-white fw-bold lh-lg mb-8">Build your own workspace!</h4>
                        <div class="d-flex align-items-center">
                            <span class="text-secondary mb-0">Get started.</span>
                            <a class="btn ms-1 p-0 btn-link text-secondary" href="#">Click here</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="position-relative py-24 py-xl-36 bg-light">
        <div class="container">
            <h2 class="display-5 text-center mb-16">Trusted by brands all over the world</h2>
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-sm-6 col-md-4 col-xl-2 mb-12 mb-xl-0">
                    <img class="img-fluid d-block mx-auto" src="wrexa-assets/logos/brands/docusign.svg" alt="">
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-2 mb-12 mb-xl-0">
                    <img class="img-fluid d-block mx-auto" src="wrexa-assets/logos/brands/britishbank.svg" alt="">
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-2 mb-12 mb-xl-0">
                    <img class="img-fluid d-block mx-auto" src="wrexa-assets/logos/brands/fedex.svg" alt="">
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-2 mb-12 mb-md-0">
                    <img class="img-fluid d-block mx-auto" src="wrexa-assets/logos/brands/starling.svg" alt="">
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                    <img class="img-fluid d-block mx-auto" src="wrexa-assets/logos/brands/zendesk.svg" alt="">
                </div>
            </div>
            <div class="text-center mt-24">
                <button class="btn p-0 bg-dark rounded me-5" style="width: 60px; height: 2px;"></button>
                <button class="btn p-0 bg-dark opacity-25 rounded" style="width: 60px; height: 2px;"></button>
            </div>
        </div>
    </section>

    <section class="bg-dark position-relative overflow-hidden">
        <div class="bg-white py-3 mx-12"></div>
        <div class="container pt-24 pb-52 pt-md-52">
            <div class="row">
                <div class="col-12 col-md-4 mb-14 mb-lg-0">
                    <div class="mw-xs px-lg-14 mx-auto">
                        <img class="img-fluid mb-12" src="wrexa-assets/elements/stats-icon1.svg" alt="">
                        <h3 class="display-5 text-white mb-3">89%</h3>
                        <h5 class="display-6 text-white mb-10">Increase in Productivity</h5>
                        <p class="text-secondary lh-lg mb-0">Really, like a sense of truth that comes from within. The
                            final game.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-14 mb-lg-0">
                    <div class="mw-xs px-lg-14 mx-auto">
                        <img class="img-fluid mb-12" src="wrexa-assets/elements/stats-icon2.svg" alt="">
                        <h3 class="display-5 text-white mb-3">75%</h3>
                        <h5 class="display-6 text-white mb-10">Customisable Templates</h5>
                        <p class="text-secondary lh-lg mb-0">Use our journal, list and database templates.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mw-xs px-lg-14 mx-auto">
                        <img class="img-fluid mb-12" src="wrexa-assets/elements/stats-icon3.svg" alt="">
                        <h3 class="display-5 text-white mb-3">7 days</h3>
                        <h5 class="display-6 text-white mb-10">Trial is enough</h5>
                        <p class="text-secondary lh-lg mb-0">Explore Notion, learn and register yourself.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-light pt-20"></div>
        <div class="position-absolute bottom-0 start-50 translate-middle-x">
            <div class="py-9 bg-secondary" style="width: 1.5px;"></div>
            <div class="py-14 bg-white" style="width: 1.5px;"></div>
        </div>
    </section>

    <section class="position-relative pt-md-16 pb-20 bg-light">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="d-none d-md-block position-absolute bottom-0 start-0 w-100 bg-secondary-dark"
                    style="height: 1px;"></div>
                <div class="col-md-5 pt-20 pb-20 pb-md-64">
                    <div class="d-flex align-items-center mb-24">
                        <div class="mx-4 bg-light-dark rounded-circle" style="width: 4px; height: 4px;"></div>
                        <span class="display-6 h5 mb-0">Newsletter</span>
                    </div>
                    <div class="mw-md">
                        <h1 class="display-3">Sign up for email newsletters</h1>
                    </div>
                </div>
                <div class="col mb-20 mb-md-0 align-self-stretch position-relative">
                    <div class="d-md-none position-absolute bottom-0 start-0 w-100 bg-secondary-dark"
                        style="height: 1px;"></div>
                    <div class="d-none d-md-block position-absolute top-0 start-50 h-100 translate-middle-x mx-auto bg-secondary-dark"
                        style="width: 1px;"></div>
                </div>
                <div class="col-md-5">
                    <div class="mw-sm mx-auto">
                        <h3 class="display-5 mb-14">Join our mailing list!</h3>
                        <form action="#" method="post">
                            <div class="form-floating mb-6">
                                <input class="form-control" type="email" placeholder="mat@shuffle.dev" value="">
                                <label for="">Your email</label>
                            </div>
                            <span class="d-block small mb-16 text-secondary">No spam, we hate it more than you
                                do.</span>
                            <button class="btn btn-primary" type="submit">Join</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer />
</x-layout>
