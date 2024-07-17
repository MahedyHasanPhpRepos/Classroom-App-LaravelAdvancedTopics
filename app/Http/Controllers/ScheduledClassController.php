<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use App\Models\ScheduledClass;
use Illuminate\Http\Request;

class ScheduledClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classList = auth()->user()->scheduledClasses()->where('date_time','>',now())->oldest('date_time')->get() ; 
        // dd($classList) ;
        return view('teacher.upcoming',[
            'classList' => $classList 
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classTypes = ClassType::all();
        return view('teacher.schedule', [
            'classTypes' => $classTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_time = $request->input('date')." ".$request->input('time') ; 

        $data = $request->merge([
            'date_time' => $date_time ,
            'teacher_id' => auth()->id()
        ]);

        $validated = $request->validate([
            'class_type_id' => 'required' ,
            'teacher_id' => 'required' ,
            'date_time' => 'required|unique:scheduled_classes,date_time|after:now' , 
        ]);

        ScheduledClass::create($validated) ; 

        return redirect()->route('schedule.index') ; 

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // dd(auth()->user()->id) ; 
        $class = ScheduledClass::findorFail($id) ; 

        if(auth()->user()->cannot('delete',$class)){
            abort(403) ; 
        }

       

        // if(auth()->user()->id != $class->teacher_id){
        //     abort(403) ; 
        // }

        $class->delete() ; 

        return redirect()->route('schedule.index') ; 
    }
}
