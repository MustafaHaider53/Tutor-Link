
@extends('layouts.main')

@section('title', 'Tuition Listings')

@section('content')
    <h1 class = 'custom-list-h1'>Tuition Listings</h1>

    

    <div class="tutor-listings custom-list">
        <table class="tutor-table custom-table">
            <thead>
                <tr class="table-header">
                    <th class="table-header-cell">Name</th>
                    <th class="table-header-cell">Email</th>
                    <th class="table-header-cell">Phone</th>
                    <th class="table-header-cell">Subjects</th>
                    <th class="table-header-cell">Availability</th>
                    <th class="table-header-cell">Hourly Rate</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tutors as $tutor)
                    <tr class="tutor-row">
                        <td class="table-cell">{{ $tutor->name }}</td>
                        <td class="table-cell">{{ $tutor->email }}</td>
                        <td class="table-cell">{{ $tutor->phone }}</td>
                        <td class="table-cell">{{ $tutor->subjects_taught }}</td>
                        <td class="table-cell">{{ $tutor->availability_days}}</td>
                        <!-- <td class="table-cell">{{ implode(', ', json_decode($tutor->subjects_taught, true) ?? []) }}</td>
                        <td class="table-cell">{{ implode(', ', json_decode($tutor->availability_days, true) ?? []) }}</td> -->
                         <td class="table-cell">{{ $tutor->hourly_rate }}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


