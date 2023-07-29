<?php include "head.php" ?>

<?php 
// class for all form features
class EmployeeFeatures {


    function __construct() {

    }
    function getInput($type, $name, $value) {
        return "
         <label for=$value>
            <input type=$type name=$name value=$value>".ucfirst($value)."
        </label>
        ";
    }
}

$features = new EmployeeFeatures();

?>

    <form action="" class="form_container">
        <input type="text" name="name" placeholder="Full Name" class="text_box">
        <select name="" id="age" >
            <option disabled selected hidden>Age</option>
            <option value="1">1</option>
        </select>
        <div>
            <p>What is your Gender?</p>
            <?php echo $features->getInput("radio", "gender", "male" ) ?>
            <?php echo $features->getInput("radio", "gender", "female" ) ?>
            <?php echo $features->getInput("radio", "gender", "other" ) ?>
             <!-- <label for="male">
                <input type="radio" name="gender" value="male">Male
            </label>
            <label for="female">
                <input type="radio" name="gender" value="female">Female
            </label>
            <label for="other">
                <input type="radio" name="gender" value="other">Other
            </label> -->
        </div>
        <div id="skills">
            <p>Skills: </p>
            <?php echo $features->getInput("checkbox", "html", "HTML" ) ?>
            <?php echo $features->getInput("checkbox", "css", "CSS" ) ?>
            <?php echo $features->getInput("checkbox", "javascript", "javascript" ) ?>
            <?php echo $features->getInput("checkbox", "react", "react.js" ) ?>
            <?php echo $features->getInput("checkbox", "vue", "vue.js" ) ?>
            <?php echo $features->getInput("checkbox", "angular", "angular.js" ) ?>
            <?php echo $features->getInput("checkbox", "php", "php" ) ?>
            <?php echo $features->getInput("checkbox", "laravel", "laravel" ) ?>
            <?php echo $features->getInput("checkbox", "node", "node.js" ) ?>
            <?php echo $features->getInput("checkbox", "next", "next.js" ) ?>
            <?php echo $features->getInput("checkbox", "express", "express.js" ) ?>
            <?php echo $features->getInput("checkbox", "mongodb", "mongoDB" ) ?>
            <?php echo $features->getInput("checkbox", "mysql", "mySQL" ) ?>
    
            <!-- <label for="html">
                <input type="checkbox" name="html">
                HTML
            </label>
            <label for="css">
                <input type="checkbox" name="css">
                CSS
            </label>
            <label for="javascript">
                <input type="checkbox" name="javascript">
                JavaScript
            </label>
            <label for="react">
                <input type="checkbox" name="react">
                React.js
            </label>
            <label for="vue">
                <input type="checkbox" name="vue">
                Vue.js
            </label>
            <label for="angular">
                <input type="checkbox" name="angular">
                Angular.js
            </label>
            <label for="php">
                <input type="checkbox" name="php">
                PHP
            </label>
            <label for="laravel">
                <input type="checkbox" name="laravel">
                Laravel
            </label>
            <label for="node">
                <input type="checkbox" name="node">
                Node.js
            </label>
            <label for="next">
                <input type="checkbox" name="next">
                Next.js
            </label>
            <label for="express">
                <input type="checkbox" name="express">
                Express.js
            </label>
            <label for="mongodb">
                <input type="checkbox" name="mongodb">
                MongoDB
            </label>
            <label for="mysql">
                <input type="checkbox" name="mysql"> 
                MySQL
            </label> -->
        </div>
        <div>
            <textarea name="" id="" cols="80" rows="10">Description</textarea>
        </div>
    </form>
</body>
</html>

