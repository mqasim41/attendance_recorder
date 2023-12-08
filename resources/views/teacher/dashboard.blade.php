@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold">Teacher Dashboard</h2>

        @php
            $classesName = [1 => 'Web Engineering', 2 => 'Software Construction', 3 => 'Embedded Systems', 4 => 'Cloud Computing', 5 => 'Technical And Business Writing', 6 => 'Intro To Management'];
        @endphp

        @if(count($classesTaught) > 0)
            <form id="dropdownForm" class='mb-4' action="{{ route('student.dropdown') }}" method="post">
                @csrf
                <label for="dropdown" class="block text-sm font-medium text-gray-600">Select an option:</label>
                <select id="dropdown" name="selected_option" onchange="document.getElementById('dropdownForm').submit()" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    <!-- Default value when the page is loaded -->

                    <!-- Other options go here -->
                    @foreach($classesTaught as $class)
                        <option value="{{ $class->id }}">{{ $classesName[$class->id] }}</option>
                    @endforeach
                </select>
            </form>

            <form id="saveAttendanceForm" method="post" action="{{ route('teacher.saveAttendance') }}">
                @csrf

                <div id="attendanceContainer" class="mt-4">
                    @foreach($studentAttendances as $studentAttendance)
                        <div class="bg-white rounded-md shadow-md p-4 mb-4">
                            <div class="flex items-center">
                                <div class="w-1/4">{{ $studentAttendance->student->name }}</div>
                                <div class="w-1/4 {{ $studentAttendance->isPresent ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $studentAttendance->isPresent ? 'Present' : 'Absent' }}
                                </div>
                                <div class="w-1/4">Start Time: {{ $studentAttendance->class->starttime }}</div>
                                <div class="w-1/4">End Time: {{ $studentAttendance->class->endtime }}</div>
                                <div class="w-1/4">
                                    <input type="hidden" name="attendances[{{ $studentAttendance->studentid }}][classid]" value="{{ $studentAttendance->classid }}">
                                    <input type="checkbox" name="attendances[{{ $studentAttendance->studentid }}][isPresent]" value="{{ 1 }}" {{ $studentAttendance->isPresent ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="p-2 bg-blue-500 text-white rounded mt-4">Save Attendance</button>
            </form>
        @else
            <p>No classes available for this teacher.</p>
        @endif
    </div>
@endsection
