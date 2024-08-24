<?php
include "../database/database_encode.php";

$query = "SELECT * FROM eastway WHERE dealer != ''";
$result = $conn->query($query);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $part_code = $row['code'];
        $description = $row['description'];
        $dealer = $row['dealer'];
        $srp = $dealer + ($dealer * .2);
        $unit = $row['unit'];
        $brand_name = "EASTWAY";

        // checking of brand name
        if (strpos($description, 'TUTTO') !== false) {
            $brand_name = "TUTTO - EASTWAY";
        } if(strpos($description, 'CP') !== false){
            $brand_name = "CP - EASTWAY";
        } if(strpos($description, 'PAG') !== false){
            $brand_name = "PAG - EASTWAY";
        } if(strpos($description, 'BIG') !== false){
            $brand_name = "BIG - EASTWAY";
        } if(strpos($description, 'PROTAPER') !== false){
            $brand_name = "PROTAPER - EASTWAY";
        } if(strpos($description, 'PRORIDER') !== false){
            $brand_name = "PRORIDER - EASTWAY";
        } if(strpos($description, 'SPEEDTECH') !== false){
            $brand_name = "SPEEDTECH - EASTWAY";
        } if(strpos($description, 'STORM') !== false){
            $brand_name = "STORM - EASTWAY";
        } if(strpos($description, 'SUNSTAR') !== false){
            $brand_name = "SUNSTAR - EASTWAY";
        } if(strpos($description, 'IRC') !== false){
            $brand_name = "IRC - EASTWAY";
        } if(strpos($description, 'OSRAM') !== false){
            $brand_name = "OSRAM - EASTWAY";
        } if(strpos($description, 'TW') !== false){
            $brand_name = "TW - EASTWAY";
        } if(strpos($description, 'SKK') !== false){
            $brand_name = "SKK - EASTWAY";
        } if(strpos($description, 'ARS') !== false){
            $brand_name = "ARS - EASTWAY";
        } if(strpos($description, 'DREAM') !== false){
            $brand_name = "DREAM - EASTWAY";
        } if(strpos($description, 'NTK') !== false){
            $brand_name = "NTK - EASTWAY";
        } if(strpos($description, 'SKM') !== false){
            $brand_name = "SKM - EASTWAY";
        } if(strpos($description, 'HURRICANE') !== false){
            $brand_name = "HURRICANE - EASTWAY";
        } if(strpos($description, 'GOLD') !== false){
            $brand_name = "GOLD - EASTWAY";
        } if(strpos($description, 'MOTOR R') !== false){
            $brand_name = "MOTOR R - EASTWAY";
        } if(strpos($description, 'RIDE IT') !== false){
            $brand_name = "RIDE IT - EASTWAY";
        } if(strpos($description, 'MRK') !== false){
            $brand_name = "MRK - EASTWAY";
        } if(strpos($description, 'BANDO') !== false){
            $brand_name = "BANDO - EASTWAY";
        } if(strpos($description, 'JMP') !== false){
            $brand_name = "JMP - EASTWAY";
        } if(strpos($description, 'POSH') !== false){
            $brand_name = "POSH - EASTWAY";
        } if(strpos($description, 'XENON') !== false){
            $brand_name = "XENON - EASTWAY";
        } if(strpos($description, 'OKO') !== false){
            $brand_name = "OKO - EASTWAY";
        } if(strpos($description, 'OZAKA') !== false){
            $brand_name = "OZAKA - EASTWAY";
        } if(strpos($description, 'RIKEN') !== false){
            $brand_name = "RIKEN - EASTWAY";
        } if(strpos($description, 'KS') !== false){
            $brand_name = "KS - EASTWAY";
        } if(strpos($description, 'TOKO') !== false){
            $brand_name = "TOKO - EASTWAY";
        } if(strpos($description, 'NIPPON') !== false){
            $brand_name = "NIPPON - EASTWAY";
        } if(strpos($description, 'HI-LEX') !== false){
            $brand_name = "HI-LEX - EASTWAY";
        } if(strpos($description, 'HILEX') !== false){
            $brand_name = "HILEX - EASTWAY";
        } if(strpos($description, 'POWERMAX') !== false){
            $brand_name = "POWERMAX - EASTWAY";
        } if(strpos($description, 'KMC') !== false){
            $brand_name = "KMC - EASTWAY";
        } if(strpos($description, 'KAGAWA') !== false){
            $brand_name = "KAGAWA - EASTWAY";
        } if(strpos($description, 'RK-M') !== false){
            $brand_name = "RK-M - EASTWAY";
        } if(strpos($description, 'BP') !== false){
            $brand_name = "BP - EASTWAY";
        } if(strpos($description, 'CAVALIER') !== false){
            $brand_name = "CAVALIER - EASTWAY";
        } if(strpos($description, 'YOSHI') !== false){
            $brand_name = "YOSHI - EASTWAY";
        } if(strpos($description, 'CAVALIER KAZE') !== false){
            $brand_name = "CAVALIER KAZE - EASTWAY";
        } if(strpos($description, 'LIPPO') !== false){
            $brand_name = "LIPPO - EASTWAY";
        } if(strpos($description, 'YOKO') !== false){
            $brand_name = "YOKO - EASTWAY";
        } if(strpos($description, 'JUWEI') !== false){
            $brand_name = "JUWEI - EASTWAY";
        } if(strpos($description, 'VAC') !== false){
            $brand_name = "VAC - EASTWAY";
        } if(strpos($description, 'HALOGEN') !== false){
            $brand_name = "HALOGEN - EASTWAY";
        } if(strpos($description, 'TITLIS') !== false){
            $brand_name = "TITLIS - EASTWAY";
        } if(strpos($description, 'JEC') !== false){
            $brand_name = "JEC - EASTWAY";
        } if(strpos($description, 'TOMBO') !== false){
            $brand_name = "TOMBO - EASTWAY";
        } if(strpos($description, 'FCCI') !== false){
            $brand_name = "FCCI - EASTWAY";
        } if(strpos($description, 'YOTO') !== false){
            $brand_name = "YOTO - EASTWAY";
        } if(strpos($description, 'BOSS') !== false){
            $brand_name = "BOSS - EASTWAY";
        } if(strpos($description, 'KOSO') !== false){
            $brand_name = "KOSO - EASTWAY";
        } if(strpos($description, 'ALFALINE') !== false){
            $brand_name = "ALFALINE - EASTWAY";
        } if(strpos($description, 'FORMOSTAR') !== false){
            $brand_name = "FORMOSTAR - EASTWAY";
        } if(strpos($description, 'SOS') !== false){
            $brand_name = "SOS - EASTWAY";
        } if(strpos($description, 'SHEAVE') !== false){
            $brand_name = "SHEAVE - EASTWAY";
        }

        echo "code : ". $part_code . "<br>";
        echo "description : ". $description . "<br>";
        echo "brand name : " . $brand_name , "<br>";
        echo "dealer : ". $dealer . "<br>";
        echo "price : ". $srp . "<br>";
        echo "unit : ". $unit . "<br>";
        echo "--------------------------<br>";
    }
}
?>
