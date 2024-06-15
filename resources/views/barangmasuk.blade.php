@extends('index')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Masuk</h1>
    </div>

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#adddatabm">
        Tambah Barang Masuk
      </button>
   
    <!-- Content Row -->
    <div class="row">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">Penerima</th>
                    <th scope="col">Gambar Barang</th>
                    <th scope="col">Aksi</th>
                  </tr>
            </thead>
            <tbody>
              @foreach ($barang as $no => $brg) 
                <tr>
                    <td>{{ $no +1 }}</td>
                    <td>{{ $brg->created_at}}</td>
                    <td>{{ $brg->kdbm}}</td>
                    <td>{{ $brg->nmbm}}</td>
                    <td>{{ $brg->hbm}}</td>
                    <td>{{ $brg->jbm}}</td>
                    <td>{{ $brg->pengirim}}</td>
                    <td>{{ $brg->penerima}}</td>
                    <td><img src="{{ asset('/storage/'.$brg->gbm) }}" alt="{{ $brg->gbm }}" style="width: 100px; height:100px">
                    </td>
                    <td>
                      <a href="/editdata" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#editdatabm"><i class="bi bi-pencil-square" ></i></a>
                      <a href="/hapusdbm/{{$brg->id}}" class="btn btn-danger m-2"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="adddatabm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Penjualan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/adddata" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                      <label class="form-label">Kode Barang</label>
                      <input type="text" class="form-control" id="kdbm" name="kdbm">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nmbm" name="nmbm">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Harga Barang</label>
                        <input type="text" class="form-control" id="hbm" name="hbm">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Jumlah Barang</label>
                        <input type="text" class="form-control" id="jbm" name="jbm">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Pengirim</label>
                        <input type="text" class="form-control" id="pengirim" name="pengirim">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Penerima</label>
                        <input type="text" class="form-control" id="penerima" name="penerima">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Gambar Barang</label>
                        <input type="file" class="form-control" id="gbm" name="gbm">
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
    
    <div class="modal fade" id="editdatabm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Penjualan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="/editdata/{{ $br->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="upkdbm" name="kdbm" value="{{$br->kdbm}}">
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Nama Barang</label>
                      <input type="text" class="form-control" id="upnmbm" name="nmbm" value="{{$br->nmbm}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Harga Barang</label>
                      <input type="text" class="form-control" id="uphbm" name="hbm" value="{{$br->hbm}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Jumlah Barang</label>
                      <input type="text" class="form-control" id="upjbm" name="jbm" value="{{$br->jbm}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Pengirim</label>
                      <input type="text" class="form-control" id="uppengirim" name="pengirim" value="{{$br->pengirim}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Penerima</label>
                      <input type="text" class="form-control" id="uppenerima" name="penerima" value="{{$br->penerima}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Gambar Barang</label>
                      <img src="{{ asset('/storage/'.$br->gbm) }}" alt="{{ $br->gbm }}" style="width: 100px; height:100px">
                      <input type="file" class="form-control" id="upgbm" name="gbm" accept="image/*" value="{{$br->gbm}}">
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