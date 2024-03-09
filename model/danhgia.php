<?php
class DANHGIA
{
    private $MaDG;
    private $MaND;
    private $NoiDung;
    private $urlHinhAnh;

    
    public function getMaDG()
    {
        return $this->MaDG;
    }
    public function setMaDG($value)
    {
        $this->MaDG = $value;
    }
    public function getMaND()
    {
        return $this->MaND;
    }
    public function setMaND($value)
    {
        $this->MaND = $value;
    }
    public function getNoiDung()
    {
        return $this->NoiDung;
    }
    public function setNoiDung($value)
    {
        $this->NoiDung = $value;
    }
    public function geturlHinhAnh()
    {
        return $this->urlHinhAnh;
    }
    public function seturlHinhAnh($value)
    {
        $this->urlHinhAnh = $value;
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
    public function laydanhsachdanhgia()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhgia";
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
    public function themdanhgia($danhgia)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO danhgia(MaND, NoiDung, urlHinhAnh) 
VALUES(:MaND, :NoiDung, :urlHinhAnh)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaND', $danhgia->MaND);
            $cmd->bindValue(':NoiDung', $danhgia->NoiDung);
            $cmd->bindValue(':urlHinhAnh', $danhgia->urlHinhAnh);
            $cmd->execute();
            $MaDG = $db->lastInsertMaDG();
            return $MaDG;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function capnhatdanhgia($MaDG,$MaND, $NoiDung, $urlHinhAnh)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE danhgia set MaND=:MaND, NoiDung=:NoiDung, urlHinhAnh  where MaDG=MaDG";
            $cmd = $db->prepare($sql);
            $cmd->bindValue('MaDG', $MaDG);
            $cmd->bindValue(':MaND', $MaND);
            $cmd->bindValue(':NoiDung', $NoiDung);
            $cmd->bindValue(':urlHinhAnh', $urlHinhAnh);
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
    // public function doiNoiDung($MaND, $NoiDung)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set NoiDung=:NoiDung where MaND=:MaND";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':MaND', $MaND);
    //         $cmd->bindValue(':NoiDung', $NoiDung);
    //         $ketqua = $cmd->execute();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
}
