<?php if(isset($matakuliah['metode'])){
    $met=json_decode($matakuliah['metode']);
} ?>
<div class="modal-header bg-primary">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h5 class="modal-title">Tambah Pertemuan</h5>
</div>
<form action="<?=site_url('prodi/pertemuan_simpan');?>" class="form-ajax form-validate-jquery f2" method="post" > 
<?php if(isset($matakuliah['id_pertemuan'])){?>    
<input name="id_pertemuan" type="hidden" value="<?=(isset($matakuliah['id_pertemuan']))?md5($matakuliah['id_pertemuan']):'';?>">
<?php }?>
<input name="id_rps" type="hidden" value="<?=$matakuliah['id_rps'];?>">
<div class="modal-body">
    <div class="col-lg-12 form-group">
        <label for=""><b>Pertemuan</b></label>
        <div>
        <?php for($i=1;$i<=16;$i++){?>
            <label for="i_<?=$i?>"> <?=$i?> <input type="checkbox" id="i_<?=$i?>" <?=(isset($matakuliah['pertemuan']) && json_decode($matakuliah['pertemuan'])!=null && in_array($i,json_decode($matakuliah['pertemuan'])))?'checked':'';?>  name="pertemuan[]" value="<?=$i?>">&nbsp;&nbsp;</label>
        <?php } ?>
        </div>
    </div>
    <div class="col-lg-12 form-group">
        <label for=""><b>Bahan Kajian</b></label>
        <textarea name="bahan_kajian" id="bhn_kajian"  class="form-control wysihtml5 wysihtml5-min"><?=(isset($matakuliah['bahan_kajian']))?$matakuliah['bahan_kajian']:'';?></textarea>
    </div>
    <div class="col-lg-12 form-group">
        <label for=""><b>Kemampuan Akhir</b></label>
        <textarea name="kemampuan_akhir" id="kemampuan"class="form-control wysihtml5 wysihtml5-min"><?=(isset($matakuliah['kemampuan_akhir']))?$matakuliah['kemampuan_akhir']:'';?></textarea>
    </div>
    <div class="col-lg-12 form-group">
        <label for=""><b>Metode</b></label>
        <div class="multi-select-full">
            <select class="multiselect" name="metode[]" multiple="multiple">
                <option value="Project Based Learning" <?=(isset($met) && in_array('Project Based Learning',$met))?'selected':'';?>>Project Based Learning</option>
                <option value="Case Method" <?=(isset($met) && in_array('Case Method',$met))?'selected':'';?>>Case Method</option>
                <option value="Problem Based Learning" <?=(isset($met) && in_array('Problem Based Learning',$met))?'selected':'';?>>Problem Based Learning</option>
            </select>
        </div>
    </div>
    <div class="col-lg-12 form-group">
        <label for=""><b>Pengalaman Belajar</b></label>
        <input type="text" name="pengalaman_belajar" class="form-control" value="<?=(isset($matakuliah['pengalaman_belajar']))?$matakuliah['pengalaman_belajar']:'';?>">
    </div>
    <div class="col-lg-12 form-group">
        <label for=""><b>Alokasi Waktu</b></label>
        <input type="text" name="alokasi_waktu" class="form-control" value="<?=(isset($matakuliah['alokasi_waktu']))?$matakuliah['alokasi_waktu']:'';?>">
    </div>  
    <div class="col-lg-12 form-group">
        <label for=""><b>Referensi</b></label>
        <textarea name="referensi" id="referensi" class="form-control wysihtml5 wysihtml5-min"><?=(isset($matakuliah['referensi']))?$matakuliah['referensi']:'';?></textarea>
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
<script type="text/javascript" src="<?=base_url();?>assets/js/pages/form_multiselect.js"></script>