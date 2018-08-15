<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'bom-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'bom_name',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>4, 'cols'=>50, 'class'=>'span4')); ?>

	<?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['Bom']['PartName']) ? $_POST['Bom']['PartName'] : $model->part->PartName;
	}
	else{
		$value=isset($_POST['Bom']['PartName']) ? $_POST['Bom']['PartName'] : '';
	}
	?>


	<div class="control-group ">
	<?php //echo $form->labelEx($model,'JettyName'); ?>
	<label class="control-label required" for="Bom_PartName"><?php echo $model::model()->getAttributeLabel('PartName'); ?> <span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'PartName', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('bom/autopart')."';
						 
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
						$('#Bom_id_part_root').val(listdata[item].id); 
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span4','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($model,'id_part_root'); ?>
		</div>
		</div>

	<?php echo $form->hiddenField($model,'id_part_root',array('class'=>'span2','maxlength'=>3)); ?>

	<?php //echo $form->textFieldRow($model,'id_part_root',array('class'=>'span5','maxlength'=>11)); ?>

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
