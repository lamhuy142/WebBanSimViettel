<?php
class SIM
{
    private $MaSim;
    private $SoSim;
    private $MaLS;
    private $MoTa;
    private $HinhAnh;
    private $TinhTrang;
    private $LoaiThueBao;



    public function getMaSim()
    {
        return $this->MaSim;
    }
    public function setMaSim($value)
    {
        $this->MaSim = $value;
    }
    public function getSoSim()
    {
        return $this->SoSim;
    }
    public function setSoSim($value)
    {
        $this->SoSim = $value;
    }
    public function getMaLS()
    {
        return $this->MaLS;
    }
    public function setMaLS($value)
    {
        $this->MaLS = $value;
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
    public function getTinhTrang()
    {
        return $this->TinhTrang;
    }
    public function setTinhTrang($value)
    {
        $this->TinhTrang = $value;
    }
    public function getLoaiThueBao()
    {
        return $this->LoaiThueBao;
    }
    public function setLoaiThueBao($value)
    {
        $this->LoaiThueBao = $value;
    }


    function timkiemsimtheodauso($dauSo)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sim WHERE so_sim LIKE :dauSo%";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":dauSo", $dauSo);
            // $cmd->bindValue(":duoiSo", $duoiSo);
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    function timkiemsimtheoduoiso($duoiSo)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sim WHERE so_sim LIKE %:duoiSo";
            $cmd = $dbcon->prepare($sql);
            // $cmd->bindValue(":dauSo", $dauSo);
            $cmd->bindValue(":duoiSo", $duoiSo);
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }



    // lấy tất cả ng dùng
    public function laydanhsachsim()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sim ORDER BY MaSim DESC";
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
    public function laydanhsachloaithuebao()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT LoaiThueBao FROM sim GROUP BY LoaiThueBao";
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
    public function laydanhsachsimtheoid($MaSim)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sim WHERE MaSim=:MaSim";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaSim", $MaSim);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laysimtheoloai($MaLS)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sim WHERE MaLS=:MaLS";
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
    public function themsim($sim)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO sim(SoSim, MaLS, MoTa, HinhAnh, TinhTrang, LoaiThueBao) 
VALUES(:SoSim, :MaLS, :MoTa, :HinhAnh, :TinhTrang, :LoaiThueBao)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':SoSim', $sim->SoSim);
            $cmd->bindValue(':MaLS', $sim->MaLS);
            $cmd->bindValue(':MoTa', $sim->MoTa);
            $cmd->bindValue(':HinhAnh', $sim->HinhAnh);
            $cmd->bindValue(':TinhTrang', $sim->TinhTrang);
            $cmd->bindValue(':LoaiThueBao', $sim->LoaiThueBao);
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
    // public function capnhatsim($MaSim, $SoSim, $MaLS, $MoTa, $HinhAnh, $GiaGoc, $GiaBan, $TinhTrang) 
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE sim set SoSim=:SoSim, MaLS=:MaLS, MoTa=:MoTa, HinhAnh=:HinhAnh, GiaGoc=:GiaGoc, GiaBan=:GiaBan, TinhTrang=:TinhTrang where MaSim=MaSim";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':MaSim', $MaSim);
    //         $cmd->bindValue(':SoSim', $SoSim);
    //         $cmd->bindValue(':MaLS', $MaLS);
    //         $cmd->bindValue(':MoTa', $MoTa);
    //         $cmd->bindValue(':HinhAnh', $HinhAnh);
    //         $cmd->bindValue(':GiaGoc', $GiaGoc);
    //         $cmd->bindValue(':GiaBan', $GiaBan);
    //         $cmd->bindValue(':TinhTrang', $TinhTrang);

    //         $ketqua = $cmd->execute();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    public function suasim($sim)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sim SET SoSim=:SoSim, MaLS=:MaLS, MoTa=:MoTa, HinhAnh=:HinhAnh, TinhTrang=:TinhTrang, LoaiThueBao=:LoaiThueBao WHERE MaSim=:MaSim";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':MaSim', $sim->MaSim);
            $cmd->bindValue(':SoSim', $sim->SoSim);
            $cmd->bindValue(':MaLS', $sim->MaLS);
            $cmd->bindValue(':MoTa', $sim->MoTa);
            $cmd->bindValue(':HinhAnh', $sim->HinhAnh);
            $cmd->bindValue(':TinhTrang', $sim->TinhTrang);
            $cmd->bindValue(':LoaiThueBao', $sim->LoaiThueBao);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function xoasim($sim)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM sim WHERE MaSim=:MaSim";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaSim", $sim->MaSim);
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
    public function doitrangthai($MaSim, $TinhTrang)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE sim set TinhTrang=:TinhTrang where MaSim=:MaSim";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaSim', $MaSim);
            $cmd->bindValue(':TinhTrang', $TinhTrang);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
