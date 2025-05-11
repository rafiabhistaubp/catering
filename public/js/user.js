// Get modal and buttons
const modal = document.getElementById("modal");
const openModalButton = document.getElementById("openModal");
const closeModalButton = document.getElementById("closeModal");

// Ensure the button triggers the modal to open
openModalButton.onclick = function () {
    modal.style.display = "flex";  // Open the modal
}

// Ensure the close button works to hide the modal
closeModalButton.onclick = function () {
    modal.style.display = "none";  // Close the modal
}

// Close the modal if clicked outside the modal content area
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";  // Close the modal if the background is clicked
    }
}
