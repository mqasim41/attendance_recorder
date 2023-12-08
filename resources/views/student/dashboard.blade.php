<!-- resources/views/student/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg p-6 shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Student Dashboard</h2>
        <form id="dropdownForm" class='mb-4' action="{{ route('student.dropdown') }}" method="post">
            @csrf
            <label for="dropdown" class="block text-sm font-medium text-gray-600">Select an option:</label>
            <select id="dropdown" name="selected_option" onchange="document.getElementById('dropdownForm').submit()" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
            @php
            $classesName = [1 => 'Web Engineering', 2 => 'Software Construction', 3 => 'Embedded Systems', 4 => 'Cloud Computing', 5 => 'Technical And Business Writing', 6 => 'Intro To Management'];
            @endphp

                <!-- Default value when the page is loaded -->
                <option value="{{ $selectedOption }}" selected disabled>{{ $classesName[$selectedOption] }}</option>
                <!-- Other options go here -->
                @foreach($classes as $class)
                
                    <option value="{{ $class->id }}">{{ $classesName[$class->id] }}</option>
                
            @endforeach
            </select>
        </form>
        @if(count($attendances) > 0)
            <div class="grid grid-cols-3 gap-4">
                @foreach($attendances as $attendance)
                    <div class="border border-gray-300 p-4 rounded-md">
                        <p class="text-lg font-semibold mb-2">Class: {{ $classesName[$attendance->classid] }}</p>
                        <p class="text-gray-700 mb-1">Is Present: {{ $attendance->isPresent ? 'Yes' : 'No' }}</p>
                        <p class="text-gray-700 mb-1">Start Time: {{ $attendance->class->starttime }}</p>
                        <p class="text-gray-700 mb-1">End Time: {{ $attendance->class->endtime }}</p>
                        <p class="text-gray-700">Comments: {{ $attendance->comments }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">No attendance records available.</p>
        @endif
    </div>
@endsection
