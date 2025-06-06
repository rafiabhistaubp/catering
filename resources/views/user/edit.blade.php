<<<<<<< HEAD
<!-- Modal Edit -->
<div id="modalEdit" class="modal" style="display: none;">
    <div class="modal-content">
        <span id="closeEditModal" class="close">&times;</span>
        <h3>Edit Data Karyawan</h3>

        <!-- Form Edit -->
        <form action="" method="POST" id="editForm"> <!-- Action form akan diubah dengan JavaScript -->
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_lengkap">Nama Karyawan</label>
                <input type="text" name="nama_lengkap" id="editNama_lengkap" required>
            </div>

            <div class="form-group">
                <label for="shift">Shift</label>
                <select name="shift" id="editShift" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="username">Email</label>
                <input type="email" name="username" id="editUsername" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="editRole" required>
                    <option value="admin">Admin</option>
                    <option value="karyawan">Karyawan</option>
                    <option value="koki">Koki</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="editJenis_kelamin" required>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="text" name="password" id="editPassword">
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="editPasswordConfirmation">
            </div>

            <button type="submit" class="btn-submit">Update</button>
=======
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
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
        </form>
    </div>
</div>
