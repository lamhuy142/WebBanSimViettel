<?php
class BINHCHON
{
    private $MaBC;
    private $MaND;
    private $DanhGia;
    
    public function getMaBC()
    {
        return $this->MaBC;
    }
    public function setMaBC($value)
    {
        $this->MaBC = $value;
    }
    public function getMaND()
    {
        return $this->MaND;
    }
    public function setMaND($value)
    {
        $this->MaND = $value;
    }
    public function getDanhGia()
    {
        return $this->DanhGia;
    }
    public function setDanhGia($value)
    {
        $this->DanhGia = $value;
    }
    // khai báo các thuộc tính (SV tự viết)


    // lấy thông tin người dùng có $email
    // public function laythongtinbaiviet($email)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM baiviet WHERE Email=:Email";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(":Email", $Email);
    //         $cmd->execute();
    //         $ketqua = $cmd->fetch();
    //         $cmd->closeCursor();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }

    // lấy tất cả ng dùng
    public function laydanhsachbinhchon()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM binhchon";
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
    public function thembinhchon($binhchon)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO binhchon(MaND, DanhGia) 
VALUES(:MaND, :DanhGia)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaND', $binhchon->MaND);
            $cmd->bindValue(':DanhGia', $binhchon->DanhGia);
            $cmd->execute();
            $MaBC = $db->lastInsertMaBC();
            return $MaBC;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function capnhatbinhchon($MaBC,$MaND, $DanhGia)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE binhchon set MaND=:MAND, DanhGia=:DanhGia  where MaBC=MaBC";
            $cmd = $db->prepare($sql);
            $cmd->bindValue('MaBC', $MaBC);
            $cmd->bindValue(':MaND', $MaND);
            $cmd->bindValue(':DanhGia', $DanhGia);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi quyền (loại người dùng: 1 quản trị, 2 nhân viên. Không cần nâng cấp quyền đối với loại người dùng 3 khách hàng)
    // public function doiloaibaiviet($Email, $QuyenND)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set QuyenND=:QuyenND where Email=:Email";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':Email', $Email);
    //         $cmd->bindValue(':QuyenND', $QuyenND);
    //         $ketqua = $cmd->execute();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    // // Đổi trạng thái (0 khóa, 1 kích hoạt)
    // public function doitrangthai($MaND, $TrangThai)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set TrangThai=:TrangThai where MaND=:MaND";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':MaND', $MaND);
    //         $cmd->bindValue(':TrangThai', $TrangThai);
    //         $ketqua = $cmd->execute();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
}
