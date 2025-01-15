<div class="container">
      <h1 class="title">Selamat datang di Facebook, <?=  $data["user_name"] ;?></h1>
      <div class="upload-section">
        <form action="" method="">
        <div class="profile-preview">
            </form>
            <p>Unggah foto profil</p>
            <div class="photo-placeholder">
              <img id="preview" src="" alt="Preview Foto" />
            </div>
          </div>
          <div class="buttons">
            <label class="btn green">
            <i class="fa-regular fa-image"></i> Tambahkan Foto
              <input type="file" id="fileInput" style="display: none" />
            </label>
            <span class="atau">ATAU</span>
            <span id="tbl-foto">Ambil Foto</span>
            <small>Dengan kamera web Anda</small>
          <button name="submit" type="submit" class="submit">selanjutnya</button>
          </div>
        </form>
      </div>
    </div>