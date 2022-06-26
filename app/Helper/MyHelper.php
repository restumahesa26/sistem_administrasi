<?php

namespace App\Helper;


class MyHelper
{
    public function getNamaBulan($bulan)
    {
        if ($bulan == '01') {
            $value = 'Januari';
        }elseif ($bulan == '02') {
            $value = 'Februari';
        }elseif ($bulan == '03') {
            $value = 'Maret';
        }elseif ($bulan == '04') {
            $value = 'April';
        }elseif ($bulan == '05') {
            $value = 'Mei';
        }elseif ($bulan == '06') {
            $value = 'Juni';
        }elseif ($bulan == '07') {
            $value = 'Juli';
        }elseif ($bulan == '08') {
            $value = 'Agustus';
        }elseif ($bulan == '09') {
            $value = 'September';
        }elseif ($bulan == '10') {
            $value = 'Oktober';
        }elseif ($bulan == '11') {
            $value = 'November';
        }elseif ($bulan == '12') {
            $value = 'Desember';
        }

        return $value;
    }
}


