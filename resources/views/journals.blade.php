<x-dashboard-layout>
    <div class="container dashboard-container">
        <nav id="bread-crumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Journals</li>
            </ol>
        </nav>

        <div class="px-4">
            <h2 class="mt-12">Journals</h2>

            <div class="description mt-7 mb-0">
                All of your journals are displayed below.<br>
                Click on the journal tag you want to open. <br>
                To create a new journal click the create journal button.
                </span>
            </div>

            <div class="position-relative mb-0 mt-6">
                <div class="position-absolute top-0 end-0">
                    <div class="text-right"> <button type="button" class="btn btn-primary btn-sm"
                            data-bs-toggle="modal" data-bs-target="#createJournalModal">
                            Create Journal
                        </button></div>
                </div>
            </div>
        </div>

        <div class="container px-4 mt-20 ml-0" id="journal-list-container">
            <hr>
            @foreach ($journals as $journal)
                <div class="journal-list-entry" data-id='{{ $journal->id }}' data-title='{{ $journal->name }}'
                    data-description='{{ $journal->description }}'>
                    <div>
                        <div class="p-2 border bg-light d-flex justify-content-between align-items-center text-dark">
                            <a href='/journals/{{ $journal->id }}' class="h5 journal-name"> {{ $journal->name }}</a>
                            <div>
                                <span class="d-none d-md-inline-block mr-2 text-muted text-sm">Created At: 7</span>
                                <span>
                                    <button class="btn btn-sm btn-primary edit-journal-btn" data-bs-toggle="modal"
                                        data-bs-target="#editJournalModal">Edit</button>
                                    <button class="btn btn-sm btn-danger delete-journal-btn" data-bs-toggle="modal"
                                        data-bs-target="#deleteJournalModal">Delete</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal fade" id="createJournalModal" tabindex="-1" aria-labelledby="createJournalModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createJournalModalLabel">Create Journal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label for="journal-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control mb-2" id="journal-name" />
                        </div>
                        <div>
                            <label for="journal-description" class="col-form-label">Description:</label>
                            <textarea class="form-control mb-2" id="journal-description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button id="create-journal-btn" type="button" data-bs-dismiss="modal"
                            class="btn btn-primary btn-sm ">Create</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteJournalModal" tabindex="-1" aria-labelledby="deleteJournalModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Journal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this journal?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" data-bs-dismiss="modal" id="delete-journal-btn"
                            class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editJournalModal" tabindex="-1" aria-labelledby="editJournalModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Journal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label for="edit-journal-name" class="col-form-label">Name:</label>
                            <input id='edit-journal-name' type="text" class="form-control mb-2" name="journal-name" />
                        </div>
                        <div>
                            <label for="edit-journal-description" class="col-form-label">Description:</label>
                            <textarea id='edit-journal-description' class="form-control mb-2" name="journal-description" /></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button id="edit-journal-btn" type="button" data-bs-dismiss="modal"
                            class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
