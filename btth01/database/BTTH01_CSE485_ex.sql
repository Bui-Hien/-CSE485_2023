a.select * from theloai where ten_tloai like 'Nhạc trữ tình';
b, SELECT *
   FROM baiviet
   JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
   WHERE tacgia.ten_tgia = 'Nhacvietplus';
 d, SELECT baiviet.ma_bviet, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet
    FROM baiviet
    JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
    JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai;
--e    
    SELECT
    theloai.ma_tloai,
    theloai.ten_tloai,
    COUNT(baiviet.ma_bviet) AS so_baiviet
FROM
    theloai
    LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
GROUP BY
    theloai.ma_tloai
ORDER BY
    so_baiviet DESC
LIMIT 1;

--f
SELECT
    tacgia.ma_tgia,
    tacgia.ten_tgia,
    COUNT(baiviet.ma_bviet) AS so_baiviet
FROM
    tacgia
    LEFT JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_tgia
GROUP BY
    tacgia.ma_tgia, tacgia.ten_tgia
ORDER BY
    so_baiviet DESC
LIMIT 2;

--g
SELECT
    ma_bviet,
    tieude AS ten_baiviet,
    ten_bhat,
    ma_tgia,
    ngayviet
FROM
    baiviet
WHERE
    tieude LIKE '%yêu%'
    OR tieude LIKE '%thương%'
    OR tieude LIKE '%anh%'
    OR tieude LIKE '%em%';
--h
SELECT *
FROM baiviet
WHERE tieude LIKE '%yêu%'
   OR tieude LIKE '%thương%'
   OR tieude LIKE '%anh%'
   OR tieude LIKE '%em%';
i. Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên
thể loại và tên tác giả
SELECT
    bviet.ma_bviet,
    bviet.tieude,
    bviet.ten_bhat,
    theloai.ten_tloai AS ten_the_loai,
    bviet.tomtat,
    bviet.noidung,
    tacgia.ten_tgia AS ten_tac_gia,
    bviet.ngayviet,
    bviet.hinhanh
FROM
    baiviet bviet
JOIN theloai ON bviet.ma_tloai = theloai.ma_tloai
JOIN tacgia ON bviet.ma_tgia = tacgia.ma_tgia;

j. Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách
Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DSBaiViet` (IN `pTenTheLoai` VARCHAR(50))   BEGIN
    SELECT
        bv.`ma_bviet`,
        bv.`tieude`,
        bv.`ten_bhat`,
        bv.`ma_tloai`,
        bv.`tomtat`,
        bv.`noidung`,
        bv.`ma_tgia`,
        bv.`ngayviet`,
        bv.`hinhanh`
    FROM
        `baiviet` bv
    JOIN
        `theloai` tl ON bv.`ma_tloai` = tl.`ma_tloai`
    WHERE
        tl.`ten_tloai` = pTenTheLoai;
END$$

DELIMITER ;