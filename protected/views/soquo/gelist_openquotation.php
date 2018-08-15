

<?php
 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
   'id' => 'bandsdialog3',
   'options' => array(
   'autoOpen' => true,
   'title' => 'Select Quotation ',
   'modal' => false,
   'resizable'=>false,
   'width' => '1000',
   'height' => '550',
   ))
 );
?>

 

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'quotation-grid',
'type' => 'bordered',
'dataProvider'=>$model->searchquotationstatus(),
'filter'=>$model,
'columns'=>array(
    //'id_quotation',
        array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
    'QuotationNumber',
    //'id_customer',
        array(   
                'name'=>'customername',
                'value'=>'$data->Customer->CompanyName',
                ),
    'QuotationDate',
     array(  
                'name'=>'id_bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
                ),
    'SignName',
    //'SignPosition',
    //'attn',
    //'Status',
    //'Category',
    'StatusDescription',
    //'attachment',
    //'created_date',
        array(  
                'name'=>'Status',
                //'filter'=>array('OPEN'=>'OPEN','REJECTED'=>'REJECTED','ACCEPTED'=>'ACCEPTED'),
                'filter'=>false,
                ),
    //'created_user',
    //'ip_user_updated',

array(
           'header'=>'',
           'type'=>'raw',
           'value'=>'CHtml::link(CHtml::image(Yii::app()->baseUrl."/css/ceklis.jpg","alt",array("width"=>20,"height"=>20,"title"=>"select")),"",array(
               "onClick"=>CHtml::ajax(array(
               "url"=>Yii::app()->createUrl("quotation/selectquotation",array("id"=>$data->id_quotation)),
               "dataType"=>"json",
               "success"=>"function(data){
                     $(\"#ShippingOrder_id_quotation\").val(data.id_quotation);
                     $(\"#So_id_quotation\").val(data.id_quotation);
                     $(\"#quotationo\").val(data.quotationo);
                     $(\"#costumer\").val(data.customername);
                     $(\"#costumeraddress\").val(data.customeraddress);
                     $(\"#type\").val(data.type_order);
                     $(\"#ShippingOrder_id_customer\").val(data.id_customer);

                     $(\"#SoOffhiredOrder_id_quotation\").val(data.id_quotation);
                     $(\"#costumer\").val(data.customername);
                     $(\"#costumeraddress\").val(data.customeraddress);
                     $(\"#SoOffhiredOrder_id_customer\").val(data.id_customer);
                     $(\"#tug\").val(data.vesseltug);
                     $(\"#barge\").val(data.vesselbarge);
                     $(\"#SoOffhiredOrder_VesselTug\").val(data.BargingVesselTug);
                     $(\"#SoOffhiredOrder_VesselBarge\").val(data.BargingVesselBarge);

                     $(\"#SoOffhiredOrder_TCStartDate\").val(data.TCStartDate);
                     $(\"#SoOffhiredOrder_TCEndDate\").val(data.TCEndDate);
                     $(\"#SoOffhiredOrder_TCPrice\").val(data.TCPrice);
                     $(\"#total\").val(data.total);
                     
                     $(\"#bandsdialog3\").remove();
                }")
            ),"id"=>"child".$data->id_quotation,"style"=>"cursor:pointer;"))',
         ),

),
));

  $this->endWidget('zii.widgets.jui.CJuiDialog');
 ?>