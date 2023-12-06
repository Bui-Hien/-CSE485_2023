<?php
include("./header.php")
?>
<?php
try {
    $conn = new PDO(dsn: "mysql:host=mariadb;dbname=BTTH01_CSE485_ex.sql", username: "root", password: "your_password");
    $SQL = "SELECT ma_tloai,ten_tloai FROM theloai";
    $stmt = $conn->prepare($SQL);
    $stmt->execute();
    $ListCategory = $stmt->fetchAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <a href="add_category.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Mã Thể Loại</th>
                    <th scope="col">Tên thể loại</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ListCategory as $list) : ?>
                    <tr>
                        <th scope="row"><?= $list['ma_tloai']; ?></th>
                        <td><?= $list['ten_tloai']; ?></td>
                        <td>
                            <input type="hidden" class="form-control" name="update">
                            <a href='edit_category.php?id=<?= $list['ma_tloai'] ?>'><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            <script>
                                function myDelete() {
                                    var result = confirm("Bạn có muốn xóa không?");
                                    console.log('1234');
                                    if (!result) {
                                        const element = document.getElementById("delete");
                                        element.href = "";
                                    }
                                }
                            </script>
                        </td>
                        <td>
                            <input type="hidden" class="form-control" name="delete">
                            <a href='process_add_category.php?id=<?= $list['ma_tloai'] ?>' onclick="myDelete()"
                               id="delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
include("./footer.php")
?>