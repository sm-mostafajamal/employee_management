<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>

<body>
  <div class="login_container">
    <h1 class="heading"> Employee Management System</h1>
    <div class="login_wrapper">
      <span class="err" id="usernameErr"></span>
      <input type="text" name="username" id="username" class="login_inp" placeholder="username" required>
      <input type="password" name="password" id="password" class="login_inp" placeholder="new password" required>
      <span class="err" id="passwordErr"></span>
      <input type="password" name="password" id="confirm_password" class="login_inp" placeholder="confirm password" required>
      <button class="btn login_btn" id="login">Login</button>
    </div>
  </div>

  <script>
    $(document).ready(() => {
      $("#login").click(() => {
        const username = $("#username").val();
        const password = $("#password").val();

        // check if input is blank
        if (!username.length) {
          $("#usernameErr").text("Username Required!!!")
        } else if (!password.length) {
          $("#passwordErr").text("Password Required!!!")
        }
        // check password and confirm password matching
        if (password !== $("#confirm_password").val()) {
          return $("#usernameErr").html("<span class='err'>Password is not matching!!!</span>");
        }

        $.ajax({
          url: "update_password.php",
          type: "POST",
          data: {
            username,
            password
          },
          success: (data, status) => {
            window.location = "login_user.php"
          }
        })


      })

    })
  </script>
</body>

</html>