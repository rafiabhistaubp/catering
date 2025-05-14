<!-- Modal Karyawan -->
<div id="modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2 id="modal-title">Edit Data Karyawan</h2>

        <!-- Form modal yang bisa digunakan untuk tambah atau edit -->
        <form id="modal-form" method="POST" onsubmit="event.preventDefault(); editUser();">
            @csrf
            @method('PUT') <!-- Default method untuk form tambah -->

            <input type="hidden" id="user_id" name="user_id">

            <label for="nama">Nama Karyawan</label>
            <input type="text" id="nama" name="nama_lengkap" required placeholder="Nama Karyawan" value="{{ old('nama_lengkap') }}">

            <label for="shift">Jam Kerja (Shift)</label>
            <select id="shift" name="shift" required>
                <option value="">Pilih Shift</option>
                <option value="1" @selected(old('shift') == 1)>Shift 1</option>
                <option value="2" @selected(old('shift') == 2)>Shift 2</option>
                <option value="3" @selected(old('shift') == 3)>Shift 3</option>
            </select>

            <label for="email">Email Karyawan</label>
            <input type="email" id="email" name="username" required placeholder="Email Karyawan" value="{{ old('username') }}">

            <label for="no_hp">No Hp</label>
            <input type="tel" id="no_hp" name="no_hp" required placeholder="No HP" pattern="[0-9]{8,15}" value="{{ old('no_hp') }}">

            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="">Pilih Role</option>
                <option value="admin" @selected(old('role') == 'admin')>Admin</option>
                <option value="karyawan" @selected(old('role') == 'karyawan')>Karyawan</option>
                <option value="koki" @selected(old('role') == 'koki')>Koki</option>
            </select>

            <p class="text-muted small mt-2">🔒 Password default adalah sama dengan No HP</p>

            <button type="submit" id="submit-button">Simpan</button>
        </form>
    </div>
</div>
