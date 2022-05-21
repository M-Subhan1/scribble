const hamburger = document.getElementById("dashboard-hamburger");
const navbar = document.getElementById("dashboard-nav");
const dashboardCotent = document.getElementById("dashboard-content");
let selectedJournal = -1;

hamburger.addEventListener("click", (e) => {
    navbar.classList.toggle("nav-collapse");
    dashboardCotent.classList.toggle("dashboard-collapse-content");
});

$(function () {
    $("#create-journal-btn").on("click", createJournal);
    $("#edit-journal-btn").on("click", editJournal);
    $("#delete-journal-btn").on("click", deleteJournal);
    $(".edit-journal-btn").on("click", selectJournal);
    $(".delete-journal-btn").on("click", selectJournal);
});

function selectJournal() {
    const journal = $(this).closest(".journal-list-entry");
    selectedJournal = $(this).closest(".journal-list-entry").data("id");

    $("#editJournalModal [name='journal-name']").val(journal.data("title"));
    $("#editJournalModal [name='journal-description']").val(
        journal.data("description")
    );
}

function createJournal() {
    const name = $("#createJournalModal #journal-name").val();
    const description = $("#createJournalModal #journal-description").val();

    $.ajax({
        url: "/journals",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            name,
            description,
        },
        success: (response) => {
            const journal = response.data;

            $("#journal-list-container")
                .append(`<div class="journal-list-entry" data-id='${journal.id}' data-title='${journal.name}' data-description='${journal.description}'>
                    <div>
                        <div class="p-2 border bg-light d-flex justify-content-between align-items-center">
                            <a href='/journals/${journal.id}' class="h5 journal-name"> ${journal.name}</a>
                            <div>
                                <span class="d-none d-md-inline-block mr-2 text-muted text-sm">Created At: 7</span>
                                <span>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editJournalModal">Edit</button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteJournalModal">Delete</button>
                                </span>
                            </div>
                        </div>
                    </div>`);

            $(`[data-id='${journal.id}'`)
                .find(".btn")
                .on("click", selectJournal);
        },
        error: (err) => {
            console.log(err);
        },
    });
}

function deleteJournal() {
    if (selectedJournal == -1) return;

    const journal_id = selectedJournal;

    $.ajax({
        url: `/journals/${journal_id}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (data) => {
            if (data.success) {
                $(`[data-id='${journal_id}']`).remove();
            } else {
            }
        },
        error: (err) => {
            console.log(err);
        },
    });

    selectedJournal = -1;
}

function editJournal() {
    if (selectedJournal == -1) return;
    const journal_id = selectedJournal;

    const name = $("#edit-journal-name").val();
    const description = $("#edit-journal-description").val();

    $.ajax({
        url: `/journals/${journal_id}`,
        method: "PATCH",
        data: {
            name,
            description,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: () => {
            const journal = $(`[data-id='${journal_id}']`);

            journal.data("description", description);
            journal.data("title", name);
            journal.find(".journal-name").text(name);
        },
        error: (err) => {
            console.log(err);
        },
    });

    selectedJournal = -1;
}
