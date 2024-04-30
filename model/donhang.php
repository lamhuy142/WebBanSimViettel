<?php
class DONHANG
{
    private $MaDH;
    private $MaND;
    private $NgayDatHang;
    private $NgayGiaoHang;
    private $TongTien;
    private $GhiChu;
    private $TrangThai;
    
    
    public function getMaDH()
    {
        return $this->MaDH;
    }
    public function setMaDH($value)
    {
        $this->MaDH = $value;
    }
    public function getMaND()
    {
        return $this->MaND;
    }
    public function setMaND($value)
    {
        $this->MaND = $value;
    }
    public function getNgayGiaoHang()
    {
        return $this->NgayGiaoHang;
    }
    public function setNgayGiaoHang($value)
    {
        $this->NgayGiaoHang = $value;
    }
    public function getNgayDatHang()
    {
        return $this->NgayDatHang;
    }
    public function setNgayDatHang($value)
    {
        $this->NgayDatHang = $value;
    }
    public function getTongTien()
    {
        return $this->TongTien;
    }
    public function setTongTien($value)
    {
        $this->TongTien = $value;
    }
    public function getGhiChu()
    {
        return $this->GhiChu;
    }
    public function setGhiChu($value)
    {
        $this->GhiChu = $value;
    }
    public function getTrangThai()
    {
        return $this->TrangThai;
    }
    public function setTrangThai($value)
    {
        $this->TrangThai = $value;
    }
   
    public function laydoanhthutheotuan()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT WEEK(NgayDatHang) AS Tuan,
                    YEAR(NgayDatHang) AS Nam,
                    SUM(TongTien) AS TongDoanhThu
                    FROM donhang
                    WHERE TrangThai = 2
                    GROUP BY YEAR(NgayDatHang), WEEK(NgayDatHang)
                    ORDER BY YEAR(NgayDatHang), WEEK(NgayDatHang)";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }


    public function laydonhangtheomand($MaND)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM donhang WHERE MaND=:MaND";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaND", $MaND);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laydonhangtheoid($MaDH)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM donhang WHERE MaDH=:MaDH";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaDH", $MaDH);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laymadhvuathem()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT MaDH FROM donhang ORDER BY MaDH DESC LIMIT 1";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetch(PDO::FETCH_ASSOC); //dữ liệu sẽ được trả về dưới dạng một mảng kết hợp, trong đó tên cột được sử dụng làm khóa 
            return $ketqua['MaDH'];
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // lấy tất cả ng dùng
    public function laydanhsachdonhang()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM donhang ORDER BY MaDH DESC";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Thêm ng dùng mới, trả về khóa của dòng mới thêm
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function themdonhang($donhang)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO donhang(MaND, NgayDatHang, NgayGiaoHang, TongTien, GhiChu, TrangThai) 
VALUES(:MaND, :NgayDatHang, :NgayGiaoHang, :TongTien, :GhiChu, :TrangThai)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaND', $donhang->MaND);
            $cmd->bindValue(':NgayDatHang', $donhang->NgayDatHang);
            $cmd->bindValue(':NgayGiaoHang', $donhang->NgayGiaoHang);
            $cmd->bindValue(':TongTien', $donhang->TongTien);
            // print_r($donhang->TongTien);
            // exit();
            $cmd->bindValue(':GhiChu', $donhang->GhiChu);
            $cmd->bindValue(':TrangThai', $donhang->TrangThai);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function capnhatdonhang($MaDH,$MaND, $NgayDatHang, $NgayGiaoHang, $TongTien, $GhiChu, $TrangThai) 
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE donhang set MaND=:MaND,, NgayDatHang=:NgayDatHang, NgayGiaoHang=:NgayGiaoHang, TongTien=:TongTien, GhiChu=:GhiChu, TrangThai=:TrangThai  where MaDH=:MaDH";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaDH', $MaDH);
            $cmd->bindValue(':MaND', $MaND);
            $cmd->bindValue(':NgayDatHang', $NgayDatHang);
            $cmd->bindValue(':NgayGiaoHang', $NgayGiaoHang);
            $cmd->bindValue(':TongTien', $TongTien);
            $cmd->bindValue(':GhiChu', $GhiChu);
            $cmd->bindValue(':TrangThai', $TrangThai);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    
    public function capnhatngaygiaohang($MaDH, $NgayGiaoHang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE donhang SET NgayGiaoHang = :NgayGiaoHang WHERE MaDH=:MaDH";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":NgayGiaoHang", $NgayGiaoHang);
            $cmd->bindValue(":MaDH",$MaDH);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function doitrangthai($MaDH, $TrangThai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE donhang set TrangThai=:TrangThai where MaDH=:MaDH";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaDH', $MaDH);
            $cmd->bindValue(':TrangThai', $TrangThai);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
