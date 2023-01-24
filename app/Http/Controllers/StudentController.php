<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get student
        $students = Student::latest()->paginate(5);

        //render view with students
        return view('students.index', compact('students'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul'     => 'required|min:5',
            'number'     => 'required|min:5',
            'nama'     => 'required|min:5',
            'email'   => 'required|min:5',
            'phone'   => 'required|min:5'
        ]);

        //upload image
        $image = $request->file('photo');
        $image->storeAs('public/students', $image->hashName());

        //create post
        Student::create([
                'photo'   => $image->hashName(),
                'judul'    => $request->judul,
                'number'  => $request->number,
                'nama'    => $request->nama,
                'email'   => $request->email,
                'phone'   => $request->phone,
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * edit
     *
     * @param  mixed $student
     * @return void
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $student
     * @return void
     */
    public function update(Request $request, Student $student)
    {
        //validate form
        $this->validate($request, [

            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul'     => 'required|min:5',
            'number'     => 'required|min:5',
            'nama'     => 'required|min:5',
            'email'   => 'required|min:5',
            'phone'   => 'required|min:5'
        ]);

        //check if image is uploaded
        if ($request->hasFile('photo')) {

            //upload new image
            $image = $request->file('photo');
            $image->storeAs('public/students', $image->hashName());

            //delete old image
            Storage::delete('public/students/'.$student->image);

            //update post with new image
            $student->update([
               'photo'   => $image->hashName(),
                'judul'    => $request->judul,
                'number'  => $request->number,
                'nama'    => $request->nama,
                'email'   => $request->email,
                'phone'   => $request->phone
               
            ]);

        } else {

            //update post without image
            $student->update([
                'photo'   => $image->hashName(),
                'judul'   => $request->judul,
                'number'  => $request->number,
                'nama'    => $request->nama,
                'email'   => $request->email,
                'phone'   => $request->phone
               
            ]);
        }

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
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
