<?php
class SIM
{
    private $MaSim;
    private $SoSim;
    private $MaLS;
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

    function timkiemsim($tukhoa)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sim WHERE SoSim LIKE :tukhoa";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tukhoa", "%$tukhoa%");
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    function timkiemsimtheodauso($dauSo)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sim WHERE SoSim LIKE :dauSo";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":dauSo", "$dauSo%");
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
            $sql = "SELECT * FROM sim WHERE SoSim LIKE :duoiSo";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":duoiSo", "%$duoiSo");
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
            $sql = "INSERT INTO sim(SoSim, MaLS, TinhTrang, LoaiThueBao) 
VALUES(:SoSim, :MaLS, :TinhTrang, :LoaiThueBao)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':SoSim', $sim->SoSim);
            $cmd->bindValue(':MaLS', $sim->MaLS);
            // $cmd->bindValue(':MoTa', $sim->MoTa);
            // $cmd->bindValue(':HinhAnh', $sim->HinhAnh);
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
    public function suasim($sim)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sim SET SoSim=:SoSim, MaLS=:MaLS, TinhTrang=:TinhTrang, LoaiThueBao=:LoaiThueBao WHERE MaSim=:MaSim";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':MaSim', $sim->MaSim);
            $cmd->bindValue(':SoSim', $sim->SoSim);
            $cmd->bindValue(':MaLS', $sim->MaLS);
            // $cmd->bindValue(':MoTa', $sim->MoTa);
            // $cmd->bindValue(':HinhAnh', $sim->HinhAnh);
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
