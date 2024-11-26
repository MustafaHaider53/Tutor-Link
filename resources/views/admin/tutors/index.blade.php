@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Tutors</h1>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.tutors.create') }}" class="btn btn-primary mb-3">Add New Tutor</a>

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
                @foreach($tutors as $tutor)
                    <tr>
                        <td>{{ $tutor->name }}</td>
                        <td>{{ $tutor->email }}</td>
                        <td>{{ $tutor->phone }}</td>
                        <td>
                            <a href="{{ route('admin.tutors.edit', $tutor->id) }}" class="btn btn-warning">Edit</a>
                            
                            <form action="{{ route('admin.tutors.destroy', $tutor->id) }}" method="POST" style="display: inline-block;">
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
@endsection
