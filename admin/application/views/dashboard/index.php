<?php $this->load->view('partials/header'); ?>
<div class="clearfix"></div>
<?php //var_dump(array_keys($allArray)); ?>
<?php //var_dump($allArray['unverified_buyer']);?>
<style type="text/css">
.card-header{
    padding: 5px 10px;
}
.card-title {
    margin-bottom: .25rem;
}
</style>
<div class="col-md-12">
    <br /><br />
    <br /><br />
    <br /><br />
    <div class="row">
        <div class="col-md-12">
        <center><h2>Welcome to Shail - International Group!!</h2></center>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer'); ?>
<script src="<?php echo base_url('asset/js/chart.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/js/utils.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(window).on("load", function(){
    var colorArray = ['673AB7','E91E63','28a745','343a40','fd7e14','673AB7','E91E63','28a745','343a40','fd7e14','673AB7','E91E63','28a745','343a40','fd7e14']
    var colorArrayRGB = ['rgba(103,58,183,.9)','rgba(233,30,99,.9)','rgba(40,167,69,.9)','rgba(52,58,64,.9)','rgba(253,126,20,.9)','rgba(103,58,183,.9)','rgba(233,30,99,.9)','rgba(40,167,69,.9)','rgba(52,58,64,.9)','rgba(253,126,20,.9)','rgba(103,58,183,.9)','rgba(233,30,99,.9)','rgba(40,167,69,.9)','rgba(52,58,64,.9)','rgba(253,126,20,.9)']
    $.ajax({
        url: "<?=base_url('dashboard/records')?>",
        data: {'fromdate':"<?=$_GET['fromdate']?>",'todate':"<?=$_GET['todate']?>"},
        method: "GET",
        success: function(data) {
            console.log(data);
            data = $.parseJSON(data);
            
            if(<?=$this->session->userdata('role_id')?> == 1){
                if(data.allArray.total_buyer){
                    //console.log(data.allArray.total_buyer);
                    var total = [];
                    var month = [];
                    var backgroundColorArray = [];
                    month.push("All Buyer ("+parseInt(data.allArray.total_buyer[0].totalRows)+")");
                    total.push(parseInt(data.allArray.total_buyer[0].totalRows));
                    backgroundColorArray.push("#"+colorArray[0]);

                    month.push("Verified Buyer ("+parseInt(data.allArray.verified_buyer[0].totalRows)+")");
                    total.push(parseInt(data.allArray.verified_buyer[0].totalRows));
                    backgroundColorArray.push("#"+colorArray[1]);

                    month.push("Unverified Buyer ("+parseInt(data.allArray.unverified_buyer[0].totalRows)+")");
                    total.push(parseInt(data.allArray.unverified_buyer[0].totalRows));
                    backgroundColorArray.push("#"+colorArray[2]);
                   
                    month.push("Active Buyer ("+parseInt(data.allArray.active_buyer[0].totalRows)+")");
                    total.push(parseInt(data.allArray.active_buyer[0].totalRows));
                    backgroundColorArray.push("#"+colorArray[3]);
                    
                    month.push("Inactive Buyer ("+parseInt(data.allArray.inactive_buyer[0].totalRows)+")");
                    total.push(parseInt(data.allArray.inactive_buyer[0].totalRows));
                    backgroundColorArray.push("#"+colorArray[4]);

                    total.push(0)
                    var datasets = [{
                                data: total,
                                backgroundColor:backgroundColorArray,
                                label: 'Dataset 1'
                            }];
                    viewGraphPie('pie',datasets,month,'BuyerGraph','');
                }
            }
            if(<?=$this->session->userdata('role_id')?> == 1){
                if(data.allArray.total_product){
                    var total = [];
                    var month = [];
                    var backgroundColorArray = [];
                    month.push("All Product ("+parseInt(data.allArray.total_product[0].totalRows)+")");
                    total.push(parseInt(data.allArray.total_product[0].totalRows));
                    backgroundColorArray.push("#"+colorArray[0]);

                    month.push("Active Product ("+parseInt(data.allArray.active_product[0].totalRows)+")");
                    total.push(parseInt(data.allArray.active_product[0].totalRows));
                    backgroundColorArray.push("#"+colorArray[3]);
                    
                    month.push("Inactive Product ("+parseInt(data.allArray.inactive_product[0].totalRows)+")");
                    total.push(parseInt(data.allArray.inactive_product[0].totalRows));
                    backgroundColorArray.push("#"+colorArray[4]);

                    total.push(0)
                    var datasets = [{
                                data: total,
                                backgroundColor:backgroundColorArray,
                                label: 'Dataset 2'
                            }];
                    viewGraphPie('pie',datasets,month,'ProductGraph','');
                }
            }
            if(<?=$this->session->userdata('role_id')?> == 1 || <?=$this->session->userdata('role_id')?> == 3){
                if(data.allArray.total_order){
                    var month = [];
                    var datasetsAll = [];
                    var labelArray = ['All Order','Pending Order','Received Order'];
                    for(var i in data.allArray.total_order) {
                        month.push("" + data.allArray.total_order[i].createddate);
                    }
                    var total = [];
                    for(var i in data.allArray.total_order) {
                            total.push(parseInt(data.allArray.total_order[i].totalRows));
                    }
                    total.push(0);
                    total.push(1);
                    datasetsAll.push(jsonMapperGraphPoint(0,total,labelArray));
                    
                    var total = [];
                    for(var i in data.allArray.total_pending_order) {
                        total.push(parseInt(data.allArray.total_pending_order[i].totalRows));
                    }
                    datasetsAll.push(jsonMapperGraphPoint(1,total,labelArray));
                    
                    var total = [];
                    for(var i = 0;i < month.length;i++){
                        var pq = 0;
                        console.log(month[i]);
                        for(var j = 0;j < data.allArray.total_received_order.length;j++){
                            if (month[i] == data.allArray.total_received_order[j].createddate) {
                                pq = 1;
                                total.push(parseInt(data.allArray.total_received_order[j].totalRows));
                            }
                        }
                        if(pq == 0){
                            total.push(0);
                        }        
                    }
                    datasetsAll.push(jsonMapperGraphPoint(2,total,labelArray));
                    viewGraphPoint('line',datasetsAll,month,'canvas','');
                }
            }
        },
        error: function(data) {
            console.log(data);
        }
    });
    var month_name = function(dt){
        mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
        return mlist[dt.getMonth()];
    };
    function showchart(labels,datasetsAll,id){
        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
            },
            hover: {
                mode: 'label'
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: "#f3f3f3",
                        drawTicks: false,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: ''
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: "#f3f3f3",
                        drawTicks: false,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: ''
                    }
                }]
            },
            title: {
                display: true,
                text: ''
            }
        };
        var chartData = {
            labels: labels,
            datasets: datasetsAll
        };
        var config = {
            type: 'bar',
            options : chartOptions,
            data : chartData
        };
        var ctx = $("#"+id);
        var lineChart = new Chart(ctx, config);
    }
    function jsonMapper(index,total,labelArray){
        var colorArray = ['673AB7','E91E63','28a745','343a40','fd7e14','673AB7','E91E63','28a745','343a40','fd7e14','673AB7','E91E63','28a745','343a40','fd7e14']
        var colorArrayRGB = ['rgba(103,58,183,.9)','rgba(233,30,99,.9)','rgba(40,167,69,.9)','rgba(52,58,64,.9)','rgba(253,126,20,.9)','rgba(103,58,183,.9)','rgba(233,30,99,.9)','rgba(40,167,69,.9)','rgba(52,58,64,.9)','rgba(253,126,20,.9)','rgba(103,58,183,.9)','rgba(233,30,99,.9)','rgba(40,167,69,.9)','rgba(52,58,64,.9)','rgba(253,126,20,.9)']
        var abc = {};
        abc.label = labelArray[index];
        abc.data = total;
        abc.backgroundColor = "#"+colorArray[index];
        abc.hoverBackgroundColor = colorArrayRGB[index];
        abc.borderColor= "transparent";
        return abc;
    }
    function jsonMapperGraphPoint(index,total,labelArray){
        var colorArray = ['673AB7','E91E63','28a745','343a40','fd7e14','673AB7','E91E63','28a745','343a40','fd7e14','673AB7','E91E63','28a745','343a40','fd7e14']
        var colorArrayRGB = ['rgba(103,58,183,.9)','rgba(233,30,99,.9)','rgba(40,167,69,.9)','rgba(52,58,64,.9)','rgba(253,126,20,.9)','rgba(103,58,183,.9)','rgba(233,30,99,.9)','rgba(40,167,69,.9)','rgba(52,58,64,.9)','rgba(253,126,20,.9)','rgba(103,58,183,.9)','rgba(233,30,99,.9)','rgba(40,167,69,.9)','rgba(52,58,64,.9)','rgba(253,126,20,.9)']
        var abc = {};
        
        abc.label = labelArray[index];
        abc.data = total;
        abc.backgroundColor = "#"+colorArray[index];
        abc.borderColor = colorArrayRGB[index];
        abc.fill= false;
        abc.borderDash= [5,5];
        abc.pointRadius= 10;
        abc.pointHoverRadius= [2, 4, 6, 8, 10, 12, 20];
        return abc;
    }
    function viewGraphPoint(type,datasets,labels,id,text){
        var config = {
            type: type,
            data: {
                datasets: datasets,
                labels: labels
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                hover: {
                    mode: 'index'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                },
                title: {
                    display: true,
                    text: text
                }
            }
        };
        var ctx = document.getElementById(id).getContext('2d');
        window.myPie = new Chart(ctx, config);
    }
    function viewGraphPie(type,datasets,labels,id,text){
        var config = {
            type: type,
            data: {
                datasets: datasets,
                labels: labels
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: text
                }
            }
        };
        var ctx = document.getElementById(id).getContext('2d');
        window.myPie = new Chart(ctx, config);
    }
});
</script>
