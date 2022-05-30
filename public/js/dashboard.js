let selectedJournal = undefined;
let selectedPage = undefined;
let selectedList = undefined;
let selectedColumn = undefined;
let selectedEntry = undefined;

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
    $(".delete-list-btn").on("click", selectList);
    $(".edit-list-btn").on("click", selectList);
    $("#delete-list-btn").on("click", deleteList);
    $("#create-list-btn").on("click", createList);
    $("#update-list-btn").on("click", updateList);
    $(document).on("click", ".edit-list-column-btn", selectColumn);
    $(document).on("click", ".delete-list-column-btn", selectColumn);
    $(document).on("click", ".add-entry", selectColumn);
    $("#create-col-btn").on("click", createListColumn);
    $("#delete-col-btn").on("click", deleteListColumn);
    $("#update-col-btn").on("click", updateListColumn);
    $(document).on("click", ".delete-entry-btn", selectListEntry);
    $(document).on("click", ".edit-entry-btn", selectListEntry);
    $("#create-entry-btn").on("click", createListEntry);
    $("#update-entry-btn").on("click", updateListEntry);
    $("#delete-entry-btn").on("click", deleteListEntry);
    $(document).on("click", ".entry-menu-container", function (e) {
        e.stopPropagation();
        $(this).closest(".entry-menu-container").toggleClass("collapsed");
    });

    $("body").on("click", function () {
        $(this).find(".entry-menu-container").addClass("collapsed");
    });

    $("#dashboard-hamburger").on("click", (e) => {
        e.stopPropagation();
        $("#dashboard-nav").toggleClass("nav-collapse");
        $("#dashboard-content").toggleClass("dashboard-collapse-content");
    });

    const urlParams = new URLSearchParams(window.location.search);
    const view = urlParams.get("view");

    if (view === "table") {
        $(".tb-view").css({ "border-bottom": "2px solid rgb(102, 0, 204)" });
    } else {
        $(".bd-view").css({ "border-bottom": "2px solid rgb(102, 0, 204)" });
    }
});

function selectList() {
    const list = $(this).closest(".list-entry");
    selectedList = $(this).closest(".list-entry").data("id");

    $("#EditListModal [name='list-name']").val(list.data("name"));
    $("#EditListModal [name='list-subtitle']").val(list.data("description"));
}

function createList() {
    const name = $("#AddListModal [name='list-name']").val();
    const subtitle = $("#AddListModal [name='list-subtitle']").val();
    const template = $("#AddListModal [name='list-template']").val();

    createAlert("info", "Processing...");
    $.ajax({
        url: "/lists/",
        method: "PUT",
        data: {
            name,
            subtitle,
            template,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (response) => {
            $("#lists-container").append(
                `<div class="list-entry p-2 border bg-light d-flex justify-content-between align-items-center mb-4"
                data-id="${response.list.id}" data-name="${name}"
                data-description='${subtitle}'>
                <div>
                    <a href='/lists/${response.list.id}' class="h5 list-name"> ${name}</a>
                    <div class="text-muted meta-data">Created at: ${response.list.created_at} Updated at:
                        ${response.list.updated_at}</div>
                </div>
                <span>
                    <button type="button" class="btn btn-sm btn-primary edit-list-btn" data-bs-toggle="modal"
                        data-bs-target="#EditListModal">Edit</button>
                    <button class="btn btn-sm btn-danger delete-list-btn" data-bs-toggle="modal"
                        data-bs-target="#DeleteListModal">Delete</button>
                </span>
            </div>`
            );

            $(`[data-id='${response.list.id}']`)
                .find(".btn")
                .on("click", selectList);

            createAlert("success", "List Added");
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });
}

function updateList() {
    if (selectedList == undefined) return;
    const list = $(`[data-id='${selectedList}']`);

    const name = $("#EditListModal [name='list-name']").val();
    const subtitle = $("#EditListModal [name='list-subtitle']").val();

    createAlert("info", "Processing...");

    $.ajax({
        url: `/lists/${selectedList}`,
        method: "PATCH",
        data: {
            name,
            subtitle,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: () => {
            createAlert("success", "List Updated");

            list.data("name", name);
            list.data("description", subtitle);
            list.find(".list-name").text(name);
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });

    selectedList = undefined;
}

function deleteList() {
    if (selectedList == undefined) return;

    createAlert("info", "Processing...");

    const selected = $(`[data-id='${selectedList}']`);

    $.ajax({
        url: `/lists/${selectedList}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: () => {
            createAlert("success", "List Deleted");
            selected.remove();
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });

    selectedList = undefined;
}

function selectColumn() {
    selectedColumn = $(this).closest("[data-col-id]").data("col-id");

    $("#EditColModal #status").val(
        $(this).closest("[data-col-name]").data("col-name")
    );
}

function createListColumn() {
    const name = $("#AddColModal [name='column-name']").val();
    const list_id = $("[data-list-id]").data("list-id");

    createAlert("info", "Processing...");

    $.ajax({
        url: `/lists/${list_id}`,
        method: "PUT",
        data: {
            name,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (response) => {
            const urlParams = new URLSearchParams(window.location.search);
            const view = urlParams.get("view");

            $(".status-options").append(
                `<option data-col-id="${response.column.id}" data-col-name="${name}" value="${response.column.id}">${name}</option>`
            );

            $("#col-container").append(
                `<div class="col-sm-12 col-md-6 col-xl-4 mb-4" data-col-id='${response.column.id}'
                            data-col-name="${response.column.name}" data-col-name="${response.column.name}">
                            <div class="card bg-light list-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title text-dark py-2 col-name">${response.column.name}
                                        </h6>
                                        <span class="entry-menu-container collapsed">
                                            <svg aria-hidden="true" role="img" class="octicon octicon-kebab-horizontal"
                                                viewBox="0 0 16 16" width="16" height="16" fill="currentColor"
                                                style="display: inline-block; user-select: none; vertical-align: text-bottom; overflow: visible;">
                                                <path
                                                    d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                                </path>
                                            </svg>

                                            <div class="entry-menu bg-dark">
                                                <span class="btn btn-sm btn-dark text-light edit-list-column-btn"
                                                    data-bs-toggle="modal" data-bs-target="#EditColModal">Edit</span>
                                                <span class="btn btn-sm btn-dark text-light delete-list-column-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#DeleteColModal">Delete</span>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="p-3 add-entry" data-bs-toggle="modal" data-bs-target="#AddEntryModal">+
                                    Add Item</div>
                            </div>
                        </div>`
            );

            createAlert("success", "Column Added");
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });
}

function updateListColumn() {
    const name = $("#EditColModal [name='column-name']").val();
    const list_id = $("[data-list-id]").data("list-id");

    createAlert("info", "Processing...");

    $.ajax({
        url: `/lists/${list_id}/${selectedColumn}`,
        method: "PATCH",
        data: {
            name,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (response) => {
            const urlParams = new URLSearchParams(window.location.search);
            const view = urlParams.get("view");

            $(`option[data-col-id="${selectedColumn}"]`).text(name);
            $(`[data-col-id='${selectedColumn}']`).data("col-name", name);
            $(`[data-col-id='${selectedColumn}'] .col-name`).text(name);

            if (view !== "table") {
                const col = $(`[data-col-id="${selectedColumn}"]`);
                col.data("col-name", name);
                col.find(".col-name").val(name);
            }

            createAlert("success", "Column Added");
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });
}

function deleteListColumn() {
    if (!selectedColumn) return;

    const selectedList = $("[data-list-id]").data("list-id");
    const entry = $(`[data-col-id='${selectedColumn}']`);

    createAlert("info", "Processing...");

    $.ajax({
        url: `/lists/${selectedList}/${selectedColumn}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: () => {
            entry.remove();
            createAlert("success", "Column Deleted");
            selectedColumn = undefined;
        },
        error: (err) => {
            createAlert("danger", "Server Error");
            selectedColumn = undefined;
        },
    });
}

function selectListEntry() {
    selectedList = $("[data-list-id]").data("list-id");
    selectedColumn = $(this).closest("[data-col-id]").data("col-id");
    selectedEntry = $(this).closest("[data-id]").data("id");

    $("#EditEntryModal #content").val(
        $(this).closest("[data-id]").find(".entry-content").text()
    );

    $("#EditEntryModal #status").val(
        $(this).closest("[data-col-id]").data("col-id")
    );
}

function createListEntry() {
    let list_id = $("[data-list-id").data("list-id");
    let content = $("#AddEntryModal #content").val();
    let col_id = $("#AddEntryModal #status").val();

    const urlParams = new URLSearchParams(window.location.search);
    const view = urlParams.get("view");

    if (view !== "table") {
        content = $("#AddEntryModal [name='content']").val();
        list_id = $("#board-container").data("list-id");
        col_id = selectedColumn;
    }

    createAlert("info", "Processing...");

    $.ajax({
        url: `/lists/${list_id}/${selectedColumn}`,
        method: "PUT",
        data: {
            content,
            col_id,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (response) => {
            createAlert("success", "Entry Added");

            if (view === "table") {
                const column_name = $(
                    `#AddEntryModal option[value='${status}']`
                ).data("col-name");

                $("#entry-container")
                    .append(`<tr data-id="${response.entry.id}" data-col-id="${response.entry.column_id}">
                            <td>${response.entry.content}</td>
                            <td class="text-center align-middle">${column_name}</td>
                            <td class="text-center align-middle">${response.entry.created_at}</td>
                            <td>
                                <div class='text-center'>
                                    <button type="button" class="btn btn-sm btn-primary edit-entry-btn"
                                        data-bs-toggle="modal" data-bs-target="#EditEntryModal">Edit</button>
                                    <button class="btn btn-sm btn-danger delete-entry-btn" data-bs-toggle="modal"
                                        data-bs-target="#DeleteEntryModal">Delete</button>
                                </div>
                            </td>
                        </tr>`);
            } else {
                $(
                    `[data-col-id='${selectedColumn}'] > .card > .card-body`
                ).append(
                    `<div class="items mb-1" data-id='${response.entry.id}'>
                        <div class="card draggable">
                            <div
                                class="card-body d-flex justify-content-between align-items-center">
                                <p class="mb-0 entry-content">${response.entry.content}</p>
                                <span class="entry-menu-container collapsed">
                                    <svg aria-hidden="true" role="img"
                                        class="octicon octicon-kebab-horizontal" viewBox="0 0 16 16"
                                        width="16" height="16" fill="currentColor"
                                        style="display: inline-block; user-select: none; vertical-align: text-bottom; overflow: visible;">
                                        <path
                                            d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                        </path>
                                    </svg>
                                    <div class="entry-menu bg-dark">
                                        <span class="btn btn-sm btn-dark text-light edit-entry-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#EditEntryModal">Edit</span>
                                        <span
                                            class="btn btn-sm btn-dark text-light delete-entry-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#DeleteEntryModal">Delete</span>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>`
                );
            }
        },
        error: (err) => {
            createAlert("danger", "Server Error");
        },
    });
}

function updateListEntry() {
    if (!selectedList || !selectedColumn || !selectedEntry) return;

    const list_id = $("[data-list-id").data("list-id");
    const content = $("#EditEntryModal #content").val();
    const col_id = $("#EditEntryModal #status").val();
    const entry = $(`[data-id='${selectedEntry}']`);
    const column_name = $(`[data-col-id='${col_id}']`).data("col-name");

    createAlert("info", "Processing...");

    $.ajax({
        url: `/lists/${list_id}/${selectedColumn}/${selectedEntry}`,
        method: "PATCH",
        data: {
            content,
            col_id,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: () => {
            entry.data("col-id", col_id);
            entry.data("col-name", column_name);
            entry.find(".entry-content").text(content);
            entry
                .find(".entry-column")
                .text($(`#AddEntryModal option[value='${col_id}']`).text());

            const urlParams = new URLSearchParams(window.location.search);
            const view = urlParams.get("view");

            if (view !== "table") {
                $(`[data-col-id='${col_id}'] > .card > .card-body`).append(
                    entry.clone(true, true)
                );

                entry.remove();
            }

            createAlert("success", "Entry Updated");
            selectedList = selectedColumn = selectedEntry = undefined;
        },
        error: (err) => {
            createAlert("danger", "Server Error");
            selectedList = selectedColumn = selectedEntry = undefined;
        },
    });
}

function deleteListEntry() {
    if (!selectedList || !selectedColumn || !selectedEntry) return;

    createAlert("info", "Processing...");

    const entry = $(`[data-id='${selectedEntry}']`);

    $.ajax({
        url: `/lists/${selectedList}/${selectedColumn}/${selectedEntry}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: () => {
            entry.remove();
            createAlert("success", "Entry Deleted");
            selectedList = selectedColumn = selectedEntry = undefined;
        },
        error: (err) => {
            createAlert("danger", "Server Error");
            selectedList = selectedColumn = selectedEntry = undefined;
        },
    });
}

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
                            <div>
                                <a href='/journals/${journal.id}' class="h5 journal-name"> ${journal.name}</a>
                                <div class="text-muted meta-data">Created at: ${journal.created_at} Updated at: ${journal.updated_at}</div>
                            </div>
                            <div>
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
    createAlert("info", "Processing...");

    $.ajax({
        url: `/journals/${journal_id}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (data) => {
            $(`[data-id='${journal_id}']`).remove();
            createAlert("success", "Journal Deleted");
            selectedJournal = undefined;
        },
        error: (err) => {
            createAlert("danger", "Server Error");
            selectedJournal = undefined;
        },
    });
}

function editJournal() {
    if (selectedJournal == undefined) return;
    const journal_id = selectedJournal;

    const name = $("#edit-journal-name").val();
    const description = $("#edit-journal-description").val();
    createAlert("info", "Processing...");

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
            selectedJournal = undefined;
        },
        error: (err) => {
            createAlert("danger", "Server Error");
            selectedJournal = undefined;
        },
    });
}

function selectPage() {
    const page = $(this).closest(".page-list-entry");
    selectedPage = page.data("page-id");
    selectedJournal = $("#page").data("journal-id");
    $("#editPageModal #edit-page-name").val(page.data("identifier"));
}

function createPage() {
    const name = $("#createPageModal #page-name").val();
    const id = $("#page").data("journal-id");
    createAlert("info", "Processing...");

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
                                <div>
                                <a href='/journals/${page.journalId}/${page.id}' class="h5 page-name"> ${page.identifier}</a>
                                    <div class="text-muted meta-data">Created at: ${page.created_at} Updated at: ${page.updated_at}</div>
                                </div>
                                <div>
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
    createAlert("info", "Processing...");

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
            selectedJournal = undefined;
            selectedPage = undefined;
        },
        error: (err) => {
            console.log(err);
            selectedJournal = undefined;
            selectedPage = undefined;
        },
    });
}

function editPage() {
    if (selectedJournal == undefined || selectedPage == undefined) return;
    const journal_id = selectedJournal;
    const page_id = selectedPage;

    const name = $("#edit-page-name").val();
    createAlert("info", "Processing...");

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
            selectedJournal = undefined;
            selectedPage = undefined;
        },
        error: (err) => {
            console.log(err);
            selectedJournal = undefined;
            selectedPage = undefined;
        },
    });
}
