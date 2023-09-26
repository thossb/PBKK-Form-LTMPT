<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5025211048 Form</title>
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
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" width="200">
    </div>

    <div class="container main-content center-content">
        <div class="floating-box" width="500">
            <div class="row">
                <!-- Image Column -->
                <div class="col-md-6">
                    @foreach($results as $key => $result)
                        @if($loop->last)
                            <img src="{{ asset('storage/images/'.$result) }}" style="height: 300px; width: 200px">
                        @endif
                    @endforeach
                </div>

                <!-- Data Column -->
                <div class="col-md-6">
                    @foreach($results as $key => $result)
                        @if(!$loop->last)
                            <div class="p-1">
                                <strong>{{ $key }}:</strong> {{ $result }}
                            </div>
                        @endif
                    @endforeach

                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
