    <form method="post" action="<?= BASEURL ;?>Signup/index">
      <div class="title">
        <h2>Buat Akun Baru</h2>
        <p class="title-p">ini cepat dan mudah.</p>
      </div>
      <div class="row">
        <input value="Arindan" required name="nama_depan" class="name-input" type="text" placeholder="Nama Depan" />
        <input value="Aditiya" required name="nama_belakang" class="name-input" type="text" placeholder="Nama Belakang" />
      </div>
      <input value="085221978481" required name="nomor_wa" type="text" placeholder="Nomor Whatsapp" />
      <span style='color: red;'><?=  $data["wa_vall_value"] ;?></span>
      <input value="indangaming003@gmail.com" required name="email" type="email" placeholder="Email" />
      <span style='color: red;'><?= $data["email_vall_value"] ;?></span>
      <input value="qwerty" required name="kata_sandi" type="password" placeholder="Kata Sandi baru" />
      <span>Tanggal Lahir <a href="https://id-id.facebook.com/help" target="_blank">?</a></span>
      <div class="row">
        <select name="tanggal" id="">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        </select>
        <select name="bulan" id="">
          <option value="Januari">Jan</option>
          <option value="Februari">Feb</option>
          <option value="Maret">Mar</option>
          <option value="April">Apr</option>
          <option value="Mei">Mei</option>
          <option value="Juni">Jun</option>
          <option value="Juli">Jul</option>
          <option value="Agustus">Agu</option>
          <option value="September">Sep</option>
          <option value="Oktober">Okt</option>
          <option value="November">Nov</option>
          <option value="Desember">Des</option>
        </select>
        <select name="tahun" id="">
          <option value="2000">2000</option>
          <option value="2001">2001</option>
          <option value="2002">2002</option>
          <option value="2003">2003</option>
          <option value="2004">2004</option>
          <option value="2005">2005</option>
          <option value="2006">2006</option>
          <option value="2007">2007</option>
          <option value="2008">2008</option>
          <option value="2009">2009</option>
          <option value="2010">2010</option>
          <option value="2011">2011</option>
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
        </select>
      </div>
      <span style='color: red;'><?= $data["born_vall_value"] ;?></span>
      <span>Jenis Kelamin <a href="https://id-id.facebook.com/help" target="_blank">?</a></span>
      <div class="row">
        <div class="gander-div">
          <label for="Perempuan">Perempuan</label>
          <input required name="kelamin" id="perempuan" type="radio" value="Perempuan" />
        </div>
        <div class="gander-div">
          <label for="laki-laki">Laki-laki</label>
          <input required checked name="kelamin" id="laki-laki" type="radio" value="laki-laki" />
        </div>
        <div class="gander-div">
          <label for="Khusus">Khusus</label>
          <input required name="kelamin" id="Khusus" type="radio" value="Khusus" />
        </div>
        
      </div>
      <p class="small-p">Orang yang menggunakan layanan kamu dapat mengunggah informasi kontak anda ke Facebook <a href="https://web.facebook.com/help/637205020878504">Pelajarai Selengkapnya</a></p>

      <p class="small-p">
        Dengan mengklcik daftar. Anda dapat menyetujui <a href="https://web.facebook.com/legal/terms/update">ketentuan</a>, <a href="https://web.facebook.com/about/privacy/update">Kebijakan Privasi</a> dan
        <a href="https://web.facebook.com/policies/cookies/">Kebijakan cookie</a> kami. Anda menerima notifikasi SMS dari kami dan bisa berhenti kapan saja
      </p>

      <button name="submit" class="sign-Up">daftar</button>

      <a class="lempar" class="" href="<?= BASEURL ;?>login">Sudah Punya Akun?</a>
    </form>