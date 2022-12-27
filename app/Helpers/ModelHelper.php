<?php

namespace App\Helper;

class Helper
{
    public function getRupiah($value)
    {
        $format = "Rp " . number_format($value, 0, ',', '.');
        return $format;
    }

    function getHp($nomorhp)
    {
        $nomorhp = trim($nomorhp);
        $nomorhp = strip_tags($nomorhp);
        $nomorhp = str_replace(" ", "", $nomorhp);
        $nomorhp = str_replace("(", "", $nomorhp);
        $nomorhp = str_replace(".", "", $nomorhp);

        if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
            if (substr(trim($nomorhp), 0, 3) == '+62') {
                $nomorhp = trim($nomorhp);
            } elseif (substr($nomorhp, 0, 1) == '0') {
                $nomorhp = '+62' . substr($nomorhp, 1);
            }
        }
        return $nomorhp;
    }
}
