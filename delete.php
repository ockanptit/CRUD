<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>CRUD App</title>
</head>
<body>
<?php
// nạp file kết nối CSDL
include_once "config.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = $id";
    $query = mysqli_query($connection,$sql);
    while ($data = mysqli_fetch_array($query)){
        $name = $data['name'];
        $address = $data['address'];
        $salary = $data['salary'];
    }
    if (isset($_POST['submit'])) {
        $sqlDelete = "DELETE FROM employees WHERE id = $id";
        $result = $connection -> query($sqlDelete);
        if ($result == true){
            echo "<div class='alert alert-success'>Xóa nhân viên thành công ! <a href='index.php'>Trang chủ</a></div>";
            ?>
            <script type="text/javascript">
                window.location = "index.php";
            </script>
            <?php
        } else echo "<div class='alert alert-danger'>Xóa thất bại ! </div>";
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h3>Bạn có chắc chắn xóa nhân viên ?</h3>
            <form name="delete" action="" method="post">
                <div class="form-group">
                    <label>Tên nhân viên: <?php echo $name ;?> </label>
                </div>
                <button type="submit" name="submit" class="btn btn-danger">Xóa nhân viên</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>