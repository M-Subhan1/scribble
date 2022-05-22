<x-dashboard-layout>
    <div class="container dashboard-container">
        <h2 class="mt-20">{{ $list->name }}</h2>

        <div class="description mt-7 mb-0">
            Use todo to track your personal tasks.<br>
            Click on the list tag you want to open. <br>
            To create a new todo click the create list button.
            </span>
        </div>

        <!-- Add entry Modal-->
        <div class="modal fade" id="AddBDEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Todo Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="add_bdentry">
                <input type="text" id="bd_col_id">
                <input type="text" id="bd_list_id">
                    <div class="form-group">
                        <label for="bd_content">Task</label>
                        <input type="text" class="form-control mb-4 pt-1 pb-1" id="bd_content" name="name" placeholder="Your task">
                    </div>
                    <div class="form-group">
                        <label for="bd_status">Status</label>
                        <input type="text" id="bd_status" class="form-control mb-4 pt-1 pb-1" disabled>
                    </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary create_bdentry">Add Column</button>
            </div>
            </div>
        </div>
        </div>

        <!-- Add column Modal-->
        <div class="modal fade" id="AddColModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Todo Column</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form>
                    <div class="form-group">
                        <label for="bdv_status">Status</label>
                        <input type="text" id="bdv_status" class="form-control mb-4 pt-1 pb-1">
                    </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary create_col">Create</button>
            </div>
            </div>
        </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light border-bottom pb-0">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item bd-view">
                            <a class="nav-link active" aria-current="page" href="/list/{{ $list->id }}">Board View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/list/{{ $list->id }}">Table View</a>
                    </ul>
                </div>
            </div>
        </nav>

        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td scope="col" class="text-muted">todo</td>
                    <td scope="col" class="text-muted">doing</td>
                    <td scope="col" class="text-muted">done</td>
                    <td scope="col" class="text-muted"> <button type="button" class="btn btn-primary btn-sm mb-1" id="list_id" value="{{$list->id}}" data-bs-toggle="modal" data-bs-target="#AddColModal">
                        Add Entry
                    </button></td>
                </tr>
                @foreach($list->list_columns as $column)
                    @foreach($column->list_entries as $entry)
                    <tr>
                        @if($column->name == "todo")
                                <td>{{$entry->content}}</td>
                        @elseif($column->name == "doing")
                                <td>{{$entry->content}}</td>

                        @elseif($column->name == "done")
                                <td>{{$entry->content}}</td>
                        @endif
                    @endforeach
                    <td><button type="button" value="{{$column->id}}" class="edittask add_bdentry btn btn-sm">+ New</button></td>
                    </tr>        
                    <input type="hidden" id="list_id" value="{{$list->id}}">  
                    <input type="hidden" id="status" value="{{$column->name}}">     
                @endforeach
            </tbody>
        </table>

        @push('body-scripts')
        @once
            <script src={{ asset('js/jquery.min.js') }}></script>
        @endonce
    @endpush
</x-dashboard-layout>