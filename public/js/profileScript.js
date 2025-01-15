console.log("last version");

document.getElementById("fileInput").addEventListener("change", function (event) {
  const file = event.target.files[0];
  if (file) {
    const allowedFormats = ["image/jpeg", "image/png", "image/jpg"]; // Format yang diperbolehkan
    if (!allowedFormats.includes(file.type)) {
      alert("Hanya file gambar dengan format JPG, JPEG, atau PNG yang diperbolehkan!");
      event.target.value = ""; // Reset input file
      return;
    }

    const reader = new FileReader();
    reader.onload = function (e) {
      const previewImage = document.getElementById("preview");
      previewImage.src = e.target.result;
      previewImage.style.display = "block";
    };
    reader.readAsDataURL(file);
  }
});

// Fungsi untuk mengambil foto (fitur kamera placeholder)
document.getElementById("tbl-foto").addEventListener("click", function () {
  alert("Fitur Ambil Foto dengan kamera web belum tersedia.");
});
