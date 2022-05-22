const hamburger = document.getElementById("dashboard-hamburger");
const navbar = document.getElementById("dashboard-nav");
const dashboardCotent = document.getElementById("dashboard-content");

hamburger.addEventListener("click", (e) => {
    navbar.classList.toggle("nav-collapse");
    dashboardCotent.classList.toggle("dashboard-collapse-content");
});

$(".bd-view").on('click', function () {
    $(this).css({ "border-bottom": "4px solid rgb(102, 0, 204)" })
});

$(".tb-view").on('click', function () {
    $(this).css({ "border-bottom": "4px solid rgb(102, 0, 204)" })
});

$(".todo_btn").on("hover", function () {
    $(this).css("background-color", "black");
}, function () {
    $(this).css("background-color", "rgb(102, 0, 204)");
});

$(document).on('click', '.create_list', function (e) {
    e.preventDefault();
    console.log("hello");

    var data = {
        'name': $("#todo").val(),
        'subtitle': $("#todo_desc").val(),
    }

    console.log(data);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/create-list",
        data: data,
        dataType: "json",
        success: function (response) {
            console.log(response);
            $('#AddTodoModal').modal('hide');
            alert('Data Saved');
        },
        error: function (response) {
            console.log(error);
            alert('Data not saved');
        }
    });
});

$(document).on('click', '.edit_list', function (e) {
    e.preventDefault();
    var list_id = $(this).val();
    $("#EditTodoModal").modal("show");

    $.ajax({
        type: "GET",
        url: "/list/" + list_id,
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $("#edit_name").val(response.list.name);
                $("#edit_subtitle").val(response.list.subtitle);
                $("#edit_todo_id").val(list_id);
            }
        },
        error: function (response) {
            console.log(error);
            alert('Data not saved');
        }
    });
});

$(document).on('click', '.delete_list', function (e) {
    e.preventDefault();
    var list_id = $(this).val();
    $('#delete_todo_id').val(list_id);

    console.log(list_id);

    $("#DeleteTodoModal").modal("show");
});

$(document).on('click', '.delete_list_btn', function (e) {
    e.preventDefault();
    var list_id = $('#delete_todo_id').val();
    $("#DeleteTodoModal").modal("show");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "DELETE",
        url: "/list/" + list_id,
        success: function (response) {
            console.log(response);
            $("#DeleteTodoModal").modal("hide");
        },
        error: function (response) {
            alert('Data not saved');
        }
    });
});

$(document).on('click', '.update_list', function (e) {
    e.preventDefault();
    console.log("hello");

    var list_id = $("#edit_todo_id").val();
    console.log(list_id);

    var data = {
        'name': $("#edit_name").val(),
        'subtitle': $("#edit_subtitle").val(),
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "PATCH",
        url: "/update-list/" + list_id,
        data: data,
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $("#EditTodoModal").modal("hide");
            }
        },
        error: function (response) {
            alert('Data not saved');
        }
    });
});

$(document).on('click', '.create_entry', function (e) {
    e.preventDefault();
    console.log("hello");

    var list_id = $("#list_id").val();

    var data = {
        'content': $("#content").val(),
        'status': $("#status").val(),
    }

    console.log(data);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/create-entry/" + list_id,
        data: data,
        dataType: "json",
        success: function (response) {
            console.log(response);
            $('#AddEntryModal').modal('hide');
            alert('Data Saved');
        },
        error: function (response) {
            console.log(error);
            alert('Data not saved');
        }
    });
});

$(document).on('click', '.edit_entry', function (e) {
    e.preventDefault();
    var entry_id = $(this).val();
    var col_id = $("#col_id").val();
    var list_id = $("#list_id").val();

    $("#EditEntryModal").modal("show");

    $.ajax({
        type: "GET",
        url: "/list/" + list_id + "/" + col_id + "/" + entry_id,
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $("#edit_content").val(response.entry.content);
                $("#edit_status").val(response.column.name);
                $("#edit_entry_id").val(entry_id);
                $("#edit_col_id").val(col_id);
                $("#edit_list_id").val(list_id);
            }
        },
        error: function (response) {
            console.log(error);
            alert('Data not saved');
        }
    });
});

$(document).on('click', '.update_entry', function (e) {
    e.preventDefault();
    console.log("hello");

    var entry_id = $("#edit_entry_id").val();
    console.log(entry_id);
    var col_id = $("#edit_col_id").val();
    console.log(col_id);
    var list_id = $("#edit_list_id").val();
    console.log(list_id);

    var data = {
        'content': $("#edit_content").val(),
        'status': $("#edit_status").val(),
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "PATCH",
        url: "/list/" + list_id + "/" + col_id + "/" + entry_id,
        data: data,
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $("#EditEntryModal").modal("hide");
            }
        },
        error: function (response) {
            alert('Data not saved');
        }
    });
});

$(document).on('click', '.delete_entry', function (e) {
    e.preventDefault();
    var entry_id = $(this).val();
    // var list_id = $('#list_id').val();
    $('#delete_entry_id').val(entry_id);
    // $('#delete_list_id').val(list_id);
    $("#DeleteEntryModal").modal("show");
});

$(document).on('click', '.delete_entry_btn', function (e) {
    e.preventDefault();
    var entry_id = $('#delete_entry_id').val();
    // var list_id = $('#delete_list_id').val();
    // console.log(list_id);
    $("#DeleteEntryModal").modal("show");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "DELETE",
        url: "/delete-list/"+ entry_id,
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $("#DeleteEntryModal").modal("hide");
            }
        },
        error: function (response) {
            alert('Data not saved');
        }
    });
});

$(document).on('click', '.add_bdentry', function (e) {
    e.preventDefault();
    console.log("hello");
    var col_id = $(this).val();
    console.log(col_id);
    var list_id = $("#list_id").val();
    console.log(list_id);

    $("#AddBDEntryModal").modal("show");

    $.ajax({
        type: "GET",
        url: "/create-bdentry/" + list_id + "/" + col_id,
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $("#bd_status").val(response.column.name);
                $("#bd_col_id").val(response.column.id);
                $("#bd_list_id").val(response.list.id);
            }
        },
        error: function (response) {
            console.log(error);
            alert('Data not saved');
        }
    });
});

$(document).on('click', '.create_bdentry', function (e) {
    e.preventDefault();
    console.log("hello");
    var col_id = $(".add_bdentry").val();
    console.log(col_id);
    var list_id = $("#list_id").val();
    console.log(list_id);

    var data = {
        'col_id':$("#bd_col_id").val(),
        'list_id':$("#bd_list_id").val(),
        'content': $("#bd_content").val(),
        'status': $("#bd_status").val(),
    }
    console.log(data);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/create-bdentry/" + list_id + "/" + col_id,
        data: data,
        success: function (response) {
            console.log(response);
            if(response.status == 200){
                $('#AddBDEntryModal').modal('hide');
                alert('Data Saved');
            }
        },
        error: function (response) {
            console.log(error);
            alert('Data not saved');
        }
    });
});

$(document).on('click', '.create_col', function (e) {
    e.preventDefault();
    console.log("hello");
    var list_id = $("#list_id").val();

    var data = {
        'name': $("#bdv_status").val(),
    }

    console.log(data);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/create-col/"+list_id,
        data: data,
        dataType: "json",
        success: function (response) {
            console.log(response);
            $('#AddTodoModal').modal('hide');
            alert('Data Saved');
        },
        error: function (response) {
            alert('Data not saved');
        }
    });
});

