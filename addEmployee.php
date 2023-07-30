<?php 
    // class for all form features
    class EmployeeFeatures {
 
        function setInput($type, $name, $value) {
            return "
            <label for=$value>
                <input type=$type name=$name value=$value>$value
            </label>
            ";
        }
    }
    $features = new EmployeeFeatures();

    // echo $_POST["upload"];

?>

<!DOCTYPE html>
<html lang="en">
    <?php include "head.php" ?>
<body>
    <div class="form_container">
        <div class="features">
            <!-- <form  method="POST" action="insert.php" enctype="multipart/form-data" class=""> -->
            <div id="img_container" onclick="changeImg()">
                <img class="uploaded_img" id="uploaded_img" src="data:image/jpeg;base64,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" alt="">
                <span class="upload">Upload</span>
            </div>
            <p id="err"></p>
            <input type="file" style="display: none;" accept="image/x-png,image/gif,image/jpeg,image/jpg" name="file_upload" id="file_upload">
            <!-- </form> -->
        </div>
        <div class="features">
            <input type="text" name="name" placeholder="Your Full Name" class="text_box" id="name">
            <select name="" id="age" class="btn" >
                <option disabled selected hidden>Age</option>
                <?php $i = 20; while($i <=80): ?>
                    <?= "<option value=$i>$i</option>"; $i++; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="features">
            <p class="title">What is your Gender?</p>
            <?php echo $features->setInput("radio", "gender", "male" ) ?>
            <?php echo $features->setInput("radio", "gender", "female" ) ?>
            <?php echo $features->setInput("radio", "gender", "other" ) ?>
        </div>
        <p class="title">Skills: </p>
        <div class="features skills">
            <div>
                <?php echo $features->setInput("checkbox", "skill", "HTML" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "CSS" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "JavaScript" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "React.js" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "Vue.js" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "Angular.js" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "PHP" ) ?>
            </div>
            <div>
                <?php echo $features->setInput("checkbox", "skill", "Laravel" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "Node.js" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "Next.js" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "Express.js" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "MongoDB" ) ?>
                <?php echo $features->setInput("checkbox", "skill", "MySQL" ) ?>
            </div>
        </div>
        <div class="features">
            <p class="title">Description</p>
            <textarea name="desc" id="desc" cols="70" rows="10"></textarea>
        </div>
        <div class="features">
            <input type="submit" onclick="addEmployee()" class="btn" name="submit" value="Save">
            <!-- <button class="btn" >Save</button> -->
            <button class="btn">Cancel</button>
        </div>
    </div>

    <script>
        function changeImg() {
            $("#file_upload").click();
             $("#file_upload").change((e) => {
                e.preventDefault()
                let img = $("#file_upload").prop("files");
                if(img.length > 0) {
                    document.getElementById("uploaded_img").src = URL.createObjectURL(img[0])
                    $("#err").hide()
                }else {
                    alert("err")
                    $("#err").text("Please select an image to upload!!!")
                }
            })
        };
        const addEmployee = () => {
            let img = $("#file_upload").prop("files");
            if(img.length > 0) {
                $("#err").hide()
                // get all the values from input
                let form_data = new FormData() 
                
                const inputData = JSON.stringify({
                    age: $("option[value]:checked").val(),
                    name: $("#name").val(),
                    gender:$('input[name=gender]:checked').val(),
                    skills: $('input[name=skill]:checked').map((v, el) => $(el).val()).get(),
                    desc: $('#desc').val() 
                });

                form_data.append('image', img[0]);
                form_data.append("inputData", inputData);

                $.ajax({
                url: "insert.php",
                type: "POST",
                data: form_data,
                contentType: false,
                processData: false,
                success: (data, status) => {
                    console.log(data);
                }
                });

            }else {
                $("#err").text("Please select an image to upload!!!")
            }

           
        };
    </script>

</body>
</html>

