<?php
class GOICUOC
{
    private $MaGC;
    private $MaLGC;
    private $Ten;
    private $MoTa;
    private $ThoiHan;
    private $Gia;
    private $GiaTriKM;
    
    
    public function getMaGC()
    {
        return $this->MaGC;
    }
    public function setMaGC($value)
    {
        $this->MaGC = $value;
    }
    public function getMaLGC()
    {
        return $this->MaLGC;
    }
    public function setMaLGC($value)
    {
        $this->MaLGC = $value;
    }
    public function getTen()
    {
        return $this->Ten;
    }
    public function setTen($value)
    {
        $this->Ten = $value;
    }
    public function getMoTa()
    {
        return $this->MoTa;
    }
    public function setMoTa($value)
    {
        $this->MoTa = $value;
    }
    public function getThoiHan()
    {
        return $this->ThoiHan;
    }
    public function setThoiHan($value)
    {
        $this->ThoiHan = $value;
    }
    public function getGiaTriKM()
    {
        return $this->GiaTriKM;
    }
    public function setGiaTriKM($value)
    {
        $this->GiaTriKM = $value;
    }
    public function getGia()
    {
        return $this->Gia;
    }
    public function setGia($value)
    {
        $this->Gia = $value;
    }
    public function laygoicuoctheoid($MaGC)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM goicuoc WHERE MaGC=:MaGC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaGC", $MaGC);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laysoluonggc()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT count(*) FROM goicuoc";
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
            $sql = "SELECT * FROM goicuoc LIMIT :gioihan OFFSET :vitri";
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
    public function xoagoicuoc($goicuoc)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM goicuoc WHERE MaGC=:MaGC ";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaGC", $goicuoc->MaGC);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // lấy tất cả ng dùng
    public function laydanhsachgoicuoc()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM goicuoc ORDER BY MaGC DESC";
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
    public function themgoicuoc($goicuoc)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO goicuoc(MaLGC, Ten, MoTa, Gia, GiaTriKM, ThoiHan) VALUES(:MaLGC, :Ten, :MoTa, :Gia, :GiaTriKM, :ThoiHan)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaLGC', $goicuoc->MaLGC);
            $cmd->bindValue(':Ten', $goicuoc->Ten);
            $cmd->bindValue(':MoTa', $goicuoc->MoTa);
            $cmd->bindValue(':ThoiHan', $goicuoc->ThoiHan);
            $cmd->bindValue(':Gia', $goicuoc->Gia);
            $cmd->bindValue(':GiaTriKM', $goicuoc->GiaTriKM);
            
            $result = $cmd->execute();

            return $result;
            
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function suagoicuoc($goicuoc)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE goicuoc SET MaLGC=:MaLGC, Ten=:Ten, MoTa=:MoTa, Gia=:Gia, GiaTriKM=:GiaTriKM, ThoiHan=:ThoiHan WHERE MaGC=:MaGC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':MaGC', $goicuoc->MaGC);
            $cmd->bindValue(':MaLGC', $goicuoc->MaLGC);
            $cmd->bindValue(':Ten', $goicuoc->Ten);
            $cmd->bindValue(':MoTa', $goicuoc->MoTa);
            $cmd->bindValue(':ThoiHan', $goicuoc->ThoiHan);
            $cmd->bindValue(':Gia', $goicuoc->Gia);
            $cmd->bindValue(':GiaTriKM', $goicuoc->GiaTriKM);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function doitrangthai($MaGC, $TrangThai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE goicuoc set TrangThai=:TrangThai where MaGC=:MaGC";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaGC', $MaGC);
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
