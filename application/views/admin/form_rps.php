<div class="modal-header bg-primary">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h5 class="modal-title">Tambah RPS</h5>
</div>
<form action="<?=site_url('prodi/pertemuan_rps');?>" class="form-ajax form-validate-jquery f2" method="post" > 
<input name="id_rps" type="hidden">
<div class="modal-body">
    <div class="col-lg-12 form-group">
        <label for=""><b>Matakuliah</b></label>
        <select name="id_mk" id="matkul" class="form-control">
            <option value="">Pilih Matakuliah</option>
            <?php foreach($matkul as $row){?>
                <option value="<?=$row['id_mk'];?>" data-kode="<?=$row['kode_mk'];?>" data-deskripsi="<?=$row['deskripsi'];?>"data-sks="<?=$row['sks'];?>" data-semester="<?=$row['semester'];?>"><?=$row['nama_mk'];?></option>
            <?php } ?>
        </select>
    </div>
    <div class=" form-group">
        <div class="col-xs-4">
            <label for=""><b>Kode</b></label>
            <input type="text" disabled id="kode_mk" class="form-control">
        </div>
        <div class="col-xs-4">
            <label for=""><b>SKS</b></label>
            <input type="text" disabled id="sks" class="form-control">
        </div>
        <div class="col-xs-4">
            <label for=""><b>Semester</b></label>
            <input type="text" disabled id="semester" class="form-control">
        </div>
    </div>
    <div class="col-lg-12 form-group">
        <label for=""><b>Deskripsi</b></label>
        <textarea name="deskripsi" id="deskripsi"  class="form-control wysihtml5 wysihtml5-min"></textarea>
    </div>
    <div class="col-lg-12 form-group">
        <label for=""><b>Pengajar</b></label>
        <select name="id_dosen" id="" class="form-control">
        <option value="">Pilih Dosen</option>
            <?php foreach($dosen as $row){?>
                <option value="<?=$row['id_dosen'];?>"><?=$row['nama_dosen'];?></option>
            <?php } ?>
        </select>
    </div>   
</div>
    <div class="modal-footer">
        <button type="submit" class="btn bg-pink-400 btn-block btn-ladda btn-ladda-spinner" data-spinner-color="#fff" data-style="slide-right">
        <span class="ladda-label"> Simpan <i class="icon-circle-right2 position-right"></i></span></button>
    </div>
</form>
<script type="text/javascript" src="<?=base_url('assets/js/custom/ajax.js') ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/custom/validate.js') ?>"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/pages/editor_wysihtml5.js"></script>
<script>
$(document).ready(function() {
    $('#matkul').change(function() {
        $('#kode_mk').val($(this).find(':selected').data('kode'));
        $('#sks').val($(this).find(':selected').data('sks'));
        $('#semester').val($(this).find(':selected').data('semester'));
        //$('#deskripsi').val($(this).find(':selected').data('deskripsi'));
        $('#deskripsi').data("wysihtml5").editor.setValue($(this).find(':selected').data('deskripsi'));
    });
});
</script>