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
            $sql = $dbcon->query("SELECT * FROM khuyenmai WHERE MaKM='".$MaKM."'");
            $sql->execute();
            $result = $sql->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laysoluongkm()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT count(*) FROM khuyenmai";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchColumn(); // trả về giá trị của cột đầu tiên từ kết quả truy vấn.
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function phantrang($vitri, $gioihan)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM khuyenmai LIMIT :gioihan OFFSET :vitri";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':gioihan', $gioihan, PDO::PARAM_INT);
            $cmd->bindValue(':vitri', $vitri, PDO::PARAM_INT);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

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
