<x-layout>
    <x-navbar :is-logged-in="$is_logged_in ?? false" current-page="pricing" :is-authorized="$is_authorized ?? false" />
    <section class="position-relative py-24 py-md-32 bg-dark">
        <div class="container">
            <div class="d-flex align-items-center mb-12">
                <div class="mx-4 bg-white rounded-circle" style="width: 4px; height: 4px"></div>
                <span class="display-6 h5 mb-0 text-white">Pricing</span>
            </div>
            <div class="mw-2xl mx-auto mb-36 text-center">
                <h1 class="display-3 text-white mb-8">Choose the plan</h1>
                <div class="mb-16 text-white">
                    <span class="me-6">Get startet now!</span>
                    <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.9983 2.97487L12.8444 2.94712L12.9539 11.4487L1.76433 0.259107L0.261729 1.76171L11.4513 12.9513L2.94974 12.8418L2.97749 14.9957L15.1552 15.1525L14.9983 2.97487Z"
                            fill="currentColor"></path>
                    </svg>
                </div>

            </div>
            <div class="row">
                <div class="col-12 col-lg-4 mb-8 mb-lg-0">
                    <div class="mw-md mx-auto pt-16 px-8 px-md-16 pb-16 bg-dark-light rounded">
                        <h2 class="display-5 text-white mb-4">Lite</h2>
                        <p class="text-secondary mb-8">
                            The house by the pond cras ornare.
                        </p>
                        <div class="d-flex mb-8">
                            <span class="h4 text-white me-1">£</span>
                            <span class="h3 text-white mb-0 me-2">17.49</span>
                            <span class="small mb-1 align-self-end text-secondary">/per mo</span>
                        </div>
                        <div class="mb-16">
                            <div class="d-flex align-items-start mb-3">
                                <svg class="flex-shrink-0" width="28" height="28" viewbox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.1" cx="14" cy="14" r="14" fill="#95A8FF"></circle>
                                    <path
                                        d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                        fill="#95A8FF"></path>
                                    <defs>
                                        <rect width="9" height="7" fill="white" transform="translate(10 11)"></rect>
                                    </defs>
                                </svg>
                                <span class="ms-4 text-white">3 editable boards</span>
                            </div>
                            <div class="d-flex align-items-start mb-3">
                                <svg class="flex-shrink-0" width="28" height="28" viewbox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.1" cx="14" cy="14" r="14" fill="#95A8FF"></circle>
                                    <path
                                        d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                        fill="#95A8FF"></path>
                                    <defs>
                                        <rect width="9" height="7" fill="white" transform="translate(10 11)"></rect>
                                    </defs>
                                </svg>
                                <span class="ms-4 text-white">Lovely options</span>
                            </div>
                            <div class="d-flex align-items-start">
                                <svg class="flex-shrink-0" width="28" height="28" viewbox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.1" cx="14" cy="14" r="14" fill="#95A8FF"></circle>
                                    <path
                                        d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                        fill="#95A8FF"></path>
                                    <defs>
                                        <rect width="9" height="7" fill="white" transform="translate(10 11)"></rect>
                                    </defs>
                                </svg>
                                <span class="ms-4 text-white">Core integrations</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" href="/register">Start free trial</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 mb-8 mb-lg-0 mt-lg-24">
                    <div class="mw-md mx-auto pt-16 px-8 px-md-16 pb-16 bg-dark-light rounded">
                        <h2 class="display-5 text-white mb-4">Plus</h2>
                        <p class="text-secondary mb-8">
                            The house by the pond cras ornare.
                        </p>
                        <div class="d-flex mb-8">
                            <span class="h4 text-white me-1">£</span>
                            <span class="h3 text-white mb-0 me-2">24.49</span>
                            <span class="small mb-1 align-self-end text-secondary">/per mo</span>
                        </div>
                        <div class="mb-16">
                            <div class="d-flex align-items-start mb-3">
                                <svg class="flex-shrink-0" width="28" height="28" viewbox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.1" cx="14" cy="14" r="14" fill="#95A8FF"></circle>
                                    <path
                                        d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                        fill="#95A8FF"></path>
                                    <defs>
                                        <rect width="9" height="7" fill="white" transform="translate(10 11)"></rect>
                                    </defs>
                                </svg>
                                <span class="text-white ms-4">20 editable boards</span>
                            </div>
                            <div class="d-flex align-items-start mb-3">
                                <svg class="flex-shrink-0" width="28" height="28" viewbox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.1" cx="14" cy="14" r="14" fill="#95A8FF"></circle>
                                    <path
                                        d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                        fill="#95A8FF"></path>
                                    <defs>
                                        <rect width="9" height="7" fill="white" transform="translate(10 11)"></rect>
                                    </defs>
                                </svg>
                                <span class="text-white ms-4">Lovely options</span>
                            </div>
                            <div class="d-flex align-items-start">
                                <svg class="flex-shrink-0" width="28" height="28" viewbox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.1" cx="14" cy="14" r="14" fill="#95A8FF"></circle>
                                    <path
                                        d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                        fill="#95A8FF"></path>
                                    <defs>
                                        <rect width="9" height="7" fill="white" transform="translate(10 11)"></rect>
                                    </defs>
                                </svg>
                                <span class="text-white ms-4">Core integrations</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" href="/register">Start free trial</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="mw-md mx-auto pt-16 px-8 px-md-16 pb-16 bg-dark-light rounded">
                        <h2 class="display-5 text-white mb-4">Pro</h2>
                        <p class="text-secondary mb-8">
                            The house by the pond cras ornare.
                        </p>
                        <div class="d-flex mb-8">
                            <span class="h4 text-white me-1">£</span>
                            <span class="h3 text-white mb-0 me-2">25.49</span>
                            <span class="small mb-1 align-self-end text-secondary">/per mo</span>
                        </div>
                        <div class="mb-16">
                            <div class="d-flex align-items-start mb-3">
                                <svg class="flex-shrink-0" width="28" height="28" viewbox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.1" cx="14" cy="14" r="14" fill="#95A8FF"></circle>
                                    <path
                                        d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                        fill="#95A8FF"></path>
                                    <defs>
                                        <rect width="9" height="7" fill="white" transform="translate(10 11)"></rect>
                                    </defs>
                                </svg>
                                <span class="text-white ms-4">200 editable boards</span>
                            </div>
                            <div class="d-flex align-items-start mb-3">
                                <svg class="flex-shrink-0" width="28" height="28" viewbox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.1" cx="14" cy="14" r="14" fill="#95A8FF"></circle>
                                    <path
                                        d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                        fill="#95A8FF"></path>
                                    <defs>
                                        <rect width="9" height="7" fill="white" transform="translate(10 11)"></rect>
                                    </defs>
                                </svg>
                                <span class="text-white ms-4">Lovely options</span>
                            </div>
                            <div class="d-flex align-items-start">
                                <svg class="flex-shrink-0" width="28" height="28" viewbox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.1" cx="14" cy="14" r="14" fill="#95A8FF"></circle>
                                    <path
                                        d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                        fill="#95A8FF"></path>
                                    <defs>
                                        <rect width="9" height="7" fill="white" transform="translate(10 11)"></rect>
                                    </defs>
                                </svg>
                                <span class="text-white ms-4">Core integrations</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" href="/register">Start free trial</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer />
</x-layout>
