document.getElementById("fileInput").addEventListener("change", function (event) {
  const file = event.target.files[0];
  if (file) {
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
