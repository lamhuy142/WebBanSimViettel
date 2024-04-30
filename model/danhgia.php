<?php
class DANHGIA
{
    private $MaDG;
    private $MaND;
    private $MaKM;
    private $NoiDung;
    private $NgayDG;


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
    public function getMaKM()
    {
        return $this->MaKM;
    }
    public function setMaKM($value)
    {
        $this->MaKM = $value;
    }
    public function getNoiDung()
    {
        return $this->NoiDung;
    }
    public function setNoiDung($value)
    {
        $this->NoiDung = $value;
    }
    public function getNgayDG()
    {
        return $this->NgayDG;
    }
    public function setNgayDG($value)
    {
        $this->NgayDG = $value;
    }

    public function laydanhsachdanhgiatheoid($MaDG)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhgia WHERE MaDG=:MaDG";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaDG", $MaDG);
            $cmd->execute();
            //=======================================
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laydanhsachdanhgia()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhgia ORDER BY MaDG DESC";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            //=======================================
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function tongsoluongdanhgia()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) AS TongSoDanhGia FROM danhgia";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            //=======================================
            $result = $cmd->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function soluongchuatraloi()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*)
                FROM danhgia
                LEFT JOIN traloidanhgia ON danhgia.MaDG = traloidanhgia.MaDG
                WHERE traloidanhgia.MaDG IS NULL";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function danhsachchuatraloi()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhgia
                WHERE MaDG NOT IN (SELECT MaDG FROM traloidanhgia)";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function kiemtradanhgia($MaDG)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) AS soLuongTraLoi
                    FROM danhgia
                    LEFT JOIN traloidanhgia ON danhgia.MaDG = traloidanhgia.MaDG
                    WHERE danhgia.MaDG = :MaDG
                    AND traloidanhgia.MaDG IS NOT NULL;";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaDG", $MaDG);
            $cmd->execute();
            $result = $cmd->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function kiemtradanhgiadatraloi($MaDG)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT *
                    FROM danhgia
                    LEFT JOIN traloidanhgia ON danhgia.MaDG = traloidanhgia.MaDG
                    WHERE danhgia.MaDG = :MaDG
                    AND traloidanhgia.MaDG IS NOT NULL;";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":MaDG", $MaDG);
            $cmd->execute();
            $result = $cmd->fetchColumn();
            return $result;
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
            $sql = "INSERT INTO danhgia(MaND, MaKM, NoiDung, NgayDG) VALUES(:MaND, :MaKM, :NoiDung, :NgayDG)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaND', $danhgia->MaND);
            $cmd->bindValue(':MaKM', $danhgia->MaKM);
            $cmd->bindValue(':NoiDung', $danhgia->NoiDung);
            $cmd->bindValue(':NgayDG', $danhgia->NgayDG);
            //=======================================
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
    public function capnhatdanhgia($danhgia)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE danhgia set MaND=:MaND,MaKM=:MaKM, NoiDung=:NoiDung, NgayDG=:NgayDG  where MaDG=MaDG";
            $cmd = $db->prepare($sql);
            $cmd->bindValue('MaDG', $danhgia->MaDG);
            $cmd->bindValue(':MaND', $danhgia->MaND);
            $cmd->bindValue(':MaKM', $danhgia->MaKM);
            $cmd->bindValue(':NoiDung', $danhgia->NoiDung);
            $cmd->bindValue(':NgayDG', $danhgia->NgayDG);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function capnhattraloi($MaDG, $TraLoi, $NguoiTL)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE danhgia set TraLoi=:TraLoi, NguoiTL=:NguoiTL where MaDG=:MaDG";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':MaDG', $MaDG);
            $cmd->bindValue(':TraLoi', $TraLoi);
            $cmd->bindValue(':NguoiTL', $NguoiTL);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
