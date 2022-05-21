let selectedJournal = undefined;
let selectedPage = undefined;

$(function () {
    $("#create-journal-btn").on("click", createJournal);
    $("#edit-journal-btn").on("click", editJournal);
    $("#delete-journal-btn").on("click", deleteJournal);
    $(".edit-journal-btn").on("click", selectJournal);
    $(".delete-journal-btn").on("click", selectJournal);
    $("#create-page-btn").on("click", createPage);
    $("#edit-page-btn").on("click", editPage);
    $("#delete-page-btn").on("click", deletePage);
    $(".edit-page-btn").on("click", selectPage);
    $(".delete-page-btn").on("click", selectPage);
    $("#dashboard-hamburger").on("click", (e) => {
        e.stopPropagation();
        $("#dashboard-nav").toggleClass("nav-collapse");
        $("dashboard-content").toggleClass("dashboard-collapse-content");
    });
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
    if (selectedJournal == undefined) return;

    const journal_id = selectedJournal;

    $.ajax({
        url: `/journals/${journal_id}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (data) => {
            $(`[data-id='${journal_id}']`).remove();
        },
        error: (err) => {
            console.log(err);
        },
    });

    selectedJournal = undefined;
}

function editJournal() {
    if (selectedJournal == undefined) return;
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

    selectedJournal = undefined;
}

function selectPage() {
    const page = $(this).closest(".page-list-entry");
    selectedPage = page.data("page-id");
    selectedJournal = $("#page").data("journal-id");
    $("#editPageModal #edit-page-name").val(page.data("identifier"));

    console.log(selectedPage);
}

function createPage() {
    const name = $("#createPageModal #page-name").val();
    const id = $("#page").data("journal-id");

    $.ajax({
        url: `/journals/${id}`,
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            name,
        },
        success: (response) => {
            const page = response.data;
            $("#pages-container")
                .append(`<div class="page-list-entry" data-page-id='${page.id}'
                        data-identifier='${page.identifier}'>
                        <div>
                            <div class="p-2 border bg-light d-flex justify-content-between align-items-center">
                                <a href='/journals/${page.journal_id}/${page.id}' class="h5 page-name">
                                    ${page.identifier}</a>
                                <div>
                                    <span class="d-none d-md-inline-block mr-2 text-muted text-sm">Created At: 7</span>
                                    <span>
                                        <button class="btn btn-sm btn-primary edit-journal-btn" data-bs-toggle="modal"
                                            data-bs-target="#editPageModal">Edit</button>
                                        <button class="btn btn-sm btn-danger delete-journal-btn" data-bs-toggle="modal"
                                            data-bs-target="#deletePageModal">Delete</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>`);
            $(`[data-page-id='${page.id}']`)
                .find(".btn")
                .on("click", selectPage);
        },
        error: (err) => {
            console.log(err);
        },
    });
}

function deletePage() {
    console.log(selectedJournal, selectedPage);
    if (selectedPage == undefined || selectedJournal == undefined) return;

    const journal_id = selectedJournal;
    const page_id = selectedPage;

    $.ajax({
        url: `/journals/${journal_id}/${page_id}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (data) => {
            $(`[data-page-id='${page_id}']`).remove();
        },
        error: (err) => {
            console.log(err);
        },
    });

    selectedJournal = undefined;
    selectedPage = undefined;
}

function editPage() {
    if (selectedJournal == undefined || selectedPage == undefined) return;
    const journal_id = selectedJournal;
    const page_id = selectedPage;

    const name = $("#edit-page-name").val();

    $.ajax({
        url: `/journals/${selectedJournal}/${selectedPage}`,
        method: "PATCH",
        data: {
            name,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: () => {
            const page = $(`[data-page-id='${page_id}']`);

            page.data("identifier", name);
            page.find(".page-name").text(name);
        },
        error: (err) => {
            console.log(err);
        },
    });

    selectedJournal = undefined;
    selectedPage = undefined;
}
