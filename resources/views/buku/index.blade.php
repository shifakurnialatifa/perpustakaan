<!-- resources/views/buku/index.blade.php -->

<h1>Daftar Buku</h1>

<a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>

<table class="table">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($buku as $buku)
            <tr>
                <td>{{ $buku->title }}</td>
                <td>{{ $buku->author }}</td>
                <td>{{ $buku->description }}</td>
                <td>
                    <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('buku.destroy', $book->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

