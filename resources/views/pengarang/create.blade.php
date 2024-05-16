@extends('/layout/dashboard')
@section('content')
<div class="container mt-3">
  <div class="row ">
    <div class="col-md-8 mt-4"> <!-- Mengatur lebar kolom untuk form -->
      <form action="/pengarang/store" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6"> <!-- Mengatur lebar kolom untuk input -->
            <div class="mb-3">
              <label class="form-label">Nama Pengarang</label>
              <input
                required
                type="string"
                class="form-control"
                name="nama_pengarang"
                autocomplete="off"
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
              />
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
