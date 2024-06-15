@extends('index')
@section('content')
<div class="container mt-5 d-flex justify-content-center" style="margin-top: 100px;">
    <div class="card shadow-lg" style="width: 400px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Perbarui Kata Sandi</h4>
        </div>
        <div class="card-body">
            @if(session('info'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('info')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="/updateuser" method="post">
                @csrf
                <div class="form-group">
                    <label for="password_baru">Kata Sandi Baru</label>
                    <input type="password" id="password_baru" name="password_baru" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="konfirmasi_password">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="form-control" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Perbarui Kata Sandi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
