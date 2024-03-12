<?php
class LOAISIM
{
    private $MaLS;
    private $TenS;
    private $SoLuong;
    private $LuotMua;
    
    public function getMaLS()
    {
        return $this->MaLS;
    }
    public function setMaLS($value)
    {
        $this->MaLS = $value;
    }
    public function getTenS()
    {
        return $this->TenS;
    }
    public function setTenS($value)
    {
        $this->TenS = $value;
    }
    public function getSoLuong()
    {
        return $this->SoLuong;
    }
    public function setSoLuong($value)
    {
        $this->SoLuong = $value;
    }
    public function getLuotMua()
    {
        return $this->LuotMua;
    }
    public function setLuotMua($value)
    {
        $this->LuotMua = $value;
    }
    // khai báo các thuộc tính (SV tự viết)

    // lấy tất cả ng dùng
    public function laydanhsachloaisim()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loaisim";
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
    public function themloaisim($loaisim)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO loaisim(TenS, SoLuong, LuotMua) 
VALUES(:TenS, :SoLuong, :LuotMua)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':TenS', $loaisim->TenS);
            $cmd->bindValue(':SoLuong', $loaisim->SoLuong);
            $cmd->bindValue(':LuotMua', $loaisim->LuotMua);
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
    public function capnhatloaisim($MaLS,$TenS, $SoLuong, $LuotMua)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE loaisim set TenS=:TenS, SoLuong=:SoLuong,   where MaLS=MaLS";
            $cmd = $db->prepare($sql);
            $cmd->bindValue('MaLS', $MaLS);
            $cmd->bindValue(':TenS', $TenS);
            $cmd->bindValue(':SoLuong', $SoLuong);
            $cmd->bindValue(':LuotMua', $LuotMua);
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
    // public function doitrangthai($TenS, $TrangThai)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set TrangThai=:TrangThai where TenS=:TenS";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':TenS', $TenS);
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