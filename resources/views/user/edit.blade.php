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
        </form>
    </div>
</div>
