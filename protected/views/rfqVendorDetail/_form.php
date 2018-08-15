

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

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'rfq-vendor-detail-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_rfq_vendor',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->hiddenField($model,'created_user',array('class'=>'span3','maxlength'=>45,'value'=>Yii::app()->user->id)); ?>

	<?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['RfqVendorDetail']['partname']) ?$_POST['RfqVendorDetail']['partname'] : $model->idPart->PartName;
	}
	else{
		$value=isset($_POST['RfqVendorDetail']['partname']) ? $_POST['RfqVendorDetail']['partname'] : '';
	}
	?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="RfqVendorDetail_partname"><?php echo $model::model()->getAttributeLabel('partname'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'partname', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('rfqvendordetail/autopart')."';
						 
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
						$('#RfqVendorDetail_id_part').val(listdata[item].id);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span3','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($model,'partname'); ?>
		</div>
		</div>

		<?php echo $form->hiddenField($model,'id_part',array('class'=>'span3','maxlength'=>20)); ?> 

	<?php //echo $form->textFieldRow($model,'id_part',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span3')); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
