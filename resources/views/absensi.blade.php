@extends('layouts.admin')

@section('content')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        /* Styling for the table */
        .table {
            font-size: 1rem;
            margin-top: 2rem;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table th {
            font-weight: 600;
        }

        .table td {
            font-weight: 500;
        }

        /* Styling for the radio buttons and text fields */
        input[type="radio"] {
            margin-right: 0.5rem;
        }

        input[type="text"] {
            border: 2px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.5rem;
            width: 100%;
        }

        /* Styling for the submit button */
        button[type="submit"] {
            margin-top: 2rem;
        }
    </style>

</head>

<body>

    <h1>Form Absensi Programmer </h1>
    <form method="POST" action="{{route('absensis.store')}}">
        @csrf
        <select name="" id="">
            @foreach($schedule as $sch)
            <option value="{{$sch->id}}">{{$sch->note}}</option>
        @endforeach
      </select>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Kehadiran</th>
                    <th scope="col">Catatan</th>
                </tr>
            </thead>
            <tbody id="tbody">
                @foreach($students as $key => $student)
                <tr>
                    <td>{{$key+1}}</td>
                <td>{{$student['name']}}</td>
                <td>{{$student['class']}}</td>
                <td>
                    <input type="radio" name="absensi[{{$student->id}}]" value="hadir"> Hadir
                    <input type="radio" name="absensi[{{$student->id}}]" value="sakit"> Sakit
                    <input type="radio" name="absensi[{{$student->id}}]" value="alfa"> Alfa
                    <input type="radio" name="absensi[{{$student->id}}]" value="izin"> Izin
                </td>
                <td>
                    <input type="text" name="catatan[{{$student->id}}]">
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>

@endsection