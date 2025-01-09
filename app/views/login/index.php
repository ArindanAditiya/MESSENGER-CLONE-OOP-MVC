    <div class="conteiner">
      <div class="left">
        <h1><b>facebook</b></h1>
        <p>Facebook membantu anda menemukan jodoh </p>
      </div>
      <div class="right">
        <form action="" method="post">
          <input name="user" type="text" id="input1" placeholder="Email address or phone number" />
          <input name="password" type="text" id="input2" placeholder="password" />
          <span style="color: red;"><?php if(isset($error)){echo "antum gagal login";}?></span>
          <button name="login" class="LoginBtn" type="submit" >Log in</button>
          <a  class="forget">forgetten password?</a>
          <div class="sign-Up">
            <a type="button" href="<?= BASEURL ;?>signup" class="signupBtn">create New Account</a>
          </div>
        </form>
        <p><b>Create a page </b> for a celebrity.band or business</p>
      </div>
    </div>
