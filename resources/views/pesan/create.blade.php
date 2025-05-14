<!-- Modal Tambah Pesanan -->
<div id="modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2>Menambahkan Data Pesanan</h2>

        <form action="{{ route('pesan.store') }}" method="POST">
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

            <label for="deskripsi">Deskrip si </label>
            <input type="text" id="deskripsi" name="deskripsi" required placeholder="Deskripsi Pesanan" value="{{ old('deskripsi') }}">

            <label for="untuk_tanggal">Tanggal Pesanan</label>
            <input type="date" id="untuk_tanggal" name="untuk_tanggal" required value="{{ old('untuk_tanggal') }}">
            <label for="untuk_tanggal">Nama Makanan</label>
            <input type="text" id="untuk_tanggal" name="untuk_tanggal" required placeholder="Nama Makanan"value="{{ old('untuk_tanggal') }}">

            <label for="porsi">Jumlah Porsi</label>
            <input type="number" id="porsi" name="porsi" required placeholder="Jumlah Porsi" value="{{ old('porsi') }}">

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
