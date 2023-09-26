<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    
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
            width: 1000%; /* Ganti lebar sesuai kebutuhan */
            margin-left: auto;
            margin-right: auto;
        }

        .wide-input {
            width: 100%; /* Make the input fields 100% wide */
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" width="200">
    </div>

    <div class="container main-content" width="200">
        <div class="position-absolute top-50 start-50 translate-middle bg-white text-dark rounded" style="box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.2);">
            <form method="POST" action="{{ route('admin.edit', $student->id) }}" class="p-5">
                @csrf
                @method('PUT')

                <div class="text-center fw-bold mb-5">
                    Edit Student
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $student->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nilairapot" class="form-label">Nilai Rapot:</label>
                    <input type="number" class="form-control" id="nilairapot" name="nilairapot" value="{{ old('nilairapot', $student->nilairapot) }}" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                    <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $student->nomor_telepon) }}" required>
                </div>

                <!-- You can add more input fields for other columns if needed -->

                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
