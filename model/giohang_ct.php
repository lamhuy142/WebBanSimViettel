<?php
class GIOHANG_CT
{
    private $MaGH;
    private $MaND;
    private $MaLS;
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
    public function getMaLS()
    {
        return $this->MaLS;
    }
    public function setMaLS($value)
    {
        $this->MaLS = $value;
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
            $sql = "INSERT INTO giohang_ct(MaGH, MaND, MaLS, SL, DonGia) 
VALUES(:MaGH, :MaLS, :SL, :DonGia)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaGH', $giohang_ct->MaGH);
            $cmd->bindValue(':MaND', $giohang_ct->MaND);
            $cmd->bindValue(':MaLS', $giohang_ct->MaLS);
            $cmd->bindValue(':SL', $giohang_ct->SL);
            $cmd->bindValue(':DonGia', $giohang_ct->DonGia);
            $cmd->execute();
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
    public function capnhatgiohang_ct($MaGH, $MaLS, $SL, $DonGia, $TongGia) 
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE giohang_ct set MaLS=:MaLS, SL=:SL, DonGia=:DonGia where = MaGH=:MaGH ";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaGH', $MaGH);
            $cmd->bindValue(':MaLS', $MaLS);
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
    // public function doitrangthai($TongGia, $TrangThai)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set TrangThai=:TrangThai where TongGia=:TongGia";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':TongGia', $TongGia);
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
