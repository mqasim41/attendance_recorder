<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\Classes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function dashboard(){

        $teacherId = Auth::id();
        $currentTime = Carbon::now();

        // Retrieve classes that bound the current time
        $classesTaught = Classes::where('teacherid', auth()->user()->id)->get();
        $studentAttendances = Attendance::where('classid', $classesTaught->first()->id)->get();
        return view('teacher.dashboard', compact('classesTaught','studentAttendances'));

    }
    
    public function saveAttendance(Request $request)
    {
      

        $attendances = $request->input('attendances');

        
        foreach ($attendances as $studentId => $attendanceData) {
            $classId = $attendanceData['classid'];
            $isPresent = $attendanceData['isPresent'] ?? 0;
            
            

            $attendance = Attendance::where('classid', $classId)
            ->where('studentid', $studentId)
            ->first(); 
            if ($attendance) {
                $attendance->isPresent = $isPresent;
                $attendance->save();
            }else {
                Attendance::create([
                    'classid' => $classId,
                    'studentid' => $studentId,
                    'isPresent' => $isPresent,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Attendance saved successfully!');
    }
}
