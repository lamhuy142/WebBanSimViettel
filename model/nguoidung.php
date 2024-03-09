<?php
class NGUOIDUNG
{
    private $MaND;
    private $Email;
    private $Sdt;
    private $MatKhau;
    private $HoTen;
    private $MaQ;
    private $TrangThai;
    private $HinhAnh;
    private $DiaChi;
    

    public function getMaND()
    {
        return $this->MaND;
    }
    public function setMaND($value)
    {
        $this->MaND = $value;
    }
    public function getHoTen()
    {
        return $this->HoTen;
    }
    public function setHoTen($value)
    {
        $this->HoTen = $value;
    }
    public function getSdt()
    {
        return $this->Sdt;
    }
    public function setSdt($value)
    {
        $this->Sdt = $value;
    }
    public function getMatKhau()
    {
        return $this->MatKhau;
    }
    public function setMatKhau($value)
    {
        $this->MatKhau = $value;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function setEmail($value)
    {
        $this->Email = $value;
    }
    public function getHinhAnh()
    {
        return $this->HinhAnh;
    }
    public function setHinhAnh($value)
    {
        $this->HinhAnh = $value;
    }
    public function getMaQ()
    {
        return $this->MaQ;
    }
    public function setMaQ($value)
    {
        $this->MaQ = $value;
    }
    public function getDiaChi()
    {
        return $this->DiaChi;
    }
    public function setDiaChi($value)
    {
        $this->DiaChi = $value;
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

    public function kiemtranguoidunghople($Email, $MatKhau)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE Email=:Email AND MatKhau=:MatKhau AND TrangThai=1";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":Email", $Email);
            $cmd->bindValue(":MatKhau", md5($MatKhau));
            $cmd->execute();
            $valMaND = ($cmd->rowCount() == 1);
            $cmd->closeCursor();
            return $valMaND;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // lấy thông tin người dùng có $email
    public function laythongtinnguoidung($Email)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE Email=:Email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":Email", $Email);
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
    public function laydanhsachnguoidung()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung";
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
    public function themnguoidung($nguoidung)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO nguoidung(HoTen, Sdt, MatKhau, Email, TrangThai, HinhAnh, MaQ, DiaChi) 
VALUES(:HoTen, :Sdt, :MatKhau, :Email, :TrangThai, :HinhAnh, :MaQ, :DiaChi)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':HoTen', $nguoidung->HoTen);
            $cmd->bindValue(':Sdt', $nguoidung->Sdt);
            $cmd->bindValue(':MatKhau', md5($nguoidung->MatKhau));
            $cmd->bindValue(':Email', $nguoidung->Email);
            $cmd->bindValue(':TrangThai', $nguoidung->TrangThai);
            $cmd->bindValue(':HinhAnh', $nguoidung->HinhAnh);
            $cmd->bindValue(':MaQ', $nguoidung->MaQ);
            $cmd->bindValue(':DiaChi', $nguoidung->DiaChi);
            $cmd->execute();
            $MaND = $db->lastInsertMaND();
            return $MaND;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function capnhatnguoidung($MaND, $HoTen , $Sdt , $MatKhau , $Email, $TrangThai, $HinhAnh, $MaQ, $DiaChi)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set HoTen=:HoTen, Sdt=:Sdt, MatKhau=:MatKhau, Email=:Email, TrangThai=:TrangThai, HinhAnh=:HinhAnh, MaQ=:MaQ, DiaChi=:DiaChi where MaND=MaND";
            $cmd = $db->prepare($sql);
            $cmd->bindValue('MaND', $MaND);
            $cmd->bindValue(':HoTen', $HoTen);
            $cmd->bindValue(':Sdt', $Sdt);
            $cmd->bindValue(':MatKhau', $MatKhau);
            $cmd->bindValue(':Email', $Email);
            $cmd->bindValue(':TrangThai', $TrangThai);
            $cmd->bindValue(':HinhAnh', $HinhAnh);
            $cmd->bindValue(':MaQ', $MaQ);
            $cmd->bindValue(':DiaChi', $DiaChi);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi mật khẩu
    public function doiMatKhau($Email, $MatKhau)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set MatKhau=:MatKhau where Email=:Email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':Email', $Email);
            $cmd->bindValue(':MatKhau', md5($MatKhau));
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi quyền (loại người dùng: 1 quản trị, 2 nhân viên. Không cần nâng cấp quyền đối với loại người dùng 3 khách hàng)
    public function doiloainguoidung($Email, $MaQ)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set MaQ=:MaQ where Email=:Email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':Email', $Email);
            $cmd->bindValue(':MaQ', $MaQ);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi trạng thái (0 khóa, 1 kích hoạt)
    public function doitrangthai($MaND, $TrangThai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set TrangThai=:TrangThai where MaND=:MaND";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaND', $MaND);
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
