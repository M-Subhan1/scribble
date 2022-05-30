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
                <div class="position-relative mb-10 mt-0">
                    <div class="position-absolute top-10 end-0 mr-90">
                        <div class="text-right mt-2"><button type="button" class="btn btn-primary btn-sm"
                                data-bs-toggle="modal" data-bs-target="#AddEventModal">Create
                                Event</button></div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="mt-8 row">
                <div class="col-md-12">
                    <div class="elegant-calencar d-md-flex">
                        <div id="events-container" class="wrap-header">

                        </div>
                        <div class="calendar-wrap">
                            <div class="w-100 button-wrap">
                                <div class="pre-button d-flex align-items-center justify-content-center"><i
                                        class="fa fa-chevron-left"></i></div>
                                <div class="selected-month text-muted text-bold">Month</div>
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

        <!--Create Event Modal -->
        <div class="modal fade" id="AddEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content p-2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Create Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="event_desc">Description</label>
                            <input type="text" class="form-control mb-4 pt-1 pb-1" id="event_desc" name="event-desc"
                                placeholder="What is the event?">
                        </div>
                        <div class="form-group">
                            <label for="event_date">Occurrence Date</label>
                            <input type="datetime-local" class="form-control pt-1 pb-1" id="event_date"
                                name="event-date" placeholder="Date and time on which the event will take place">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm" id="create-event"
                            data-bs-dismiss="modal">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Update Event Modal -->
        <div class="modal fade" id="UpdateEventModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content p-2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Edit Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="event_desc">Description</label>
                            <input type="text" class="form-control mb-4 pt-1 pb-1" id="event_desc" name="event-desc"
                                placeholder="What is the event?">
                        </div>
                        <div class="form-group">
                            <label for="event_date">Occurrence Date</label>
                            <input type="datetime-local" class="form-control pt-1 pb-1" id="event_date"
                                name="event-date" placeholder="Date and time on which the event will take place">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm" id="update-event"
                            data-bs-dismiss="modal">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete event modal -->
        <div class="modal fade" id="DeleteEventModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content p-2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="UpdateModalLabel">Delete Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this event?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="delete-event" data-bs-dismiss="modal"
                            class="btn btn-danger btn-sm ">Delete</button>
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
            <script src={{ asset('js/jquery.min.js') }}></script>
            <script>
                var events = {!! $calendar->events->toJson() !!};
            </script>
            <script src={{ asset('js/calendar.js') }}></script>
        @endonce
    @endpush
</x-dashboard-layout>
