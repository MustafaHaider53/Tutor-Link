@extends('layouts.main')

@section('content')

    <div class="container">
        <h1>Tutors</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex flex-row-reverse p-2">
            <input type="text" class="form-control" id="student-search" placeholder="Search by name or email">
        </div>
        <div id="student-results" class="row mt-0">
            <!-- Results will be displayed here dynamically -->
            
        </div>

        <a href="{{ route('admin.tutors.create') }}" class="btn btn-primary mb-3">Add New Tutor</a>

        <form action="{{ route('relationship.store') }}" method="POST" style="display: inline-block;">
            @csrf
            <button type="submit" class="btn btn-primary">Display Relationship</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tutors as $tutor)
                    <tr>
                        <td>{{ $tutor->name }}</td>
                        <td>{{ $tutor->email }}</td>
                        <td>{{ $tutor->phone }}</td>
                        <td>
                            <a href="{{ route('admin.tutors.edit', $tutor->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.tutors.show', $tutor->id) }}" class="btn btn-warning">Show</a>

                            <form action="{{ route('admin.tutors.destroy', $tutor->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#student-search').on('keyup', function() {
                    let query = $(this).val();
                    if (query.length > 0) {
                        // Perform the AJAX request
                        $.ajax({
                            url: '{{ route('admin.tutors.search') }}',
                            method: 'GET',
                            data: {
                                query: query
                            },
                            success: function(response) {
                                // Update the results section with the response
                                $('#student-results').html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    } else {
                        $('#student-results').empty();
                    }
                });
            });
        </script>
    @endpush

@endsection
