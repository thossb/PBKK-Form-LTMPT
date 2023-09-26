

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
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
            <form method="POST" action="/form" class="p-5" enctype="multipart/form-data"> 
                @csrf
                <div class="text-center fw-bold mb-5">
                    FORMULIR REGISTRASI SNMPTN
                </div>
                <div class="input-group mt-3">
                    <span class="input-group-text">Nama</span>
                    <input type="text" class="form-control wide-input" placeholder="Masukan Nama" aria-describedby="nama" id="nama" name="nama">
                    @error('nama')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group mt-3">
                    <span class="input-group-text">E-Mail</span>
                    <input type="email" class="form-control wide-input" placeholder="Masukan E-mail" aria-describedby="email" id="email" name="email">
                    @error('email')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group mt-3">
                    <span class="input-group-text">Password</span>
                    <input type="password" class="form-control wide-input" placeholder="Masukan Password" aria-describedby="password" id="password" name="password">
                    @error('password')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group mt-3">
                    <span class="input-group-text">Nilai Rapot</span>
                    <input type="float" class="form-control wide-input" placeholder="Masukan rata-rata rapot" aria-describedby="nilairapot" id="nilairapot" name="nilairapot">
                    @error('nilairapot')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group mt-3">
                    <span class="input-group-text">Nomor Telepon</span>
                    <input type="text" class="form-control wide-input" placeholder="Masukkan Nomor Telepon" aria-describedby="nomor_telepon" id="nomor_telepon" name="nomor_telepon">
                    @error('nomor_telepon')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group mt-3">
                    <span class="input-group-image">Masukan Foto Pribadi ( Maksimal 2 mb)</span>
                    <input type="file" class="form-control wide-input fs-6" accept="image/" id="image" name="image">
                    @error('image')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3">Register!</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>