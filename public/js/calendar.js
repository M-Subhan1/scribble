let selected_event = undefined;
let selected = undefined;
let selectedDay;

document.addEventListener(
    "DOMContentLoaded",
    function () {
        var today = new Date(),
            year = today.getFullYear(),
            month = today.getMonth(),
            monthTag = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
            ],
            day = today.getDate(),
            days = document.getElementsByTagName("td"),
            setDate,
            daysLen = days.length;

        $(".selected-month").text(`${monthTag[month]}, ${year}`);

        function Calendar(selector, options) {
            this.options = options;
            this.draw();
        }

        Calendar.prototype.draw = function () {
            this.getOptions();
            this.drawDays();
            var that = this,
                pre = document.getElementsByClassName("pre-button"),
                next = document.getElementsByClassName("next-button");

            pre[0].addEventListener("click", function () {
                that.preMonth();
            });
            next[0].addEventListener("click", function () {
                that.nextMonth();
            });
            while (daysLen--) {
                days[daysLen].addEventListener("click", function () {
                    that.clickDay(this);
                });
            }
        };

        Calendar.prototype.drawHeader = function (e) {
            const selected_day = e ? parseInt(e) : parseInt(day);
            const selected_month = month;
            const selected_year = year;

            const filteredEvents = events.filter(function (event) {
                const date = new Date(event.occurrence_date);

                return (
                    date.getDate() == selected_day &&
                    date.getMonth() == selected_month &&
                    date.getFullYear() == selected_year
                );
            });

            $(".selected-month").text(`${monthTag[month]}, ${year}`);

            if (filteredEvents.length == 0) {
                return (document.getElementById(
                    "events-container"
                ).innerHTML = `<p class="text-light h6">No upcoming events for ${
                    selectedDay ? selectedDay.toDateString() : "Today"
                } !</p>`);
            }

            $("#events-container").html("");

            filteredEvents.forEach((event) => {
                const date = new Date(event.occurrence_date);

                $("#events-container").append(`
                        <div class="card mb-2 row" data-id="${
                            event.id
                        }" data-desc="${event.description}" data-date="${
                    event.occurrence_date
                }">
                            <div class="card-body row justify-content-between align-items-center">
                                <div class="col-10 col-lg-11 mb-0 desc d-lg-flex justify-content-between align-items-center">
                                    <p class="d-block d-lg-inline-block mb-0">${
                                        event.description
                                    }</p>
                                    <span class="d-block d-lg-inline-block text-muted">Starts: ${date.toLocaleTimeString()}</span>
                                </div>
                                <span class="col-2 col-lg-1 entry-menu-container collapsed">
                                    <svg aria-hidden="true" role="img" class="octicon octicon-kebab-horizontal"
                                        viewBox="0 0 16 16" width="16" height="16" fill="currentColor"
                                        style="display: inline-block; user-select: none; vertical-align: text-bottom; overflow: visible;">
                                        <path
                                            d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                        </path>
                                    </svg>
                                    <div class="entry-menu bg-dark-light">
                                        <span class="btn btn-sm btn-dark edit-event-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#UpdateEventModal">Edit</span>
                                        <span class="btn btn-sm btn-dark delete-event-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#DeleteEventModal">Delete</span>
                                    </div>
                                </span>
                            </div>
                        </div>`);
            });
        };

        Calendar.prototype.drawDays = function () {
            var startDay = new Date(year, month, 1).getDay(),
                nDays = new Date(year, month + 1, 0).getDate(),
                n = startDay;

            for (var k = 0; k < 42; k++) {
                days[k].innerHTML = "";
                days[k].id = "";
                days[k].className = "";
            }

            for (var i = 1; i <= nDays; i++) {
                days[n].innerHTML = i;
                n++;
            }

            for (var j = 0; j < 42; j++) {
                if (days[j].innerHTML === "") {
                    days[j].id = "disabled";
                } else if (j === day + startDay - 1) {
                    if (
                        (this.options &&
                            month === setDate.getMonth() &&
                            year === setDate.getFullYear()) ||
                        (!this.options &&
                            month === today.getMonth() &&
                            year === today.getFullYear())
                    ) {
                        this.drawHeader(day);
                        days[j].id = "today";
                    }
                }
                if (selectedDay) {
                    if (
                        j === selectedDay.getDate() + startDay - 1 &&
                        month === selectedDay.getMonth() &&
                        year === selectedDay.getFullYear()
                    ) {
                        days[j].className = "selected";
                        this.drawHeader(selectedDay.getDate());
                    }
                }
            }
        };

        Calendar.prototype.clickDay = function (o) {
            var selected = document.getElementsByClassName("selected"),
                len = selected.length;
            if (len !== 0) {
                selected[0].className = "";
            }
            o.className = "selected";
            selectedDay = new Date(year, month, o.innerHTML);

            this.drawHeader(o.innerHTML);
        };

        Calendar.prototype.preMonth = function () {
            if (month < 1) {
                month = 11;
                year = year - 1;
            } else {
                month = month - 1;
            }
            this.drawHeader(1);
            this.drawDays();
        };

        Calendar.prototype.nextMonth = function () {
            if (month >= 11) {
                month = 0;
                year = year + 1;
            } else {
                month = month + 1;
            }
            this.drawHeader(1);
            this.drawDays();
        };

        Calendar.prototype.getOptions = function () {
            if (this.options) {
                var sets = this.options.split("-");
                setDate = new Date(sets[0], sets[1] - 1, sets[2]);
                day = setDate.getDate();
                year = setDate.getFullYear();
                month = setDate.getMonth();
            }
        };

        Calendar.prototype.reset = function () {
            month = today.getMonth();
            year = today.getFullYear();
            day = today.getDate();
            this.options = undefined;
            this.drawDays();
        };

        var calendar = new Calendar();
    },
    false
);

$(document).on("click", "#create-event", create_event);
$(document).on("click", ".edit-event-btn", select_event);
$(document).on("click", ".delete-event-btn", select_event);
$(document).on("click", "#update-event", update_event);
$(document).on("click", "#delete-event", delete_event);

function create_event() {
    const description = $("#AddEventModal [name='event-desc']").val();
    const events_container = $("#events-container");

    const date = $("#AddEventModal [name='event-date']")
        .val()
        .slice(0, 19)
        .replace("T", " ");
    createAlert("info", "Processing...");

    $.ajax({
        url: `/calendar/`,
        method: "PUT",
        data: {
            description,
            date,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (response) => {
            const date = new Date(response.event.occurrence_date);

            events.push(response.event);

            createAlert("success", "Event Added");

            if (
                date.getDate() != selectedDay.getDate() ||
                date.getMonth() != selectedDay.getMonth() ||
                date.getFullYear() != selectedDay.getFullYear()
            ) {
                return;
            }

            events_container.append(`
                        <div class="card mb-2 row" data-id="${
                            response.event.id
                        }" data-desc="$response.{event.description}" data-date="${
                response.event.occurrence_date
            }">
                            <div class="card-body row justify-content-between align-items-center">
                                <div class="col-10 col-lg-11 mb-0 desc d-lg-flex justify-content-between align-items-center">
                                    <p class="d-block d-lg-inline-block mb-0">${
                                        response.event.description
                                    }</p>
                                    <span class="d-block d-lg-inline-block text-muted">Starts: ${date.toLocaleTimeString()}</span>
                                </div>
                                <span class="col-2 col-lg-1 entry-menu-container collapsed">
                                    <svg aria-hidden="true" role="img" class="octicon octicon-kebab-horizontal"
                                        viewBox="0 0 16 16" width="16" height="16" fill="currentColor"
                                        style="display: inline-block; user-select: none; vertical-align: text-bottom; overflow: visible;">
                                        <path
                                            d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                        </path>
                                    </svg>
                                    <div class="entry-menu bg-dark-light">
                                        <span class="btn btn-sm btn-dark edit-event-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#UpdateEventModal">Edit</span>
                                        <span class="btn btn-sm btn-dark delete-event-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#DeleteEventModal">Delete</span>
                                    </div>
                                </span>
                            </div>
                        </div>`);
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });
}

function select_event() {
    const event = $(this).closest("[data-id]");
    selected_event = event.data("id");

    $("#UpdateEventModal [name='event-desc']").val(event.data("desc"));

    const date = new Date(event.data("date"));
    date.setMinutes(date.getMinutes() - date.getTimezoneOffset());

    document.querySelector("#UpdateEventModal [name='event-date']").value = date
        .toISOString()
        .slice(0, 16);
}

function selected_date() {
    const selected = $("#selected");
    selected.html(
        `${selected.data("month")} ${selected.data("day")}, ${selected.data(
            "year"
        )}`
    );
}

function update_event() {
    var event = $(`[data-id="${selected_event}"]`);

    const description = $("#UpdateEventModal [name='event-desc']").val();
    const date = $("#UpdateEventModal [name='event-date']").val();

    createAlert("info", "Processing...");

    $.ajax({
        url: `/calendar/${selected_event}`,
        method: "PATCH",
        data: {
            description,
            date,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: () => {
            createAlert("success", "Event Updated");

            event.data("desc", description);
            event.data("date", date);
            event.find(".desc").text(description);

            selected_event = undefined;
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });
}

function delete_event() {
    createAlert("info", "Processing...");
    const event = $(`[data-id='${selected_event}']`);

    $.ajax({
        url: `/calendar/${selected_event}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: () => {
            createAlert("success", "Event Deleted");
            event.remove();
            events.splice(
                events.findIndex((e) => e.id == parseInt(selected_event)),
                1
            );

            if ($(`#events-container [data-id]`).length == 0) {
                document.getElementById(
                    "events-container"
                ).innerHTML = `<p class="text-light h6">No upcoming events for ${
                    selectedDay ? selectedDay.toDateString() : "Today"
                } !</p>`;
            }

            selected_event = undefined;
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });
}
