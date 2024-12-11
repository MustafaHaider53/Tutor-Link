@if($tutors->isEmpty())
    <p>No tutors found.</p>
@else
    <ul class="list-group">
        @foreach($tutors as $tutor)
            <li class="list-group-item">
                <strong>{{ $tutor->name }}</strong> ({{ $tutor->email }})
            </li>
        @endforeach
    </ul>
@endif