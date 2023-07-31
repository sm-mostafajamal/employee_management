<?php

$id = $_GET["id"];

function setInput($type, $name, $value)
{
  return "<label for=$value>
            <input type=$type name=$name value=$value id=$value>" . ucfirst($value) . "
          </label>";
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>

<body>
  <div class="form_container">
    <h1 class="heading">Update Employee Details</h1>
    <div class="form_wrapper">
      <div class="features left">
        <div id="img_container" onclick="changeImg()">
          <img class="uploaded_img" id="uploaded_img" src="" alt="">
          <span class="upload">Upload</span>
        </div>
        <input type="file" style="display: none;" accept="image/x-png,image/gif,image/jpeg,image/jpg" name="file_upload" id="file_upload" required>
        <span class="err" id="imgErr"></span>
      </div>
      <div class="right">
        <div class="features ">
          <span class="err" id="name"></span>
          <div class="name_wrapper">
            <div>
              <input type="text" name="name" placeholder="Your Full Name" class="fname" id="fname" value="">
            </div>
            <select name="" id="age" class="btn">
              <option disabled selected hidden>Age</option>
              <?php $i = 20;
              while ($i <= 80) : ?>
                <?= "<option value=$i>$i</option>";
                $i++; ?>
              <?php endwhile ?>
            </select>
          </div>
        </div>
        <div class="features gender">
          <p class="title">What is your Gender?</p>
          <span class="err" id="genderErr"></span>
          <div>
            <?php echo setInput("radio", "gender", "male") ?>
            <?php echo setInput("radio", "gender", "female") ?>
            <?php echo setInput("radio", "gender", "other") ?>
          </div>
        </div>
        <p class="title">Skills: </p>
        <span class="err" id="skillsErr"></span>
        <div class="features skills">
          <div>
            <?php echo setInput("checkbox", "skill", "HTML") ?>
            <?php echo setInput("checkbox", "skill", "CSS") ?>
            <?php echo setInput("checkbox", "skill", "JavaScript") ?>
            <?php echo setInput("checkbox", "skill", "React.js") ?>
            <?php echo setInput("checkbox", "skill", "Vue.js") ?>
            <?php echo setInput("checkbox", "skill", "Angular.js") ?>
            <?php echo setInput("checkbox", "skill", "PHP") ?>
          </div>
          <div>
            <?php echo setInput("checkbox", "skill", "Laravel") ?>
            <?php echo setInput("checkbox", "skill", "Node.js") ?>
            <?php echo setInput("checkbox", "skill", "Next.js") ?>
            <?php echo setInput("checkbox", "skill", "Express.js") ?>
            <?php echo setInput("checkbox", "skill", "MongoDB") ?>
            <?php echo setInput("checkbox", "skill", "MySQL") ?>
          </div>
        </div>
        <div class="features">
          <p class="title">Description</p>
          <textarea name="desc" id="desc" cols="30" rows="5"></textarea>
        </div>
        <div class="features">
          <a id="redirect" class="link">
            <input type="submit" onclick="updateUser()" class="btn" name="submit" value="Save">
          </a>
          <a href="index.php" class="link">
            <button class="btn">Cancel</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <script>
    const id = "<?php echo $id;  ?>";
    // getting the default data
    $(document).ready(() => {
      $.ajax({
        url: "get_user.php",
        type: "POST",
        data: {
          id: id,
        },
        success: (data, status) => {
          const {
            id,
            img,
            name,
            age,
            gender,
            skills,
            description
          } =
          JSON.parse(data);

          $("#uploaded_img").attr("src", `uploads/${img}`);
          $("#fname").attr("value", name);
          $(`option[value=${age}]`).prop("selected", true);
          $(`input[value=${gender}]`).prop("checked", true);
          $("#desc").text(description);
          // checkbox to check
          const skills_arr = skills.split(", ");
          skills_arr.forEach((skill) =>
            $(`input[value='${skill}']`).prop("checked", true)
          );
        },
      });
    });

    function changeImg() {
      $("#file_upload").click();
      $("#file_upload").change((e) => {
        e.preventDefault();
        let img = $("#file_upload").prop("files");
        if (img.length > 0) {
          document.getElementById("uploaded_img").src = URL.createObjectURL(img[0]);
        }
      });
    }

    function updateUser() {
      let form_data = new FormData();
      let img = $("#file_upload").prop("files");

      // get all the values from input
      const inputData = JSON.stringify({
        id: id,
        age: $("option[value]:checked").val(),
        name: $("#fname").val(),
        gender: $("input[name=gender]:checked").val(),
        skills: $("input[name=skill]:checked")
          .map((v, el) => $(el).val())
          .get(),
        desc: $("#desc").val(),
      });

      // if image not changed then send default one
      if (img.length > 0) {
        form_data.append("image", img[0]);
        form_data.append("inputData", inputData);
      } else {
        let img_src = $("#uploaded_img").attr("src");
        img_src = img_src.split("/")[1];
        form_data.append("image", img_src);
        form_data.append("inputData", inputData);
      }

      //  checking blank input
      if (!$("#fname").val().length) {
        return $("#name").text("Name is required!!!");
      } else if ($("option[value]:checked").val() === undefined) {
        return $("#name").text("Age is required!!!");
      } else if ($("input[name=gender]:checked").val() === undefined) {
        return $("#genderErr").text("Select gender!!!");
      } else if (
        !$("input[name=skill]:checked")
        .map((v, el) => $(el).val())
        .get().length
      ) {
        return $("#skillsErr").text("Select at least one skill!!!");
      } else {
        return sendUserData(form_data);
      }
    }

    const sendUserData = (data) => {
      $.ajax({
        url: "update.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: (data, status) => {
          window.location = "index.php";
        },
      });
    };
  </script>

</body>

</html>