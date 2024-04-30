<?php
class TRALOIDANHGIA
{
    private $MaTL;
    private $TraLoi;
    private $MaDG;
    private $MaND;
    private $NgayTL;

    
    public function getMaTL()
    {
        return $this->MaTL;
    }
    public function setMaTL($value)
    {
        $this->MaTL = $value;
    }
    public function getTraLoi()
    {
        return $this->TraLoi;
    }
    public function setTraLoi($value)
    {
        $this->TraLoi = $value;
    }
    public function getMaDG()
    {
        return $this->MaDG;
    }
    public function setMaDG($value)
    {
        $this->MaDG = $value;
    }
    public function getMaND()
    {
        return $this->MaND;
    }
    public function setMaND($value)
    {
        $this->MaND = $value;
    }
    public function getNgayTL()
    {
        return $this->NgayTL;
    }
    public function setNgayTL($value)
    {
        $this->NgayTL = $value;
    }
    // khai báo các thuộc tính (SV tự viết)
    public function traloidanhgiatheomadg($MaDG)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM traloidanhgia WHERE MaDG=:MaDG";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaDG", $MaDG);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // lấy tất cả ng dùng
    public function laydanhsachtraloidanhgiatheoid($MaTL)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM traloidanhgia WHERE MaTL=:MaTL";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaTL", $MaTL);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laydanhsachtraloidanhgia()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM traloidanhgia ORDER BY MaTL DESC";
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
    public function themtraloidanhgia($traloidanhgia)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO traloidanhgia(TraLoi, MaDG, MaND, NgayTL) 
VALUES(:TraLoi, :MaDG, :MaND, :NgayTL)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':TraLoi', $traloidanhgia->TraLoi);
            $cmd->bindValue(':MaDG', $traloidanhgia->MaDG);
            $cmd->bindValue(':MaND', $traloidanhgia->MaND);
            $cmd->bindValue(':NgayTL', $traloidanhgia->NgayTL);
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
    public function capnhattraloidanhgia($traloidanhgia)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE traloidanhgia set TraLoi=:TraLoi,MaDG=:MaDG, MaND=:MaND, NgayTL=:NgayTL  where MaTL=MaTL";
            $cmd = $db->prepare($sql);
            $cmd->bindValue('MaTL', $traloidanhgia->MaTL);
            $cmd->bindValue(':TraLoi', $traloidanhgia->TraLoi);
            $cmd->bindValue(':MaDG', $traloidanhgia->MaDG);
            $cmd->bindValue(':MaND', $traloidanhgia->MaND);
            $cmd->bindValue(':NgayTL', $traloidanhgia->NgayTL);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function capnhattraloi($MaTL, $TraLoi, $NguoiTL)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE traloidanhgia set TraLoi=:TraLoi, NguoiTL=:NguoiTL where MaTL=:MaTL";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaTL', $MaTL);
            $cmd->bindValue(':TraLoi', $TraLoi);
            $cmd->bindValue(':NguoiTL', $NguoiTL);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
