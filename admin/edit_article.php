<?php
if (isset($_GET['id'])) {
    $article_id = $_GET['id'];
    require ("commandSql.php");
    $data = getOneArticles($article_id);
}
?>
<?php
include("./header.php")
?>


<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
            <form action="process_add_ariticle.php" method="post">
                <div class="input-group mt-3 mb-3 d-none">
                    <span class="input-group-text" style="width: 110px" id="lblCatId">ma_bviet</span>
                    <input type="text" class="form-control" name="ma_bviet" value="<?php echo $data[0]['ma_bviet'] ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatId">Tiêu đề</span>
                    <input type="text" class="form-control" name="tieude" value="<?php echo $data[0]['tieude'] ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Tên bài hát</span>
                    <input type="text" class="form-control" name="ten_bhat" value="<?php echo $data[0]['ten_bhat'] ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Mã thể loại</span>
                    <input type="text" class="form-control" name="ma_tloai" readonly
                           value="<?php echo $data[0]['ma_tloai'] ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Tóm tắt</span>
                    <input type="text" class="form-control" name="tomtat" value="<?php echo $data[0]['tomtat'] ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Nội dung</span>
                    <input type="text" class="form-control" name="noidung" value="<?php echo $data[0]['noidung'] ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Mã tác giả</span>
                    <input type="text" class="form-control" name="ma_tgia" readonly
                           value="<?php echo $data[0]['ma_tgia'] ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Ngày viết</span>
                    <input type="text" class="form-control" name="ngayviet" value="<?php echo $data[0]['ngayviet'] ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Hình ảnh</span>
                    <input type="text" class="form-control" name="hinhanh" value="<?php echo $data[0]['hinhanh'] ?>">
                </div>
                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="article.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include("./footer.php")
?>


