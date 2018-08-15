

<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>

<?php 
 echo"<script type='text/javascript'>
 function hitung_durasi() 
 {

var start = new Date($('#SoOffhiredOrder_TCStartDate').val()); 
var end = new Date($('#SoOffhiredOrder_TCEndDate').val())  
var diff = Math.abs(end-start); 
var days = diff/1000/60/60/24;
    
if($('#SoOffhiredOrder_TCEndDate').val()!=''&&$('#SoOffhiredOrder_TCStartDate').val()!=''){

if(start > end){
	alert('Start Date Cannot Smaller Than End Date');
	$('#SoOffhiredOrder_TCEndDate').val('');
	$('#total').val('');
}else{
    $('#total').val(days);
}


}

}
 </script>";
?>


<?php if($model->TCStartDate!='0000-00-00'&&$model->TCEndDate!='0000-00-00') {
 echo"<script type='text/javascript'>
 window.onload = function (){
 
var start = new Date($('#SoOffhiredOrder_TCStartDate').val()); 
var end = new Date($('#SoOffhiredOrder_TCEndDate').val())  
var diff = Math.abs(end-start); 
var days = diff/1000/60/60/24;

if($('#SoOffhiredOrder_TCEndDate').val()!=''&&$('#SoOffhiredOrder_TCStartDate').val()!=''){

if(start > end){
	alert('Start Date Cannot Smaller Than End Date');
	$('#SoOffhiredOrder_TCEndDate').val('');
	$('#total').val('');
}else{
    $('#total').val(days);
}


}


}
 </script>";

}
?>

<div class ="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'so-offhired-order-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	
	<?php 
	if($model->isNewRecord){
		//$dataformatnumber=NumberingDocumentDBSOOFFHIRED::getFormatNumber($model,'id_so_offhired_order','SONo','SOMonth','SOYear');

		//echo $form->textFieldRow($model,'OffhiredOrderNumber',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'SONo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'SOMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBSOOFFHIRED::getMonthNow(),'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'SOYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBSOOFFHIRED::getYearNow(),'readonly'=>'readonly')); 
	


	}else {
		echo $form->textFieldRow($model,'OffhiredOrderNumber',array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('SODate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'SODate',
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
	<?php echo $form->error($model,'SODate'); ?> <!-- error message -->
	</div>
	</div>

	<?php 
	if(!$model->isNewRecord){
		$value_quotationo=isset($_POST['quotationo']) ?$_POST['quotationo'] : $model->Quotation->QuotationNumber;
		$value_costumer=isset($_POST['costumer']) ?$_POST['costumer'] : $model->Quotation->Customer->CompanyName;
		$value_address=isset($_POST['costumeraddress']) ?$_POST['costumeraddress'] : $model->Quotation->Customer->Address;
		$value_tug=isset($_POST['tug']) ?$_POST['tug'] : $model->Quotation->VesselTug->VesselName;
		$value_barge=isset($_POST['barge']) ?$_POST['barge'] : $model->Quotation->VesselBarge->VesselName;
	}
	else{
		$value_quotationo=isset($_POST['quotationo']) ? $_POST['quotationo'] : '';
		$value_costumer=isset($_POST['costumer']) ? $_POST['costumer'] : '';
		$value_address=isset($_POST['costumeraddress']) ? $_POST['costumeraddress'] : '';
		$value_tug=isset($_POST['tug']) ? $_POST['tug'] : '';
		$value_barge=isset($_POST['barge']) ? $_POST['barge'] : '';
		


	}
	?>


	<?php //echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

	<!--- quotation -->
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Quotation Number'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('quotationo',$value_quotationo,array('class'=>'span6','readonly'=>'readonly')); 
        echo' ';
        echo Chtml::ajaxLink('<i class="icon-search"></i> Search',Yii::app()->createUrl('quotation/showopenquotation'),
                            array('update'=>'#namafield',

                            		'beforeSend' => 'function() {           
							           $(".view").addClass("loadingdialog");
							        }',
						        	'complete' => 'function() {
							          $(".view").removeClass("loadingdialog");
							        }',  

                            	),array("id"=>'pilih','class'=>''));
    ?>

    <?php echo $form->hiddenField($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

    <?php echo $form->error($model,'id_quotation'); ?> <!-- error message -->
	</div>
	</div>
	<!--- end quotation -->


	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Costumer'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('costumer',$value_costumer,array('class'=>'span7','readonly'=>'readonly')); 
    ?>

	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Costumer Address'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textArea('costumeraddress',$value_address,array('class'=>'span7','readonly'=>'readonly','rows'=>5, 'cols'=>70,)); 
    ?>

    <?php echo $form->hiddenField($model,'id_customer',array('class'=>'span5','maxlength'=>20)); ?>
	</div>
	</div>


	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Tug'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('tug',$value_tug,array('class'=>'span7','readonly'=>'readonly')); 
    ?>

     <?php echo $form->hiddenField($model,'VesselTug',array('class'=>'span5')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Barge'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('barge',$value_barge,array('class'=>'span7','readonly'=>'readonly')); 
    ?>


	<?php echo $form->hiddenField($model,'VesselBarge',array('class'=>'span5')); ?>

	</div>
	</div>

	<?php echo $form->textFieldRow($model,'TCStartDate',array('class'=>'calendar' ,'onChange' => 'javascript:hitung_durasi()')); ?>

    <?php echo $form->textFieldRow($model,'TCEndDate',array('class'=>'calendar1', 'onChange' => 'javascript:hitung_durasi()')); ?>

    <div class="control-group ">
    <label class="control-label required" for="Total"><?php echo $model::model()->getAttributeLabel('Total'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

    <?php echo Chtml::textField('total','',array('class'=>'span2' ,'readonly'=>'readonly')); ?>
    days

    </div>
	</div>

	<div class="control-group ">
	<label class="control-label required" for="TCPrice"><?php echo $model::model()->getAttributeLabel('TCPrice'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

    <?php echo  $form->textField($model,'TCPrice',array('class'=>'span2' )); ?>
    /day
    <?php echo $form->error($model,'TCPrice'); ?> <!-- error message -->

    </div>
	</div>


	<?php //echo $form->textFieldRow($model,'id_customer',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'VesselTug',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'VesselBarge',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'OffhiredOrderNumber',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'SONo',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SOMonth',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SOYear',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SODate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'period_year',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'period_month',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'period_quartal',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'TCStartDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'TCEndDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'TCPrice',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SOQuartal',array('class'=>'span5')); ?>

	<?php //echo $form->textAreaRow($model,'Marks',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>


<div id="namafield" style="visibility: hidden;"></div>
