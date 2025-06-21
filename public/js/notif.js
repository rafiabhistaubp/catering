// resources/js/notif.js
if (window.successMessage) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: window.successMessage,
        showConfirmButton: false,
        timer: 3000, // Menampilkan selama 3 detik
        willClose: () => {
            // Notifikasi akan otomatis hilang setelah 3 detik
        }
    });
}
