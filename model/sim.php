<?php
class SIM
{
    private $MaS;
    private $TenS;
    private $MaLS;
    private $MoTa;
    private $HinhAnh;
    
    
    public function getMaS()
    {
        return $this->MaS;
    }
    public function setMaS($value)
    {
        $this->MaS = $value;
    }
    public function getTenS()
    {
        return $this->TenS;
    }
    public function setTenS($value)
    {
        $this->TenS = $value;
    }
    public function getMaLS()
    {
        return $this->MaLS;
    }
    public function setMaLS($value)
    {
        $this->MaLS = $value;
    }
    public function getMoTa()
    {
        return $this->MoTa;
    }
    public function setMoTa($value)
    {
        $this->MoTa = $value;
    }
    public function getHinhAnh()
    {
        return $this->HinhAnh;
    }
    public function setHinhAnh($value)
    {
        $this->HinhAnh = $value;
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
    public function laydanhsachsim()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sim";
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
    public function themsim($sim)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO sim(TenS, MaLS, MoTa, HinhAnh) 
VALUES(:TenS, :MaLS, :MoTa, :HinhAnh)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':TenS', $sim->TenS);
            $cmd->bindValue(':MaLS', $sim->MaLS);
            $cmd->bindValue(':MoTa', $sim->MoTa);
            $cmd->bindValue(':HinhAnh', $sim->HinhAnh);
            $cmd->execute();
            $MaS = $db->lastInsertMaS();
            return $MaS;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function capnhatsim($MaS,$TenS, $MaLS, $MoTa, $HinhAnh) 
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE sim set TenS=:TenS, MaLS=:MaLS, MoTa=:MoTa, HinhAnh=:HinhAnh  where MaS=MaS";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaS', $MaS);
            $cmd->bindValue(':TenS', $TenS);
            $cmd->bindValue(':MaLS', $MaLS);
            $cmd->bindValue(':MoTa', $MoTa);
            $cmd->bindValue(':HinhAnh', $HinhAnh);
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
    // public function doitrangthai($HinhAnh, $TrangThai)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set TrangThai=:TrangThai where HinhAnh=:HinhAnh";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':HinhAnh', $HinhAnh);
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
