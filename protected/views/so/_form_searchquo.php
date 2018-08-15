<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'so-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

	<!--- quotation -->
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Quotation Number'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('quotationo','',array('class'=>'span6','readonly'=>'readonly')); 
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

	<!--- cutomer -->
	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Costumer'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('costumer','',array('class'=>'span7','readonly'=>'readonly')); 
    ?>

	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Costumer Address'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textArea('costumeraddress','',array('class'=>'span7','readonly'=>'readonly','rows'=>5, 'cols'=>70,)); 
    ?>

	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Type'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
       echo CHtml::textfield('type','',array('class'=>'span3','readonly'=>'readonly')); 
    ?>

	</div>
	</div>


	<?php /*

	<!-- sales plan  masih sementara-->
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Sales Plan'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('id_sales_plan','',array('class'=>'span6','readonly'=>'readonly')); 
        echo' ';
        echo Chtml::ajaxLink('<i class="icon-search"></i> Search',Yii::app()->createUrl('salesplan/showdata'),
                            array('update'=>'#namafieldsalesplan'),array("id"=>'pilihsalesplam','class'=>''));
    ?>

    <?php echo $form->hiddenField($model,'id_sales_plan',array('class'=>'span5','maxlength'=>20)); ?>

    <?php echo $form->error($model,'id_sales_plan'); ?> <!-- error message -->
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Tug'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('tug_sales_plan','',array('class'=>'span3','readonly'=>'readonly')); 
    ?>

	</div>
	</div>

	<!-- sales plan -->
	*/ ?>

	<?php /*
	<?php echo $form->textFieldRow($model,'ShippingOrderNumber',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'SONo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SOMonth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SOYear',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'period_year',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'period_month',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'period_quartal',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SOQuartal',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SI_Number',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'Consignee',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'NotifyAddress',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'Marks',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'DocumentsRequired',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	*/
	?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Continue' : 'Continue',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<div id="namafield" style="visibility: hidden;"></div>

<div id="namafieldsalesplan" style="visibility: hidden;"></div>

</div>