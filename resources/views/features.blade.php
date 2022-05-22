<x-layout>
    <x-navbar :is-logged-in="$is_logged_in ?? false" current-page="features" :is-authorized="$is_authorized ?? false" />
    <section class="position-relative py-24 pb-xl-40 pt-xl-32 bg-dark">
        <div class="container">
            <div class="d-flex align-items-center mb-10">
                <span class="display-6 h5 mb-0 text-white">05</span>
                <div class="mx-4 bg-light-dark rounded-circle" style="width: 4px; height: 4px;"></div>
                <span class="display-6 h5 mb-0 text-white">Explore Scribble's features</span>
            </div>
            <h1 class="display-3 text-white text-center mb-24">Features</h1>
            <div class="row">
                <div class="col-12 col-lg-4 px-2 mb-16 mb-xl-0">
                    <div class="d-flex flex-column h-100 mw-md mx-auto mx-xl-0 text-center">
                        <svg class="d-block mb-8 mx-auto" width="34" height="34" viewBox="0 0 34 34" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.9999 0.333008C16.5579 0.333008 16.134 0.508602 15.8214 0.821163C15.5088 1.13372 15.3333 1.55765 15.3333 1.99967V5.33301C15.3333 5.77504 15.5088 6.19896 15.8214 6.51152C16.134 6.82408 16.5579 6.99967 16.9999 6.99967C17.4419 6.99967 17.8659 6.82408 18.1784 6.51152C18.491 6.19896 18.6666 5.77504 18.6666 5.33301V1.99967C18.6666 1.55765 18.491 1.13372 18.1784 0.821163C17.8659 0.508602 17.4419 0.333008 16.9999 0.333008ZM31.9999 15.333H28.6666C28.2246 15.333 27.8006 15.5086 27.4881 15.8212C27.1755 16.1337 26.9999 16.5576 26.9999 16.9997C26.9999 17.4417 27.1755 17.8656 27.4881 18.1782C27.8006 18.4907 28.2246 18.6663 28.6666 18.6663H31.9999C32.4419 18.6663 32.8659 18.4907 33.1784 18.1782C33.491 17.8656 33.6666 17.4417 33.6666 16.9997C33.6666 16.5576 33.491 16.1337 33.1784 15.8212C32.8659 15.5086 32.4419 15.333 31.9999 15.333ZM6.99992 16.9997C6.99992 16.5576 6.82432 16.1337 6.51176 15.8212C6.1992 15.5086 5.77528 15.333 5.33325 15.333H1.99992C1.55789 15.333 1.13397 15.5086 0.821407 15.8212C0.508847 16.1337 0.333252 16.5576 0.333252 16.9997C0.333252 17.4417 0.508847 17.8656 0.821407 18.1782C1.13397 18.4907 1.55789 18.6663 1.99992 18.6663H5.33325C5.77528 18.6663 6.1992 18.4907 6.51176 18.1782C6.82432 17.8656 6.99992 17.4417 6.99992 16.9997ZM7.36659 5.33301C7.0417 5.0258 6.60807 4.86023 6.16111 4.87274C5.71415 4.88524 5.29046 5.07478 4.98325 5.39967C4.67604 5.72457 4.51048 6.15819 4.52298 6.60515C4.53548 7.05211 4.72503 7.4758 5.04992 7.78301L7.44992 10.0997C7.61098 10.2552 7.80172 10.3767 8.01075 10.4568C8.21979 10.537 8.44284 10.5743 8.66659 10.5663C8.89109 10.5655 9.11311 10.5193 9.31932 10.4305C9.52553 10.3417 9.71168 10.2122 9.86659 10.0497C10.177 9.7374 10.3512 9.31498 10.3512 8.87467C10.3512 8.43437 10.177 8.01195 9.86659 7.69968L7.36659 5.33301ZM25.3333 10.5663C25.7624 10.5646 26.1743 10.3975 26.4833 10.0997L28.8833 7.78301C29.176 7.47709 29.3414 7.07121 29.3458 6.64779C29.3501 6.22437 29.1931 5.81517 28.9067 5.50329C28.6203 5.19141 28.2259 5.00025 27.8037 4.96862C27.3814 4.93699 26.9629 5.06728 26.6333 5.33301L24.2333 7.69968C23.9228 8.01195 23.7486 8.43437 23.7486 8.87467C23.7486 9.31498 23.9228 9.7374 24.2333 10.0497C24.5218 10.3542 24.9146 10.5387 25.3333 10.5663ZM16.9999 26.9997C16.5579 26.9997 16.134 27.1753 15.8214 27.4878C15.5088 27.8004 15.3333 28.2243 15.3333 28.6663V31.9997C15.3333 32.4417 15.5088 32.8656 15.8214 33.1782C16.134 33.4907 16.5579 33.6663 16.9999 33.6663C17.4419 33.6663 17.8659 33.4907 18.1784 33.1782C18.491 32.8656 18.6666 32.4417 18.6666 31.9997V28.6663C18.6666 28.2243 18.491 27.8004 18.1784 27.4878C17.8659 27.1753 17.4419 26.9997 16.9999 26.9997ZM26.5499 23.8997C26.2317 23.5925 25.8044 23.4243 25.3621 23.4321C24.9199 23.4399 24.4988 23.6231 24.1916 23.9413C23.8844 24.2596 23.7162 24.6869 23.724 25.1291C23.7318 25.5714 23.915 25.9925 24.2333 26.2997L26.6333 28.6663C26.9422 28.9641 27.3541 29.1313 27.7833 29.133C28.0066 29.1343 28.2279 29.0907 28.434 29.0048C28.6402 28.9189 28.8269 28.7925 28.9833 28.633C29.1395 28.4781 29.2635 28.2937 29.3481 28.0906C29.4327 27.8875 29.4762 27.6697 29.4762 27.4497C29.4762 27.2297 29.4327 27.0118 29.3481 26.8087C29.2635 26.6056 29.1395 26.4213 28.9833 26.2663L26.5499 23.8997ZM7.44992 23.8997L5.04992 26.2163C4.8937 26.3713 4.76971 26.5556 4.6851 26.7587C4.60049 26.9618 4.55692 27.1797 4.55692 27.3997C4.55692 27.6197 4.60049 27.8375 4.6851 28.0406C4.76971 28.2437 4.8937 28.4281 5.04992 28.583C5.20624 28.7425 5.39302 28.8689 5.59916 28.9548C5.8053 29.0407 6.0266 29.0843 6.24992 29.083C6.66078 29.0865 7.05845 28.9381 7.36659 28.6663L9.76659 26.3497C10.0848 26.0425 10.268 25.6214 10.2758 25.1791C10.2837 24.7369 10.1155 24.3096 9.80825 23.9913C9.50104 23.6731 9.07999 23.4899 8.63771 23.4821C8.19544 23.4743 7.76818 23.6425 7.44992 23.9497V23.8997Z"
                                fill="#5B2FE2"></path>
                        </svg>
                        <div class="position-relative pb-16 pb-lg-0">
                            <div class="d-none d-lg-block position-absolute top-0 end-0 h-100 bg-light-dark"
                                style="width: 1px;"></div>
                            <div class="d-lg-none position-absolute bottom-0 start-0 w-100 bg-light-dark"
                                style="height: 1px;"></div>
                            <h5 class="display-6 text-white lh-lg mb-14">Never ask “What’s the context?” again</h5>
                            <div class="mt-auto px-8 px-xl-20">
                                <p class="text-light-dark lh-lg mb-0">Stale wikis aren't helpful. Neither are floating docs. In Scribble, your daily work and knowledge live side by side — so you never lose context.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 px-2 mb-16 mb-xl-0">
                    <div class="d-flex flex-column h-100 mw-md mx-auto mx-xl-0 text-center">
                        <svg class="d-block mb-8 mx-auto" width="40" height="28" viewBox="0 0 40 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="40" y="17.8184" width="4.27481" height="8.90909" rx="2.1374"
                                transform="rotate(-180 40 17.8184)" fill="#5B2FE2"></rect>
                            <rect x="31.145" y="22.9092" width="3.66412" height="19.0909" rx="1.83206"
                                transform="rotate(-180 31.145 22.9092)" fill="#5B2FE2"></rect>
                            <rect x="22.29" y="28" width="3.66412" height="19.0909" rx="1.83206"
                                transform="rotate(-180 22.29 28)" fill="#5B2FE2"></rect>
                            <rect x="13.4351" y="19.0908" width="3.66412" height="19.0909" rx="1.83206"
                                transform="rotate(-180 13.4351 19.0908)" fill="#5B2FE2"></rect>
                            <rect x="4.27478" y="20.3638" width="4.27481" height="11.4545" rx="2.13741"
                                transform="rotate(-180 4.27478 20.3638)" fill="#5B2FE2"></rect>
                        </svg>
                        <div class="position-relative pb-16 pb-lg-0">
                            <div class="d-none d-lg-block position-absolute top-0 end-0 h-100 bg-light-dark"
                                style="width: 1px;"></div>
                            <div class="d-lg-none position-absolute bottom-0 start-0 w-100 bg-light-dark"
                                style="height: 1px;"></div>
                            <h5 class="display-6 text-white lh-lg mb-14">Start with a template.
                                Modify it however you need.</h5>
                            <div class="mt-auto px-8 px-xl-20">
                                <p class="text-light-dark lh-lg mb-0">Choose from thousands of free, pre-built setups — for work and life with the help
                                    of our journals, lists and databases.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 px-2 mb-4 mb-xl-0">
                    <div class="d-flex flex-column h-100 mw-md mx-auto mx-xl-0 text-center">
                        <svg class="d-block mb-8 mx-auto" width="35" height="31" viewBox="0 0 35 31" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="3.525" height="30.55" rx="1.7625" fill="#5B2FE2"></rect>
                            <rect x="11.75" y="10.5752" width="3.525" height="11.75" rx="1.7625"
                                transform="rotate(90 11.75 10.5752)" fill="#5B2FE2"></rect>
                            <rect x="32.9" y="16.4502" width="3.525" height="9.4" rx="1.7625"
                                transform="rotate(90 32.9 16.4502)" fill="#5B2FE2"></rect>
                            <rect x="15.275" width="3.525" height="30.55" rx="1.7625" fill="#5B2FE2"></rect>
                            <rect x="30.55" width="3.525" height="30.55" rx="1.7625" fill="#5B2FE2"></rect>
                        </svg>
                        <div>
                            <h5 class="display-6 text-white lh-lg mb-14">Build the workflow you want</h5>
                            <div class="mt-auto px-8 px-xl-20">
                                <p class="text-light-dark lh-lg mb-0">Customize Notion to make it work the way you want it to.
                                    Just select the dashboard, database, doc, list or journal that you need.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer />
</x-layout>
