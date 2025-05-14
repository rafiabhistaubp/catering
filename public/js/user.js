document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modal");
    const openModalButton = document.getElementById("openModal");
    const closeModalButton = document.getElementById("closeModal");

    // Buka modal jika ada query ?openModal=1
    const params = new URLSearchParams(window.location.search);
    if (params.get('openModal') === '1') {
        modal.style.display = "flex";

        // Hapus query dari URL tanpa reload
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    // Klik tombol "+" → buka modal
    if (openModalButton) {
        openModalButton.onclick = function () {
            modal.style.display = "flex";
        }
    }

    // Klik tombol "×" → tutup modal
    if (closeModalButton) {
        closeModalButton.onclick = function () {
            modal.style.display = "none";
        }
    }

    // Klik area luar modal → tutup modal
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
});
