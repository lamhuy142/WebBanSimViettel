<?php
class NGUOIDUNG
{
    private $MaND;
    private $TenDangNhap;
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
    public function getTenDangNhap()
    {
        return $this->TenDangNhap;
    }
    public function setTenDangNhap($value)
    {
        $this->TenDangNhap = $value;
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

    public function kiemtranguoidunghople($TenDangNhap, $MatKhau)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE TenDangNhap=:TenDangNhap AND MatKhau=:MatKhau AND TrangThai=1";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":TenDangNhap", $TenDangNhap);
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

    // lấy thông tin người dùng có $TenDangNhap
    public function laythongtinnguoidung($TenDangNhap)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE TenDangNhap=:TenDangNhap";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":TenDangNhap", $TenDangNhap);
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
    public function laynguoidungtheoid($MaND)
    {
        $dbcon = DATABASE::connect();
        $intMaND = (int)$MaND;
        try {
            //$sql = $dbcon->query("SELECT * FROM khuyenmai WHERE MaND=:MaND");
            $sql = $dbcon->query("SELECT * FROM nguoidung WHERE MaND='" . $MaND . "'");
            $sql->execute();
            //$cmd = $dbcon->prepare($sql);
            //$cmd->bindValue(":MaND", $MaND);
            //echo ($cmd);
            //$result = $cmd->fetch();
            $result = $sql->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // public function laydanhsachnguoidungtheoid($MaND)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM nguoidung WHERE MaND=:MaND";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(":MaND", $MaND);
    //         $cmd->execute();
    //         $ketqua = $cmd->fetchAll();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    // lấy tất cả ng dùng
    public function laydanhsachnguoidung()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung ORDER BY MaND DESC";
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
            $sql = "INSERT INTO nguoidung(HoTen, Sdt, MatKhau, TenDangNhap, TrangThai, HinhAnh, MaQ, DiaChi) 
VALUES(:HoTen, :Sdt, :MatKhau, :TenDangNhap, :TrangThai, :HinhAnh, :MaQ, :DiaChi)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':HoTen', $nguoidung->HoTen);
            $cmd->bindValue(':Sdt', $nguoidung->Sdt);
            $cmd->bindValue(':MatKhau', md5($nguoidung->MatKhau));
            $cmd->bindValue(':TenDangNhap', $nguoidung->TenDangNhap);
            $cmd->bindValue(':TrangThai', $nguoidung->TrangThai);
            $cmd->bindValue(':HinhAnh', $nguoidung->HinhAnh);
            $cmd->bindValue(':MaQ', $nguoidung->MaQ);
            $cmd->bindValue(':DiaChi', $nguoidung->DiaChi);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, TenDangNhap, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function suanguoidung($nguoidung)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung SET TenDangNhap=:TenDangNhap, HoTen=:HoTen, Sdt=:Sdt, MatKhau=:MatKhau,MaQ=:MaQ,  TrangThai=:TrangThai, HinhAnh=:HinhAnh, DiaChi=:DiaChi WHERE MaND=:MaND";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':TenDangNhap', $nguoidung->TenDangNhap);
            $cmd->bindValue(':HoTen', $nguoidung->HoTen);
            $cmd->bindValue(':Sdt', $nguoidung->Sdt);
            $cmd->bindValue(':MatKhau', md5($nguoidung->MatKhau));
            $cmd->bindValue(':TrangThai', $nguoidung->TrangThai);
            $cmd->bindValue(':HinhAnh', $nguoidung->HinhAnh);
            $cmd->bindValue(':DiaChi', $nguoidung->DiaChi);
            $cmd->bindValue(':MaQ', $nguoidung->MaQ);
            $cmd->bindValue(':MaND', $nguoidung->MaND);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi mật khẩu
    public function doiMatKhau($TenDangNhap, $MatKhau)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set MatKhau=:MatKhau where TenDangNhap=:TenDangNhap";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':TenDangNhap', $TenDangNhap);
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
    public function doiloainguoidung($TenDangNhap, $MaQ)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set MaQ=:MaQ where TenDangNhap=:TenDangNhap";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':TenDangNhap', $TenDangNhap);
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
    
    public function kiemtraSdtTonTai($sodienthoai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) FROM nguoidung WHERE Sdt=:sodienthoai";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":sodienthoai", $sodienthoai);
            $cmd->execute();
            $count = $cmd->fetchColumn();
            $cmd->closeCursor();
            return $count > 0; // Trả về true nếu số điện thoại đã tồn tại, ngược lại trả về false
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function kiemtraTenDangNhapTonTai($TenDangNhap)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) FROM nguoidung WHERE TenDangNhap=:TenDangNhap";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":TenDangNhap", $TenDangNhap);
            $cmd->execute();
            $count = $cmd->fetchColumn();
            $cmd->closeCursor();
            return $count > 0; // Trả về true nếu số điện thoại đã tồn tại, ngược lại trả về false
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
