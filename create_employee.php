<?php
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
        <h1 class="heading">Employee Details</h1>
        <div class="form_wrapper">
            <div class="features left">
                <div id="img_container" onclick="changeImg()">
                    <img class="uploaded_img" id="uploaded_img" src="data:image/jpeg;base64,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" alt="">
                    <span class="upload">Upload</span>
                </div>
                <input type="file" style="display: none;" accept="image/x-png,image/gif,image/jpeg,image/jpg" name="file_upload" id="file_upload" required>
                <span class="err" id="imgErr"></span>
                </for>
            </div>
            <div class="right">
                <div class="features ">
                    <span class="err" id="name"></span>
                    <div class="name_wrapper">
                        <div>
                            <input type="text" name="name" placeholder="Your Full Name" class="fname" id="fname">
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
                        <input type="submit" onclick="createUser()" class="btn" name="submit" value="Save">
                    </a>
                    <a href="index.php" class="link">
                        <button class="btn">Cancel</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/handleInputs.js" type="text/javascript"></script>

</body>

</html>