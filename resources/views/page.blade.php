<x-dashboard-layout>
    Test Page

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
</x-dashboard-layout>