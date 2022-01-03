<div class="row">
    <table class="table tb">
        <thead>
            <tr class="bg-indigo">
                <th>Pertemuan</th><th>Bahan Kajian</th><th>Kemampuan Akhir</th><th>Metode</th><th>Pengalaman Belajar</th><th>Alokasi Waktu</th><th>Referensi</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php  $per=array(); if(isset($rps) && $rps != NULL) {
        foreach($rps as $row){ $per=array_merge($per,json_decode($row['pertemuan']));?>
            <tr id="<?=md5($row['id_pertemuan'])?>">
                <td><?=implode(', ',json_decode($row['pertemuan']))?>
                <span class="hide pertemuan" ><?=$row['pertemuan'];?></span></td>
                <td><span class="bahan_kajian"><?=$row['bahan_kajian']?></span></td>
                <td><span class="kemampuan_akhir"><?=$row['kemampuan_akhir']?></span></td>
                <td><span class="metode"><?=implode(', ',json_decode($row['metode']))?></span></td>
                <td><span class="pengalaman_belajar"><?=$row['pengalaman_belajar']?></span></td>
                <td><span class="alokasi_waktu"><?=$row['alokasi_waktu']?></span></td>
                <td><span class="referensi"><?=$row['referensi']?></span></td>
                <td>
                <ul class="icons-list">
                <li>
                    <a onclick="del('<?=site_url('prodi/pertemuan_delete/'.md5($row['id_rps']).'/'.md5($row['id_pertemuan']))?>','<?=md5($row['id_pertemuan'])?>')">
                        <i class="icon-minus-circle2 text-danger"></i>
                    </a> 
                </li>
                <li>
                    <a class="ed" data-toggle="modal" data-idr="<?=md5($row['id_rps'])?>"  data-id="<?=md5($row['id_pertemuan'])?>"
                    data-target="#modal_form_vertical2">
                        <i class="icon-pencil6 text-success"></i>
                    </a>
                </li>
                </ul>
                </td>
            </tr>
        <?php }}?>
        </tbody>
    </table>
</div>
<div id="modal_form_vertical2" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<?php $this->load->view('admin/form_pertemuan');?>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.tb').DataTable({
            fixedHeader: true
        });
        chk();
        function chk(){
        <?php
        foreach($per as $val){?>
            $('#i_<?=$val?>').prop('disabled', true);
            $('#i_<?=$val?>').prop('checked', true);
        <?php }?>
        }
        $(".ad").click(function () {
            chk();
        });
        $(".ed").click(function () {
            load_url('.modal-content', "<?=site_url('prodi/pertemuan_edit/')?>"+$(this).data('idr')+"/"+$(this).data('id'), "");
        });
    });
    </script>