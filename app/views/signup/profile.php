<div class="container">
      <h1 class="title">Selamat datang di Facebook, <?=  $data["registering_user_name"] ;?></h1>
      <form action="uploadProfileImg" method="post" enctype="multipart/form-data">
      <div class="upload-section">
        <div class="profile-preview">
            <p>Unggah foto profil</p>
            <div class="photo-placeholder">
              <img id="preview" src="" alt="Preview Foto" />
            </div>
          </div>
          <div class="buttons">
            <label class="btn green">
            <i class="fa-regular fa-image"></i> Tambahkan Foto
              <input name="imgUploading" type="file" id="fileInput" style="display: none" />
            </label>
            <span class="atau">ATAU</span>
            <span id="tbl-foto">Ambil Foto</span>
            <small>Dengan kamera web Anda</small>
          <button name="submit" type="submit" class="submit">selanjutnya</button>
          </div>
        </div>
      </form>
    </div>