<?php
class KHUYENMAI
{
    private $MaKM;
    private $MaLS;
    private $TenKM;
    private $MoTa;
    private $HinhAnh;
    private $GiaTriKM;
    private $LoaiKM;
    private $NgayBD;
    private $NgayKT;
    private $MaND;
    private $NgayTao;
    private $TrangThai;
    
    
    public function getMaKM()
    {
        return $this->MaKM;
    }
    public function setMaKM($value)
    {
        $this->MaKM = $value;
    }
    public function getMaLS()
    {
        return $this->MaLS;
    }
    public function setMaLS($value)
    {
        $this->MaLS = $value;
    }
    
    public function getTenKM()
    {
        return $this->TenKM;
    }
    public function setTenKM($value)
    {
        $this->TenKM = $value;
    }
    public function getMoTa()
    {
        return $this->MoTa;
    }
    public function setMoTa($value)
    {
        $this->MoTa = $value;
    }
    public function getHinhAnh()
    {
        return $this->HinhAnh;
    }
    public function setHinhAnh($value)
    {
        $this->HinhAnh = $value;
    }
    public function getGiaTriKM()
    {
        return $this->GiaTriKM;
    }
    public function setGiaTriKM($value)
    {
        $this->GiaTriKM = $value;
    }
    public function getLoaiKM()
    {
        return $this->LoaiKM;
    }
    public function setLoaiKM($value)
    {
        $this->LoaiKM = $value;
    }
    public function getNgayKT()
    {
        return $this->NgayKT;
    }
    public function setNgayKT($value)
    {
        $this->NgayKT = $value;
    }
    public function getNgayBD()
    {
        return $this->NgayBD;
    }
    public function setNgayBD($value)
    {
        $this->NgayBD = $value;
    }
    public function getMaND()
    {
        return $this->MaND;
    }
    public function setMaND($value)
    {
        $this->MaND = $value;
    }
    public function getNgayTao()
    {
        return $this->NgayTao;
    }
    public function setNgayTao($value)
    {
        $this->NgayTao = $value;
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


    public function laydanhsachkhuyenmaitheoid($MaKM)
    {
        $dbcon = DATABASE::connect();
        $intMaKM = (int)$MaKM;
        try {
            //$sql = $dbcon->query("SELECT * FROM khuyenmai WHERE MaKM=:MaKM");
            $sql = $dbcon->query("SELECT * FROM khuyenmai WHERE MaKM='".$MaKM."'");
            $sql->execute();
            //$cmd = $dbcon->prepare($sql);
            //$cmd->bindValue(":MaKM", $MaKM);
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

    // lấy tất cả ng dùng
    public function laydanhsachkhuyenmai()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM khuyenmai ORDER BY MaKM DESC";
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
    public function themkhuyenmai($khuyenmai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO khuyenmai(MaLS, TenKM, MoTa, HinhAnh, GiaTriKM, LoaiKM, NgayBD, NgayKT, MaND, NgayTao, TrangThai) 
VALUES(:MaLS, :TenKM, :MoTa, :HinhAnh, :GiaTriKM, :LoaiKM, :NgayBD, :NgayKT, :MaND, :NgayTao, :TrangThai)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaLS', $khuyenmai->MaLS);
            $cmd->bindValue(':TenKM', $khuyenmai->TenKM);
            $cmd->bindValue(':MoTa', $khuyenmai->MoTa);
            $cmd->bindValue(':HinhAnh', $khuyenmai->HinhAnh);
            $cmd->bindValue(':GiaTriKM', $khuyenmai->GiaTriKM);
            $cmd->bindValue(':LoaiKM', $khuyenmai->LoaiKM);
            $cmd->bindValue(':NgayBD', $khuyenmai->NgayBD);
            $cmd->bindValue(':NgayKT', $khuyenmai->NgayKT);
            $cmd->bindValue(':MaND', $khuyenmai->MaND);
            $cmd->bindValue(':NgayTao', $khuyenmai->NgayTao);
            $cmd->bindValue(':TrangThai', $khuyenmai->TrangThai);
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
    public function suakhuyenmai($khuyenmai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE khuyenmai SET MaLS=:MaLS, TenKM=:TenKM,MoTa=:MoTa, HinhAnh=:HinhAnh, GiaTriKM=:GiaTriKM, LoaiKM=:LoaiKM, NgayBD=:NgayBD, NgayKT=:NgayKT,  NgayTao=:NgayTao,  TrangThai=:TrangThai WHERE MaKM=:MaKM";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':MaLS', $khuyenmai->MaLS);
            $cmd->bindValue(':TenKM', $khuyenmai->TenKM);
            $cmd->bindValue(':MoTa', $khuyenmai->MoTa);
            $cmd->bindValue(':HinhAnh', $khuyenmai->HinhAnh);
            $cmd->bindValue(':GiaTriKM', $khuyenmai->GiaTriKM);
            $cmd->bindValue(':LoaiKM', $khuyenmai->LoaiKM);
            $cmd->bindValue(':NgayBD', $khuyenmai->NgayBD);
            $cmd->bindValue(':NgayKT', $khuyenmai->NgayKT);
            // $cmd->bindValue(':MaND', $khuyenmai->MaND);
            $cmd->bindValue(':NgayTao', $khuyenmai->NgayTao);
            $cmd->bindValue(':TrangThai', $khuyenmai->TrangThai);
            $cmd->bindValue(':MaKM', $khuyenmai->MaKM);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // public function kiemtratrangthai($MaKM)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $ngay_hien_tai = date("Y-m-d"); // Lấy ngày hiện tại

    //         $sql = "SELECT * FROM khuyenmai WHERE MaKM = :MaKM";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':MaKM', $MaKM);
    //         $cmd->execute();
    //         $ketqua = $cmd->fetch();

    //         if ($ketqua) { // Nếu tìm thấy chương trình khuyến mãi
    //             $ngay_bd = $ketqua['NgayBD']; // Lấy ngày bắt đầu
    //             $ngay_kt = $ketqua['NgayKT']; // Lấy ngày kết thúc

    //             // So sánh ngày bắt đầu và kết thúc với ngày hiện tại
    //             if ($ngay_hien_tai >= $ngay_bd && $ngay_hien_tai <= $ngay_kt) {
    //                 return "Chương trình khuyến mãi đang diễn ra";
    //             } elseif ($ngay_hien_tai < $ngay_bd) {
    //                 return "Chương trình khuyến mãi sẽ bắt đầu vào ngày $ngay_bd";
    //             } else {
    //                 return "Chương trình khuyến mãi đã kết thúc vào ngày $ngay_kt";
    //             }
    //         } else { // Nếu không tìm thấy chương trình khuyến mãi
    //             return "Không tìm thấy chương trình khuyến mãi";
    //         }
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }

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
    public function doitrangthai($MaKM, $TrangThai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE khuyenmai set TrangThai=:TrangThai where MaKM=:MaKM";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaKM', $MaKM);
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
