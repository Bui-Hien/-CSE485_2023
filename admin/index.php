<!DOCTYPE html>
<?php
include("./header.php")
?>

<?php
try {
    $conn = new PDO(dsn: "mysql:host=localhost;dbname=btth01_cse485_ex.sql", username: "root", password: "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
// $sql_select_count_user = 'SELECT COUNT(ma_tloai) FROM theloai' ;
$sql_select_tloai = 'SELECT COUNT(*) FROM theloai' ;
$sql_select_tac_gia = 'SELECT COUNT(*) FROM tacgia' ;
$sql_select_bai_viet = 'SELECT COUNT(*) FROM baiviet' ;
$stmt = $conn->prepare($sql_select_tloai);
$stmt->execute();
$sl_tloai =  $stmt->fetchColumn();
$stmt = $conn->prepare($sql_select_tac_gia);
$stmt->execute();
$sl_tgia =  $stmt->fetchColumn();
$stmt = $conn->prepare($sql_select_bai_viet);
$stmt->execute();
$sl_bviet = $stmt->fetchColumn();


?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Người dùng</a>
                    </h5>

                    <h5 class="h1 text-center">
                        110
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Thể loại</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?= $sl_tloai ?>
                       
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Tác giả</a>
                    </h5>

                    <h5 class="h1 text-center">
                    <?= $sl_tgia ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Bài viết</a>
                    </h5>

                    <h5 class="h1 text-center">
                    <?= $sl_bviet ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("./footer.php")
?>