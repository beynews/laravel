<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Show the list of students.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form to create a student.
     *
     * @return \Illuminate\View\View
     */
    public function createForm()
    {
        return view('students.create');
    }

    /**
     * Store the data of a new student.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeData(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|min:5',
            'email'   => 'required|min:5',
            
        ]);

        Student::create([
            'name'    => $request->name,
            'email'   => $request->email,
           
        ]);

        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

     public function destroy(Student $student)
    {
        //delete image
        Storage::delete('public/students/'. $student->photo);

        //delete post
        $student->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
