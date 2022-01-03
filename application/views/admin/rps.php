<div class="row">
<div class="col-lg-12">
<div class="panel panel-flat" >
        <div class="panel-heading">	
            <div class="row ">
            <div class="col-md-6">
                <h2 class="no-margin"><?=$title;?></h2>	
            </div>
            <div class="pull-right col-lg-6" align="right">
                <a class="btn btn-default btn-primary ad" data-toggle="modal"   data-target="#modal_form_vertical2">Tambah</a>
            </div>
            </div>
            <div class="row">
                <hr/ style="margin-bottom: 0px;">
            </div>
        </div>
        <div class="panel-body" style="display: block;">
            <div class="row cont_rps">
                <?php $this->load->view('admin/table_rps');?>
            </div>
        </div>
    </div>
</div>
</div>
<div id="modal_form_vertical2" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<?php $this->load->view('admin/form_rps');?>
        </div>
    </div>
</div>