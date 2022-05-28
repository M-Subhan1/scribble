<x-dashboard-layout current-page="list">
    <div class="container dashboard-container">
        <nav id="bread-crumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/lists">Todos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $list->name }}</li>
            </ol>
        </nav>

        <div class="px-4 mt-20">
            <h2>{{ $list->name }}</h2>
            <h5>{{ $list->subtitle }}</h5>

            <div class="description mt-7 mb-0">
                Use todo to track your personal tasks.<br>
                Click on the list tag you want to open. <br>
                To create a new todo click the create list button.
                </span>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light border-bottom pb-0">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active bd-view" aria-current="page"
                                href="/lists/{{ $list->id }}/?view=board">Board View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tb-view" href="/lists/{{ $list->id }}/?view=table">Table
                                View</a>
                    </ul>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#AddColModal">
                        Add Column
                    </button>
                </div>
            </div>
        </nav>

        <div id="board-container" class="px-4 mr-2 board-container" data-list-id="{{ $list->id }}">
            <div class="container-fluid pt-3">
                <div class="row flex-row py-3" id="col-container">
                    @foreach ($list->list_columns as $column)
                        <div class="col-sm-12 col-md-6 col-xl-4 mb-4" data-col-id='{{ $column->id }}'
                            data-col-name="{{ $column->name }}">
                            <div class="card bg-light list-card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title text-dark py-2 col-name">{{ $column->name }}
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
                                <div class="card-body">
                                    @foreach ($column->list_entries as $entry)
                                        <div class="items mb-1" data-id='{{ $entry->id }}'>
                                            <div class="card draggable">
                                                <div
                                                    class="card-body d-flex justify-content-between align-items-center">
                                                    <p class="mb-0 entry-content">
                                                        {{ $entry->content }}
                                                    </p>

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
                                        </div>
                                    @endforeach
                                </div>
                                <div class="card-footer p-3 add-entry" data-bs-toggle="modal"
                                    data-bs-target="#AddEntryModal">+
                                    Add Item</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Add entry Modal-->
        <div class="modal fade" id="AddEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bd_content">Content</label>
                            <input type="text" class="form-control mb-4 pt-1 pb-1" name="content"
                                placeholder="Entry Content">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" data-bs-dismiss="modal" id="create-entry-btn"
                            class="btn btn-primary btn-sm">Add Entry</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete entry Modal-->
        <div class="modal fade" id="DeleteEntryModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Delete Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this item?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="delete-entry-btn" data-bs-dismiss="modal"
                            class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit entry Modal-->
        <div class="modal fade" id="EditEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Todo Entry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="content">Task</label>
                            <input type="text" class="form-control mb-4 pt-1 pb-1" id="content" name="name"
                                placeholder="Your task">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select status-options" id="status">
                                @foreach ($list->list_columns as $column)
                                    <option data-col-id="{{ $column->id }}" data-col-name="{{ $column->name }}"
                                        value="{{ $column->id }}">
                                        {{ $column->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="update-entry-btn" class="btn btn-primary btn-sm"
                            data-bs-dismiss="modal">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add column Modal-->
        <div class="modal fade" id="AddColModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Column</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="status">Name</label>
                                <input id="status" type="text" name="column-name" class="form-control mb-4 pt-1 pb-1">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="create-col-btn" data-bs-dismiss="modal"
                            class="btn btn-primary btn-sm">Create</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit column Modal-->
        <div class="modal fade" id="EditColModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Column</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status">Name</label>
                            <input type="text" id="status" name="column-name" class="form-control mb-4 pt-1 pb-1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="update-col-btn" data-bs-dismiss="modal"
                            class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Column modal -->
        <div class="modal fade" id="DeleteColModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Delete Column</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this column?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="delete-col-btn" data-bs-dismiss="modal"
                            class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        @push('body-scripts')
            @once
                <script src={{ asset('js/jquery.min.js') }}></script>
            @endonce
        @endpush
</x-dashboard-layout>
