<x-dashboard-layout current-page="list">
    <div class="container dashboard-container">
        <nav id="bread-crumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/list">Todos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$list->name}}</li>
            </ol>
        </nav>
        
        <h2 class="mt-20">{{ $list->name }}</h2>
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

        <!-- Add entry Modal-->
        <div class="modal fade" id="AddBDEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Todo Entry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="add_bdentry">
                            <input type="hidden" id="bd_col_id">
                            <input type="hidden" id="bd_list_id">
                            <div class="form-group">
                                <label for="bd_content">Task</label>
                                <input type="text" class="form-control mb-4 pt-1 pb-1" id="bd_content" name="name"
                                    placeholder="Your task">
                            </div>
                            <div class="form-group">
                                <label for="bd_status">Status</label>
                                <input type="text" id="bd_status" class="form-control mb-4 pt-1 pb-1" disabled>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary create_bdentry">Add Column</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Add Todo Column</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
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
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary btn-sm create_col">Create</button>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light border-bottom pb-0">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item bd-view">
                            <a class="nav-link active bd-view" aria-current="page"
                                href="/render-list/{{ $list->id }}/?view=board">Board View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tb-view" href="/render-list/{{ $list->id }}/?view=table">Table
                                View</a>
                    </ul>
                    <button type="button" class="btn btn-primary btn-sm mb-1" id="list_id" value="{{ $list->id }}"
                        data-bs-toggle="modal" data-bs-target="#AddColModal">
                        Add Column
                    </button></td>
                </div>
            </div>
        </nav>

        <div id="boxes" class="mr-2">
            @foreach ($list->list_columns as $column)
                <div id="leftbox">
                    <h5 class="text-muted">{{ $column->name }}</h5>
                    @foreach ($column->list_entries as $entry)
                        <h6>{{ $entry->content }}</h6>
                    @endforeach
                    <button type="button" value="{{ $column->id }}" class="add_bdentry btn btn-primary btn-sm">+
                        New</button>
                </div>
                <input type="hidden" id="list_id" value="{{ $list->id }}">
                <input type="hidden" id="status" value="{{ $column->name }}">
            @endforeach
        </div>
        @push('body-scripts')
            @once
                <script src={{ asset('js/jquery.min.js') }}></script>
            @endonce
        @endpush
</x-dashboard-layout>
