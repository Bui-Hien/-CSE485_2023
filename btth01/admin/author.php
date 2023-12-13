<?php
include("./header.php")
?>
<?php
$servername = "mariadb";
$username = "root";
$password = "your_password";
$dbname = "BTTH01_CSE485_ex.sql";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xử lý thêm tác giả
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    $action = $_POST["action"];

    if ($action == "add" && isset($_POST["ma_tgia"]) && isset($_POST["ten_tgia"])) {
        $ma_tgia = $_POST["ma_tgia"];
        $ten_tgia = $_POST["ten_tgia"];
        $hinh_tgia = isset($_POST["hinh_tgia"]) ? $_POST["hinh_tgia"] : null;

        $sql = "INSERT INTO tacgia (ma_tgia, ten_tgia, hinh_tgia) VALUES ('$ma_tgia', '$ten_tgia', '$hinh_tgia')";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm tác giả thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } // Xử lý sửa tác giả
    elseif ($action == "edit" && isset($_POST["ten_tgia_edit"]) && isset($_POST["ten_tgia_moi"])) {
        $ten_tgia_edit = $_POST["ten_tgia_edit"];
        $ten_tgia_moi = $_POST["ten_tgia_moi"];
        $hinh_tgia_edit = isset($_POST["hinh_tgia_edit"]) ? $_POST["hinh_tgia_edit"] : null;

        $sql = "UPDATE tacgia SET ten_tgia='$ten_tgia_moi', hinh_tgia='$hinh_tgia_edit' WHERE ten_tgia='$ten_tgia_edit'";

        if ($conn->query($sql) === TRUE) {
            echo "Sửa tác giả thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } // Xử lý xóa tác giả
    elseif ($action == "delete" && isset($_POST["ma_tgia_delete"])) {
        $ma_tgia_delete = $_POST["ma_tgia_delete"];

        $sql = "DELETE FROM tacgia WHERE ma_tgia='$ma_tgia_delete'";

        if ($conn->query($sql) === TRUE) {
            echo "Xóa tác giả thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Lấy danh sách tên tác giả
$sql_select_tentg = "SELECT ten_tgia FROM tacgia";
$result_tentg = $conn->query($sql_select_tentg);
$tentg_arr = array();
while ($row_tentg = $result_tentg->fetch_assoc()) {
    $tentg_arr[] = $row_tentg['ten_tgia'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tác giả</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        h2 {
            color: #007bff;
        }

        form {
            margin-top: 20px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<h2>Quản lý Tác giả</h2>

<!-- Form để nhập thông tin tác giả -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <!-- Thêm tác giả -->
    <label for="ma_tgia">Mã Tác giả:</label>
    <input type="text" name="ma_tgia" required>
    <label for="ten_tgia">Tên Tác giả:</label>
    <input type="text" name="ten_tgia" required>
    <label for="hinh_tgia">Hình Tác giả (URL):</label>
    <input type="text" name="hinh_tgia">
    <input type="hidden" name="action" value="add">
    <input type="submit" name="submit" value="Thêm">
</form>

<!-- Form để sửa thông tin tác giả -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <!-- Sửa tác giả -->
    <label for="ten_tgia_edit">Chọn Tác giả để sửa:</label>
    <select name="ten_tgia_edit">
        <?php
        foreach ($tentg_arr as $tentg) {
            echo "<option value=\"$tentg\">$tentg</option>";
        }
        ?>
    </select>
    <label for="ten_tgia_moi">Nhập Tên Tác giả mới:</label>
    <input type="text" name="ten_tgia_moi" required>
    <label for="hinh_tgia_edit">Hình Tác giả mới (URL):</label>
    <input type="text" name="hinh_tgia_edit">
    <input type="hidden" name="action" value="edit">
    <input type="submit" name="submit" value="Sửa">
</form>

<!-- Form để xóa thông tin tác giả -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <!-- Xóa tác giả -->
    <label for="ma_tgia_delete">Mã Tác giả (để xóa):</label>
    <input type="text" name="ma_tgia_delete" required>
    <input type="hidden" name="action" value="delete">
    <input type="submit" name="submit" value="Xóa">
</form>

<?php
include("./footer.php")
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "btth01_cse485_ex.sql";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xử lý thêm tác giả
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    $action = $_POST["action"];

    if ($action == "add" && isset($_POST["ma_tgia"]) && isset($_POST["ten_tgia"])) {
        $ma_tgia = $_POST["ma_tgia"];
        $ten_tgia = $_POST["ten_tgia"];
        $hinh_tgia = isset($_POST["hinh_tgia"]) ? $_POST["hinh_tgia"] : null;

        $sql = "INSERT INTO tacgia (ma_tgia, ten_tgia, hinh_tgia) VALUES ('$ma_tgia', '$ten_tgia', '$hinh_tgia')";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm tác giả thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }

    // Xử lý sửa tác giả
    elseif ($action == "edit" && isset($_POST["ten_tgia_edit"]) && isset($_POST["ten_tgia_moi"])) {
        $ten_tgia_edit = $_POST["ten_tgia_edit"];
        $ten_tgia_moi = $_POST["ten_tgia_moi"];
        $hinh_tgia_edit = isset($_POST["hinh_tgia_edit"]) ? $_POST["hinh_tgia_edit"] : null;

        $sql = "UPDATE tacgia SET ten_tgia='$ten_tgia_moi', hinh_tgia='$hinh_tgia_edit' WHERE ten_tgia='$ten_tgia_edit'";

        if ($conn->query($sql) === TRUE) {
            echo "Sửa tác giả thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }

    // Xử lý xóa tác giả
    elseif ($action == "delete" && isset($_POST["ma_tgia_delete"])) {
        $ma_tgia_delete = $_POST["ma_tgia_delete"];

        $sql = "DELETE FROM tacgia WHERE ma_tgia='$ma_tgia_delete'";

        if ($conn->query($sql) === TRUE) {
            echo "Xóa tác giả thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Lấy danh sách tên tác giả
$sql_select_tentg = "SELECT ten_tgia FROM tacgia";
$result_tentg = $conn->query($sql_select_tentg);
$tentg_arr = array();
while ($row_tentg = $result_tentg->fetch_assoc()) {
    $tentg_arr[] = $row_tentg['ten_tgia'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tác giả</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        h2 {
            color: #007bff;
        }

        form {
            margin-top: 20px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<h2>Quản lý Tác giả</h2>

<!-- Form để nhập thông tin tác giả -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <!-- Thêm tác giả -->
    <label for="ma_tgia">Mã Tác giả:</label>
    <input type="text" name="ma_tgia" required>
    <label for="ten_tgia">Tên Tác giả:</label>
    <input type="text" name="ten_tgia" required>
    <label for="hinh_tgia">Hình Tác giả (URL):</label>
    <input type="text" name="hinh_tgia">
    <input type="hidden" name="action" value="add">
    <input type="submit" name="submit" value="Thêm">
</form>

<!-- Form để sửa thông tin tác giả -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <!-- Sửa tác giả -->
    <label for="ten_tgia_edit">Chọn Tác giả để sửa:</label>
    <select name="ten_tgia_edit">
        <?php
        foreach ($tentg_arr as $tentg) {
            echo "<option value=\"$tentg\">$tentg</option>";
        }
        ?>
    </select>
    <label for="ten_tgia_moi">Nhập Tên Tác giả mới:</label>
    <input type="text" name="ten_tgia_moi" required>
    <label for="hinh_tgia_edit">Hình Tác giả mới (URL):</label>
    <input type="text" name="hinh_tgia_edit">
    <input type="hidden" name="action" value="edit">
    <input type="submit" name="submit" value="Sửa">
</form>

<!-- Form để xóa thông tin tác giả -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <!-- Xóa tác giả -->
    <label for="ma_tgia_delete">Mã Tác giả (để xóa):</label>
    <input type="text" name="ma_tgia_delete" required>
    <input type="hidden" name="action" value="delete">
    <input type="submit" name="submit" value="Xóa">
</form>
</body>
</html>


