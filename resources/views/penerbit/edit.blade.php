@extends('/layout/dashboard')
@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col mt-4">
      <form action="/penerbit/update/{{ $penerbit->id}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $penerbit->id }}">
        <div class="row">
          <div class="col-5">
            <div class="mb-3">
              <label class="form-label">Nama Penerbit</label>
              <input
                required
                type="string"
                class="form-control"
                name="nama_penerbit"
                autocomplete="off"
                value="{{ $penerbit->nama_penerbit }}"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <input
                required
                type="string"
                class="form-control"
                name="alamat"
                autocomplete="off"
                value="{{ $penerbit->alamat }}"
              />
            </div>
          </div>
        </div>

        <div class="float-start">
          <a href="/penerbit" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
