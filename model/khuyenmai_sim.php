<?php
class KHUYENMAI_SIM
{
    private $MaKMS;
    private $MaS;
    private $MaKM;
    
    public function getMaKMS()
    {
        return $this->MaKMS;
    }
    public function setMaKMS($value)
    {
        $this->MaKMS = $value;
    }
    public function getMaS()
    {
        return $this->MaS;
    }
    public function setMaS($value)
    {
        $this->MaS = $value;
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
    public function laydanhsachkhuyenmai_sim()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM khuyenmai_sim ORDER BY MaKMS DESC";
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
    public function themkhuyenmai_sim($khuyenmai_sim)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO khuyenmai_sim(MaS, MaKM) 
VALUES(:MaS, :MaKM)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaS', $khuyenmai_sim->MaS);
            $cmd->bindValue(':MaKM', $khuyenmai_sim->MaKM);
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
    public function capnhatkhuyenmai_sim($MaKMS,$MaS, $MaKM)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE khuyenmai_sim set MaS=:MaS, MaKM=:MaKM  where MaKMS=MaKMS";
            $cmd = $db->prepare($sql);
            $cmd->bindValue('MaKMS', $MaKMS);
            $cmd->bindValue(':MaS', $MaS);
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
    // public function doitrangthai($MaS, $TrangThai)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set TrangThai=:TrangThai where MaS=:MaS";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':MaS', $MaS);
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
