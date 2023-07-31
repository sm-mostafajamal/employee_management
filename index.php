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
            $("#search").keyup((e) => {
                // console.log(e.currentTarget.value);
                $.ajax({
                    url: "search_result.php",
                    type: "POST",
                    data: {
                        q: e.currentTarget.value
                    },
                    success: (data) => {
                        $("#table_container").html(data);
                    }
                })
            })
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
                type: "POST",
                data: {
                    id: id
                },
                success: (data, status) => {
                    displayData();
                }
            })
        }

        // function updateUser(id) {
        //     $.ajax({
        //         url: "update.php",
        //         type: "POST",
        //         data: {
        //             id: id
        //         },
        //         success: (data, status) => {
        //             // displayData();
        //             console.log(data);
        //         }
        //     })
        // }
    </script>
</body>

</html>