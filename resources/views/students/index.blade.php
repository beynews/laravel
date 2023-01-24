@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link href="style.css" rel="stylesheet">

</head>


<body>

  <main>

    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
          </svg>
          <span class="fs-4">Simple header</span>
        </a>

        <ul class="nav nav-pills">
          <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link">About</a></li>
        </ul>
      </header>
    </div>

    <div class="container">

      <h2>Students Data</h2>
      <a href="{{ route('students.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">PHOTO</th>
            <th scope="col">JUDUL</th>
            <th scope="col">NUMBER</th>
            <th scope="col">NAMA</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PHONE</th>
            <th scope="col">AKSI</th>
          </tr>
        </thead>
        <tbody>
          <!-- https://laravel.com/docs/9.x/blade -->
          @foreach($students as $student)

          <tr>
            <td>
              <img src="{{ Storage::url('public/students/').$student->photo }}" class="rounded" style="width: 100px">
            </td>
            <td>{{ $student->judul }}</td>
            <td>{{ $student->number }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('students.destroy', $student->id) }}" method="POST">
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
              </form>
            </td>
          </tr>


          @endforeach

        </tbody>
      </table>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>

@stop