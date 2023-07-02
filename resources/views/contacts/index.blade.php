@extends('layouts.main')
@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title m-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="m-0">All Contacts</h4>
                                <div class="m-0">
                                    <a href="{{ route('contacts.create') }}" class="btn btn-success">
                                        <i class="bi bi-plus-square"></i> Add New
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @includeif('contacts._filter')
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Actions</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @forelse($contacts as $key => $contact)
                                            @includeif('contacts._contact')
                                        @empty
                                            @includeif('contacts._empty')
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $contacts->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
