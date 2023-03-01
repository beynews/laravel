<?php

namespace App\Http\Controllers;


use App\Models\Quizzes;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $quizzes = Quizzes::where('question', 'LIKE', "%$keyword%")
                ->orWhere('answer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quizzes = Quizzes::latest()->paginate($perPage);
        }
        return view('quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        Quizzes::create($requestData);

        return redirect('quizzes')->with('flash_message', 'Quizzes added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $quizzes = Quizzes::findOrFail($id);

        return view('quizzes.show', compact('quizzes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $quizzes = Quizzes::find($id);
    return view('quizzes.edit', compact('quizzes'));
}

public function update(Request $request, $id)
{
    $requestData = $request->all();

    $quizzes = Quizzes::find($id);
    $quizzes->update($requestData);

    return redirect('quizzes')->with('flash_message', 'Quizzes updated!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    Quizzes::find($id)->delete();

    return redirect('quizzes')->with('flash_message', 'Quizzes deleted!');
}

}
