<?php
class KHUYENMAI
{
    private $MaKM;
    private $TenKM;
    private $MoTa;
    private $GiaTriKM;
    private $NgayBD;
    private $NgayKT;
    
    
    public function getMaKM()
    {
        return $this->MaKM;
    }
    public function setMaKM($value)
    {
        $this->MaKM = $value;
    }
    public function getTenKM()
    {
        return $this->TenKM;
    }
    public function setTenKM($value)
    {
        $this->TenKM = $value;
    }
    public function getMoTa()
    {
        return $this->MoTa;
    }
    public function setMoTa($value)
    {
        $this->MoTa = $value;
    }
    public function getGiaTriKM()
    {
        return $this->GiaTriKM;
    }
    public function setGiaTriKM($value)
    {
        $this->GiaTriKM = $value;
    }
    public function getNgayKT()
    {
        return $this->NgayKT;
    }
    public function setNgayKT($value)
    {
        $this->NgayKT = $value;
    }
    public function getNgayBD()
    {
        return $this->NgayBD;
    }
    public function setNgayBD($value)
    {
        $this->NgayBD = $value;
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
    public function laydanhsachkhuyenmai()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM khuyenmai";
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
    public function themkhuyenmai($khuyenmai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO khuyenmai(TenKM, MoTa, GiaTriKM, NgayBD, NgayKT) 
VALUES(:TenKM, :MoTa, :GiaTriKM, :NgayKT)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':TenKM', $khuyenmai->TenKM);
            $cmd->bindValue(':MoTa', $khuyenmai->MoTa);
            $cmd->bindValue(':GiaTriKM', $khuyenmai->GiaTriKM);
            $cmd->bindValue(':NgayBD', $khuyenmai->NgayBD);
            $cmd->bindValue(':NgayKT', $khuyenmai->NgayKT);
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
    public function capnhatkhuyenmai($MaKM,$TenKM, $MoTa, $GiaTriKM, $NgayBD, $NgayKT) 
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE khuyenmai set TenKM=:TenKM, MoTa=:MoTa, GiaTriKM=:GiaTriKM, NgayBD=:NgayBD, NgayKT=:NgayKT  where MaKM=MaKM";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaKM', $MaKM);
            $cmd->bindValue(':TenKM', $TenKM);
            $cmd->bindValue(':MoTa', $MoTa);
            $cmd->bindValue(':GiaTriKM', $GiaTriKM);
            $cmd->bindValue(':NgayBD', $NgayBD);
            $cmd->bindValue(':NgayKT', $NgayKT);
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
    // public function doitrangthai($NgayKT, $TrangThai)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set TrangThai=:TrangThai where NgayKT=:NgayKT";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':NgayKT', $NgayKT);
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
