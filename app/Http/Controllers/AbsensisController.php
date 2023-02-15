<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

       
            $students = Student::latest()->paginate($perPage);
      

        return view('absensi', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('absensis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        Absensi::create($requestData);

        return redirect('absensis')->with('flash_message', 'Absensi added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $absensi = Absensi::findOrFail($id);

        return view('absensis.show', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);

        return view('absensis.edit', compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();

        $absensi = Absensi::findOrFail($id);
        $absensi->update($requestData);

        return redirect('absensis')->with('flash_message', 'Absensi updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Absensi::destroy($id);

        return redirect('absensis')->with('flash_message', 'Absensi deleted!');
    }
}
