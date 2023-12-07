<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
{
    $studentId = Auth::id();
    $attendances = Attendance::where('studentid', $studentId)->get();
    if ($attendances->isEmpty()) {
        
        return view('student.dashboard', compact('attendances'));
    }
    $selectedOption = $attendances->first()->classid;
    $classIds = $attendances->pluck('classid')->unique()->toArray();
    $classes = Classes::whereIn('id', $classIds)->get();
    $attendances = Attendance::where('studentid', $studentId)
        ->where('classid', $selectedOption)
        ->get();

    return view('student.dashboard', compact('attendances', 'selectedOption', 'classes'));
}


    public function onDashboardChange(Request $request)
    {
       
        $selectedOption = $request->input('selected_option');
        $studentId = Auth::id();
        $attendances = Attendance::where('studentid', $studentId)->get();
        $classIds = $attendances->pluck('classid')->unique()->toArray();
        $classes = Classes::whereIn('id', $classIds)->get();
        $attendances = Attendance::where('studentid', $studentId)
        ->where('classid',$selectedOption)->get();
        return view('student.dashboard', compact('attendances', 'selectedOption', 'classes'));
    }
}

