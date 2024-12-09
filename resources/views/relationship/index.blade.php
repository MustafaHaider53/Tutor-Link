@extends('layouts.main')

@section('title', 'Student and Tutor Data')

@section('content')

    <div class="container mt-5">
        <h2 class="text-center mb-4">Tutor-Student Tuitions</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        
        

        <div class="table-container mx-auto" style="max-width: 90%; width: auto;">
            <table class="table table-sm table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        
                        <th>Tutor Name</th>
                        <th>Tutor Email</th>
                        <th>Subjects Taught</th>
                        <th>Tutor Availability Days</th>
                        <th>Hourly Rate</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Subjects Needed</th>
                        <th>Availability Days</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tuitions as $tuition)
                        <tr>
                            <td>{{ $tuition['id'] }}</td>
                            <td>{{ $tuition['tutor']['name'] }}</td>
                            <td>{{ $tuition['tutor']['email'] }}</td>
                            <td>{{ implode(', ', json_decode($tuition['tutor']['subjects_taught'], true)) }}</td>
                            <td>{{ implode(', ', json_decode($tuition['tutor']['availability_days'])) }}</td>
                            <td>{{ $tuition['tutor']['hourly_rate'] }}</td>
                            <td>{{ $tuition['student']['name'] }}</td>
                            <td>{{ $tuition['student']['email'] }}</td>
                            <td>{{ implode(', ', json_decode($tuition['student']['subjects_needed'])) }}</td>
                            <td>{{ implode(', ', json_decode($tuition['student']['availability_days'])) }}</td>
                            <td>
                                <a href="{{route('relationship.show',$tuition->id)}}" class="btn btn-primary">Show</a>
                                <form action="{{ route('relationship.destroy', $tuition->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
