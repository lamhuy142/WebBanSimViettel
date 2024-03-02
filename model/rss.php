<?php
class RSS
{
    private $Ma;
    private $MaTL;
    private $Url;
    
    public function getMa()
    {
        return $this->Ma;
    }
    public function setMa($value)
    {
        $this->Ma = $value;
    }
    public function getMaND()
    {
        return $this->MaTL;
    }
    public function setMaND($value)
    {
        $this->MaTL = $value;
    }
    public function getUrl()
    {
        return $this->Url;
    }
    public function setUrl($value)
    {
        $this->Url = $value;
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
    public function laydanhsachrss()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM rss";
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
    public function themrss($rss)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO rss(MaTL, Url) 
VALUES(:MaTL, :Url)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaTL', $rss->MaTL);
            $cmd->bindValue(':Url', $rss->Url);
            $cmd->execute();
            $Ma = $db->lastInsertMa();
            return $Ma;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function capnhatrss($Ma,$MaTL, $Url)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE rss set MaTL=:MaTL, Url=:Url  where Ma=Ma";
            $cmd = $db->prepare($sql);
            $cmd->bindValue('Ma', $Ma);
            $cmd->bindValue(':MaTL', $MaTL);
            $cmd->bindValue(':Url', $Url);
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
    // public function doiUrl($MaTL, $Url)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set Url=:Url where MaTL=:MaTL";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':MaTL', $MaTL);
    //         $cmd->bindValue(':Url', $Url);
    //         $ketqua = $cmd->execute();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
}