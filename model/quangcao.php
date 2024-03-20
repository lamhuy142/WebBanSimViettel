<?php
class QUANGCAO
{
    private $MaQC;
    private $HinhAnh;
    private $Url;
    private $TrangThai;

    
    public function getMaQC()
    {
        return $this->MaQC;
    }
    public function setMaQC($value)
    {
        $this->MaQC = $value;
    }
    public function getHinhAnh()
    {
        return $this->HinhAnh;
    }
    public function setHinhAnh($value)
    {
        $this->HinhAnh = $value;
    }
    public function getUrl()
    {
        return $this->Url;
    }
    public function setUrl($value)
    {
        $this->Url = $value;
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


    public function laydanhsachquangcaotheoid($MaQC)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM quangcao WHERE MaQC=:MaQC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaQC", $MaQC);
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
    public function laydanhsachquangcao()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM quangcao ORDER BY MaQC DESC";
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
    public function themquangcao($quangcao)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO quangcao(HinhAnh, Url, TrangThai) 
VALUES(:HinhAnh, :Url, :TrangThai)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':HinhAnh', $quangcao->HinhAnh);
            $cmd->bindValue(':Url', $quangcao->Url);
            $cmd->bindValue(':TrangThai', $quangcao->TrangThai);
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
    public function suaquangcao($quangcao)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE quangcao SET HinhAnh=:HinhAnh, Url=:Url, TrangThai=:TrangThai WHERE MaQC=:MaQC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':HinhAnh', $quangcao->HinhAnh);
            $cmd->bindValue(':Url', $quangcao->Url);
            $cmd->bindValue(':TrangThai', $quangcao->TrangThai);
            $cmd->bindValue(':MaQC', $quangcao->MaQC);
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
    public function doitrangthai($MaQC, $TrangThai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE quangcao set TrangThai=:TrangThai where MaQC=:MaQC";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaQC', $MaQC);
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
