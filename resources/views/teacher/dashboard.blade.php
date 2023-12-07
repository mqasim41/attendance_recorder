<!-- resources/views/teacher/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Teacher Dashboard</h2>

        @if(count($classes) > 0)
            @foreach($classes as $class)
                <h3>Class ID: {{ $class->id }}</h3>

                @if(count($attendances[$class->id]) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Is Present</th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances[$class->id] as $attendance)
                                <tr>
                                    <td>{{ $attendance->studentid }}</td>
                                    <td>{{ $attendance->isPresent ? 'Present' : 'Absent' }}</td>
                                    <td>{{ $attendance->comments }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No attendance records available for this class.</p>
                @endif
            @endforeach
        @else
            <p>No classes available for this teacher.</p>
        @endif
    </div>
@endsection
