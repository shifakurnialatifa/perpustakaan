@extends('/layout/dashboard')
@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col mt-4">
      <form action="/kategori/update/{{ $kategori->id}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $kategori->id }}">
        <div class="row">
          <div class="col-5">
            <div class="mb-3">
              <label class="form-label">Nama Kategori</label>
              <input
                required
                type="string"
                class="form-control"
                name="nama_kategori"
                autocomplete="off"
                value="{{ $kategori->nama_kategori }}"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">deskripsi</label>
              <input
                required
                type="string"
                class="form-control"
                name="deskripsi"
                autocomplete="off"
                value="{{ $kategori->deskripsi }}"
              />
            </div>
          </div>
        </div>

        <div class="float-start">
          <a href="/kategori" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
