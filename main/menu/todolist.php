<?php
    session_start();
    include('../config.php');

    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if(!isset($_SESSION['id_khachhang'])) {
        header("Location: index.php?quanly=dangnhap");
        exit();
    }

    // Thêm công việc
    if(isset($_POST['add_task'])) {
        $nhiemvu = $_POST['nhiemvu'];
        $id_khachhang = $_SESSION['id_khachhang'];
        $sql_add = "INSERT INTO tbl_todolist (id_khachhang, nhiemvu) VALUES ('$id_khachhang', '$nhiemvu')";
        mysqli_query($mysqli, $sql_add);
    }
    // Xóa công việc
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql_delete = "DELETE FROM tbl_todolist WHERE id='$id'";
        mysqli_query($mysqli, $sql_delete);
    }
    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $sql_edit = "SELECT * FROM tbl_todolist WHERE id='$id'";
        $edit_result = mysqli_query($mysqli, $sql_edit);
        $task_data = mysqli_fetch_assoc($edit_result);
    }
    
    // Cập nhật công việc
    if(isset($_POST['update_task'])) {
        $id = $_POST['id'];
        $nhiemvu = $_POST['nhiemvu'];
        $sql_update = "UPDATE tbl_todolist SET nhiemvu='$nhiemvu' WHERE id='$id'";
        mysqli_query($mysqli, $sql_update);
        header("Location: todolist.php");
    }

    // Lấy danh sách công việc
    $id_khachhang = $_SESSION['id_khachhang'];
    $sql_select = "SELECT * FROM tbl_todolist WHERE id_khachhang='$id_khachhang'";
    $result = mysqli_query($mysqli, $sql_select);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container h2 {
            text-align: center;
        }
        .task-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .task-list {
            list-style-type: none;
            padding: 0;
        }
        .task-list li {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .task-list a {
            color: red;
            text-decoration: none;
        }
    </style>
    </head>
    <body>

    <div class="container">
    <a href="../suaThongTin.php">Sửa thông tin người dùng</a>
        <h2>To-Do List</h2>
        <form action="" method="POST">
            <input type="text" name="nhiemvu" class="task-input" placeholder="Thêm công việc mới" required>
            <input type="submit" name="add_task" value="Thêm">
        </form>
        <?php if(isset($task_data)): ?>
        <h3>Sửa công việc</h3>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $task_data['id']; ?>">
            <input type="text" name="nhiemvu" class="task-input" value="<?php echo htmlspecialchars($task_data['nhiemvu']); ?>" required>
            <input type="submit" name="update_task" value="Cập nhật">
        </form>
        <?php endif; ?>
        <ul class="task-list">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <li>
                    <?php echo htmlspecialchars($row['nhiemvu']); ?>
                    <a class="edit-link" href="?edit=<?php echo $row['id']; ?>">Sửa</a>
                    <a href="?delete=<?php echo $row['id']; ?>">Xóa</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

    </body>
    </html>