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
					<?php }else{?>
						<a style="cursor: pointer" onclick="load_url('#cont', '<?=site_url('prodi/panduan/'. $val['id'])?>','<?=$val['id'];?>')">	
						<div class="col-md-4 col-lg-2" >
							<img  src="<?=base_url('assets/images/folder.png')?>" alt="<?=$val['name'];?>">
							<h6><?=$val['name'];?></h6>
						</div>
						</a>
					<?php }}?>
					</div>
				</div>
			</div>
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