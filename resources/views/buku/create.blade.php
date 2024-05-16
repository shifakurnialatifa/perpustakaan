@extends('/layout/dashboard')
@section('content')
<div class="container mt-3">
  <div class="row justify-content-center"> <!-- Mengatur semua kolom menjadi di tengah -->
    <div class="col-md-8 mt-4"> <!-- Mengatur lebar kolom untuk form -->
      <form action="/buku/store" method="POST" enctype="multipart/form-data" class="d-flex flex-column"> <!-- Tambahkan kelas d-flex dan flex-column untuk mengatur tata letak -->
        @csrf
        <div class="row">
          <div class="col-md-6"> <!-- Mengatur lebar kolom untuk input -->
            <div class="mb-3">
              <label class="form-label">Cover</label>
              <input
                required
                type="file"
                class="form-control"
                name="image"
                autocomplete="off"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Judul</label>
              <input
                required
                type="text"
                class="form-control"
                name="judul"
                autocomplete="off"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Tahun Terbit</label>
              <input
                required
                type="date"
                class="form-control"
                name="tahun_terbit"
                autocomplete="off"
              />
            </div>
          </div>
          <div class="col-md-6"> <!-- Mengatur lebar kolom untuk input -->
            <div class="mb-3">
              <label class="form-label">Penerbit</label>
              <select name="penerbit" class="form-select" aria-label="Default select example">
                @foreach ($penerbit as $p)
                <option value="{{$p->id}}">{{$p->nama_penerbit}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Pengarang</label>
              <select name="pengarang" class="form-select" aria-label="Default select example">
                @foreach ($pengarang as $p)
                <option value="{{$p->id}}">{{$p->nama_pengarang}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Jumlah</label>
              <input
                required
                type="number"
                class="form-control"
                name="jumlah"
                autocomplete="off"
              />
            </div>
          </div>
        </div>

        <div class="float-start">
          <a href="/buku" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
