<x-dashboard-layout>
    <div class="container dashboard-container" id="page" data-journal-id='{{ $journal->id }}'>
        <div class="px-4">
            <h2 class="mt-12">{{ $journal->name }}</h2>

            <div class="description mt-7 mb-0">
                {{ $journal->description }}
                </span>
            </div>

            <div class="position-relative mb-0 mt-6">
                <div class="position-absolute top-0 end-0">
                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm todo_btn"
                            data-bs-toggle="modal" data-bs-target="#createPageModal">Create Entry</button></div>
                </div>
            </div>
        </div>

        <div class="container px-4 mt-20 ml-0">
            <hr>
            <div class="row" id="pages-container">
                @foreach ($journal->pages as $page)
                    <div class="page-list-entry" data-page-id='{{ $page->id }}'
                        data-identifier='{{ $page->identifier }}'>
                        <div>
                            <div class="p-2 border bg-light d-flex justify-content-between align-items-center">
                                <a href='/journals/{{ $journal->id }}/{{ $page->id }}' class="h5 page-name">
                                    {{ $page->identifier }}</a>
                                <div>
                                    <span class="d-none d-md-inline-block mr-2 text-muted text-sm">Created At: 7</span>
                                    <span>
                                        <button class="btn btn-sm btn-primary edit-page-btn" data-bs-toggle="modal"
                                            data-bs-target="#editPageModal">Edit</button>
                                        <button class="btn btn-sm btn-danger delete-page-btn" data-bs-toggle="modal"
                                            data-bs-target="#deletePageModal">Delete</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="modal fade" id="createPageModal" tabindex="-1" aria-labelledby="createPageModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPageModalLabel">Add Entry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label for="page-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control mb-2" id="page-name" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button id="create-page-btn" type="button" data-bs-dismiss="modal"
                            class="btn btn-primary btn-sm ">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deletePageModal" tabindex="-1" aria-labelledby="deletePageModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Page</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this journal?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" data-bs-dismiss="modal" id="delete-page-btn"
                            class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editPageModal" tabindex="-1" aria-labelledby="editPageModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Page</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label for="edit-page-name" class="col-form-label">Name:</label>
                            <input id='edit-page-name' type="text" class="form-control mb-2" name="journal-name" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button id="edit-page-btn" type="button" data-bs-dismiss="modal"
                            class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </div>
</x-dashboard-layout>
