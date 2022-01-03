
<div class="row">
<div class="col-lg-12">
<div class="panel panel-flat" >
        <div class="panel-heading">	
            <div class="row ">
                <div class="col-md-6">
                    <blockquote class="no-margin no-padding-top no-padding-bottom">
                    <h2 class="no-margin"><?=$matakuliah['nama_mk'].' ['.$matakuliah['kode_mk'].']';?></h2>	
                    <small><?=$matakuliah['nama_dosen'];?></small>
                    </blockquote>
                </div>
                <div class="pull-right col-lg-6 " align="right">
                    <a class="btn btn-default btn-primary ad" data-toggle="modal"   data-target="#modal_form_vertical2">Tambah</a>
                </div>
            </div>
            <div class="row">
                <hr  style="margin-bottom: 0px;">
            </div>
        </div>
        <div class="panel-body cont_rps" >
            <?php $this->load->view('admin/table_pertemuan');?>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    
<script>
   
</script>