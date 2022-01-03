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
								<li><a href="index.html">Home</a></li>
								<li class="active">Dokumen</li>
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
									<h6 class="no-margin"><?=$title;?></h6>								
									<div class="row hide">
										<form action="<?=site_url('dokumen')?>" method="get">
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
											<input type="text" class="form-control" name="dok" value="<?=(isset($_GET['dok']))?$_GET['dok']:'';?>" placeholder="Judul Dokumen">
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
									
										<table class="table table-xs table-bordered">
											<tbody>
											<?php if($item != null){ foreach($item as $in=>$val){ ?>
												<tr class="bg-info-800 ">
													<th width="2"><?=$val['id'];?></th>
													<th colspan="2">
													<a class="text-white" data-toggle="collapse" href="#collapse-group<?=$val['id'];?>"><?=$val['no_item'].' '.$val['keterangan'];?></a>
													</th>
												</tr>
												<?php if(isset($detail[$val['no_item']])){ $no=1; ?>
													<tbody id="collapse-group<?=$val['id'];?>" class="panel-collapse collapse in">
													<?php foreach($detail[$val['no_item']] as $val2){?>													
													<tr>
														<td></td>
														<td>															
															<iframe src="https://drive.google.com/embeddedfolderview?id=<?=$val2['embed'];?>#grid" >
															</iframe>
														</td>
														<td>
															<?php if($val2['url']!=null){?>
																<a target="_blank"  href="<?=$val2['url'];?>"><?=$val2['url'];?></a>
															<?php } ?>
														</td>
													</tr>														
												<?php $no++; } ?>
												</tbody>
											<?php }  }}?>
											</tbody>
										</table>
									
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user profile -->


					<!-- Footer -->
					<div class="footer text-muted">
						© 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
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