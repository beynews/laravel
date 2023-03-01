@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">

          <div class="col-md-9">
        <div class="card">
            <div class="card-header">Kuis</div>
            <div class="card-body">
                <a href="{{ url('/quizzes/create') }}" class="btn btn-success btn-sm" title="Tambah Kuis Baru">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Baru
                </a>

                <form method="GET" action="{{ url('/quizzes') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Cari..." value="{{ request('search') }}">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <br />
                <br />
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban_1</th>
                                <th>Jawaban_2</th>
                                <th>Jawaban_3</th>
                                <th>Jawaban_4</th>
                                 <th>Jawaban_Benar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quizzes as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->question }}</td>
                                <td>{{ $item->answer_1 }}</td>
                                <td>{{ $item->answer_2 }}</td>
                                <td>{{ $item->answer_3 }}</td>
                                <td>{{ $item->answer_4 }}</td>
                                   <td>{{ $item->jawaban_benar }}</td>

                                <td>
                                    <a href="{{ url('/quizzes/' . $item->id) }}" title="Lihat Kuis"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</button></a>
                                    <a href="{{ url('/quizzes/' . $item->id . '/edit') }}" title="Edit Kuis"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                    <form method="POST" action="{{ url('/quizzes' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus Kuis" onclick="return confirm('Anda yakin ingin menghapus kuis ini?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $quizzes->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>

</div>
@endsection