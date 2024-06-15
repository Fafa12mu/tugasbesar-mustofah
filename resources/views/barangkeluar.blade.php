@extends('index')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Keluar</h1>
    </div>

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#adddatabk">
        Tambah Barang Keluar
      </button>
   
    <!-- Content Row -->
    <div class="row">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kasir</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Total</th>
                    <th scope="col">Gambar Barang</th>
                    <th scope="col">Aksi</th>
                  </tr>
            </thead>
            <tbody>
              @foreach ($barang as $no => $brg) 
                <tr>
                    <td>{{ $no +1 }}</td>
                    <td>{{ $brg->created_at}}</td>
                    <td>{{ $brg->kasir}}</td>
                    <td>{{ $brg->kdbk}}</td>
                    <td>{{ $brg->nmbk}}</td>
                    <td>{{ $brg->hbk}}</td>
                    <td>{{ $brg->jbk}}</td>
                    <td>{{ $brg->totalh}}</td>
                    <td><img src="{{ asset('/storage/'.$brg->gbk) }}" alt="{{ $brg->gbk }}" style="width: 100px; height:100px">
                    </td>
                    <td>
                      <a href="/editdatabk" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#editdatabk"><i class="bi bi-pencil-square" ></i></a>
                      <a href="/hapusdbk/{{$brg->id}}" class="btn btn-danger m-2"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="adddatabk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang Keluar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/adddatak" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                      <label class="form-label">Kode Barang</label>
                      <input type="text" class="form-control" id="kdbk" name="kdbk">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nmbk" name="nmbk">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Harga Barang</label>
                        <input type="text" class="form-control" id="hbk" name="hbk">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Jumlah Barang</label>
                        <input type="text" class="form-control" id="jbk" name="jbk">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Kasir</label>
                        <input type="text" class="form-control" id="kasir" name="kasir" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Gambar Barang</label>
                        <input type="file" class="form-control" id="gbk" name="gbk">
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
    <div class="modal fade" id="editdatabk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Penjualan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="/editdatak/{{ $br->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="upkdbk" name="kdbk" value="{{$br->kdbk}}">
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Nama Barang</label>
                      <input type="text" class="form-control" id="upnmbk" name="nmbk" value="{{$br->nmbk}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Harga Barang</label>
                      <input type="text" class="form-control" id="uphbk" name="hbk" value="{{$br->hbk}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Jumlah Barang</label>
                      <input type="text" class="form-control" id="upjbk" name="jbk" value="{{$br->jbk}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Kasir</label>
                      <input type="text" class="form-control" id="upkasir" name="kasir" value="{{$br->kasir}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Gambar Barang</label>
                      <img src="{{ asset('/storage/'.$br->gbk) }}" alt="{{ $br->gbk }}" style="width: 100px; height:100px">
                      <input type="file" class="form-control" id="upgbk" name="gbk" accept="image/*" value="{{$br->gbk}}">
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