<?php
class DONHANG_CT
{
    private $MaDH_CT;
    private $MaDH;
    private $MaLS;
    private $SoLuong;
    private $DonGia;
    private $ThanhTien;
    
    
    public function getMaDH_CT()
    {
        return $this->MaDH_CT;
    }
    public function setMaDH_CT($value)
    {
        $this->MaDH_CT = $value;
    }
    public function getMaDH()
    {
        return $this->MaDH;
    }
    public function setMaDH($value)
    {
        $this->MaDH = $value;
    }
    public function getMaLS()
    {
        return $this->MaLS;
    }
    public function setMaLS($value)
    {
        $this->MaLS = $value;
    }
    public function getSoLuong()
    {
        return $this->SoLuong;
    }
    public function setSoLuong($value)
    {
        $this->SoLuong = $value;
    }
    public function getThanhTien()
    {
        return $this->ThanhTien;
    }
    public function setThanhTien($value)
    {
        $this->ThanhTien = $value;
    }
    public function getDonGia()
    {
        return $this->DonGia;
    }
    public function setDonGia($value)
    {
        $this->DonGia = $value;
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
    public function laydanhsachdonhang_ct()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM donhang_ct";
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
    public function themdonhang_ct($donhang_ct)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO donhang_ct(MaDH, MaLS, SoLuong, DonGia, ThanhTien) 
VALUES(:MaDH, :MaLS, :SoLuong, :ThanhTien)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaDH', $donhang_ct->MaDH);
            $cmd->bindValue(':MaLS', $donhang_ct->MaLS);
            $cmd->bindValue(':SoLuong', $donhang_ct->SoLuong);
            $cmd->bindValue(':DonGia', $donhang_ct->DonGia);
            $cmd->bindValue(':ThanhTien', $donhang_ct->ThanhTien);
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
    public function capnhatdonhang_ct($MaDH_CT,$MaDH, $MaLS, $SoLuong, $DonGia, $ThoiGianDatHang, $ThoiGianGiaoHang, $ThanhTien) 
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE donhang_ct set MaDH=:MaDH, MaLS=:MaLS, SoLuong=:SoLuong, DonGia=:DonGia, ThanhTien=:ThanhTien  where MaDH_CT=MaDH_CT";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaDH_CT', $MaDH_CT);
            $cmd->bindValue(':MaDH', $MaDH);
            $cmd->bindValue(':MaLS', $MaLS);
            $cmd->bindValue(':SoLuong', $SoLuong);
            $cmd->bindValue(':DonGia', $DonGia);
            $cmd->bindValue(':ThanhTien', $ThanhTien);
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
    public function doitrangthai($MaDH, $TrangThai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE baiviet set TrangThai=:TrangThai where MaDH=:MaDH";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaDH', $MaDH);
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
