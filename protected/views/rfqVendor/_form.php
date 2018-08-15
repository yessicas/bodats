
<?php
/*

$YearNow=date("Y");
$MonthNow=date("m");
$RomawiMonth= NumberingDocumentDB::getRomawiMonth($MonthNow);


$total=RfqVendor::model()->countByAttributes(array('RFQNumber'=>'RFQ/1'));
$total2="PML";

		if ($total ==0) 
		{$kode='RFQ/1';}
		else  
		{
		$sql="SELECT * FROM rfq_vendor  order by id_rfq_vendor DESC limit 0,1";
		$posts=RfqVendor::model()->findAllBySql($sql,array(
			'keyField' => 'id_rfq_vendor'));
			
		if ($posts >0) 
		{
			foreach($posts as $rfq_vendor)
			{
			$m=$rfq_vendor->RFQNumber;
			$n=substr($m,4,1);
			$n1=$n+1;
			$n2  = sprintf("%01s",$n1);
			$kode= "RFQ/".$n2."/".$total2."/".$RomawiMonth."/".$YearNow;
			}
		}
		}
		
		*/
?>

<style>
.typeahead_wrapper { display: block; height: 30px; }
.typeahead_photo { float: left; max-width: 230px; max-height: 30px; margin-right: 5px; border-radius: 6px;}
.typeahead_labels { float: left; height: 30px;}
.typeahead_primary { font-weight: bold; }
.typeahead_secondary { font-size: .8em; margin-top: -5px; }
.ui-autocomplete.ui-front.ui-menu.ui-widget.ui-widget-content.ui-corner-all {
         z-index: 10000 !important;
     }

</style>



<div class="view">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'rfq-vendor-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php 
	

	//	echo $form->textFieldRow($model,'RFQNumber',array('class'=>'span4','maxlength'=>32,'value'=>$kode,'readonly'=>'readonly')); 
	

	//	echo $form->textFieldRow($model,'RFQNumber',array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); 

	?>

	<?php 
	if($model->isNewRecord){
		$dataformatnumber=NumberingDocumentDB::getFormatNumber2($model,'id_rfq_vendor','NoOrder','NoMonth','NoYear');

		echo $form->textFieldRow($model,'RFQNumber',array('class'=>'span3','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'NoOrder',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'NoMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDB::getMonthNow(),'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'NoYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDB::getYearNow(),'readonly'=>'readonly')); 
	


	}else {
		echo $form->textFieldRow($model,'RFQNumber',array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>


	<?php //echo $form->textFieldRow($model,'RFQNumber',array('class'=>'span5','maxlength'=>32,'value'=> $kode, 'readonly'=>'readonly'));?>

	<?php echo $form->hiddenField($model,'created_user',array('class'=>'span3','maxlength'=>45,'value'=>Yii::app()->user->id)); ?>

	<?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['Rfqvendor']['vendorname']) ?$_POST['Rfqvendor']['vendorname'] : $model->Vendor->VendorName;
	}
	else{
		$value=isset($_POST['Rfqvendor']['vendorname']) ? $_POST['Rfqvendor']['vendorname'] : '';
	}
	?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="RfqVendor_vendorname"><?php echo $model::model()->getAttributeLabel('vendorname'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'vendorname', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('Rfqvendor/autovendor')."';
						 
							  // ambil JSON ke server
							  $.getJSON(urlsource+'/search/'+query, function(result) {
										  source = result;
										  $.each(source, function (i, model) {
									listdata[model.nama] = model;
									data.push(model.nama);
								 });
								 process(data);
								 });
														
							}",
					//'minLength'=>3,
                    'items'=>5,
					'highlighter'=> "js:function(item) {
						
						var itm = ''
						
									 + '<div class=\'typeahead_wrapper\'>'
									 + '<div class=\'typeahead_labels\'>'
									 + '<div class=\'typeahead_primary\'>' + listdata[item].nama + '</div>'
									
									 + '</div>'
									 + '</div>'
									
									;
								 	
						return itm;
				
					}",
					//'matcher'=>"js:function(item) {
                    //    return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                    //}",
					'updater'=> "js:function(item) {
						$('#RfqVendor_id_vendor').val(listdata[item].id);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span5','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($model,'vendorname'); ?>
		</div>
		</div>

		<?php echo $form->hiddenField($model,'id_vendor',array('class'=>'span3','maxlength'=>20)); ?> 

	<?php echo $form->textFieldRow($model,'From',array('class'=>'span3','maxlength'=>64,'readonly'=>'readonly')); ?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'QuotationDate'); ?>
	<label class="control-label required" for="RfqVendor_QuotationDate"><?php echo $model::model()->getAttributeLabel('QuotationDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'QuotationDate',
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
	<?php echo $form->error($model,'QuotationDate'); ?> <!-- error message -->
	</div>
	</div>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save & Continue' : 'Save & Continue',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div>