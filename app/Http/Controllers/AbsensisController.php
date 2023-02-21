<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
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
        $schedule = Schedule::all();

        return view('absensi', compact(['students', 'schedule']));
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
        // Mengambil inputan dari form
        $inputAbsensi = $request->input('absensi');
        $inputCatatan = $request->input('catatan');
        $schedule_id = $request->input('schedule_id');

        // Menyimpan data ke database
        foreach ($inputAbsensi as $key => $value) {
            $absensi = new Absensi;
            $absensi->student_name = $key;
            $absensi->status = $value;
            $absensi->note = $inputCatatan[$key];
            $absensi->schedule_id = $schedule_id;
            $absensi->save();
        }

        // Redirect ke halaman sukses
        return redirect()->route('absensis.success');
    }

    /**
     * Display a success message after submitting absensi.
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        return view('absensi-success');
    }
}
