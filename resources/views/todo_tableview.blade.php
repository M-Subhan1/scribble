<x-dashboard-layout>
    <div class="container dashboard-container">
        <h2 class="mt-20">{{ $list->name }}</h2>

        <h5>{{$list->subtitle}}</h5>

        <div class="description mt-7 mb-0">
            Use todo to track your personal tasks.<br>
            Click on the list tag you want to open. <br>
            To create a new todo click the create list button.
            </span>
        </div>

        <!--Add Entry Modal -->
        <div class="modal fade" id="AddEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Todo Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="add_entry">
                    <div class="form-group">
                        <label for="content">Task</label>
                        <input type="text" class="form-control mb-4 pt-1 pb-1" id="content" name="name" placeholder="Your task">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-select" aria-label="Default select example" id="status">
                            <option selected>Open to select status</option>
                            <option value="todo">todo</option>
                            <option value="doing">doing</option>
                            <option value="done">done</option>
                        </select>
                    </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary create_entry">Save changes</button>
            </div>
            </div>
        </div>
        </div>
        
        <!-- Edit Modal -->
        <div class="modal fade" id="EditEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Todo Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="add_entry">
                <input type="hidden" id="edit_entry_id">
                <input type="hidden" id="edit_col_id">
                <input type="hidden" id="edit_list_id">
                    <div class="form-group">
                        <label for="edit_content">Task</label>
                        <input type="text" class="form-control mb-4 pt-1 pb-1" id="edit_content" name="name" placeholder="Your task">
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <select class="form-select" aria-label="Default select example" id="edit_status">
                            <option selected>Open to select status</option>
                            <option value="todo">todo</option>
                            <option value="doing">doing</option>
                            <option value="done">done</option>
                        </select>
                    </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm update_entry">Save changes</button>
            </div>
            </div>
        </div>
        </div>

        <!-- Delete list modal -->
        <div class="modal fade" id="DeleteEntryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">Delete Your Todo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                        <input type="hidden" id="delete_entry_id">
                        <input type="hidden" id="delete_list_id">
                        <h6>Are you sure you want to delete this entry?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm todo_btn delete_entry_btn">Delete</button>
                </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light border-bottom pb-0">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item  tb-view">
                        <li class="nav-item">
                            <a class="nav-link active bd-view"  aria-current="page" href="/render-list/{{ $list->id }}/?view=board">Board View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tb-view" href="/render-list/{{ $list->id }}/?view=table">Table View</a> 
                        </li>
                    </ul>
                    <button type="button" class="btn btn-primary btn-sm mb-1" id="list_id" value="{{$list->id}}" data-bs-toggle="modal" data-bs-target="#AddEntryModal">
                        Add Entry
                    </button>
                </div>
            </div>
        </nav>

        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td scope="col" class="text-muted text-center">Name</td>
                    <td scope="col" class="text-muted text-center">Status</td>
                    <td scope="col" class="text-muted text-center">Date Created</td>
                    <td scope="col" class="text-muted text-center">Edit/Delete</td>
                </tr>
                @foreach($list->list_columns as $column)
                    @foreach($column->list_entries as $entry)
                <tr>
                    <td>{{$entry->content}}</td>
                    <td class="text-center align-middle">{{$column->name}}</td>
                    <td class="text-center align-middle">{{$entry->created_at}}</td>
                    <td>
                        <div class='text-center'>
                                <button type="button" value="{{$entry->id}}" class="btn btn-sm btn-primary edit-journal-btn edit_entry">Edit</button>
                                <button class="btn btn-sm btn-danger delete-journal-btn delete_entry" value="{{$entry->id}}" >Delete</button>
                        </div>
                    </td>
                </tr>
                    <input type="hidden" id="list_id" value="{{$list->id}}">
                    <input type="hidden" id="col_id" value="{{$column->id}}">
                    @endforeach
                @endforeach

            </tbody>
        </table>

        @push('body-scripts')
        @once
            <script src={{ asset('js/jquery.min.js') }}></script>
        @endonce
    @endpush
</x-dashboard-layout>