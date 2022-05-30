<x-dashboard-layout current-page="list">
    <div class="container dashboard-container">

        <nav id="bread-crumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/list">Todos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $list->name }}</li>
            </ol>
        </nav>
        <div class="px-4 mt-20">
            <h2>{{ $list->name }}</h2>
            <h5>{{ $list->subtitle }}</h5>

            <div class="description mt-7 mb-0">
                Use lists to track your personal tasks and progress.<br>
                Click on the list tag you want to open. <br>
                To create a new item click the add item button.
                </span>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light border-bottom pb-4">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item  tb-view">
                        <li class="nav-item">
                            <a class="nav-link active bd-view" aria-current="page"
                                href="/lists/{{ $list->id }}/?view=board">Board View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tb-view" href="/lists/{{ $list->id }}/?view=table">Table
                                View</a>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-primary btn-sm add-entry" data-bs-toggle="modal"
                        data-bs-target="#AddEntryModal">
                        Add Item</button>
                </div>
            </div>
        </nav>

        <table class="table table-bordered table-hover" data-list-id='{{ $list->id }}'>
            <tbody id="entry-container">
                <tr>
                    <td scope="col" class="text-muted text-center">Name</td>
                    <td scope="col" class="text-muted text-center">Status</td>
                    <td scope="col" class="text-muted text-center">Date Created</td>
                    <td scope="col" class="text-muted text-center">Edit/Delete</td>
                </tr>
                @foreach ($list->list_columns as $column)
                    @foreach ($column->list_entries as $entry)
                        <tr data-id="{{ $entry->id }}" data-col-id="{{ $column->id }}"
                            data-col-name="{{ $column->name }}">
                            <td class="entry-content">{{ $entry->content }}</td>
                            <td class="entry-column text-center align-middle">{{ $column->name }}</td>
                            <td class="text-center align-middle">{{ $entry->created_at }}</td>
                            <td>
                                <div class='text-center'>
                                    <button type="button" class="btn btn-sm btn-primary edit-entry-btn"
                                        data-bs-toggle="modal" data-bs-target="#EditEntryModal">Edit</button>
                                    <button class="btn btn-sm btn-danger delete-entry-btn" data-bs-toggle="modal"
                                        data-bs-target="#DeleteEntryModal">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

        <!--Add Entry Modal -->
        <div class="modal fade" id="AddEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" class="form-control mb-4 pt-1 pb-1" id="content" name="name"
                                placeholder="Item content">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select status-options" id="status">
                                @foreach ($list->list_columns as $column)
                                    <option data-col-name="{{ $column->name }}" value="{{ $column->id }}">
                                        {{ $column->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="create-entry-btn" class="btn btn-primary btn-sm"
                            data-bs-dismiss="modal">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Entry Modal -->
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
                                    <option data-col-name="{{ $column->name }}" value="{{ $column->id }}">
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

        <!-- Delete list modal -->
        <div class="modal fade" id="DeleteEntryModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Delete Your Todo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="delete_todo_id">
                        <h6>Are you sure you want to delete this todo?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="delete-entry-btn" data-bs-dismiss="modal"
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
