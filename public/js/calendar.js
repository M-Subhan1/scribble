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
            selectedDay,
            setDate,
            daysLen = days.length;

        function Calendar(selector, options) {
            this.options = options;
            this.draw();
        }

        Calendar.prototype.draw = function () {
            this.getCookie("selected_day");
            this.getOptions();
            this.drawDays();
            var that = this,
                reset = document.getElementById("reset"),
                pre = document.getElementsByClassName("pre-button"),
                next = document.getElementsByClassName("next-button");

            pre[0].addEventListener("click", function () {
                that.preMonth();
            });
            next[0].addEventListener("click", function () {
                that.nextMonth();
            });
            reset.addEventListener("click", function () {
                that.reset();
            });
            while (daysLen--) {
                days[daysLen].addEventListener("click", function () {
                    that.clickDay(this);
                });
            }
        };

        Calendar.prototype.drawHeader = function (e) {
            var headDay = document.getElementsByClassName("head-day"),
                headMonth = document.getElementsByClassName("head-month");

            e ? (headDay[0].innerHTML = e) : (headDay[0].innerHTML = day);
            headMonth[0].innerHTML = monthTag[month] + " - " + year;
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

            const filteredEvents = events.filter(function (event) {
                const date = new Date(event.occurrence_date);
                return (
                    date.getDate() == selectedDay.getDate() &&
                    date.getMonth() == selectedDay.getMonth() &&
                    date.getYear() == selectedDay.getYear()
                );
            });

            console.log(selectedDay);
            console.log(filteredEvents);

            if (filteredEvents.length == 0) document.getElementById("event").innerHTML = `No events set for today!`;

            else {
                for (var i = 0; i < filteredEvents.length; i++) {
                    var date = new Date(filteredEvents[i]['occurrence_date']);
                    $("#event").append(`<div class="calendar-event" data-id="${filteredEvents[i]['id']}" data-desc="${filteredEvents[i]['description']}" data-date="${filteredEvents[i]['occurrence_date']}">
                    Event: ${filteredEvents[i]['description']} and occurrence time ${date.toLocaleTimeString()}
                    <span>
                        <button type="button" class="btn btn-sm btn-primary edit-event-btn" data-bs-toggle="modal"
                            data-bs-target="#UpdateEventModal">Edit</button>
                        <button class="btn btn-sm btn-danger delete-event-btn" data-bs-toggle="modal"
                            data-bs-target="#DeleteEventModal">Delete</button>
                    </span>
                    </div><br/>`);
                }
            }

            this.drawHeader(o.innerHTML);
            this.setCookie("selected_day", 1);
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

        Calendar.prototype.setCookie = function (name, expiredays) {
            if (expiredays) {
                var date = new Date();
                date.setTime(date.getTime() + expiredays * 24 * 60 * 60 * 1000);
                var expires = "; expires=" + date.toGMTString();
            } else {
                var expires = "";
            }
            document.cookie = name + "=" + selectedDay + expires + "; path=/";
        };

        Calendar.prototype.getCookie = function (name) {
            if (document.cookie.length) {
                var arrCookie = document.cookie.split(";"),
                    nameEQ = name + "=";
                for (var i = 0, cLen = arrCookie.length; i < cLen; i++) {
                    var c = arrCookie[i];
                    while (c.charAt(0) == " ") {
                        c = c.substring(1, c.length);
                    }
                    if (c.indexOf(nameEQ) === 0) {
                        selectedDay = new Date(
                            c.substring(nameEQ.length, c.length)
                        );
                    }
                }
            }
        };

        var calendar = new Calendar();
    },
    false
);

$(document).on("click", "#create-event", create_event);
$(document).on("click", ".edit-event-btn", select_event);
$(document).on("click", "#update-event", update_event);
$(document).on("click", "#delete-event", delete_event);

function create_event() {
    var calendar_id = $("#calendar").data('id');
    const description = $("#AddEventModal [name='event-desc']").val();
    const date = $("#AddEventModal [name='event-date']").val().slice(0, 19).replace('T', ' ');
    createAlert("info", "Processing...");
    console.log(date);

    $.ajax({
        url: `/calendar/${calendar_id}`,
        method: "PUT",
        data: {
            description,
            date,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (response) => {
            $("#event").append(
                `Event: ${description} and date: ${date}`
            );

            createAlert("success", "Event Added");
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });

}

function select_event() {
    var event = $(this).closest(".calendar-event");
    $date = new Date(event.data("date"));
    $date = $date.toLocaleString();
    console.log($date);
    $("#UpdateEventModal [name='event-desc']").val(event.data("desc"));
    $("#UpdateEventModal [name='event-date']").val("2022-05-04T06:04");
}

function update_event(){
    var calendar_id = $("#calendar").data('id');
    var event = $(".calendar-event");
    var event_id = $(".calendar-event").data("id");
    const description = $("#UpdateEventModal [name='event-desc']").val();
    const date = $("#UpdateEventModal [name='event-date']").val();

    createAlert("info", "Processing...");

    $.ajax({
        url: `/calendar/${calendar_id}/${event_id}`,
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
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });
}

function delete_event(){
    var calendar_id = $("#calendar").data('id');
    var event_id = $(".calendar-event").data("id");
    createAlert("info", "Processing...");
    $.ajax({
        url: `/calendar/${calendar_id}/${event_id}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: () => {
            createAlert("success", "Event Deleted");
            $(`[data-id='${event_id}']`).remove();
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });

}