<table class="table tb">
    <thead>
        <tr class="bg-indigo">
            <th>Kode MK</th><th>Nama Matakuliah</th><th>Semester</th><th>SKS</th><th>Pengajar</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if($matakuliah != NULL) {
    foreach($matakuliah as $row){?>
        <tr id="<?=md5($row['id_rps'])?>">
            <td><span class="id_rps hide"><?=md5($row['id_rps'])?></span><span class="id_mk hide"><?=$row['id_mk']?></span> <?=$row['kode_mk']?></td><td><a href="<?=site_url('prodi/rps/'.md5($row['id_rps']))?>"><?=$row['nama_mk']?></a></td>
            <td><?=$row['semester']?></td><td><?=$row['sks']?></td><td><?=$row['nama_dosen']?><span class="id_dosen hide"><?=$row['id_dosen']?></span></td>
            <td>
            <ul class="icons-list">
                <li>
                    <a  onclick="del('<?=site_url('prodi/rps_delete/'.md5($row['id_rps']))?>','<?=md5($row['id_rps'])?>')">
                        <i class="icon-minus-circle2 text-danger"></i>
                    </a> 
                </li>
                <li>
                    <a class="ed" data-toggle="modal" data-idr="<?=md5($row['id_rps'])?>"  data-target="#modal_form_vertical2">
                        <i class="icon-pencil6 text-success"></i>
                    </a>
                </li>
                </ul>
            </td>
        </tr>
    <?php }}?>
    </tbody>
</table>
<script>
$(function() {
    $('.tb').DataTable({
        fixedHeader: true
    });
    $(".ed").click(function () {
        $('.f2').find($("input[name=id_rps]")).val($(this).closest('tr').find($('.id_rps')).html());
        $('.f2').find($("select[name=id_mk] option[value="+$(this).closest('tr').find($('.id_mk')).html()+"]")).attr("selected", true);
        $('.f2').find($("select[name=id_dosen] option[value="+$(this).closest('tr').find($('.id_dosen')).html()+"]")).attr("selected", true);
    });
    $(".ad").click(function () {
        $('.f2').find($("input[name=id_rps]")).val('');
    });
});
</script>