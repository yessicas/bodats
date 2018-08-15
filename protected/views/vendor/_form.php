
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vendor-form',
	//'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>



<?php echo $form->errorSummary($model); ?>
<div class="view">

	<div class="imgleft">
		<br>
		<br>
		<?php 
			//echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$repo = "repository/vendor/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($model->foto_vendor != ""){
				$file = $repo.$model->foto_vendor;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayformFile($repo , $model->foto_vendor);
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			//$url = Yii::app()->createUrl("crew/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
			//echo"<figcaption><a href='$url'class='various fancybox.ajax' style='color:#ffffff;'>".Yii::t('strings','Upload Photo')." </a></figcaption>"; 
			//echo"</figure>";  // untuk hover  ubah foto
			
		?>
	
	<?php echo $form->fileFieldRow($model,'foto_vendor',array('style'=>'width:200px','margin-left:-75px','maxlength'=>250)); ?>
	</div>
	<?php echo $form->error($model,'foto_vendor'); ?>

<h4 style="color:#BD362F;"> Personal Vendor Info </h4>

	<?php echo $form->textFieldRow($model,'ContactName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textFieldRow($model,'VendorNumber',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'VendorName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textAreaRow($model,'Address',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'City',array('class'=>'span3','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'PostalCode',array('class'=>'span3','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Telephone',array('class'=>'span3','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'MobilePhone',array('class'=>'span3','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'fax_number',array('class'=>'span3','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'Email',array('class'=>'span3','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'NPWP',array('class'=>'span3','maxlength'=>32)); ?>

	<?php echo $form->dropDownlistRow($model,'CompanyType',array("PT"=>"PT","CV"=>"CV"),array('class'=>'span2','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'vatReg',array('class'=>'span5','maxlength'=>50)); ?>
</div>

<h4 style="color:#BD362F; margin-top:20px;"> Classification </h4>

<div class="view">
	

<div>
<?php echo CHtml::CheckBox('type1',''); ?>
</div>
<div style="margin:-14px 0 0 30px;">
<?php echo 'AGENCY' ?>

</div>


<?php //echo $form->error($model,'type'); ?>

<div>
<?php echo CHtml::CheckBox('type2',''); ?>
</div>

<div style="margin:-14px 0 0 30px;">
<?php echo 'PRODUCT' ?>

</div>

<span class="help-block error" id="Vendor_agen" ></span>



<?php //echo $form->error($model,'type'); ?>


</div>




<?php //$this->renderPartial('/vendorclassification/create2'); ?>


<?php /* ini dimatikan

	<div class="view">
	<h4 style="color:#BD362F;"> Payment Info </h4>

	<?php echo $form->textFieldRow($model,'BankName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'BranchAddress',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'BankCity',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'AccountName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'AccountNumber',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->dropDownListRow($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency_type'),
    array('class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<?php //echo $form->dropDownListRow($model,'id_payment_top',CHtml::listData(PaymentTop::model()->findAll(), 'id_payment_top', 'payment_top'),
    //array('prompt'=>'-- Choose --','class'=>'span4'));?>

	<?php //echo $form->textFieldRow($model,'id_payment_top',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'term_of_payment',array('class'=>'span3','append' => 'Days','maxlength'=>3)); ?>
	</div>

	*/ ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save & Continue' : 'Save & Continue',
		)); ?>
</div>

<?php $this->endWidget(); ?>



<script>
$(document).ready(function(){

$('#vendor-form').submit(function(){

var mustcheckmessage='Pilih Salah Satu Checkbox !!!';

var checkagen=$('#type1')[0].checked ;
var checkproduct=$('#type2')[0].checked ;

if(checkagen==false && checkproduct==false){

	$("#Vendor_agen").html(mustcheckmessage);
	return false;

}

else{
return true;	
}


});


});

</script>