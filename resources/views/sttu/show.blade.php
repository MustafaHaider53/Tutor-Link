@extends('layouts.main')

@section('title', 'Student and Tutor Data')


@section('content')


    <div class="container mt-5">
        <h2 class="text-center">Tutor-Student tuitions</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Tutor Name</th>
                    <th>Tutor Email</th>
                    <th>Subjects Taught</th>
                    <th>Tutor Avalibility days</th>
                    <th>Hourly Rate</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Subjects Needed</th>
                    <th> Avalibility days</th>

                </tr>
            </thead>
            <tbody>

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



                    </tr>

            </tbody>
        </table>
    </div>
@endsection
