<?php
    session_start();
    if ($_SESSION["isAdmin"] != 1) {
        header("Location:http://127.0.0.1:8080/");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>
    <!--Font Awesome-->
    <link rel="stylesheet" href="../externals/fontawesome/css/all.min.css">
    <!--Bootstrap core CSS-->
    <link rel="stylesheet" href="../externals/bootstrap/css/bootstrap.min.css">
    <!--Material Design Bootstrap-->
    <link rel="stylesheet" href="../externals/MDB/css/mdb.min.css">
    <!--MDBootstrap Datatables-->
    <link rel="stylesheet" href="../externals/MDB/css/addons/datatables.min.css">
    <!--JQuery-->
    <script src="/externals/jquery/jquery-3.4.1.min.js"></script>
    <!--Bootstrap tooltips-->
    <script src="/externals/popper.js/umd/popper.min.js"></script>
    <!--Bootstrap core JavaScript-->
    <script src="/externals/bootstrap/js/bootstrap.min.js"></script>
    <!--MDB core JavaScript-->
    <script src="/externals/MDB/js/mdb.min.js"></script>
    <!--MDBootstrap Datatables-->
    <script src="/externals/MDB/js/addons/datatables.min.js"></script>
    <!--Custom CSS-->
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body>
    <?php
        require_once dirname(__FILE__)."/controller/StudentsController.php";
        $ctrl = new \students\controller\StudentsController();
        if(isset($_POST["ImportStudent"])){  // Nhập sinh viên
            $ctrl->getStudentExcel();
        }
        if(isset($_POST["UpdateDis"])){ // Cập nhật trạng thái đủ điều kiện dự thi
            $ctrl->updateDisqualified();
        }
        if(isset($_POST["DeleteStudent"])){ // Xóa sinh viên
            $ctrl->DeleteStudent();
        }
        if(isset($_POST["UpdateCourses"])){ // Cập nhật sinh viên học học phần
            $ctrl->updateCourseSem();
        }
        if(isset($_POST["DeleteCourse"])){ // Xóa sinh viên học học phần
            $ctrl->deleteCourse();
        }
    ?>
    <!--Thanh điều hướng-->
    <nav class="navbar navbar-expand-lg navbar-dark primary-color">
        <!-- Tên trang web -->
        <a class="navbar-brand" href="/">ExamReg</a>
        <!-- Nội dung thanh điều hướng -->
        <div class="collapse navbar-collapse">
            <!-- Đường dẫn -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/"><img src = "/css/img/smallhome.png">Trang chủ</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="/students"><img src = "/css/img/smallStudent.png">Sinh viên</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-1">
                <li class="nav-item">
                    <a class="nav-link" href="/account/view/ChangePassView.php"><img src = "/css/img/smalltext.png">Đổi mật khẩu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/account/view/LogoutView.php"><img src = "/css/img/smalldoor.png">Đăng xuất</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--Main-->
    <div id="main">
        <!-- Danh sách phòng thi -->
        <h1>Danh sách sinh viên</h1>
        <div id="table-sinh-vien">
            <div id="table-container1">
            <?php
                $table = $ctrl->tableSV();
                echo $table;
                echo "<p id='table1hash' hidden>".hash("sha256", $table)."</p>";
            ?>
        </div>
        <div>
            <h3>Nhập danh sách sinh viên</h3>
            <form method="POST" enctype="multipart/form-data">
                <label>Chọn file Excel:</label>
                <input type="file" name="file"/>
                <br />
                <button type="submit" name="ImportStudent" class="btn btn-primary" value="Import Student">Tải lên</button>
            </form>
        </div>
        <div>
            <h3>Xóa sinh viên khỏi hệ thống</h3>
            <form method="POST" enctype="multipart/form-data">
                <label>Chọn file Excel:</label>
                <input type="file" name="file"/>
                <br />
                <button type="submit" name="DeleteStudent" class="btn btn-primary" value="DelStud">Tải lên</button>
            </form>
        </div
   <script src="script.js"></script>
</body>
