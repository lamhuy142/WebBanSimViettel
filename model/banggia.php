<?php
class BANGGIA
{
    private $MaSP;
    private $GiaGoc;
    private $GiaBan;
    private $GiaKM;
    private $MaKM;
    
    
    public function getMaSP()
    {
        return $this->MaSP;
    }
    public function setMaSP($value)
    {
        $this->MaSP = $value;
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
    public function getGiaKM()
    {
        return $this->GiaKM;
    }
    public function setGiaKM($value)
    {
        $this->GiaKM = $value;
    }
    public function getMaKM()
    {
        return $this->MaKM;
    }
    public function setMaKM($value)
    {
        $this->MaKM = $value;
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
    public function laydanhsachbanggia()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM banggia";
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
    public function thembanggia($banggia)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO banggia(GiaGoc, GiaBan, GiaKM, MaKM) 
VALUES(:GiaGoc, :GiaBan, :GiaKM, :MaKM)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':GiaGoc', $banggia->GiaGoc);
            $cmd->bindValue(':GiaBan', $banggia->GiaBan);
            $cmd->bindValue(':GiaKM', $banggia->GiaKM);
            $cmd->bindValue(':MaKM', $banggia->MaKM);
            $cmd->execute();
            $MaSP = $db->lastInsertMaSP();
            return $MaSP;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function capnhatbanggia($MaSP,$GiaGoc, $GiaBan, $GiaKM, $MaKM) 
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE banggia set GiaGoc=:GiaGoc, GiaBan=:GiaBan, GiaKM=:GiaKM, MaKM=:MaKM  where MaSP=MaSP";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaSP', $MaSP);
            $cmd->bindValue(':GiaGoc', $GiaGoc);
            $cmd->bindValue(':GiaBan', $GiaBan);
            $cmd->bindValue(':GiaKM', $GiaKM);
            $cmd->bindValue(':MaKM', $MaKM);
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
    // public function doitrangthai($MaKM, $TrangThai)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set TrangThai=:TrangThai where MaKM=:MaKM";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':MaKM', $MaKM);
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
