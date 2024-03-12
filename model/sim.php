<?php
class SIM
{
    private $MaSim;
    private $SoSim;
    private $MaLS;
    private $MoTa;
    private $HinhAnh;
    private $GiaGoc;
    private $GiaBan;
    private $TinhTrang;
   
    
    
    public function getMaSim()
    {
        return $this->MaSim;
    }
    public function setMaSim($value)
    {
        $this->MaSim = $value;
    }
    public function getSoSim()
    {
        return $this->SoSim;
    }
    public function setSoSim($value)
    {
        $this->SoSim = $value;
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
    public function getGiaGoc()
    {
        return $this->GiaGoc;
    }
    public function setGiaGoc($value)
    {
        $this->GiaGoc = $value;
    }
    public function getGiaBan()
    {
        return $this->GiaBan;
    }
    public function setGiaBan($value)
    {
        $this->GiaBan = $value;
    }
    public function getTinhTrang()
    {
        return $this->TinhTrang;
    }
    public function setTinhTrang($value)
    {
        $this->TinhTrang = $value;
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
            $sql = "INSERT INTO sim(SoSim, MaLS, MoTa, HinhAnh, GiaGoc, GiaBan, TinhTrang) 
VALUES(:SoSim, :MaLS, :MoTa, :HinhAnh, :GiaGoc, :GiaBan, :TinhTrang)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':SoSim', $sim->SoSim);
            $cmd->bindValue(':MaLS', $sim->MaLS);
            $cmd->bindValue(':MoTa', $sim->MoTa);
            $cmd->bindValue(':HinhAnh', $sim->HinhAnh);
            $cmd->bindValue(':GiaGoc', $sim->GiaGoc);
            $cmd->bindValue(':GiaBan', $sim->GiaBan);
            $cmd->bindValue(':TinhTrang', $sim->TinhTrang);

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
    // public function capnhatsim($MaSim, $SoSim, $MaLS, $MoTa, $HinhAnh, $GiaGoc, $GiaBan, $TinhTrang) 
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE sim set SoSim=:SoSim, MaLS=:MaLS, MoTa=:MoTa, HinhAnh=:HinhAnh, GiaGoc=:GiaGoc, GiaBan=:GiaBan, TinhTrang=:TinhTrang where MaSim=MaSim";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':MaSim', $MaSim);
    //         $cmd->bindValue(':SoSim', $SoSim);
    //         $cmd->bindValue(':MaLS', $MaLS);
    //         $cmd->bindValue(':MoTa', $MoTa);
    //         $cmd->bindValue(':HinhAnh', $HinhAnh);
    //         $cmd->bindValue(':GiaGoc', $GiaGoc);
    //         $cmd->bindValue(':GiaBan', $GiaBan);
    //         $cmd->bindValue(':TinhTrang', $TinhTrang);

    //         $ketqua = $cmd->execute();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    public function suasim($sim)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sim SET SoSim=:SoSim, MaLS=:MaLS, MoTa=:MoTa, HinhAnh=:HinhAnh, GiaGoc=:GiaGoc, GiaBan=:GiaBan, TinhTrang=:TinhTrang WHERE MaSim=MaSim";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':MaSim', $sim->MaSim);
            $cmd->bindValue(':SoSim', $sim->SoSim);
            $cmd->bindValue(':MaLS', $sim->MaLS);
            $cmd->bindValue(':MoTa', $sim->MoTa);
            $cmd->bindValue(':HinhAnh', $sim->HinhAnh);
            $cmd->bindValue(':GiaGoc', $sim->GiaGoc);
            $cmd->bindValue(':GiaBan', $sim->GiaBan);
            $cmd->bindValue(':TinhTrang', $sim->TinhTrang);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function xoasim($sim)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM sim WHERE MaSim=:MaSim";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaSim", $sim->MaSim);
            $result = $cmd->execute();
            return $result;
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
