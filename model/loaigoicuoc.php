<?php
class LOAIGOICUOC
{
    private $MaLGC;
    private $TenLGC;
    private $TrangThai;
    
    public function getMaLGC()
    {
        return $this->MaLGC;
    }
    public function setMaLGC($value)
    {
        $this->MaLGC = $value;
    }
    public function getTenLGC()
    {
        return $this->TenLGC;
    }
    public function setTenLGC($value)
    {
        $this->TenLGC = $value;
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
    public function laydanhsachloaigoicuoctheoid($MaLGC)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loaigoicuoc WHERE MaLGC=:MaLGC";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":MaLGC", $MaLGC);
            $cmd->execute();
            $ketqua = $cmd->fetch();
            $cmd->closeCursor();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // lấy tất cả ng dùng
    public function laydanhsachloaigoicuoc()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loaigoicuoc ORDER BY MaLGC DESC";
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
    public function themloaigoicuoc($loaigoicuoc)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO loaigoicuoc(TenLGC, TrangThai) 
VALUES(:TenLGC, :TrangThai)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':TenLGC', $loaigoicuoc->TenLGC);
            $cmd->bindValue(':TrangThai', $loaigoicuoc->TrangThai);
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
    public function sualoaigoicuoc($MaLGC)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE loaigoicuoc set TenLGC=:TenLGC, TrangThai=:TrangThai  where MaLGC=:MaLGC";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaLGC', $MaLGC->MaLGC);
            $cmd->bindValue(':TenLGC', $MaLGC->TenLGC);
            $cmd->bindValue(':TrangThai', $MaLGC->TrangThai);
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
    // Đổi trạng thái (0 khóa, 1 kích hoạt)
    public function doitrangthai($MaLGC, $TrangThai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE loaigoicuoc set TrangThai=:TrangThai where MaLGC=:MaLGC";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaLGC', $MaLGC);
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
