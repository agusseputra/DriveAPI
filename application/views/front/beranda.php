    <div class="row">
        <div class="col-lg-12">
        <div class="panel panel-flat">
        <div class="panel-heading">
            <h2 class="panel-title no-margin">Beranda</h2> 
            <hr/>
        </div>
        <div class="panel-body">
            <div class="col-lg-12">
            <div class="col-lg-4">
                    <div class="panel bg-primary-400">
                        <div class="panel-body">
                            <b class="h2"><?=number_format($total_all,0)?></b><span> Peserta</span><br/>
                            Sumber APBN & APBD
                        </div>
                        <div class="container-fluid">
                            </div>
                    </div>
                </div> 
                <div class="col-lg-4">
                    <div class="panel bg-teal-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                            <span class="heading-text badge bg-teal-800">
                            <?php foreach ($arr_jk as $item){
                                echo ($item[0]=='L')?'Laki-Laki : ':'Perempuan : '; echo number_format((($item[1]/$tot)*100),2).' %';
                                break;
                                } ?>
                            </span>
                            <div align="right" class=" display-block text-size-small no-margin">
                            <?php foreach ($arr_jk as $item){
                                echo $item[0].' : '.number_format($item[1],0).'<br/>';
                            } ?>
                            </div>
                            </div>

                            <b class="h2"><?=number_format($tot,0)?></b><span> Peserta</span><br/>
                            Sumber APBN
                        </div>
                        <div class="container-fluid">
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel bg-purple-400">
                        <div class="panel-body">
                            <b class="h2"><?=number_format($total_apbd,0)?></b><span> Peserta</span><br/>
                            Sumber APBD
                        </div>
                        <div class="container-fluid">
                            </div>
                    </div>
                </div> 
            </div>
            <div class="col-lg-12">
                <hr/>
            </div>
            <div class="col-lg-12">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
                    <li class="active"><a href="#bottom-divided-tab1" data-toggle="tab" class="legitRipple">SEMUA</a></li>
                    <li><a href="#bottom-divided-tab2" data-toggle="tab" class="legitRipple">APBN</a></li>
                    <li><a href="#bottom-divided-tab3" data-toggle="tab" class="legitRipple">APBD</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="bottom-divided-tab1">
                        <div class="col-lg-6" id="browser"></div>
                        <div class="col-lg-6" id="hicart"></div>
                        
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
</div>
</div>
<div class="footer text-muted">
© 2019. <a href="#">Kabupaten Bangli</a>
</div>
				<!-- /content area -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script type="text/javascript">
var chart = Highcharts.chart('hicart', {
title: {
    text: 'Data Per Desa'
},
subtitle: {
    text: 'Maret 2020'
},
xAxis: {
    categories: <?=$json_nm_des_total;?>
},
series: [{
    type: 'column',
    colorByPoint: true,
    data: <?=$json_jml_des_total;?>,
    showInLegend: false
}]
});
var chart = Highcharts.chart('hicart2', {
title: {
    text: 'Data Per Desa'
},
subtitle: {
    text: 'Maret 2020'
},
xAxis: {
    categories: <?=$json_nm_des;?>
},
series: [{
    type: 'column',
    colorByPoint: true,
    data: <?=$json_jml_des;?>,
    showInLegend: false
}]
});
var chart = Highcharts.chart('hicart3', {
title: {
    text: 'Data Per Desa'
},
subtitle: {
    text: 'Maret 2020'
},
xAxis: {
    categories: <?=$json_nm_des_apbd;?>
},
series: [{
    type: 'column',
    colorByPoint: true,
    data: <?=$json_jml_des_apbd;?>,
    showInLegend: false
}]
});
Highcharts.chart('browser', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Data Presentase per Kecamatan'
    },
    subtitle: {
        text: 'Klik <a href="http://statcounter.com" target="_blank">Maret, 2020</a>'
    },

    accessibility: {
        announceNewData: {
            enabled: true
        },
        point: {
            valueSuffix: '%'
        }
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Kecamatan",
            colorByPoint: true,
            data: <?=$json_kec_total;?>
        }
    ],
    drilldown: {
        series: <?=$json_kec_ser_total;?>
    }
});
Highcharts.chart('browser2', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Data Presentase per Kecamatan'
    },
    subtitle: {
        text: 'Klik <a href="http://statcounter.com" target="_blank">Maret, 2020</a>'
    },

    accessibility: {
        announceNewData: {
            enabled: true
        },
        point: {
            valueSuffix: '%'
        }
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Kecamatan",
            colorByPoint: true,
            data: <?=$json_kec;?>
        }
    ],
    drilldown: {
        series: <?=$json_kec_ser;?>
    }
});



Highcharts.chart('browser3', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Data Presentase per Kecamatan'
    },
    subtitle: {
        text: 'Klik <a href="http://statcounter.com" target="_blank">Maret, 2020</a>'
    },

    accessibility: {
        announceNewData: {
            enabled: true
        },
        point: {
            valueSuffix: '%'
        }
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Kecamatan",
            colorByPoint: true,
            data: <?=$json_kec_apbd;?>
        }
    ],
    drilldown: {
        series: <?=$json_kec_ser_apbd;?>
    }
});
</script>