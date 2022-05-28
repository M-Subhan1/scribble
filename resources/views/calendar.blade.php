<x-dashboard-layout current-page="calendar">
    <section class="dashboard-container container">
        <nav id="bread-crumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Calendar</li>
            </ol>
        </nav>

        <div class="px-4">
            <div class="mb-12">
                <h2 class="mt-12">Calendar</h2>
                <div class="description mt-7 mb-0">
                    Your calendar is displayed below.<br>
                    Click on a day to view scheduled events. <br>
                    To create a new event click the add event button.
                    </span>
                </div>
            </div>

            <div class="mt-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="elegant-calencar d-md-flex">
                            <div id="events-container" class="wrap-header">
                                <div>
                                    <p id="reset">Today</p>
                                </div>
                                <div id="header" class="p-0">
                                    <div class="head-info">
                                        <div class="head-month"></div>
                                        <div class="head-day"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="calendar-wrap">
                                <div class="w-100 button-wrap">
                                    <div class="pre-button d-flex align-items-center justify-content-center"><i
                                            class="fa fa-chevron-left"></i></div>
                                    <div class="next-button d-flex align-items-center justify-content-center"><i
                                            class="fa fa-chevron-right"></i></div>
                                </div>
                                <table id="calendar">
                                    <thead>
                                        <tr>
                                            <th>Sun</th>
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thu</th>
                                            <th>Fri</th>
                                            <th>Sat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('styles')
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @endpush

    @push('body-scripts')
        @once
            <script>
                var events = {!! $calendar->events->toJson() !!};
            </script>
            <script src={{ asset('js/calendar.js') }}></script>
        @endonce
    @endpush
</x-dashboard-layout>
