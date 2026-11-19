<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa - XI PPLG 1</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f4f6f9; }
        .box { background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input, select, textarea { width: 100%; padding: 8px; margin: 5px 0 12px; box-sizing: border-box; }
        button { background: #2563eb; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; }
        .btn-hapus { background: #dc2626; padding: 5px 10px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #2563eb; color: white; }
    </style>
</head>
<body>

    <div class="box">
        <h3>Tambah Data Siswa</h3>
        @if(session('sukses'))
            <p style="color: green;"><b>{{ session('sukses') }}</b></p>
        @endif

        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf
            <label>NIS</label>
            <input type="text" name="nis" required>

            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>

            <label>Kelas</label>
            <input type="text" name="kelas" value="XI PPLG 1" required>

            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label>Alamat</label>
            <textarea name="alamat" rows="2"></textarea>

            <button type="submit">Simpan Data</button>
        </form>
    </div>

    <div class="box">
        <h3>Daftar Siswa</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswas as $no => $s)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->kelas }}</td>
                    <td>{{ $s->jenis_kelamin }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>
                        <form action="{{ route('siswa.destroy', $s->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
