<?php
class LOAISIM
{
    private $MaLS;
    private $TenLS;
    private $MaGC;
    private $GiaGoc;
    private $GiaBan;
    private $LuotMua;
    private $TrangThai;
    
    public function getMaLS()
    {
        return $this->MaLS;
    }
    public function setMaLS($value)
    {
        $this->MaLS = $value;
    }
    public function getTenLS()
    {
        return $this->TenLS;
    }
    public function setTenLS($value)
    {
        $this->TenLS = $value;
    }
    public function getMaGC()
    {
        return $this->MaGC;
    }
    public function setMaGC($value)
    {
        $this->MaGC = $value;
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
    public function getLuotMua()
    {
        return $this->LuotMua;
    }
    public function setLuotMua($value)
    {
        $this->LuotMua = $value;
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

    // lấy tất cả ng dùng
    public function laydanhsachloaisim()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loaisim ORDER BY MaLS DESC";
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
    public function laydanhsachloaisimtheoid($MaLS)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loaisim WHERE MaLS=:MaLS";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaLS", $MaLS);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
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
            $sql = "INSERT INTO loaisim(TenLS, MaGC, GiaGoc, GiaBan, LuotMua, TrangThai) 
VALUES(:TenLS, :MaGC, :GiaGoc, :GiaBan, :LuotMua, :TrangThai)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':TenLS', $loaisim->TenLS);
            $cmd->bindValue(':MaGC', $loaisim->MaGC);
            $cmd->bindValue(':GiaGoc', $loaisim->GiaGoc);
            $cmd->bindValue(':GiaBan', $loaisim->GiaBan);
            $cmd->bindValue(':LuotMua', $loaisim->LuotMua);
            $cmd->bindValue(':TrangThai', $loaisim->TrangThai);
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
    public function sualoaisim($loaisim)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE loaisim SET MaGC=:MaGC, TenLS=:TenLS, GiaGoc=:GiaGoc,GiaBan=:GiaBan, LuotMua=:LuotMua, TrangThai=:TrangThai WHERE MaLS=:MaLS";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':MaLS', $loaisim->MaLS);
            $cmd->bindValue(':MaGC', $loaisim->MaGC);
            $cmd->bindValue(':TenLS', $loaisim->TenLS);
            $cmd->bindValue(':GiaGoc', $loaisim->GiaGoc);
            $cmd->bindValue(':GiaBan', $loaisim->GiaBan);
            $cmd->bindValue(':LuotMua', $loaisim->LuotMua);
            $cmd->bindValue(':TrangThai', $loaisim->TrangThai);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // }
    // Đổi trạng thái (0 khóa, 1 kích hoạt)
    public function doitrangthai($MaLS, $TrangThai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE loaisim set TrangThai=:TrangThai where MaLS=:MaLS";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaLS', $MaLS);
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