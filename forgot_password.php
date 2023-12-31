<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>

<body>
  <div class="login_container">
    <h1 class="heading"> Employee Management System</h1>
    <div class="login_wrapper">
      <span class="err" id="usernameErr"></span>
      <input type="password" name="old_password" id="old_password" class="login_inp" placeholder="old password" required>
      <span class="err" id="passwordErr"></span>
      <input type="password" name="password" id="password" class="login_inp" placeholder="new password" required>
      <input type="password" name="password" id="confirm_password" class="login_inp" placeholder="confirm password" required>
      <button class="btn login_btn" id="login">Confirm</button>
    </div>
  </div>

  <script>
    $(document).ready(() => {
      $("#login").click(() => {
        const old_password = $("#old_password").val();
        const new_password = $("#password").val();

        // check if input is blank
        if (!old_password.length) {
          return $("#usernameErr").text("Input your old password!!!")
        } else if (!new_password.length) {
          return $("#passwordErr").text("Password Required!!!")
        } else if (new_password.length < 4) {
          return $("#passwordErr").text("Password Minimum length should be 4!!!")
        }
        // check password and confirm password matching
        if (new_password !== $("#confirm_password").val()) {
          return $("#usernameErr").html("<span class='err'>Password is not matching!!!</span>");
        } else if (new_password == old_password) {
          return $("#usernameErr").html("<span class='err'>Please set new password!!!</span>");
        }

        $.ajax({
          url: "update_password.php",
          type: "POST",
          data: {
            old_password,
            new_password
          },
          success: (data, status) => {
            // window.location = "login_user.php"
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