<div class="col-lg-12">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h2 class="panel-title no-margin"><a href="javascript:history.go(-1)"><i class=" icon-circle-left2"></i> </a> Tampil Rekap Data <?=$this->uri->segment('2')?></h2> 
            <hr/>
        </div>
        <div class="panel-body">
        <table class="table table-bordered table-xxs table-hover" id="example">
            <thead style="background-color: #AED6F1; font-weight: bold;">
                <tr>
                    <th >No</th>
                    <?php if(isset($tp)){?>
                        <th  >Kecamatan</th><th>Desa</th>
                    <?php }else{?>
                        <th>Kabupaten</th><th>Kecamatan</th>
                    <?php } ?>
                    <th >Jumlah</th><th >Apbn</th><th >Apbd</th>
                </tr>
            </thead>
            <tbody>
            <?php if($data != NULL){ $no=1; $jml=0;$apbn=0;$apbd=0;foreach($data as $val){
                $l=0;$p=0;$jml+=$val['total'];$apbn+=(isset($val['apbn']))?$val['apbn']:0;$apbd+=(isset($val['apbd']))?$val['apbd']:0;?>
                <tr>
                    <td><?=$no;?></td><td><?=$val['kecamatan']?></td>
                    <?php if(isset($tp)){?>
                        <td> <?=$val['desa']?></td>
                    <?php }else{?>
                        <td> <a href="<?=site_url('rekap_kec/'.$val['permalink'])?>"> <?=$val['desa']?></a></td>
                    <?php } ?>
                    <td align="right"><?=number_format($val['total'],0);?></td><td align="right"><?=(isset($val['apbn']))?number_format($val['apbn'],0):0;?></td>
                    <td align="right"><?=(isset($val['apbd']))?number_format($val['apbd'],0):0;?></td>
                </tr>
            <?php $no++; } } ?>
            </tbody>
            <tfoot style="background-color: #D1E9F9">
                <tr><td colspan="3" align="center">TOTAL</td><td align="right"><?=number_format($jml,0);?></td>
                <td align="right"><?=number_format($apbn,0);?></td><td align="right"><?=number_format($apbd,0);?></td></tr>
            </tfoot>
        </table>
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