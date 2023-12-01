<?php
include("./header.php")
?>


<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thêm thông tin bài viết</h3>
            <form action="process_add_ariticle.php" method="post">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatId">Tiêu đề</span>
                    <input type="text" class="form-control" name="tieude" value="">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Tên bài hát</span>
                    <input type="text" class="form-control" name="ten_bhat" value="">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Mã thể loại</span>
                    <input type="text" class="form-control" name="ma_tloai"
                           value="">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Tóm tắt</span>
                    <input type="text" class="form-control" name="tomtat" value="">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Nội dung</span>
                    <input type="text" class="form-control" name="noidung" value="">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Mã tác giả</span>
                    <input type="text" class="form-control" name="ma_tgia"
                           value="">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Ngày viết</span>
                    <input type="text" class="form-control" name="ngayviet" value="">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" style="width: 110px" id="lblCatName">Hình ảnh</span>
                    <input type="text" class="form-control" name="hinhanh" value="">
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


