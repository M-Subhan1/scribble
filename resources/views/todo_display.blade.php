<x-dashboard-layout>
    <div class="container dashboard-container">
        <div class="px-4 mt-20">
            <h2 class="mt-20">Todo Lists</h2>

            <div class="description mt-7 mb-0">
                All your todo lists are displayed below.<br>
                Click on the list tag you want to open. <br>
                To create a new todo click the create list button.
                </span>
            </div>
        </div>
        <!--Create List Modal -->
        <div class="modal fade" id="AddTodoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Create Todo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="create_todo">
                            @csrf
                            <div class="form-group">
                                <label for="todo">Name</label>
                                <input type="text" class="form-control mb-4 pt-1 pb-1" id="todo" name="name"
                                    placeholder="Name your todo">
                            </div>
                            <div class="form-group">
                                <label for="todo_desc">Description</label>
                                <input type="text" class="form-control pt-1 pb-1" id="todo_desc" name="subtitle"
                                    placeholder="Description of your todo">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm todo_btn create_list">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="position-relative mb-0 mt-6">
            <div class="position-absolute top-0 end-0">
                <div class="text-right"><button type="button" class="btn btn-primary btn-sm todo_btn"
                        data-bs-toggle="modal" data-bs-target="#AddTodoModal">Create
                        Todo</button></div>
            </div>
        </div>

        <!-- Edit list modal -->
        <div class="modal fade" id="EditTodoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Edit Your Todo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit_todo">
                            <input type="hidden" id="edit_todo_id">
                            <div class="form-group">
                                <label for="edit_name">Name</label>
                                <input type="text" class="form-control mb-4 pt-1 pb-1" id="edit_name" name="name"
                                    placeholder="Name your todo">
                            </div>
                            <div class="form-group">
                                <label for="edit_subtitle">Description</label>
                                <input type="text" class="form-control pt-1 pb-1" id="edit_subtitle" name="subtitle"
                                    placeholder="Description of your todo">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm todo_btn update_list">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete list modal -->
        <div class="modal fade" id="DeleteTodoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm todo_btn delete_list_btn">Delete</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="container px-4 mt-20 ml-0">
            <hr>
            @foreach ($lists as $list)
                <div class="p-2 border bg-light d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <a href='/render-list/{{ $list->id }}' class="h5"> {{ $list->name }}</a>
                        <div>{{ $list->subtitle }}</div>
                        <div class="text-muted">Created at: {{ $list->created_at }} Updated at:
                            {{ $list->updated_at }}</div>
                    </div>
                    <span>
                        <button type="button" class="btn btn-sm btn-primary edit-journal-btn edit_list"
                            value="{{ $list->id }}">Edit</button>
                        <button class="btn btn-sm btn-danger delete_list delete-journal-btn"
                            value="{{ $list->id }}">Delete</button>
                    </span>
                </div>
            @endforeach
        </div>


        @push('body-scripts')
            @once
                <script src={{ asset('js/jquery.min.js') }}></script>
            @endonce
        @endpush
</x-dashboard-layout>
