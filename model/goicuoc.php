<?php
class GOICUOC
{
    private $MaGC;
    private $Ten;
    private $MoTa;
    private $DungLuong;
    private $ThoiGianHieuLuc;
    
    
    public function getMaGC()
    {
        return $this->MaGC;
    }
    public function setMaGC($value)
    {
        $this->MaGC = $value;
    }
    public function getTen()
    {
        return $this->Ten;
    }
    public function setTen($value)
    {
        $this->Ten = $value;
    }
    public function getMoTa()
    {
        return $this->MoTa;
    }
    public function setMoTa($value)
    {
        $this->MoTa = $value;
    }
    public function getDungLuong()
    {
        return $this->DungLuong;
    }
    public function setDungLuong($value)
    {
        $this->DungLuong = $value;
    }
    public function getThoiGianHieuLuc()
    {
        return $this->ThoiGianHieuLuc;
    }
    public function setThoiGianHieuLuc($value)
    {
        $this->ThoiGianHieuLuc = $value;
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
    public function laydanhsachgoicuoctheoid($MaGC)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM goicuoc WHERE MaGC=:MaGC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaGC", $MaGC);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function xoagoicuoc($goicuoc)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM goicuoc WHERE MaGC=:MaGC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaGC", $goicuoc->MaGC);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // lấy tất cả ng dùng
    public function laydanhsachgoicuoc()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM goicuoc";
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
    public function themgoicuoc($goicuoc)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO goicuoc(Ten, MoTa, DungLuong, ThoiGianHieuLuc) 
VALUES(:Ten, :MoTa, :DungLuong, :ThoiGianHieuLuc)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':Ten', $goicuoc->Ten);
            $cmd->bindValue(':MoTa', $goicuoc->MoTa);
            $cmd->bindValue(':DungLuong', $goicuoc->DungLuong);
            $cmd->bindValue(':ThoiGianHieuLuc', $goicuoc->ThoiGianHieuLuc);
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
    // public function capnhatgoicuoc($MaGC,$Ten, $MoTa, $DungLuong, $ThoiGianHieuLuc) 
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE goicuoc set Ten=:Ten, MoTa=:MoTa, DungLuong=:DungLuong, ThoiGianHieuLuc=:ThoiGianHieuLuc  where MaGC=MaGC";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':MaGC', $MaGC);
    //         $cmd->bindValue(':Ten', $Ten);
    //         $cmd->bindValue(':MoTa', $MoTa);
    //         $cmd->bindValue(':DungLuong', $DungLuong);
    //         $cmd->bindValue(':ThoiGianHieuLuc', $ThoiGianHieuLuc);
    //         $ketqua = $cmd->execute();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    public function suagoicuoc($goicuoc)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE goicuoc SET Ten=:Ten, MoTa=:MoTa, DungLuong=:DungLuong, ThoiGianHieuLuc=:ThoiGianHieuLuc, Gia=:Gia WHERE MaGC=:MaGC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':MaSim', $goicuoc->MaSim);
            $cmd->bindValue(':Ten', $goicuoc->Ten);
            $cmd->bindValue(':MoTa', $goicuoc->MoTa);
            $cmd->bindValue(':DungLuong', $goicuoc->DungLuong);
            $cmd->bindValue(':ThoiGianHieuLuc', $goicuoc->ThoiGianHieuLuc);
            $cmd->bindValue(':Gia', $goicuoc->Gia);
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
    // public function doitrangthai($ThoiGianHieuLuc, $TrangThai)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set TrangThai=:TrangThai where ThoiGianHieuLuc=:ThoiGianHieuLuc";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':ThoiGianHieuLuc', $ThoiGianHieuLuc);
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
