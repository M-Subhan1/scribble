<x-dashboard-layout current-page="dashboard">

    <div class="container dashboard-container">
        <nav id="bread-crumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <div class="px-4">
            <h2 class="mt-12">Happy Scribbling!!</h2>
            <div class="description mt-7 mb-0">
                Welcome to Scribble.<br>
                All of your journals entries and todo lists can be accessed using the menu of the left.<br>
                You can store and edit journal pages/entries using markdown syntax. This provides a lot of flexibility
                on top of our fast and robust platform<br />
                Similarly, todos are here to your rescue with similar features and provision of a couple views to assist you. 
                <br><br>
                <h4><- Get Started</h4>

                </span>
            </div>
        </div>



        @isset($alert)
            <div class="m-4 position-fixed bottom-0 end-0 toast align-items-center text-white bg-{{ $alert->type }}-dark border-0"
                role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ $alert->message }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endisset
    </div>
</x-dashboard-layout>
