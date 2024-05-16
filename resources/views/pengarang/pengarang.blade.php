@extends('layout/dashboard')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Pengarang table</h6>
            <a class="btn btn-outline-primary btn-sm mb-3 me-3" href="{{ ('/pengarang/create') }}">Tambah Pengarang</a>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pengarang</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $data->nama_pengarang }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $data->alamat }}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <a href="/pengarang/edit/{{$data->id}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit kategori">
                            Edit
                        </a>
                        <span class="text-secondary font-weight-bold text-xs"> | </span>
                        <a href="/pengarang/hapus/{{$data->id}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete kategori">
                            Hapus
                        </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
