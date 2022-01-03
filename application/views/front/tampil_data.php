<div class="col-lg-12">
        <div class="panel panel-flat">
        <div class="panel-heading">
            <h2 class="panel-title no-margin"><a href="javascript:history.go(-1)"><i class=" icon-circle-left2"></i> </a> Tampil Data <?=$this->uri->segment('2')?></h2> 
            <hr/>
        </div>
        <div class="panel-body">
        <div class="tabbable no-margin">
                <ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
                    <li class="active"><a href="#bottom-divided-tab1" data-toggle="tab" class="legitRipple">APBN</a></li>
                    <li><a href="#bottom-divided-tab3" data-toggle="tab" class="legitRipple">APBD</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="bottom-divided-tab1">
                        <table class="table table-bordered table-hover table-xxs" id="example">
                            <thead style="background-color: #AED6F1; font-weight: bold;">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <?php if(isset($tp)){?>
                                        <th  rowspan="2">Kecamatan</th><th  rowspan="2">Desa</th  rowspan="2">
                                    <?php }else{?>
                                        <th  rowspan="2">Kabupaten</th><th  rowspan="2">Kecamatan</th  rowspan="2">
                                    <?php } ?>
                                    <th rowspan="2">Jumlah</th>
                                    <th colspan="3"> < 31 th </th><th colspan="3"> 31 - 35 Th </th>
                                    <th colspan="3"> 36 - 40 Th </th><th colspan="3"> 41 - 45 Th </th>
                                    <th colspan="3"> 46 - 50 Th </th><th colspan="3"> 51 - 55 Th </th>
                                    <th colspan="3"> > 55 Th </th><th colspan="3"> Total </th>
                                </tr>
                                <tr>
                                    <th>L</th><th>P</th><th>Jml</th><th>L</th><th>P</th><th>Jml</th>
                                    <th>L</th><th>P</th><th>Jml</th><th>L</th><th>P</th><th>Jml</th>
                                    <th>L</th><th>P</th><th>Jml</th><th>L</th><th>P</th><th>Jml</th>
                                    <th>L</th><th>P</th><th>Jml</th><th>L</th><th>P</th><th>Jml</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($data != NULL){ 
                                for($i=1;$i<=7;$i++){
                                    $jml['total'][$i]=0;$jml['L'][$i]=0;$jml['P'][$i]=0;
                                }
                                $no=1;$total=0;$total_p=0;$total_l=0;foreach($data as $val){
                                $l=0;$p=0;$total+=$val['total'];
                                ?>
                                <tr>
                                    <td><?=$no;?></td><td><?=$val['kecamatan']?></td>
                                    <?php if(isset($tp)){?>
                                        <td> <?=$val['desa']?></td>
                                    <?php }else{?>
                                        <td> <a href="<?=site_url('tampilkec/'.$val['permalink'])?>"> <?=$val['desa']?></a></td>
                                    <?php } ?>
                                    <td><?=$val['total'];?></td>
                                    <?php for($i=1;$i<=7;$i++){
                                        $jm=0;
                                        if(isset($val['L'])){
                                            $jm+=$val['L']['u'.$i];
                                            $l+=$val['L']['u'.$i];
                                            $jml['L'][$i]+=$val['L']['u'.$i];
                                            $jml['total'][$i]+=$val['L']['u'.$i];
                                            $total_l+=$val['L']['u'.$i];
                                            ?>
                                            <td><?=$val['L']['u'.$i]?></td>
                                        <?php }else{?>
                                            <td>0</td>
                                        <?php }
                                        if(isset($val['P'])){
                                            $jm+=$val['P']['u'.$i];
                                            $p+=$val['P']['u'.$i];
                                            $jml['P'][$i]+=$val['P']['u'.$i];
                                            $jml['total'][$i]+=$val['P']['u'.$i];
                                            $total_p+=$val['P']['u'.$i];?>
                                            <td><?=$val['P']['u'.$i]?></td>
                                        <?php }else{?>
                                            <td>0</td>
                                        <?php } ?>
                                        <td><?=$jm?></td>
                                    <?php }?>
                                    <td><?=$l?></td><td><?=$p?></td><td><?=($l+$p)?></td>
                                </tr>
                            <?php $no++; } } ?>
                            </tbody>
                            <tfoot style="background-color: #D1E9F9">
                                <tr>
                                    <td colspan="3" align="center">TOTAL</td><td><?=$total?></td>
                                    <?php for($i=1;$i<=7;$i++){?>
                                        <td><?=$jml['L'][$i]?></td>
                                        <td><?=$jml['P'][$i]?></td>
                                        <td><?=$jml['total'][$i]?></td>
                                    <?php }?>
                                    <td><?=$total_l;?></td>
                                    <td><?=$total_p?></td>
                                    <td><?=$total?></td>
                                </tr>
                            </tfoot>
                        </table>
                        
                        
                    </div>
                    <div class="tab-pane" id="bottom-divided-tab2">
                        
                        <div class="col-lg-6" id="hicart2"></div>
                        <div class="col-lg-6" id="browser2"></div>
                    </div>
                    <div class="tab-pane" id="bottom-divided-tab3">
                    <div class="col-lg-6" id="hicart3"></div>
                        <div class="col-lg-6" id="browser3"></div>  
                        
                    </div>

                    <div class="tab-pane" id="bottom-divided-tab4">
                        Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>

<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   {
            leftColumns: 3
        }
    } );
} );
</script>