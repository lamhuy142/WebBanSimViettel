<?php
class GIOHANG_CT
{
    private $MaCT;
    private $MaG;
    private $MaLS;
    private $SL;
    private $DonGia;
    private $TongGia;
    
    
    public function getMaCT()
    {
        return $this->MaCT;
    }
    public function setMaCT($value)
    {
        $this->MaCT = $value;
    }
    public function getMaG()
    {
        return $this->MaG;
    }
    public function setMaG($value)
    {
        $this->MaG = $value;
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
    public function getTongGia()
    {
        return $this->TongGia;
    }
    public function setTongGia($value)
    {
        $this->TongGia = $value;
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
            $sql = "SELECT * FROM giohang_ct";
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
            $sql = "INSERT INTO giohang_ct(MaG, MaLS, SL, DonGia, TongGia) 
VALUES(:MaG, :MaLS, :SL, :TongGia)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaG', $giohang_ct->MaG);
            $cmd->bindValue(':MaLS', $giohang_ct->MaLS);
            $cmd->bindValue(':SL', $giohang_ct->SL);
            $cmd->bindValue(':DonGia', $giohang_ct->DonGia);
            $cmd->bindValue(':TongGia', $giohang_ct->TongGia);
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
    public function capnhatgiohang_ct($MaCT,$MaG, $MaLS, $SL, $DonGia, $TongGia) 
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE giohang_ct set MaG=:MaG, MaLS=:MaLS, SL=:SL, DonGia=:DonGia, TongGia=:TongGia  where MaCT=MaCT";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaCT', $MaCT);
            $cmd->bindValue(':MaG', $MaG);
            $cmd->bindValue(':MaLS', $MaLS);
            $cmd->bindValue(':SL', $SL);
            $cmd->bindValue(':DonGia', $DonGia);
            $cmd->bindValue(':TongGia', $TongGia);
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
