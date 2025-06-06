<!-- Modal Tambah Pesanan -->
<div id="modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2>Menambahkan Data Pesanan</h2>

<<<<<<< HEAD
        <form action="{{ route('pesan.store') }}" method="POST" enctype="multipart/form-data">
=======
        <form action="{{ route('pesan.store') }}" method="POST">
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

<<<<<<< HEAD
            <label for="deskripsi">Deskripsi </label>
            <input type="text" id="deskripsi" name="deskripsi" required placeholder="Deskripsi Pesanan" value="{{ old('deskripsi') }}">

            <label for="nama_makanan">Nama Makanan</label>
            <input type="text" id="nama_makanan" name="nama_makanan" required placeholder="Nama Makanan" value="{{ old('nama_makanan') }}">

            <label for="untuk_tanggal">Tanggal Pesanan</label>
            <input type="date" id="untuk_tanggal" name="untuk_tanggal" required value="{{ old('untuk_tanggal') }}">
=======
            <label for="deskripsi">Deskrip si </label>
            <input type="text" id="deskripsi" name="deskripsi" required placeholder="Deskripsi Pesanan" value="{{ old('deskripsi') }}">

            <label for="untuk_tanggal">Tanggal Pesanan</label>
            <input type="date" id="untuk_tanggal" name="untuk_tanggal" required value="{{ old('untuk_tanggal') }}">
            <label for="untuk_tanggal">Nama Makanan</label>
            <input type="text" id="untuk_tanggal" name="untuk_tanggal" required placeholder="Nama Makanan"value="{{ old('untuk_tanggal') }}">
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83

            <label for="porsi">Jumlah Porsi</label>
            <input type="number" id="porsi" name="porsi" required placeholder="Jumlah Porsi" value="{{ old('porsi') }}">

<<<<<<< HEAD
            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>

=======
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
            <label for="shift">Shift</label>
            <select id="shift" name="shift" required>
                <option value="">Pilih Shift</option>
                <option value="1" @selected(old('shift') == 1)>Shift 1</option>
                <option value="2" @selected(old('shift') == 2)>Shift 2</option>
                <option value="3" @selected(old('shift') == 3)>Shift 3</option>
            </select>

            <button type="submit">Tambah</button>
        </form>
    </div>
</div>
