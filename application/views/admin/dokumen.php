<?php
$fl=null;
if($folderparent['path'] !=null){
	$fl=explode('/',$folderparent['path']);
}
?>			<!-- Page header -->
<div class="page-header">
	<!-- Header content -->
	              
	<!-- /toolbar -->
</div>
<div class="row">
	<div class="col-lg-12">
	<div class="panel panel-flat" >
			<div class="panel-heading">	
			<div class="page-header-content">
			<div class="heading-elements">
				
			</div>
			</div>     
			<div class="row ">
				<div class="col-md-6">					
				<blockquote class="no-margin no-padding-top no-padding-bottom">
				<h2 class="no-margin"><?=$title;?></h2>	
				<ul class="breadcrumb position-right no-margin no-padding"  >
				<?php foreach($fl as $in=> $val){
					if($in==0){?>
					<li><a href="<?=site_url('prodi')?>">Home</a></li>
					<?php }elseif($in==(count($fl)-1)){?>
						<li class="active"><?=$val?></li>
					<?php }else{ ?>
						<li><a style="cursor: pointer" onclick="load_url('#cont', '<?=site_url('prodi/folder/'. $val)?>','<?=$val;?>')"><?=$val?></a></li>
				<?php } }?>
				</ul>
				</blockquote>
				</div>
				<div class="pull-right col-lg-6">
					<div class="input-group col-md-12">
						<input type="text" class="form-control s" name="s" value="<?=(isset($_GET['s']))?$_GET['s']:'';?>" placeholder="Nama Folder atau File">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-ladda btn-ladda-spinner cr">Cari</button>
							<a class="btn btn-primary" data-toggle="modal"   data-target="#modal_form_vertical2">Tambah</a>
							<?php if(isset($folderparent['id_drive'])){?>
							<a class="btn btn-danger" onclick="del_redirect('<?=site_url('prodi/folder_delete/'.$folderparent['id_drive'])?>','<?=$folderparent['id_drive']?>')">Delete Folder</a>
							<?php } ?>
						</div>
					</div>
					
				</div>
			</div>
				<div class="row">
					<hr/ style="margin-bottom: 0px;">
				</div>
			</div>
			<div class="panel-body" style="display: block;">
				<div class="row">
					<?php 
					if(isset($folder[$folderparent['id_folder']])){
						foreach($folder[$folderparent['id_folder']] as $val){?>
						<a style="cursor: pointer" onclick="load_url('#cont', '<?=site_url('prodi/folder/'. $val['permalink'])?>','<?=$val['permalink'];?>')">	
						<div class="col-md-4 col-lg-2" >
							<img  src="<?=base_url('assets/images/folder.png')?>" alt="<?=$val['nama_folder'];?>">
							<h6><?=$val['nama_folder'];?></h6>
						</div>
						</a>
						<?php }
					}?>
					<div class="flip-entries">
					<?php foreach($file as $val){ 
						if($val['fileExtension'] !=null){?>
						<div class="col-md-4 col-lg-2">									
						<div class="thumbnail no-padding ">
							<div class="thumb thumb-slide" style="height: 200px;overflow: hidden;">
								<img src="<?=$val['thumbnailLink']?>" alt="">		
								<div class="caption-overflow">
									<span>
										<a href="<?=$val['webViewLink']?>" target="_blank" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded legitRipple"><i class="icon-link"></i></a>
										<a onclick="del_redirect('<?=site_url('prodi/file_delete/'.$val['id'].'/'.$folderparent['id_drive'])?>','<?=$folderparent['id_drive']?>')" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5 legitRipple"><i class="icon-trash"></i></a>
									</span>
								</div>	
								</div>			
								<div class="caption" style="margin-top: -15px;">
								<a href="<?=$val['webViewLink']?>"	 data-popup="lightbox" target="_blank">
								<h6 class="no-margin"><?=substr($val['name'],0,20);?>
									<i class=" pull-right"><img src="<?=$val['iconLink']?>" alt=""></i></h6>
									</a>
								</div>
							</div>
							</div>				
					<?php }else{
						
					}}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="modal_form_vertical2" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header bg-primary">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h5 class="modal-title">Upload Dokumen</h5>
<small>Google Drive Cloud Store d3informatika@undiksha.ac.id</small>
</div>
<form action="<?=site_url('prodi/upload');?>" class="form-ajax form-validate-jquery" method="post" > 
    <input name="id" type="hidden" value="<?=$folderparent['id_folder'];?>">
<div class="modal-body">
       <div class="col-lg-12 form-group">
		<div class="col-md-4  ">
                <b>Path</b>
            </div>
			<div class="col-md-8"><b><?=$folderparent['path'];?></b></div>
		</div>
        <div class="col-lg-12 form-group">
            <div class="col-md-4  ">
                    Upload Pada Folder Baru
            </div>
            <div class="col-md-8  ">
                <input type="text" class="form-control" placeholder="Kosongkan jika tidak perlu"  name="folder_new">
                <small class="err_nama_grade text-danger"></small>
            </div>
        </div>
		<div class="col-lg-12 form-group">
                    <label class="col-md-4 control-label text-semibold">Multiple file upload:</label>
                    <div class="col-md-8">
                        <input type="file" class="file-input-extensions img"  name="berkas[]" multiple="multiple" accept="image/*,.doc,.docx,.pdf,.ppt,.pptx,.xls,.xlsx,video/*">
                        <small class="err_gambar text-danger">Multiple File  Upload Max 5MB</small>
                    </div>
				</div>   
			</div>
                <div class="modal-footer">
					<button type="submit" class="btn bg-pink-400 btn-block btn-ladda btn-ladda-spinner" data-spinner-color="#fff" data-style="slide-right">
					<span class="ladda-label"> Upload <i class="icon-circle-right2 position-right"></i></span></button>
                </div>
			</form>
        </div>
    </div>
</div>
<div id="modal_file" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header bg-primary">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
	<iframe src="" id="cont_file" ></iframe>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/plugins/uploaders/fileinput.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/pages/uploader_bootstrap.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom/ajax.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom/validate.js') ?>"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/pages/gallery.js"></script>
<script>
$(function() {
	$(".cr").click(function () {
        load_url('#cont', "<?=site_url('prodi/folder_search?s=')?>"+$('.s').val(), "s="+$('.s').val()+"&f");
	});
	$(".bfile").click(function () {
		$('#cont_file').attr('src', $(this).data('src'));
	});
	
});

</script>