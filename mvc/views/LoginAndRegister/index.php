<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
 
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?php echo URL  . 'public/style/css/LoginAndRegister.css'; ?>">
  </head>
  <body>
  
    <div class="Login__Register">
      <div class="boxAuth">
        <div class="user signinBox">
          <div class="imgBox"><img src="<?php echo URL . 'public/style/images/bgformauth.jpg'; ?>" /></div>
          <div class="formBox">
            <form method="post" action="<?php echo URL . 'user/login'; ?>">
              <h2>Login</h2>
              <input type="text" name="username" placeholder="Username" />
              <input type="password" name="matkhau" placeholder="Password" />
              <input type="text" name="lct" style="display: none;" value="<?php 
                                                                  if(isset($_SESSION['payment'])){
                                                                    echo "payment";
                                                                    unset($_SESSION['payment']);
                                                                  }
                                                                  else if(isset($_SESSION['admin'])){
                                                                    echo "admin";
                                                                    unset($_SESSION['admin']);
                                                                  }
                                                                  else{
                                                                    echo "home";
                                                                  }
                                                                ?>">
              <p style="margin: 0.5em; color: red;">
                <?php
                  if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                  }
                ?></p>
              <br>
              <input type="submit" value="Login" name="login"/>
              <p class="signup">
                Don't have a account ?
                <a onclick="handleClickAuth()">sign up</a>
              </p>
            </form>
          </div>
        </div>
        <div class="user signupBox">
          <div class="formBox">
            <form  method="post" action="user/register">
              <h2>Create An Account</h2>
              <div class="loan" style="display: flex; align-items: center">
                <input type="text" name="username" placeholder="Username" />
                <span style="margin: 0.5em; color: red; font-size: 0px;" id = "errorUN">!</span>
              </div>
              <div class="loan" style="display: flex; align-items: center">
              <input type="text" name="name" placeholder="name" />
              <span style="margin: 0.5em; color: red; font-size: 0px;" id = "errorN">!</span>
              </div>
              <div class="loan" style="display: flex; align-items: center">
              <input type="email" name="gmail" placeholder="Email" />
              <span style="margin: 0.5em; color: red; font-size: 0px;" id = "errorM">!</span>
              </div>
              <div class="loan" style="display: flex; align-items: center">
              <input type="password" name="password" placeholder="Password" />
              <span style="margin: 0.5em; color: red; font-size: 0px;" id = "errorP">!</span>
              </div>
              <div class="loan" style="display: flex; align-items: center">
              <input type="password" name="again" placeholder="Retype Password" />
              <span style="margin: 0.5em; color: red; font-size: 0px;" id = "errorRP">!</span>
              </div>
              
             
              
              <input type="submit" value="Register" name="register"/>
              <p class="signup">
                Already have a account ?
                <a onclick="handleClickAuth()">sign in</a>
              </p>
            </form>
          </div>
          <div class="imgBox"><img src="<?php echo URL . 'public/style/images/sli1-bg-2.jpg'; ?>" /></div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script >
        function handleClickAuth() {
  var element = document.getElementsByClassName("boxAuth");

  element[0].classList.toggle("active");

}

  

  $("input[name=username]").blur(function() {
    if($(this).val().trim() == ""){
      $("input[name=register]").prop("disabled", true);
      $("#errorUN").css("font-size", "16px");
    }
    else{
      $("input[name=register]").prop("disabled", false);
      $("#errorUN").css("font-size", "0px");
    }

  })

  $("input[name=name]").blur(function() {
    if($(this).val().trim() == ""){
      $("input[name=register]").prop("disabled", true);
      $("#errorN").css("font-size", "16px");
    }
    else{
      $("input[name=register]").prop("disabled", false);
      $("#errorN").css("font-size", "0px");
    }

  })
  $("input[name=gmail]").blur(function() {
    if($(this).val().trim() == "" || !validateEmail($(this).val().trim())){
      $("input[name=register]").prop("disabled", true);
      $("#errorM").css("font-size", "16px");
    }
    else{
      $("input[name=register]").prop("disabled", false);
      $("#errorM").css("font-size", "0px");
    }
  })
  $("input[name=password]").blur(function() {
    if($(this).val().trim() == ""){
      $("input[name=register]").prop("disabled", true);
      $("#errorP").css("font-size", "16px");
    }
    else{
      $("input[name=register]").prop("disabled", false);
      $("#errorP").css("font-size", "0px");
    }

  })

  $("input[name=again]").blur(function() {
    if($(this).val().trim() != $("input[name=password]").val().trim()) {
      $("input[name=register]").prop("disabled", true);
      $("#errorRP").css("font-size", "16px");
    }
    else{
      $("input[name=register]").prop("disabled", false);
      $("#errorRP").css("font-size", "0px");
    }

  })

  function validateEmail(email) {
                const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
                
            }
    </script>
  </body>
</html>
