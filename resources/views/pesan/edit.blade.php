<!-- Modal Edit Pesanan -->
<div id="modalEdit" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" id="closeEditModal">&times;</span>
        <h2>Edit Data Pesanan</h2>

        <!-- Form Edit -->
        <form action="{{ route('pesan.update', ':id') }}" method="POST" enctype="multipart/form-data" id="editForm">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label for="deskripsi">Deskripsi</label>
            <input type="text" id="editDeskripsi" name="deskripsi" required placeholder="Deskripsi Pesanan" value="{{ old('deskripsi') }}">

            <label for="nama_makanan">Nama Makanan</label>
            <input type="text" id="editNama_makanan" name="nama_makanan" required placeholder="Nama Makanan" value="{{ old('nama_makanan') }}">

            <label for="untuk_tanggal">Tanggal Pesanan</label>
            <input type="date" id="editUntuk_tanggal" name="untuk_tanggal" required value="{{ old('untuk_tanggal') }}">

            <label for="porsi">Jumlah Porsi</label>
            <input type="number" id="editPorsi" name="porsi" required placeholder="Jumlah Porsi" value="{{ old('porsi') }}">

            <label for="foto">Foto</label>
            <input type="file" id="editFoto" name="foto" accept="image/*">

            <label for="shift">Shift</label>
            <select id="editShift" name="shift" required>
                <option value="">Pilih Shift</option>
                <option value="1" @selected(old('shift') == 1)>Shift 1</option>
                <option value="2" @selected(old('shift') == 2)>Shift 2</option>
                <option value="3" @selected(old('shift') == 3)>Shift 3</option>
            </select>

            <button type="submit">Update</button>
        </form>
    </div>
</div>
