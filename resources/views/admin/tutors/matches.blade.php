@extends('layouts.main')

@section('title', 'Matches')

@section('content')
    <h1 class="text-center my-4">Student-Tutor Matches</h1>

    @if ($matches && count($matches) > 0)
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Tutor Name</th>
                    <th>Matching Subjects</th>
                    <th>Matching Availability</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($matches as $match)
                    <tr>
                        <td>{{ $match['student']->name }}</td>
                        <td>{{ $match['tutor']->name }}</td>
                        <td>{{ implode(', ', $match['matching_subjects']) }}</td>
                        <td>{{ implode(', ', $match['matching_days']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No matches found!</p>
    @endif
@endsection
