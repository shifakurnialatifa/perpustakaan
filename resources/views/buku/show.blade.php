<!-- resources/views/buku/show.blade.php -->

<h1>Detail Buku</h1>

<p><strong>Judul:</strong> {{ $buku->title }}</p>
<p><strong>Penulis:</strong> {{ $buku->author }}</p>
<p><strong>Deskripsi:</strong> {{ $buku->description }}</p>

<a href="{{ route('buku.index') }}" class="btn btn-primary">Kembali</a>
