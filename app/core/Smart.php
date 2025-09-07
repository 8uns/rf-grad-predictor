<?php

class Smart
{
    private $valNormalisasi;
    private $valUtility;
    private $valNilaiAkhir;


    public function __construct($alternative = 0, $criteria = 0)
    {
        $this->normalisasi($criteria);
        $this->utility($alternative, $criteria);
        $this->nilaiAkhir();
    }

    //  menghitung normalisasi
    public function normalisasi($criteria)
    {
        foreach ($criteria as $ki => $vi) {
            $normal[$ki] = round($vi / array_sum($criteria), 3);
        }
        $this->valNormalisasi = $normal;
    }

    //  menghitung utility
    public function utility($alternative, $criteria)
    {
        // inisialisasi variabel awal mazimum dan minimum
        foreach ($criteria as $ki => $vi) {
            $max[$ki] = 0;
            $min[$ki] = 100000000;
        }
        // mendapatkan nilai maximum dan minimum
        foreach ($alternative as $ka => $va) {
            foreach ($va as $kc => $vc) {
                if ($max[$kc] < $vc) {
                    $max[$kc] = $vc;
                }
                if ($min[$kc] > $vc) {
                    $min[$kc] = $vc;
                }
            }
        }
        $untily = [];

        foreach ($alternative as $ka => $va) {
            foreach ($va as $kc => $vc) {
                if (($max[$kc] - $min[$kc]) == 0) {
                    $untily[$ka][$kc] = 0;
                } else {
                    $untily[$ka][$kc] = round(($vc - $min[$kc]) / ($max[$kc] - $min[$kc]), 3);
                }
            }
        }

        $this->valUtility = $untily;
    }

    // menghitung nilai akhir
    function nilaiAkhir()
    {
        $untily = $this->valUtility;
        $normalisasi = $this->valNormalisasi;

        foreach ($untily as $ka => $va) {
            if (!isset($nilaiAkhir[$ka])) {
                $nilaiAkhir[$ka] = 0;
            }
            foreach ($va as $kc => $vc) {
                $nilaiAkhir[$ka] += round($normalisasi[$kc] * $vc, 4);
            }
        }

        $this->valNilaiAkhir = $nilaiAkhir;
    }




    // memanggil nilai normalisasi
    public function getNormalisasi()
    {
        return $this->valNormalisasi;
    }
    // memanggil nilai utirlity
    public function getUtility()
    {
        return $this->valUtility;
    }
    // memanggil nilai akhir
    public function getNialiAkhir()
    {
        return $this->valNilaiAkhir;
    }
}