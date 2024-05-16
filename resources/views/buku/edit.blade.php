<!-- resources/views/buku/edit.blade.php -->

<h1>Edit Buku</h1>

<form action="{{ route('buku.update', $buku->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $buku->title }}" required>
    </div>
    <div class="form-group">
        <label for="author">Penulis</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ $buku->author }}" required>
    </div>
    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea class="form-control" id="description" name="description">{{ $buku->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
