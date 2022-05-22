<x-dashboard-layout>
    <div class="container dashboard-container">
        <h2 class="mt-20">{{ $list->name }}</h2>

        <div class="description mt-7 mb-0">
            Use todo to track your personal tasks.<br>
            Click on the list tag you want to open. <br>
            To create a new todo click the create list button.
            </span>
        </div>

        <!--Add Entry Modal -->
        <div class="modal fade" id="AddEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary create_entry">Save changes</button>
            </div>
            </div>
        </div>
        </div>
        
        <!-- Edit Modal -->
        <div class="modal fade" id="EditEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Todo Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_entry">Save changes</button>
            </div>
            </div>
        </div>
        </div>

        <!-- Delete list modal -->
        <div class="modal fade" id="DeleteEntryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">Delete Your Todo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <input type="text" id="delete_entry_id">
                        <input type="text" id="delete_list_id">
                        <h6>Are you sure you want to delete this entry?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm todo_btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm todo_btn delete_entry_btn">Delete</button>
                </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light border-bottom pb-0">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/list/{{ $list->id }}">Board View</a>
                        </li>
                        <li class="nav-item  tb-view">
                            <a class="nav-link" href="/list/{{ $list->id }}">Table View</a> 
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
                    <td scope="col" class="text-muted">Name</td>
                    <td scope="col" class="text-muted">Date Created</td>
                    <td scope="col" class="text-muted">Status</td>
                    <td scope="col" class="text-muted">Edit/Delete</td>
                </tr>
                @foreach($list->list_columns as $column)
                    @foreach($column->list_entries as $entry)
                <tr>
                    <td>{{$entry->content}}</td>
                    <td>{{$entry->created_at}}</td>
                    <td>{{$column->name}}</td>
                    <td><div class="link-container"><button type="button" value="{{$entry->id}}" class="edittask edit_entry btn btn-sm">Edit</button> <button value="{{$entry->id}}" class="deltask delete_entry btn btn-sm">Delete</button></div></td>
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