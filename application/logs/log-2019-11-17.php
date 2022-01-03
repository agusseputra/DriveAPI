<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-11-17 08:38:29 --> Query error: Table 'simrsdb_2019.ref_jurusan' doesn't exist - Invalid query: SELECT *
FROM `ref_jurusan`
ERROR - 2019-11-17 08:39:48 --> Query error: Table 'simrsdb_2019.ref_jurusan' doesn't exist - Invalid query: SELECT *
FROM `ref_jurusan`
ERROR - 2019-11-17 08:39:49 --> Query error: Table 'simrsdb_2019.ref_jurusan' doesn't exist - Invalid query: SELECT *
FROM `ref_jurusan`
ERROR - 2019-11-17 08:39:49 --> Query error: Table 'simrsdb_2019.ref_jurusan' doesn't exist - Invalid query: SELECT *
FROM `ref_jurusan`
ERROR - 2019-11-17 08:39:49 --> Query error: Table 'simrsdb_2019.ref_jurusan' doesn't exist - Invalid query: SELECT *
FROM `ref_jurusan`
ERROR - 2019-11-17 08:39:50 --> Query error: Table 'simrsdb_2019.ref_jurusan' doesn't exist - Invalid query: SELECT *
FROM `ref_jurusan`
ERROR - 2019-11-17 08:39:50 --> Query error: Table 'simrsdb_2019.ref_jurusan' doesn't exist - Invalid query: SELECT *
FROM `ref_jurusan`
ERROR - 2019-11-17 08:40:13 --> Query error: Table 'simrsdb_2019.ref_jurusan' doesn't exist - Invalid query: SELECT *
FROM `ref_jurusan`
ERROR - 2019-11-17 08:40:14 --> Query error: Table 'simrsdb_2019.ref_jurusan' doesn't exist - Invalid query: SELECT *
FROM `ref_jurusan`
ERROR - 2019-11-17 08:40:15 --> Query error: Table 'simrsdb_2019.ref_jurusan' doesn't exist - Invalid query: SELECT *
FROM `ref_jurusan`
ERROR - 2019-11-17 08:42:16 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='loginsss' or permalink='loginsss' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:44:01 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='home' or permalink='home' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:44:04 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='home' or permalink='home' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:44:19 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='home' or permalink='home' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:44:22 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='home' or permalink='home' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:44:23 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='home' or permalink='home' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:44:23 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='home' or permalink='home' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:44:24 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='home' or permalink='home' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:46:05 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='home' or permalink='home' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:46:05 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='home' or permalink='home' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:46:12 --> Query error: Table 'simrsdb_2019.data_mahasiswa' doesn't exist - Invalid query: SELECT `data_dosen`.`nama` as `nama_dosen`, `ref_kecamatan`.`kecamatan`, `ref_kabupaten`.`kabupaten`, `ref_provinsi`.`provinsi`, `ref_jurusan`.`id_fakultas`, `ref_jurusan`.`nama_jurusan`, `data_mahasiswa`.*, `ref_agama`.`agama`, `ref_sekolah`.`nama_sekolah`
FROM (select * from data_mahasiswa where nim='home' or permalink='home' limit 1) as data_mahasiswa
JOIN `ref_jurusan` ON `ref_jurusan`.`id_jurusan`=`data_mahasiswa`.`id_jurusan`
LEFT JOIN `ref_agama` ON `ref_agama`.`id_agama`=`data_mahasiswa`.`id_agama`
LEFT JOIN `data_dosen` ON `data_dosen`.`id_dosen`=`data_mahasiswa`.`id_pa`
LEFT JOIN `ref_kecamatan` ON `ref_kecamatan`.`kode_kecamatan`=`data_mahasiswa`.`kode_kecamatan`
LEFT JOIN `ref_kabupaten` ON `ref_kabupaten`.`kode_kabupaten`=`ref_kecamatan`.`kode_kabupaten`
LEFT JOIN `ref_provinsi` ON `ref_provinsi`.`kode_provinsi`=`ref_kabupaten`.`kode_provinsi`
LEFT JOIN `ref_sekolah` ON `ref_sekolah`.`npsn`=`data_mahasiswa`.`npsn_sekolah`
ERROR - 2019-11-17 08:53:41 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\rs\application\controllers\Home.php 10
ERROR - 2019-11-17 08:53:43 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\rs\application\controllers\Home.php 10
ERROR - 2019-11-17 08:53:48 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\rs\application\controllers\Home.php 10
ERROR - 2019-11-17 08:54:54 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\rs\application\controllers\Home.php 10
ERROR - 2019-11-17 08:54:55 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\rs\application\controllers\Home.php 10
ERROR - 2019-11-17 14:00:14 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 14:09:43 --> Severity: error --> Exception: syntax error, unexpected '$penduduk' (T_VARIABLE) C:\xampp\htdocs\simrs\application\controllers\Pasien.php 9
ERROR - 2019-11-17 14:34:03 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 14:57:39 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:05:07 --> Severity: Notice --> Undefined property: Pasien::$M_capil C:\xampp\htdocs\simrs\application\controllers\Pasien.php 8
ERROR - 2019-11-17 15:05:07 --> Severity: error --> Exception: Call to a member function get_penduduk() on null C:\xampp\htdocs\simrs\application\controllers\Pasien.php 8
ERROR - 2019-11-17 15:05:11 --> Severity: Notice --> Undefined property: Pasien::$M_capil C:\xampp\htdocs\simrs\application\controllers\Pasien.php 8
ERROR - 2019-11-17 15:05:11 --> Severity: error --> Exception: Call to a member function get_penduduk() on null C:\xampp\htdocs\simrs\application\controllers\Pasien.php 8
ERROR - 2019-11-17 15:05:13 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:05:19 --> Severity: Notice --> Undefined property: Pasien::$M_capil C:\xampp\htdocs\simrs\application\controllers\Pasien.php 8
ERROR - 2019-11-17 15:05:19 --> Severity: error --> Exception: Call to a member function get_penduduk() on null C:\xampp\htdocs\simrs\application\controllers\Pasien.php 8
ERROR - 2019-11-17 15:07:07 --> Query error: Duplicate entry '1' for key 'PRIMARY' - Invalid query: INSERT INTO `pasien` (`pasienid`, `norm`, `nama`, `alamat`, `tempatlahir`, `tgllahir`, `kelamin`, `umur`, `statusperkawinan`, `agama`, `telepon`, `goldarah`, `kebangsaan`, `pendidikan`, `pekerjaan`, `propinsi`, `kabupaten`, `kecamatan`, `desa`, `photo`, `regdate`, `regtime`, `notes`, `inactive`, `cardprinted`, `pasientype`, `pasiensubtype`, `fax`, `mobile`, `email`, `mothername`, `fathername`, `companyid`, `iksemployeename`, `payrollno`, `companydept`, `relation`, `typebayar`, `typebayarid`, `idno`, `isaskes`, `umurbl`, `umurhr`, `wn`, `pasiencash`, `nobpjs`, `nik`, `pisa`, `kdprovider`, `nmprovider`, `klsrawat`, `peserta`) VALUES ('1', '', 'Ketut AGus Seputra', 'Alamat Dummy', 'Tempat Dummy', '2019-10-27', 'L', '12', 'single', 'Hindu', '02154787', 'B', 'Indonesia', 'SD', 'Anak-anak', 'Bali', 'Buleleng', 'BUleleng', 'BUleleng', '?', '2019-10-27', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', '123456', '123456', NULL, NULL, NULL, NULL, NULL)
ERROR - 2019-11-17 15:07:13 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:07:19 --> Query error: Duplicate entry '1' for key 'PRIMARY' - Invalid query: INSERT INTO `pasien` (`pasienid`, `norm`, `nama`, `alamat`, `tempatlahir`, `tgllahir`, `kelamin`, `umur`, `statusperkawinan`, `agama`, `telepon`, `goldarah`, `kebangsaan`, `pendidikan`, `pekerjaan`, `propinsi`, `kabupaten`, `kecamatan`, `desa`, `photo`, `regdate`, `regtime`, `notes`, `inactive`, `cardprinted`, `pasientype`, `pasiensubtype`, `fax`, `mobile`, `email`, `mothername`, `fathername`, `companyid`, `iksemployeename`, `payrollno`, `companydept`, `relation`, `typebayar`, `typebayarid`, `idno`, `isaskes`, `umurbl`, `umurhr`, `wn`, `pasiencash`, `nobpjs`, `nik`, `pisa`, `kdprovider`, `nmprovider`, `klsrawat`, `peserta`) VALUES ('1', '', 'Ketut AGus Seputra', 'Alamat Dummy', 'Tempat Dummy', '2019-10-27', 'L', '12', 'single', 'Hindu', '02154787', 'B', 'Indonesia', 'SD', 'Anak-anak', 'Bali', 'Buleleng', 'BUleleng', 'BUleleng', '?', '2019-10-27', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', '123456', '123456', NULL, NULL, NULL, NULL, NULL)
ERROR - 2019-11-17 15:08:10 --> Query error: Duplicate entry '1' for key 'PRIMARY' - Invalid query: INSERT INTO `pasien` (`pasienid`, `norm`, `nama`, `alamat`, `tempatlahir`, `tgllahir`, `kelamin`, `umur`, `statusperkawinan`, `agama`, `telepon`, `goldarah`, `kebangsaan`, `pendidikan`, `pekerjaan`, `propinsi`, `kabupaten`, `kecamatan`, `desa`, `photo`, `regdate`, `regtime`, `notes`, `inactive`, `cardprinted`, `pasientype`, `pasiensubtype`, `fax`, `mobile`, `email`, `mothername`, `fathername`, `companyid`, `iksemployeename`, `payrollno`, `companydept`, `relation`, `typebayar`, `typebayarid`, `idno`, `isaskes`, `umurbl`, `umurhr`, `wn`, `pasiencash`, `nobpjs`, `nik`, `pisa`, `kdprovider`, `nmprovider`, `klsrawat`, `peserta`) VALUES ('1', '', 'Ketut AGus Seputra', 'Alamat Dummy', 'Tempat Dummy', '2019-10-27', 'L', '12', 'single', 'Hindu', '02154787', 'B', 'Indonesia', 'SD', 'Anak-anak', 'Bali', 'Buleleng', 'BUleleng', 'BUleleng', '?', '2019-10-27', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', '123456', '123456', NULL, NULL, NULL, NULL, NULL)
ERROR - 2019-11-17 15:08:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:09:00 --> Query error: Duplicate entry '1' for key 'PRIMARY' - Invalid query: INSERT INTO `pasien` (`pasienid`, `norm`, `nama`, `alamat`, `tempatlahir`, `tgllahir`, `kelamin`, `umur`, `statusperkawinan`, `agama`, `telepon`, `goldarah`, `kebangsaan`, `pendidikan`, `pekerjaan`, `propinsi`, `kabupaten`, `kecamatan`, `desa`, `photo`, `regdate`, `regtime`, `notes`, `inactive`, `cardprinted`, `pasientype`, `pasiensubtype`, `fax`, `mobile`, `email`, `mothername`, `fathername`, `companyid`, `iksemployeename`, `payrollno`, `companydept`, `relation`, `typebayar`, `typebayarid`, `idno`, `isaskes`, `umurbl`, `umurhr`, `wn`, `pasiencash`, `nobpjs`, `nik`, `pisa`, `kdprovider`, `nmprovider`, `klsrawat`, `peserta`) VALUES ('1', '', 'Ketut AGus Seputra', 'Alamat Dummy', 'Tempat Dummy', '2019-10-27', 'L', '12', 'single', 'Hindu', '02154787', 'B', 'Indonesia', 'SD', 'Anak-anak', 'Bali', 'Buleleng', 'BUleleng', 'BUleleng', '?', '2019-10-27', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', '123456', '123456', NULL, NULL, NULL, NULL, NULL)
ERROR - 2019-11-17 15:09:21 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:11:01 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:11:38 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:12:36 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:12:44 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:13:58 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:14:16 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:14:52 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:15:00 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:15:55 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:17:23 --> Severity: error --> Exception: Call to undefined method CI_Loader::session_userdata() C:\xampp\htdocs\simrs\application\views\template.php 165
ERROR - 2019-11-17 15:17:36 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:17:43 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:18:23 --> Severity: Notice --> Undefined variable: session C:\xampp\htdocs\simrs\application\controllers\Home.php 7
ERROR - 2019-11-17 15:18:24 --> Severity: error --> Exception: Function name must be a string C:\xampp\htdocs\simrs\application\controllers\Home.php 7
ERROR - 2019-11-17 15:18:32 --> Severity: Notice --> Undefined variable: SESSION C:\xampp\htdocs\simrs\application\controllers\Home.php 7
ERROR - 2019-11-17 15:20:14 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:20:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:27:03 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:27:10 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:27:12 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:27:33 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:27:33 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:27:45 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:27:58 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:28:13 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:28:13 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:28:46 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:28:49 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:28:52 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:28:53 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:29:27 --> 404 Page Not Found: Indexhtml/index
ERROR - 2019-11-17 15:29:30 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:29:30 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:30:15 --> Session: session.auto_start is enabled in php.ini. Aborting.
ERROR - 2019-11-17 15:30:16 --> 404 Page Not Found: Assets/js
ERROR - 2019-11-17 15:30:29 --> Session: session.auto_start is enabled in php.ini. Aborting.
