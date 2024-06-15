@extends('index')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Barang
      </button>

    <!-- Content Row -->
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Stock Barang</th>
                    <th scope="col">Gambar Barang</th>
                    <th scope="col">Aksi</th>
                  </tr>
            </thead>
            <tbody>
              @foreach ($barang as $no => $brg) 
                <tr>
                    <td>{{ $no +1 }}</td>
                    <td>{{ $brg->kdbarang}}</td>
                    <td>{{ $brg->namabrg}}</td>
                    <td>{{ $brg->hrgbrg}}</td>
                    <td>{{ $brg->stckbrg}}</td>
                    <td><img src="{{ asset('/storage/'.$brg->gmbrbarang) }}" alt="{{ $brg->gmbrbarang }}" style="width: 100px; height:100px">
                    </td>
                    <td>
                      <a href="/edit" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil-square" ></i></a>
                      <a href="/hapus/{{$brg->id}}" class="btn btn-danger m-2"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tambahdata" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                      <label class="form-label">Kode Barang</label>
                      <input type="text" class="form-control" id="addkdbarang" name="kdbarang">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="addnmbarang" name="namabrg">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Harga Barang</label>
                        <input type="text" class="form-control" id="addhargabarang" name="hrgbrg">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Stock Barang</label>
                        <input type="text" class="form-control" id="stckbrg" name="stckbrg">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Gambar Barang</label>
                        <input type="file" class="form-control" id="gmbrbarang" name="gmbrbarang">
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
            </div>
        </div>
        </div>
    </div>
@foreach ($barang as $br)
    
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="/updatedata/{{ $br->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="addkdbarang" name="kdbarang" value="{{$br->kdbarang}}">
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Nama Barang</label>
                      <input type="text" class="form-control" id="addnmbarang" name="namabrg" value="{{$br->namabrg}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Harga Barang</label>
                      <input type="text" class="form-control" id="addhargabarang" name="hrgbrg" value="{{$br->hrgbrg}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Stock Barang</label>
                      <input type="text" class="form-control" id="stckbrg" name="stckbrg" value="{{$br->stckbrg}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label"></label>
                      <img src="{{ asset('/storage/'.$br->gmbrbarang) }}" alt="{{ $br->gmbrbarang }}" style="width: 100px; height:100px">
                      <input type="file" class="form-control" id="gmbrbarang" name="gmbrbarang" accept="image/*" value="{{$br->gmbrbarang}}">
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
          </div>
      </div>
      </div>
  </div>
  @endforeach

@endsection