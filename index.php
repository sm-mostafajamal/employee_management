<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>

<body class="home_container">
    <h1 class="heading">Employee Management System</h1>
    <div class="top">
        <input type="text" name="search" id="search" class="text_box" placeholder="Search..." />
        <a href="create_employee.php">
            <button class="btn">Add Employee</button>
        </a>
    </div>
    <div id="table_container"></div>

    <script>
        $(document).ready(() => {
            displayData();
        })

        function displayData() {
            $.ajax({
                url: "get_all.php",
                type: "POST",
                success: (data, status) => {
                    $("#table_container").html(data)
                }
            })
        }

        function deleteUser(id) {
            $.ajax({
                url: "delete.php",
                method: "POST",
                data: {
                    id: id
                },
                success: (data, status) => {
                    displayData();
                }
            })
        }
    </script>
</body>

</html>