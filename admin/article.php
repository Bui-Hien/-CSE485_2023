<?php
require ("commandSql.php");
$datas = getAllArticles();
?>
<?php
include("./header.php")
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <a href="add_article.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tiêu đề</th>
                    <th>Tên bài hát</th>
                    <th>Mã thể loại</th>
                    <th>Tóm tắt</th>
                    <th>Nội dung</th>
                    <th>Mã tác giả</th>
                    <th>Ngày viết</th>
                    <th>Hình ảnh</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody><?php
                for ($i = 0;
                $i < count($datas);
                $i++): ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $datas[$i]['tieude'] ?></td>
                    <td><?php echo $datas[$i]['ten_bhat'] ?></td>
                    <td><?php echo $datas[$i]['ma_tloai'] ?></td>
                    <td><?php echo $datas[$i]['tomtat'] ?></td>
                    <td><?php echo $datas[$i]['noidung'] ?></td>
                    <td><?php echo $datas[$i]['ma_tgia'] ?></td>
                    <td><?php echo $datas[$i]['ngayviet'] ?></td>
                    <td><?php echo $datas[$i]['hinhanh'] ?></td>
                    <td>
                        <a href="edit_article.php?id=<?php echo $datas[$i]['ma_bviet'] ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td>
                        <a href="delete_article.php?id=<?php echo $datas[$i]['ma_bviet'] ?>" onclick="mydelete()" id="delete">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                    <script>
                        function mydelete() {
                            var result = confirm("Bạn có muốn xóa không?");
                            if (!result) {
                                const element = document.getElementById("delete");
                                element.href = ""
                            }
                        }
                    </script>

                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
include("./footer.php")
?>
