<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Pencarian</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .card-img-top {
            object-fit: cover;
            height: 200px;
            border-top-left-radius: calc(0.25rem - 1px);
            border-top-right-radius: calc(0.25rem - 1px);
        }
        .card {
            border: 1px solid #007bff;
            border-radius: 15px;
            overflow: hidden;
        }
        .card-title {
            font-size: 1.1rem;
            font-weight: bold;
        }
        .card-body h5 {
            margin-bottom: 0.5rem;
        }
        .card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform: translateY(-5px);
            transition: all 0.3s;
        }
        .card-header, .card-footer {
            background-color: #007bff;
            color: white;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-4 bg-info text-center text-white">
                <h1>Hasil Pencarian Barang</h1>
                <p class="lead">Menampilkan hasil pencarian barang yang Anda cari</p>
                <!-- Form Pencarian -->
                <form action="/actsearch" method="GET" class="form-inline justify-content-center">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="q" class="form-control bg-light border-0 small" placeholder="Cari barang..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i> Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($data as $br)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header text-center">
                                    <h5>{{$br->namabrg}}</h5>
                                </div>
                                <img src="{{ asset('/storage'.$br->gmbrbarang) }}" alt="Gambar Barang" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">Kode Barang: {{$br->kdbarang}}</h5>
                                    <h5 class="card-title">Harga: {{$br->hrgbrg}}</h5>
                                    <h5 class="card-title">Stok: {{$br->stckbrg}}</h5>
                                </div>
                                <div class="card-footer text-center">
                                    <small class="text-muted">Masih ada</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDzwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

