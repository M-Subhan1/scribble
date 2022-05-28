<x-dashboard-layout current-page="list">

    <div class="container dashboard-container">
        <nav id="bread-crumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Todos</li>
            </ol>
        </nav>
        <div class="px-4 mt-20">
            <h2>Todo Lists</h2>
            <div class="description mt-7 mb-0">
                All your todo lists are displayed below.<br>
                Click on the list tag you want to open. <br>
                To create a new todo click the create list button.
                </span>
            </div>
        </div>

        <div class="position-relative mb-0 mt-6">
            <div class="position-absolute top-0 end-0">
                <div class="text-right"><button type="button" class="btn btn-primary btn-sm todo_btn"
                        data-bs-toggle="modal" data-bs-target="#AddListModal">Create
                        Todo</button></div>
            </div>
        </div>

        <div id="lists-container" class="container px-4 mt-20 ml-0">
            <hr>
            @foreach ($lists as $list)
                <div class="list-entry p-2 border bg-light d-flex justify-content-between align-items-center mb-4"
                    data-id="{{ $list->id }}" data-name="{{ $list->name }}"
                    data-description='{{ $list->subtitle }}'>
                    <div>
                        <a href='/lists/{{ $list->id }}' class="h5 list-name"> {{ $list->name }}</a>
                        <div class="text-muted meta-data">Created at: {{ $list->created_at }} Updated at:
                            {{ $list->updated_at }}</div>
                    </div>
                    <span>
                        <button type="button" class="btn btn-sm btn-primary edit-list-btn" data-bs-toggle="modal"
                            data-bs-target="#EditListModal">Edit</button>
                        <button class="btn btn-sm btn-danger delete-list-btn" data-bs-toggle="modal"
                            data-bs-target="#DeleteListModal">Delete</button>
                    </span>
                </div>
            @endforeach
        </div>

        <!--Create List Modal -->
        <div class="modal fade" id="AddListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Create Todo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="todo">Name</label>
                            <input type="text" class="form-control mb-4 pt-1 pb-1" id="list_name" name="list-name"
                                placeholder="Name your todo">
                        </div>
                        <div class="form-group">
                            <label for="todo_desc">Description</label>
                            <input type="text" class="form-control pt-1 pb-1" id="list_description" name="list-subtitle"
                                name="list-description" placeholder="Description of your todo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="create-list-btn" class="btn btn-primary btn-sm todo_btn"
                            data-bs-dismiss="modal">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit list modal -->
        <div class="modal fade" id="EditListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Edit Your Todo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_todo_id">
                        <div class="form-group">
                            <label for="edit_name">Name</label>
                            <input type="text" class="form-control mb-4 pt-1 pb-1" id="edit_name" name="list-name"
                                placeholder="Name your todo">
                        </div>
                        <div class="form-group">
                            <label for="edit_subtitle">Description</label>
                            <input type="text" class="form-control pt-1 pb-1" id="edit_subtitle" name="list-subtitle"
                                placeholder="Description of your todo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="update-list-btn" class="btn btn-primary btn-sm todo_btn"
                            data-bs-dismiss="modal">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete list modal -->
        <div class="modal fade" id="DeleteListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Delete Your Todo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this todo?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="delete-list-btn" data-bs-dismiss="modal"
                            class="btn btn-danger btn-sm todo_btn">Delete</button>
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
