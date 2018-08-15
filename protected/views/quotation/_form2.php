<script>function finebarge(data) {
             
                var json = JSON.parse(data);
               // alert(json["message"]);
               $("#resultfinebarge").html(json["message"]);
               $('#Quotation_BargingVesselBarge').val(json["id_vessel"]);
               $('#VesselName').val(json["VesselName"]);
				
        }
</script>

<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'quotation-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
		

  <?php if($model->id_bussiness_type_order!=250){ ?>

	<?php echo $form->dropDownListRow($model,'IsSingleRoute',array('0'=>'NO', '1'=>'YES',),
    array('prompt'=>'--Pilih --','class'=>'span2',
    'onChange' => 'javascript:enable(this.selectedIndex, "IsSingleRoute")'));?>
  <?php } ?>





	<?php echo $form->dropDownListRow($model,'BargingJettyIdStart',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5'));?>

	<?php echo $form->dropDownListRow($model,'BargingJettyIdEnd',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5'));?>
	
	
	
	<?php /*echo $form->dropDownListRow($model,'BargingVesselTug',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2')); */?>

	<?php if($model->id_bussiness_type_order==200 || $model->id_bussiness_type_order==250){ ?>
    <?php echo $form->dropDownListRow($model,'TranshipmentMotherVesselID',CHtml::listData(Mothervessel::model()->findAll(array('order'=>'MV_Name ASC')), 'id_mothervessel', 'MV_Name'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5'));?>
    <?php }?>



    <div id="up2">



  <?php if($model->id_bussiness_type_order!=250){ ?>


  <div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('BargingVesselTug'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

    <?php echo $form->dropDownList($model,'BargingVesselTug',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4',
    'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('settypetugbarge/FindBargeVesselByTugVessel') /*, 'update'=>'#id_update'*/,'success'=>'finebarge')));?>

    <?php echo $form->error($model,'BargingVesselTug'); ?> <!-- error message -->
    <br>
    <div id ="resultfinebarge" style="color: #b94a48; margin-left:20px;padding-top:5px;"> </div>
	</div>
	</div>
   



	<?php 
	if(!$model->isNewRecord){
		if($model->BargingVesselTug!=0){
			$valueVesselName=isset($_POST['VesselName'])  ? $_POST['VesselName'] : $model->VesselBarge->VesselName;
		}else{
			$valueVesselName=isset($_POST['VesselName']) ?  $_POST['VesselName'] : '';
		}
		
		
	}
	else{
		$valueVesselName=isset($_POST['VesselName']) ?  $_POST['VesselName'] : '';
	}
	?>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('BargingVesselBarge'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

	<?php echo Chtml::textField('VesselName',$valueVesselName,array('class'=>'span4','readonly'=>'readonly')); ?>

	<?php echo $form->error($model,'BargingVesselBarge'); ?> <!-- error message -->
    <br>
    <div id ="resultfinetug" style="color: #4CAD2D; margin-left:20px;padding-top:5px;"> </div>
	</div>
	</div>

    <?php //echo $form->hiddenField($model,'BargingVesselBarge',array('class'=>'span4')); ?>
    <?php 
    $valueDataBarge=($model->BargingVesselBarge!=0) ? $model->BargingVesselBarge : '';
    echo $form->hiddenField($model,'BargingVesselBarge',array('class'=>'span4','value'=>$valueDataBarge)); // value nya $valueDataBarge  agar jadi kosong
    ?> 



   <?php }?>





    <div class="control-group ">

	<label class="control-label required" for="Quotation_LoadingDate"><?php echo $model::model()->getAttributeLabel('LoadingDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'LoadingDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;'),
	)); ?>	
	<?php echo $form->error($model,'LoadingDate'); ?> <!-- error message -->
	</div>
	</div>

	</div>





	<?php /*echo $form->dropDownListRow($model,'BargingVesselBarge',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "BARGE",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2')); */?>

 

	<?php echo $form->textAreaRow($model,'StatusDescription',array('rows'=>3, 'cols'=>100,'class'=>'span5')); ?>

 <div id="lumpsump">
	<?php echo $form->dropDownListRow($model,'is_lumpsump',array('0'=>'NO','1'=>'YES',),
    array('class'=>'span2',
    'onChange' => 'javascript:enablelump(this.selectedIndex, "is_lumpsump")'));?>
 </div>

	<div class="control-group ">

	<label class="control-label required" for="Quotation_TotalQuantity"><?php echo $model::model()->getAttributeLabel('TotalQuantity'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo $form->textField($model,'TotalQuantity',array('class'=>'span2')); ?>

	<?php echo $form->dropDownList($model,'QuantityUnit',array('MT'=>'MT'),array('style'=>'width:60px','readonly'=>'readonly')); ?>
	<?php echo $form->error($model,'TotalQuantity'); ?> <!-- error message -->
	</div>
	</div>

    <div id="up">

     <div class="control-group ">
     <label class="control-label required" for="Quotation_QuantityPrice"><?php echo $model::model()->getAttributeLabel('QuantityPrice'); ?> </label> <!-- label -->
	 <div class="controls">
     <?php echo $form->textField($model,'QuantityPrice',array('class'=>'span2')); ?>
    <?php echo $form->error($model,'QuantityPrice'); ?> <!-- error message -->
    </div>
	</div>

    <?php echo $form->textFieldRow($model,'total_price',array('class'=>'span3')); ?>

    <?php echo $form->dropDownListRow($model,'QuantityPriceCurency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

     </div>
	
    

	
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save Step 2 & Continue' : 'Save Step 2 & Continue',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>


<script>
function enable(id)
{
  
  if(id==2){
    //alert(id);
    var el = document.getElementById("up");
    el.style.display = 'inline';

     var el2 = document.getElementById("up2");
    el2.style.display = 'inline';

     var el3 = document.getElementById("lumpsump");
    el3.style.display = 'inline';

    var x = document.getElementById('Quotation_is_lumpsump');
    var s= x.selectedIndex;
    enablelump(s);


  }else{
  	//alert(id);
    var el = document.getElementById("up");
    el.style.display = 'none';

     var el2 = document.getElementById("up2");
    el2.style.display = 'none';

    var el3 = document.getElementById("lumpsump");
    el3.style.display = 'none';
    $('#Quotation_TotalQuantity').attr('readonly', false);
    
	//var s= x.selectedIndex;
	//alert(s);
  }
}
</script>



<script>
function enablelump(id)
{
  
 //alert(id);
  if(id==1){ // yes
    //alert(id);
    
    var qty = $('#Quotation_TotalQuantity').val(0);
  	var price = $('#Quotation_QuantityPrice').val(0);
  	var price = $('#Quotation_total_price').val(0);

  	//$('#Quotation_TotalQuantity').attr('readonly', true);
    $('#Quotation_QuantityPrice').attr('readonly', true);
    $('#Quotation_total_price').attr('readonly', false);

  }
  if(id==0){ // no
  	//alert(id);

  	$('#Quotation_TotalQuantity').attr('readonly', false);
    $('#Quotation_QuantityPrice').attr('readonly', false);
    $('#Quotation_total_price').attr('readonly', true);
  

  	 $('#Quotation_TotalQuantity').blur(function () {  

  	 	var qty = $('#Quotation_TotalQuantity').val();
  		var price = $('#Quotation_QuantityPrice').val();
  		var total = parseFloat(qty*price);
  		$('#Quotation_total_price').val(total);

  	 });

  	 $('#Quotation_QuantityPrice').blur(function () {  

  	 	var qty = $('#Quotation_TotalQuantity').val();
  		var price = $('#Quotation_QuantityPrice').val();
  		var total = parseFloat(qty*price);
  		$('#Quotation_total_price').val(total);

  	 });
   
  }
}
</script>


<?php
if(!$model->isNewRecord){

        if($model->IsSingleRoute == 1)
          $cmbval = 2;
        else
          $cmbval = 1;



      if($model->is_lumpsump == 1)
          $cmbvallum = 1;
        else
          $cmbvallum = 0;
        
        echo '<script>enable('.$cmbval.');</script>';
         echo '<script>enablelump('.$cmbvallum.');</script>';
    }

else {
?>	 
	<script>
	 var x = document.getElementById('Quotation_IsSingleRoute');
	 var s= x.selectedIndex;
     enable(s);
    </script>

<?php
}
