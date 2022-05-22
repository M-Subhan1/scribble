// Burger menus
let alert_id = 0;
document.addEventListener("DOMContentLoaded", function () {
    // open
    const burger = document.querySelectorAll(".navbar-burger");
    const menu = document.querySelectorAll(".navbar-menu");

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("d-none");
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll(".navbar-close");
    const backdrop = document.querySelectorAll(".navbar-backdrop");

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("d-none");
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("d-none");
                }
            });
        }
    }

    var toastElList = [].slice.call(document.querySelectorAll(".toast"));
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl, {
            animation: true,
            autohide: true,
            delay: 3000,
        });
    });

    // Toggle
    toastList.forEach((toast) => toast.show());
});

function createAlert(type, message) {
    $(".toast").remove();
    $("body")
        .append(`<div id="alert-${alert_id}" class="m-4 position-fixed bottom-0 end-0 toast align-items-center text-white bg-${type}-dark border-0"
            role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
            </div>
        </div>`);

    const toastEl = new bootstrap.Toast(
        document.getElementById(`alert-${alert_id}`),
        {
            animation: true,
            autohide: true,
            delay: 3000,
        }
    );

    toastEl.show();

    alert_id++;
}
