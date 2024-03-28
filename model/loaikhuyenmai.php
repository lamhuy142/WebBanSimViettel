<?php
class LOAIKHUYENMAI
{
    private $MaLKM;
    private $TenLKM;
    private $DonViKM;
    private $TrangThai;
    
    public function getMaLKM()
    {
        return $this->MaLKM;
    }
    public function setMaLKM($value)
    {
        $this->MaLKM = $value;
    }
    public function getTenLKM()
    {
        return $this->TenLKM;
    }
    public function setTenLKM($value)
    {
        $this->TenLKM = $value;
    }
    public function getDonViKM()
    {
        return $this->DonViKM;
    }
    public function setDonViKM($value)
    {
        $this->DonViKM = $value;
    }
    public function getTrangThai()
    {
        return $this->TrangThai;
    }
    public function setTrangThai($value)
    {
        $this->TrangThai = $value;
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
    public function laydanhsachloaikmtheoid($MaLKM)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loaikhuyenmai WHERE MaLKM=:MaLKM";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaLKM", $MaLKM);
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
    public function laydanhsachloaikhuyenmai()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loaikhuyenmai ORDER BY MaLKM DESC";
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
    public function laydanhsachtrangthai()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT TrangThai FROM loaikhuyenmai GROUP BY TrangThai";
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
    public function themloaikhuyenmai($loaikhuyenmai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO loaikhuyenmai(TenLKM, DonViKM, TrangThai) 
VALUES(:TenLKM, :DonViKM, :TrangThai)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':TenLKM', $loaikhuyenmai->TenLKM);
            $cmd->bindValue(':DonViKM', $loaikhuyenmai->DonViKM);
            $cmd->bindValue(':TrangThai', $loaikhuyenmai->TrangThai);
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
    public function capnhatloaikhuyenmai($MaLKM)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE loaikhuyenmai set TenLKM=:TenLKM, DonViKM=:DonViKM, TrangThai=:TrangThai  where MaLKM=:MaLKM";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaLKM', $MaLKM->MaLKM);
            $cmd->bindValue(':TenLKM', $MaLKM->TenLKM);
            $cmd->bindValue(':DonViKM', $MaLKM->DonViKM);
            $cmd->bindValue(':TrangThai', $MaLKM->TrangThai);
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
    public function doitrangthai($MaLKM, $TrangThai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE loaikhuyenmai set TrangThai=:TrangThai where MaLKM=:MaLKM";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaLKM', $MaLKM);
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
