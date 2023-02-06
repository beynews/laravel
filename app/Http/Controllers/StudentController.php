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
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul'     => 'required|min:5',
            'number'     => 'required|min:5',
            'nama'     => 'required|min:5',
            'email'   => 'required|min:5',
            'phone'   => 'required|min:5',
        ]);

        $image = $request->file('photo');
        $image->storeAs(config('app.student_images_path'), $image->hashName());

        Student::create([
            'photo'   => $image->hashName(),
            'judul'    => $request->judul,
            'number'  => $request->number,
            'nama'    => $request->nama,
            'email'   => $request->email,
            'phone'   => $request->phone,
        ]);

        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

     public function destroy(Student $student)
    {
        //delete image
        Storage::delete('public/students/'. $student->image);

        //delete post
        $student->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
