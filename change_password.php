<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>

<body>
  <div class="login_container">
    <h1 class="heading"> Employee Management System</h1>
    <div class="login_wrapper">
      <span class="err" id="usernameErr"></span>
      <input type="text" name="username" id="username" class="login_inp" placeholder="username">
      <span class="err" id="passwordErr"></span>
      <input type="password" name="password" id="password" class="login_inp" placeholder="new password">
      <input type="password" name="password" id="confirm_password" class="login_inp" placeholder="confirm password" required>
      <button class="btn login_btn" id="login">Confirm</button>
    </div>
  </div>

  <script>
    $(document).ready(() => {
      $("#login").click(() => {
        const username = $("#username").val();
        const password = $("#password").val();

        // check if input is blank
        if (!username.length) {
          return $("#usernameErr").text("Username Required!!!")
        } else if (!password.length) {
          return $("#passwordErr").text("Password Required!!!")
        } else if (password.length < 4) {
          return $("#passwordErr").text("Password Minimum length should be 4!!!")
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
            console.log(data);
            if (data === 'success') {
              window.location = "login_user.php"
            } else {
              $("#usernameErr").text("Wrong Credentials!!!")
            }
          }
        })


      })

    })
  </script>
</body>

</html>