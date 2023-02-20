<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        /* style untuk judul form */
        h1 {
            text-align: center;
            font-weight: bold;
            margin-top: 40px;
        }

        /* style untuk tabel */
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        /* style untuk header tabel */
        thead {
            background-color: green;
            color: #fff;
        }

        /* style untuk baris tabel */
        tbody tr {
            border-bottom: 1px solid #ddd;
        }

        /* style untuk kolom tabel */
        td,
        th {
            padding: 10px;
            text-align: center;
        }

        /* style untuk input radio */
        input[type="radio"] {
            margin-right: 10px;
        }

        /* style untuk input text */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>Form Absensi</h1>
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
                    <input type="radio" name="absensi_{{$key}}" value="hadir"> Hadir
                    <input type="radio" name="absensi_{{$key}}" value="sakit"> Sakit
                    <input type="radio" name="absensi_{{$key}}" value="alfa"> Alfa
                    <input type="radio" name="absensi_{{$key}}" value="izin"> Izin
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>