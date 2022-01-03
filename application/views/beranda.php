<style>
iframe {
width: 100%;
height: 600px;
border:0;
}
</style>				<!-- Page header -->
				<div class="page-header">
					<!-- Header content -->
					<div class="page-header-content">
						<div >
							<h4 class=""><i class="icon-arrow-left52 position-left"></i> Daftar Dokumen APS</h4>
                            <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                        </div>
						<div class="heading-elements">
                        <ul class="breadcrumb position-right">
								<li><a href="index.html">Dokumen</a></li>
								<li class="active">Standar <?=$this->uri->segment(3);?></li>
							</ul>
						</div>
					</div>                   
					<!-- /toolbar -->
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- User profile -->
					<div class="row">
						<div class="col-lg-12">
						<div class="panel panel-flat">
								<div class="panel-heading">	
									<div class="row ">
										<form action="<?=site_url($prodi['permalink'].'/standar/1')?>" method="get">
										<div class="col-md-6">
										<h6 ><?=$title;?></h6>	
										</div>
									<div class="pull-right col-lg-6">
									<div class="col-md-6">
									<select class="form-control" name="std">
										<option value="">Semua Standar</option>
										<?php foreach($standar as $val){?>
										<option <?=(isset($_GET['std']) && $_GET['std']==$val['id_kategori'])?'selected':'';?> value="<?=$val['id_kategori'];?>"><?=$val['standar'];?></option>
										<?php } ?>
									</select>
									</div>
										<div class="input-group col-md-6">
											<input type="text" class="form-control" name="dok" value="<?=(isset($_GET['dok']))?$_GET['dok']:'';?>" placeholder="Nomor atau Keterangan Item">
											<div class="input-group-btn">
												<button type="submit" class="btn btn-default ">Cari</button>
											</div>
										</div>
									</div>
										</form>
									</div>
									<div class="row">
										<hr/ style="margin-bottom: 0px;">
									</div>
								</div>
								<div class="panel-body" style="display: block;">
									
									<div class="row">
									<div class="panel-group panel-group-control panel-group-control-right content-group-lg">
									<?php if($item != null){ foreach($item as $in=>$val){ ?>
								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
											<a data-toggle="collapse" href="#collapsible-control-right-group<?=$val['id'];?>" aria-expanded="true" class="">
												#<?=$val['id'].'. '.$val['no_item'].' '.$val['keterangan'];?><?=(!isset($detail[$val['no_item']]))?' <br/><small>Tidak ada dokumen</small>':'';?>
											</a>
										</h6>
									</div>
									<?php if(isset($detail[$val['no_item']])){ $no=1; ?>
									<div id="collapsible-control-right-group<?=$val['id'];?>" class="panel-collapse collapse in" aria-expanded="true" style="">
										<div class="panel-body">
										<?php foreach($detail[$val['no_item']] as $val2){?>		
											<iframe src="https://drive.google.com/embeddedfolderview?id=<?=$val2['embed'];?>#grid" >
															</iframe>
											<?php $no++; } ?>
										</div>
									</div>
									<?php } ?>
								</div>
									<?php } } ?>
							</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user profile -->


					<!-- Footer -->
					<div class="footer text-muted pull-right">
						© 2020. TIM IT FTK.  Template by Limitless Web App Kit
					</div>
					<!-- /footer -->

				</div>

<script type="text/javascript">
$(document).ready(function() {
    var table = $('.table').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
} );

</script>