    <div class="conteiner">
      <div class="left">
        <h1><b>facebook</b></h1>
        <p>Facebook membantu anda menemukan jodoh </p>
      </div>
      <div class="right">
        <form action="index" method="post">
          <input value="+6285221978481" name="user" autocomplete="off" type="text" id="input1" placeholder="Email address or phone number" />
          <input value="qwerty" name="password" autocomplete="off" type="text" id="input2" placeholder="password" />
          <span style="color: red;"><?= $data["login_faild_messege"] ;?></span><br>
          <button name="login" class="LoginBtn" type="submit" >Log in</button>
          <a  class="forget">forgetten password?</a>
          <div class="sign-Up">
            <a type="button" href="<?= BASEURL ;?>signup" class="signupBtn">create New Account</a>
          </div>
        </form>
        <p><b>Create a page </b> for a celebrity.band or business</p>
      </div>
    </div>
