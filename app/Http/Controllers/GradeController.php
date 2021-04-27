<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Lecture;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grading.index', ['lectures' => Lecture::orderBy('name')->get(), 'students' => Student::orderBy('surname')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'grade' => 'required|gte:1|lte:10',
        ]);
        if ($request['grade'] > 10 || $request['grade'] < 1) {
            return redirect()->route('grades.index')->with('status_error', 'Failed to add the grade. Grade must be > 0 and < 11.');
        }
        if (!is_numeric($request['grade'])) {
            return redirect()->route('grades.index')->with('status_error', 'Failed to add the grade. Input must be a number.');
        }
        $grade = new Grade();
        $grade->fill($request->all());
        $grade->save();
        return redirect()->route('grades.index')->with('status_success', 'Grade added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $this->validate($request, [
            'upd_grade' => 'required|gte:1|lte:10',
        ]);
        if ($request['upd_grade'] > 10 || $request['upd_grade'] < 1) {
            return redirect()->back()->with('status_error', 'Failed to add grade. Grade must be > 0 and < 11');
        }
        if (!is_numeric($request['upd_grade'])) {
            return redirect()->back()->with('status_error', 'Failed to update grade. Input must be a number.');
        }
        $grade->grade = $request['upd_grade'];
        $grade->save();
        return redirect('/students/' . $grade->student_id)->with('status_success', 'Grade updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->back();
    }
}
