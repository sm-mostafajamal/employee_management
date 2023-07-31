<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>

<body>
  <div class="login_container">
    <h1 class="heading"> Employee Management System</h1>
    <div class="login_wrapper">
      <h3> Log In</h3>
      <span class="err" id="usernameErr"></span>
      <input type="text" name="username" id="username" class="login_inp" placeholder="username" required>
      <span class="err" id="passwordErr"></span>
      <input type="password" name="password" id="password" class="login_inp" placeholder="password" required>
      <button class="btn login_btn" id="login">Login</button>
    </div>
  </div>

  <script>
    $(document).ready(() => {
      $("#login").click(() => {
        const username = $("#username").val();
        const password = $("#password").val();

        if (!username.length) {
          $("#usernameErr").text("Username Required!!!")
        } else if (!password.length) {
          $("#passwordErr").text("Password Required!!!")

        }
        $.ajax({
          url: "login.php",
          type: "POST",
          data: {
            username,
            password
          },
          success: (data, status) => {
            if (data === "login") {
              window.location = "index.php";
            } else {
              $("#usernameErr").html(data);

            }
          }
        })

      })

    })
  </script>
</body>

</html>