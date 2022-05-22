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
        $("#dashboard-content").toggleClass("dashboard-collapse-content");
    });
});

function display_view_border(){
    const queryString = window.location.search;
    console.log(queryString);
    const urlParams = new URLSearchParams(queryString);
    const view = urlParams.get('view')
    console.log(view);
    if(view == "table"){
        document.getElementsByClassName("tb-view").style.borderBottom = "2px solid rgb(102, 0, 204)"; 
    }
    else document.getElementsByClassName("bd-view").style.borderBottom = "2px solid rgb(102, 0, 204)"; 
}

$(".bd-view").on("click", function () {
    $(this).css({ "border-bottom": "4px solid rgb(102, 0, 204)" });
});

$(".tb-view").on("click", function () {
    $(this).css({ "border-bottom": "4px solid rgb(102, 0, 204)" });
});

$(".todo_btn").on(
    "hover",
    function () {
        $(this).css("background-color", "black");
    },
    function () {
        $(this).css("background-color", "rgb(102, 0, 204)");
    }
);

$(document).on("click", ".create_list", function (e) {
    e.preventDefault();
    console.log("hello");

    var data = {
        name: $("#todo").val(),
        subtitle: $("#todo_desc").val(),
    };

    $("#AddTodoModal").modal("hide");
    createAlert("info", "Processing...");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",
        url: "/create-list",
        data: data,
        dataType: "json",
        success: function (response) {
            createAlert("success", "Data Saved");
        },
        error: function (response) {
            alert("Data not saved");
        },
    });
});

$(document).on("click", ".edit_list", function (e) {
    e.preventDefault();
    var list_id = $(this).val();
    $("#EditTodoModal").modal("show");

    $.ajax({
        type: "GET",
        url: "/list/" + list_id,
        success: function (response) {
            if (response.status == 200) {
                $("#edit_name").val(response.list.name);
                $("#edit_subtitle").val(response.list.subtitle);
                $("#edit_todo_id").val(list_id);
            }
        },
        error: function (response) {
            alert("Data not saved");
        },
    });
});

$(document).on("click", ".delete_list", function (e) {
    e.preventDefault();
    var list_id = $(this).val();
    $("#delete_todo_id").val(list_id);
    $("#DeleteTodoModal").modal("show");
});

$(document).on("click", ".delete_list_btn", function (e) {
    e.preventDefault();
    var list_id = $("#delete_todo_id").val();
    $("#DeleteTodoModal").modal("show");
    createAlert("success", "Processing...");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#DeleteTodoModal").modal("hide");

    $.ajax({
        type: "DELETE",
        url: "/list/" + list_id,
        success: function (response) {
            createAlert("success", "List Deleted");
        },
        error: function (response) {
            alert("Data not saved");
        },
    });
});

$(document).on("click", ".update_list", function (e) {
    e.preventDefault();

    var list_id = $("#edit_todo_id").val();
    createAlert("info", "Processing...");

    var data = {
        name: $("#edit_name").val(),
        subtitle: $("#edit_subtitle").val(),
    };

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#EditTodoModal").modal("hide");

    $.ajax({
        type: "PATCH",
        url: "/update-list/" + list_id,
        data: data,
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                createAlert("success", "Data Updated");
            }
        },
        error: function (response) {
            alert("Data not saved");
        },
    });
});

$(document).on("click", ".create_entry", function (e) {
    e.preventDefault();

    var list_id = $("#list_id").val();

    var data = {
        content: $("#content").val(),
        status: $("#status").val(),
    };

    createAlert("info", "Processing...");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#AddEntryModal").modal("hide");

    $.ajax({
        type: "POST",
        url: "/create-entry/" + list_id,
        data: data,
        dataType: "json",
        success: function (response) {
            createAlert("success", "Data Saved");
        },
        error: function (response) {
            console.log(error);
            alert("Data not saved");
        },
    });
});

$(document).on("click", ".edit_entry", function (e) {
    e.preventDefault();
    var entry_id = $(this).val();
    var col_id = $("#col_id").val();
    var list_id = $("#list_id").val();

    $("#EditEntryModal").modal("show");

    createAlert("info", "Processing...");

    $.ajax({
        type: "GET",
        url: "/list/" + list_id + "/" + col_id + "/" + entry_id,
        success: function (response) {
            if (response.status == 200) {
                $("#edit_content").val(response.entry.content);
                $("#edit_status").val(response.column.name);
                $("#edit_entry_id").val(entry_id);
                $("#edit_col_id").val(col_id);
                $("#edit_list_id").val(list_id);

                createAlert("success", "List Deleted");
            }
        },
        error: function (response) {
            alert("Data not saved");
        },
    });
});

$(document).on("click", ".update_entry", function (e) {
    e.preventDefault();

    var entry_id = $("#edit_entry_id").val();
    var col_id = $("#edit_col_id").val();
    var list_id = $("#edit_list_id").val();

    var data = {
        content: $("#edit_content").val(),
        status: $("#edit_status").val(),
    };

    $("#EditEntryModal").modal("hide");
    createAlert("info", "Processing...");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "PATCH",
        url: "/list/" + list_id + "/" + col_id + "/" + entry_id,
        data: data,
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                createAlert("success", "List Updated");
            }
        },
        error: function (response) {
            alert("Data not saved");
        },
    });
});

$(document).on("click", ".delete_entry", function (e) {
    e.preventDefault();
    var entry_id = $(this).val();
    // var list_id = $('#list_id').val();
    $("#delete_entry_id").val(entry_id);
    // $('#delete_list_id').val(list_id);
    $("#DeleteEntryModal").modal("show");
});

$(document).on("click", ".delete_entry_btn", function (e) {
    e.preventDefault();
    var entry_id = $("#delete_entry_id").val();

    $("#DeleteEntryModal").modal("show");

    createAlert("info", "Processing...");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "DELETE",
        url: "/delete-list/" + entry_id,
        success: function (response) {
            $("#DeleteEntryModal").modal("hide");
            if (response.status == 200) {
                createAlert("success", "List Deleted");
            }
        },
        error: function (response) {
            alert("Data not saved");
        },
    });
});

$(document).on("click", ".add_bdentry", function (e) {
    e.preventDefault();
    var col_id = $(this).val();
    var list_id = $("#list_id").val();

    $("#AddBDEntryModal").modal("show");

    createAlert("info", "Processing...");

    $.ajax({
        type: "GET",
        url: "/create-bdentry/" + list_id + "/" + col_id,
        success: function (response) {
            if (response.status == 200) {
                $("#bd_status").val(response.column.name);
                $("#bd_col_id").val(response.column.id);
                $("#bd_list_id").val(response.list.id);
                createAlert("success", "Entry Added");
            }
        },
        error: function (response) {
            alert("Data not saved");
        },
    });
});

$(document).on("click", ".create_bdentry", function (e) {
    e.preventDefault();
    var col_id = $(".add_bdentry").val();
    var list_id = $("#list_id").val();

    var data = {
        col_id: $("#bd_col_id").val(),
        list_id: $("#bd_list_id").val(),
        content: $("#bd_content").val(),
        status: $("#bd_status").val(),
    };

    createAlert("info", "Processing...");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",
        url: "/create-bdentry/" + list_id + "/" + col_id,
        data: data,
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $("#AddBDEntryModal").modal("hide");
                createAlert("success", "Entry Added");
            }
        },
        error: function (response) {
            alert("Data not saved");
        },
    });
});

$(document).on("click", ".create_col", function (e) {
    e.preventDefault();
    var list_id = $("#list_id").val();

    var data = {
        name: $("#bdv_status").val(),
    };

    createAlert("info", "Processing...");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",
        url: "/create-col/" + list_id,
        data: data,
        dataType: "json",
        success: function (response) {
            $("#AddTodoModal").modal("hide");
            createAlert("success", "Column Added");
        },
        error: function (response) {
            alert("Data not saved");
        },
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

    createAlert("info", "Processing...");

    $.ajax({
        url: "/journals",
        method: "PUT",
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

            createAlert("success", "Journal created");

            $(`[data-id='${journal.id}'`)
                .find(".btn")
                .on("click", selectJournal);
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });
}

function deleteJournal() {
    if (selectedJournal == undefined) return;

    const journal_id = selectedJournal;
    createAlert("success", "Processing...");

    $.ajax({
        url: `/journals/${journal_id}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (data) => {
            $(`[data-id='${journal_id}']`).remove();
            createAlert("success", "Journal Deleted");
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
    createAlert("success", "Processing...");

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
            createAlert("success", "Journal Updated");
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
    createAlert("success", "Processing...");

    $.ajax({
        url: `/journals/${id}`,
        method: "PUT",
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

            createAlert("success", "Page Added Successfully.");

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
    createAlert("success", "Processing...");

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
            createAlert("success", "Page Deleted");
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
    createAlert("success", "Processing...");

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
            createAlert("success", "Page Updated");
        },
        error: (err) => {
            console.log(err);
        },
    });

    selectedJournal = undefined;
    selectedPage = undefined;
}
