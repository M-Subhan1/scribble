<x-dashboard-layout>
    <div class="container dashboard-container">
        <h2 class="mt-20">{{ $list->name }}</h2>

        <div class="description mt-7 mb-0">
            Use todo to track your personal tasks.<br>
            Click on the list tag you want to open. <br>
            To create a new todo click the create list button.
            </span>
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
                        <li class="nav-item">
                            <a class="nav-link addtask" href="/">Add Task</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td scope="col" class="text-muted">Name</td>
                    <td scope="col" class="text-muted">Date Created</td>
                    <td scope="col" class="text-muted">Status</td>
                </tr>
                @foreach($list->list_columns as $column)
                    @foreach($column->list_entries as $entry)
                <tr>
                    <td>{{$entry->content}}</td>
                    <td>{{$entry->created_at}}</td>
                    <td>{{$column->name}}</td>
                </tr>
                    @endforeach
                @endforeach

            </tbody>
        </table>

        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script>
            $(".tb-view").click(function () {
                $(this).css({ "border-bottom": "4px solid rgb(102, 0, 204)" })
            });

            $(".addtask").hover(function () {
                $(this).css({ "background-color": "black", "color": "white" });
            }, function () {
                $(this).css("background-color", "rgb(102, 0, 204)");
            });
        </script>

</x-dashboard-layout>