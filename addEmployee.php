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
?>

<!DOCTYPE html>
<html lang="en">
    <?php include "head.php" ?>
<body>
    <div class="form_container">
        <div class="features">
            <form action="" method="POST" enctype="multipart/form-data" class="">
                <p class="title">Upload Employee Image:</p>
                <input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" name="file_upload" id="file_upload">
            </form>
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
            <button class="btn" onclick="addEmployee()">Save</button>
            <button class="btn">Cancel</button>
        </div>
    </div>
    <script>
        const addEmployee = () => {
            // get all the values from input
            const data = {
                img: "",
                age: $("option[value]:checked").val(),
                name: $("#name").val(),
                gender:$('input[name=gender]:checked').val(),
                skills: $('input[name=skill]:checked').map((v, el) => $(el).val()).get(),
                desc: $('#desc').val() 
            };
        }

    </script>
</body>
</html>

