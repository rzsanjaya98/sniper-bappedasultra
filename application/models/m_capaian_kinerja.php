<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_capaian_kinerja extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getDataJenisUrusan($id_opd = -1)
    {
        $sql = "
            SELECT a.id_jenis_urusan, b.jenis_urusan
            FROM sub_kegiatan a
            LEFT JOIN jenis_urusan b ON b.id_jenis_urusan = a.id_jenis_urusan
        ";
        if ($id_opd != -1) {
            $sql .= "WHERE a.id_opd = '$id_opd'
                     GROUP BY a.id_jenis_urusan
                     ORDER BY a.id_jenis_urusan
            ";
        } else {
            $sql .= "GROUP BY a.id_jenis_urusan
                    ORDER BY a.id_jenis_urusan";
        }

        return $query = $this->db->query($sql)->result();
    }

    public function getDataBidangUrusan($id_opd = -1)
    {
        $sql = "
        SELECT a.id_jenis_urusan, a.id_bidang_urusan, b.bidang_urusan
            FROM sub_kegiatan a
            LEFT JOIN bidang_urusan b ON b.id_jenis_urusan = a.id_jenis_urusan
                                    AND b.id_bidang_urusan = a.id_bidang_urusan
        ";
        if ($id_opd != -1) {
            $sql .= "WHERE a.id_opd = '$id_opd'
                    GROUP BY a.id_jenis_urusan, a.id_bidang_urusan
                    ORDER BY a.id_jenis_urusan, a.id_bidang_urusan
            ";
        } else {
            $sql .= "
            GROUP BY a.id_jenis_urusan, a.id_bidang_urusan
            ORDER BY a.id_jenis_urusan, a.id_bidang_urusan";
        }

        return $query = $this->db->query($sql)->result();
    }

    public function getDataProgramOPD($id_opd, $target_tahun)
    {

        $sql = "
            SELECT a.*, 
                sk.ta as ta_rpjmd, 
                sk.tk as tk_rpjmd,
                cka.ca as ca2021,
                cka.ck as ck2021,
                tka.ta as tka2022,
                tka.tk as tkk2022,
                ckat1.cat1 as cat12022,
                ckat1.ckt1 as ckt12022,
                ckat2.cat2 as cat22022,
                ckat2.ckt2 as ckt22022,
                ckat3.cat3 as cat32022,
                ckat3.ckt3 as ckt32022,
                ckat4.cat4 as cat42022,
                ckat4.ckt4 as ckt42022
            FROM `program` a
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_opd, SUM(target_anggaran) as ta, SUM(target_kinerja) as tk
                FROM `sub_kegiatan`
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_opd
                ) sk on sk.id_jenis_urusan = a.id_jenis_urusan
                    AND sk.id_bidang_urusan = a.id_bidang_urusan
                    AND sk.id_program = a.id_program
                    AND sk.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_opd, SUM(capaian_anggaran) as ca, SUM(capaian_kinerja) as ck
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_tahun < $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_opd
                ) cka on cka.id_jenis_urusan = a.id_jenis_urusan
                    AND cka.id_bidang_urusan = a.id_bidang_urusan
                    AND cka.id_program = a.id_program
                    AND cka.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_opd, SUM(target_anggaran) as ta, SUM(target_kinerja) as tk
                FROM `target_kinerja_anggaran`
                WHERE target_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_opd
                ) tka on tka.id_jenis_urusan = a.id_jenis_urusan
                    AND tka.id_bidang_urusan = a.id_bidang_urusan
                    AND tka.id_program = a.id_program
                    AND tka.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_opd, SUM(capaian_anggaran) as cat1, SUM(capaian_kinerja) as ckt1
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T1' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_opd
                ) ckat1 on ckat1.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat1.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat1.id_program = a.id_program
                    AND ckat1.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_opd, SUM(capaian_anggaran) as cat2, SUM(capaian_kinerja) as ckt2
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T2' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_opd
                ) ckat2 on ckat2.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat2.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat2.id_program = a.id_program
                    AND ckat2.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_opd, SUM(capaian_anggaran) as cat3, SUM(capaian_kinerja) as ckt3
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T3' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_opd
                ) ckat3 on ckat3.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat3.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat3.id_program = a.id_program
                    AND ckat3.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_opd, SUM(capaian_anggaran) as cat4, SUM(capaian_kinerja) as ckt4
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T4' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_opd
                ) ckat4 on ckat4.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat4.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat4.id_program = a.id_program
                    AND ckat4.id_opd = a.id_opd
        ";

        if ($id_opd != -1) {
            $sql .= "WHERE a.id_opd = '$id_opd'
                     GROUP BY a.id_jenis_urusan, a.id_bidang_urusan, a.id_program, a.id_opd
            ";
        } else {
            $sql .= "GROUP BY a.id_jenis_urusan, a.id_bidang_urusan, a.id_program, a.id_opd";
        }


        return $query = $this->db->query($sql)->result();
    }

    public function getDataKegiatanOPD($id_opd, $target_tahun)
    {

        $sql = "
            SELECT a.*, 
                sk.ta as ta_rpjmd, 
                sk.tk as tk_rpjmd,
                cka.ca as ca2021,
                cka.ck as ck2021,
                tka.ta as tka2022,
                tka.tk as tkk2022,
                ckat1.cat1 as cat12022,
                ckat1.ckt1 as ckt12022,
                ckat2.cat2 as cat22022,
                ckat2.ckt2 as ckt22022,
                ckat3.cat3 as cat32022,
                ckat3.ckt3 as ckt32022,
                ckat4.cat4 as cat42022,
                ckat4.ckt4 as ckt42022
            FROM `kegiatan` a
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd, SUM(target_anggaran) as ta, SUM(target_kinerja) as tk
                FROM `sub_kegiatan`
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd
                ) sk on sk.id_jenis_urusan = a.id_jenis_urusan
                    AND sk.id_bidang_urusan = a.id_bidang_urusan
                    AND sk.id_program = a.id_program
                    AND sk.id_kegiatan = a.id_kegiatan
                    AND sk.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd, SUM(capaian_anggaran) as ca, SUM(capaian_kinerja) as ck
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_tahun < $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd
                ) cka on cka.id_jenis_urusan = a.id_jenis_urusan
                    AND cka.id_bidang_urusan = a.id_bidang_urusan
                    AND cka.id_program = a.id_program
                    AND cka.id_kegiatan = a.id_kegiatan
                    AND cka.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd, SUM(target_anggaran) as ta, SUM(target_kinerja) as tk
                FROM `target_kinerja_anggaran`
                WHERE target_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd
                ) tka on tka.id_jenis_urusan = a.id_jenis_urusan
                    AND tka.id_bidang_urusan = a.id_bidang_urusan
                    AND tka.id_program = a.id_program
                    AND tka.id_kegiatan = a.id_kegiatan
                    AND tka.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd, SUM(capaian_anggaran) as cat1, SUM(capaian_kinerja) as ckt1
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T1' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd
                ) ckat1 on ckat1.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat1.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat1.id_program = a.id_program
                    AND ckat1.id_kegiatan = a.id_kegiatan
                    AND ckat1.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd, SUM(capaian_anggaran) as cat2, SUM(capaian_kinerja) as ckt2
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T2' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd
                ) ckat2 on ckat2.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat2.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat2.id_program = a.id_program
                    AND ckat2.id_kegiatan = a.id_kegiatan
                    AND ckat2.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd, SUM(capaian_anggaran) as cat3, SUM(capaian_kinerja) as ckt3
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T3' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd
                ) ckat3 on ckat3.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat3.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat3.id_program = a.id_program
                    AND ckat3.id_kegiatan = a.id_kegiatan
                    AND ckat3.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd, SUM(capaian_anggaran) as cat4, SUM(capaian_kinerja) as ckt4
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T4' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_opd
                ) ckat4 on ckat4.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat4.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat4.id_program = a.id_program
                    AND ckat4.id_kegiatan = a.id_kegiatan
                    AND ckat4.id_opd = a.id_opd
        ";

        if ($id_opd != -1) {
            $sql .= "WHERE a.id_opd = '$id_opd'
                     GROUP BY a.id_jenis_urusan, a.id_bidang_urusan, a.id_program, a.id_kegiatan, a.id_opd
            ";
        } else {
            $sql .= "GROUP BY a.id_jenis_urusan, a.id_bidang_urusan, a.id_program, a.id_kegiatan, a.id_opd";
        }

        return $query = $this->db->query($sql)->result();
    }

    public function getDataSubKegiatanOPD($id_opd, $target_tahun)
    {
        $sql = "
            SELECT a.*, 
                cka.ck as ck2021,
                cka.ca as ca2021,
                tka.tk as tk2022,
                tka.ta as tka2022,
                ckat1.ckt1 as ckt12022,
                ckat1.cat1 as cat12022,
                ckat2.ckt2 as ckt22022,
                ckat2.cat2 as cat22022,
                ckat3.ckt3 as ckt32022,
                ckat3.cat3 as cat32022,
                ckat4.ckt4 as ckt42022,
                ckat4.cat4 as cat42022
            FROM `sub_kegiatan` a
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd, SUM(capaian_anggaran) as ca, SUM(capaian_kinerja) as ck
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_tahun < $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd
                ) cka on cka.id_jenis_urusan = a.id_jenis_urusan
                    AND cka.id_bidang_urusan = a.id_bidang_urusan
                    AND cka.id_program = a.id_program
                    AND cka.id_kegiatan = a.id_kegiatan
                    AND cka.id_sub_kegiatan = a.id_sub_kegiatan
                    AND cka.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd, target_anggaran as ta, target_kinerja as tk 
                FROM `target_kinerja_anggaran`
                WHERE target_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd
                ) tka on tka.id_jenis_urusan = a.id_jenis_urusan
                    AND tka.id_bidang_urusan = a.id_bidang_urusan
                    AND tka.id_program = a.id_program
                    AND tka.id_kegiatan = a.id_kegiatan
                    AND tka.id_sub_kegiatan = a.id_sub_kegiatan
                    AND tka.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd, capaian_anggaran as cat1, capaian_kinerja as ckt1
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T1' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd
                ) ckat1 on ckat1.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat1.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat1.id_program = a.id_program
                    AND ckat1.id_kegiatan = a.id_kegiatan
                    AND ckat1.id_sub_kegiatan = a.id_sub_kegiatan
                    AND ckat1.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd, capaian_anggaran as cat2, capaian_kinerja as ckt2
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T2' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd
                ) ckat2 on ckat2.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat2.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat2.id_program = a.id_program
                    AND ckat2.id_kegiatan = a.id_kegiatan
                    AND ckat2.id_sub_kegiatan = a.id_sub_kegiatan
                    AND ckat2.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd, capaian_anggaran as cat3, capaian_kinerja as ckt3
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T3' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd
                ) ckat3 on ckat3.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat3.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat3.id_program = a.id_program
                    AND ckat3.id_kegiatan = a.id_kegiatan
                    AND ckat3.id_sub_kegiatan = a.id_sub_kegiatan
                    AND ckat3.id_opd = a.id_opd
            LEFT JOIN (
                SELECT id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd, capaian_anggaran as cat4, capaian_kinerja as ckt4
                FROM `capaian_kinerja_anggaran`
                WHERE capaian_periode = 'T4' AND capaian_tahun = $target_tahun
                GROUP BY id_jenis_urusan, id_bidang_urusan, id_program, id_kegiatan, id_sub_kegiatan, id_opd
                ) ckat4 on ckat4.id_jenis_urusan = a.id_jenis_urusan
                    AND ckat4.id_bidang_urusan = a.id_bidang_urusan
                    AND ckat4.id_program = a.id_program
                    AND ckat4.id_kegiatan = a.id_kegiatan
                    AND ckat4.id_sub_kegiatan = a.id_sub_kegiatan
                    AND ckat4.id_opd = a.id_opd 
        ";

        if ($id_opd != -1) {
            $sql .= "WHERE a.id_opd = '$id_opd'
            GROUP BY a.id_jenis_urusan, a.id_bidang_urusan, a.id_program, a.id_kegiatan, a.id_sub_kegiatan, a.id_opd   
            ";
        } else {
            $sql .= "GROUP BY a.id_jenis_urusan, a.id_bidang_urusan, a.id_program, a.id_kegiatan, a.id_sub_kegiatan, a.id_opd   ";
        }
        return $query = $this->db->query($sql)->result();
    }
}
