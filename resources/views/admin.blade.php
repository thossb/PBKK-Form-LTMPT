<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        /* Ganti tinggi header sesuai kebutuhan */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 80px; /* Ganti tinggi header sesuai kebutuhan */
            background-color: #013880;
            z-index: 1000; /* Gunakan z-index yang sesuai */
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header img {
            max-height: 100%;
            max-width: 100%;
        }

        .main-content {
            margin-top: 80px; /* Sesuaikan dengan tinggi header */
            width: 100%; /* Ganti lebar sesuai kebutuhan */
        }

        .wide-input {
            width: 100%; /* Make the input fields 100% wide */
        }

        /* Center the content */
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Center vertically */
        }

        /* Floating Box Style */
        .floating-box {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.2);
        }

        /* Style for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Style for buttons */
        .btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .btn.edit {
            background-color: #28a745;
        }

        .btn.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<h1 class="header">Admin Page</h1>

<div class="container main-content center-content" style="margin-top: 750px;">
    <div class="floating-box" width="500">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nilai Rapot</th>
                    <th>Nomor Telepon</th>
                    <th>Foto Pribadi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->nilairapot }}</td>
                    <td>{{ $student->nomor_telepon }}</td>
                    <td>
                        @if($student->image)
                            <img src="{{ asset('storage/images/'.$student->image) }}" alt="Photo" width="100">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.edit', ['id' => $student->id]) }}" class="btn edit">Edit</a>
                        <form action="{{ route('admin.delete', ['id' => $student->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
