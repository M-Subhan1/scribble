<x-dashboard-layout>
        <div class="container dashboard-container">
            <h2 class="mt-20">Todo Lists</h2>

            <div class="description mt-7 mb-0">
                All your todo lists are displayed below.<br>
                Click on the list tag you want to open. <br>
                To create a new todo click the create list button.
                </span>
            </div>

            <div class="position-relative mb-0 mt-6">
                <div class="position-absolute top-0 end-0">
                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm todo_btn">Create
                            Todo</button></div>
                </div>
            </div>

            <div class="container px-4 mt-20 ml-0">
                <hr>
                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3 border bg-light">
                            <a href="/" class="h4"> List title </a>
                            <div>list subtitle/description/createdat/updatedat goes here</div>
                        </div>
                    </div>
                </div>
                <div class="row gx-5 mt-10">
                    <div class="col">
                        <div class="p-3 border bg-light">
                            <a href="/" class="h4"> List title </a>
                            <div>list subtitle/description goes here</div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.js"
                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

            <script>
                $(".todo_btn").hover(function () {
                    $(this).css("background-color", "black");
                }, function () {
                    $(this).css("background-color", "rgb(102, 0, 204)");
                });

                $(".todo_btn").click(function () {
                    alert("create list");
                });
            </script>
    </x-dashboard-layout>