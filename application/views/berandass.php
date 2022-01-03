				<!-- Page header -->
				<div class="page-header">
					<!-- Header content -->
					<div class="page-header-content">
						<div >
							<h4 class=""><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Beranda</span> - Grafik</h4>
                            <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                        </div>
						<div class="heading-elements">
                        <ul class="breadcrumb position-right">
								<li><a href="index.html">Home</a></li>
								<li class="active">Grafik</li>
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
									<h6 class="panel-title">Dokumen C1<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
									<hr/>
									<div class="heading-elements">
                                        <ul class="icons-list">
					                		<li><a data-action="collapse" class=""></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>
								<div class="panel-body" style="display: block;">
									<div class="row">
									<div class="panel-group content-group-lg">
										<?php foreach($item as $in=>$val){ ?>
											<div class="panel panel-white">
												<div class="panel-heading">
													<h6 class="panel-title">
														<a data-toggle="collapse" href="#collapse-group<?=$val['id'];?>"><?=$val['no_item'].'. '.$val['keterangan'];?></a>
													</h6>
												</div>
												<div id="collapse-group<?=$val['id'];?>" class="panel-collapse collapse">
													<div class="panel-body">
														<?php if(isset($detail[$val['no_item']])){?> 
														<table class="table table-xs">
															<thead>
																<tr>
																	<th>No</th><th>No Item</th><th>Judul</th><th>URL</th>
																</tr>
															</thead>
															<tbody>
																<?php $no=1; foreach($detail[$val['no_item']] as $val2){?>
																	<tr>
																		<td><?=$no;?></td><td><?=$val2['no_item']?></td><td><?=$val2['nama_dokumen']?></td><td><?=$val2['url']?></td>
																	</tr>	
																<?php $no++; } ?>
															</tbody>
														</table>
														<?php } ?>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
									</div>
									<div class="row">
									
										<table class="table table-xs">
											<thead>
												<tr>
													<th>No</th><th>No Item</th><th>Judul Dokumen</th><th>URL</th>
												</tr>
											</thead>
											<tbody>
											<?php foreach($item as $in=>$val){ ?>
												<tr>
													<td><?=$val['id'];?></td><td><?=$val['no_item'];?></td><td ><?=$val['keterangan'];?></td>
												</tr>
											<?php } ?>
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