<?php
class GIOHANG_CT
{
    private $MaGH;
    private $MaND;
    private $MaS;
    private $SL;
    private $DonGia;
    
    public function getMaGH()
    {
        return $this->MaGH;
    }
    public function setMaGH($value)
    {
        $this->MaGH = $value;
    }
    public function getMaS()
    {
        return $this->MaS;
    }
    public function setMaS($value)
    {
        $this->MaS = $value;
    }
    public function getDonGia()
    {
        return $this->DonGia;
    }
    public function setDonGia($value)
    {
        $this->DonGia = $value;
    }
    public function getMaND()
    {
        return $this->MaND;
    }
    public function setMaND($value)
    {
        $this->MaND = $value;
    }
    public function getSL()
    {
        return $this->SL;
    }
    public function setSL($value)
    {
        $this->SL = $value;
    }
    // khai báo các thuộc tính (SV tự viết)
    public function laygiohangtheoid($MaGH)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM giohang_ct WHERE MaGH=:MaGH";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaGH", $MaGH);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laygiohangtheond($MaND)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM giohang_ct WHERE MaND=:MaND";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaND", $MaND);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laymasimtheond($MaND)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT MaS FROM giohang_ct WHERE MaND=:MaND";
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
    public function laydongiatheomas($MaS)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT DonGia FROM giohang_ct WHERE MaS=:MaS";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaS", $MaS);
            $cmd->execute();
            $result = $cmd->fetch(PDO::FETCH_ASSOC); // Sử dụng PDO::FETCH_ASSOC để lấy mảng kết quả với tên cột
            return $result['DonGia']; // Trả về giá trị của cột "DonGia"
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function tinhtongtientheond($MaND)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT sum(DonGia) AS TongTien FROM giohang_ct WHERE MaND=:MaND";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaND", $MaND);
            $cmd->execute();
            $result = $cmd->fetch(PDO::FETCH_ASSOC); // Sử dụng PDO::FETCH_ASSOC để lấy mảng kết quả với tên cột
            return $result['TongTien']; // Trả về giá trị của cột "TongTien"
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }


    

    // lấy tất cả ng dùng
    public function laydanhsachgiohang_ct()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM giohang_ct ORDER BY MaGH DESC";
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
    public function themgiohang_ct($giohang_ct)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO giohang_ct(MaGH, MaND, MaS, SL, DonGia) 
VALUES(:MaGH,:MaND, :MaS, :SL, :DonGia)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaGH', $giohang_ct->MaGH);
            $cmd->bindValue(':MaND', $giohang_ct->MaND);
            $cmd->bindValue(':MaS', $giohang_ct->MaS);
            $cmd->bindValue(':SL', $giohang_ct->SL);
            $cmd->bindValue(':DonGia', $giohang_ct->DonGia);
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
    public function capnhatgiohang_ct($MaGH, $MaS, $SL, $DonGia, $TongGia) 
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE giohang_ct set MaS=:MaS, SL=:SL, DonGia=:DonGia where = MaGH=:MaGH ";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaGH', $MaGH);
            $cmd->bindValue(':MaS', $MaS);
            $cmd->bindValue(':SL', $SL);
            $cmd->bindValue(':DonGia', $DonGia);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function xoagiohang_ct($giohang_ct)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM giohang_ct WHERE MaGH=:MaGH";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaGH", $giohang_ct->MaGH);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function xoagiohangtheosim($MaS)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM giohang_ct WHERE MaS=:MaS";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaS", $MaS);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
