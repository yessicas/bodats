<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'purchase-request-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'clientOptions' => array('validateOnSubmit' => true),
    'enableClientValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>


<?php //echo $form->textField($model, 'requested_user'); ?>
<?php
//$this->widget('CMultiFileUpload', array(
//    'model' => $model,
//    'name' => 'image',
//    'attribute' => 'image',
//    'accept' => 'jpg|gif|png',
//    'max' => 4,
//    'duplicate' => 'already selected'
//));
?>
<?php //echo CHtml::submitButton($model->isNewRecord ? 'Upload' : 'Save'); ?>


<?php
//    $form = $this->beginWidget('CActiveForm', array(
//        'id' => 'laporan-form',
//        'enableAjaxValidation' => false,
//        'htmlOptions' => array('enctype' => 'multipart/form-data'),
//    ));
?>



<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


<?php
if ($model->isNewRecord) {
    //$dataformatnumber=NumberingDocumentDBPurchase::getFormatNumber($model,'id_purchase_request','PRNo','PRMonth','PRYear');
    //echo $form->textFieldRow($model,'PRNumber',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
    //echo $form->hiddenField($model,'PRNo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
    //echo $form->hiddenField($model,'PRMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBPurchase::getMonthNow(),'readonly'=>'readonly')); 
    //echo $form->hiddenField($model,'PRYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBPurchase::getYearNow(),'readonly'=>'readonly')); 
} else {
    echo $form->textFieldRow($model, 'PRNumber', array('class' => 'span4', 'maxlength' => 32, 'readonly' => 'readonly'));
}
?>


<?php //echo $form->textFieldRow($model,'PRNumber',array('class'=>'span5','maxlength'=>250));  ?>

<?php //echo $form->textFieldRow($model,'PRDate',array('class'=>'span5'));  ?>

<div class="control-group ">
    <label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('PRDate'); ?> <span class="required">*</span></label> <!-- label -->
    <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            //'language'=>Yii::app()->language='id',
            'attribute' => 'PRDate',
            'options' => array(
                'showAnim' => 'slideDown',
                'dateFormat' => 'yy-mm-dd',
                'changeMonth' => true,
                'changeYear' => true,
                'showOn' => 'focus',
                'showButtonPanel' => true,
            ),
            'htmlOptions' => array(
                'style' => 'width:80px;',
                'value' => date("Y-m-d")),
        ));
        ?>	
        <?php echo $form->error($model, 'PRDate'); ?> <!-- error message -->
    </div>
</div>


<?php //echo $form->textFieldRow($model,'PRNo',array('class'=>'span5'));  ?>

<?php //echo $form->textFieldRow($model,'PRMonth',array('class'=>'span5'));  ?>

<?php //echo $form->textFieldRow($model,'PRYear',array('class'=>'span5'));  ?>

<?php //echo $form->textFieldRow($model,'id_po_category',array('class'=>'span5')); ?>

<?php
echo $form->dropDownListRow($model, 'id_po_category', CHtml::listData(PoCategory::model()->findAll(array(
                    'condition' => 'id_parent = :id_parent',
                    'params' => array(
                        ':id_parent' => "10400",
                    ),
                )), 'id_po_category', 'category_name'), array('prompt' => Yii::t('strings', '-- Select --'), 'class' => 'span5'));
?>


<div class="control-group ">

    <label class="control-label required" for="Quotation_TotalQuantity"><?php echo $model::model()->getAttributeLabel('amount'); ?> <span class="required">*</span></label> <!-- label -->
    <div class="controls">

        <?php echo $form->textField($model, 'amount', array('class' => 'span3', 'maxlength' => 20)); ?>

        <?php echo $form->dropDownList($model, 'metric', CHtml::listData(MstMetricPr::model()->findAll(), 'metric', 'metric_name'), array('class' => 'span2'));
        ?>
        <?php echo $form->error($model, 'amount'); ?> <!-- error message -->
    </div>
</div>

<?php //echo $form->textFieldRow($model,'dedicated_to',array('class'=>'span5','maxlength'=>0)); ?>

<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

<?php
echo $form->dropDownListRow($model, 'id_vessel', CHtml::listData(Vessel::model()->findAll(array(
                    'condition' => 'VesselType = :VesselType',
                    'params' => array(
                        ':VesselType' => "TUG",
                    ),
                )), 'id_vessel', 'VesselName'), array('prompt' => Yii::t('strings', '-- Select --'), 'class' => 'span5'));
?>

<?php //echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5'));  ?>

<?php echo $form->textAreaRow($model, 'notes', array('rows' => 3, 'cols' => 50, 'class' => 'span8')); ?>

<?php //echo $form->textFieldRow($model,'is_mutliple_item',array('class'=>'span5'));  ?>

<?php //echo $form->textFieldRow($model,'requested_user',array('class'=>'span5','maxlength'=>45,'value'=>Yii::app()->user->id,'readonly'=>'readonly'));  ?>

<?php echo $form->fileFieldRow($model, 'requested_user', array('class' => 'span5', 'maxlength' => 45, 'value' => Yii::app()->user->id, 'readonly' => 'readonly')); ?>

<?php //echo $form->textFieldRow($model,'requested_date',array('class'=>'span5'));  ?>

<?php //echo $form->textFieldRow($model,'ip_user_requested',array('class'=>'span5','maxlength'=>50));  ?>

<?php //echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>0));  ?>

<?php //echo $form->textFieldRow($model,'approved_user',array('class'=>'span5','maxlength'=>45));  ?>

<?php //echo $form->textFieldRow($model,'approval_date',array('class'=>'span5')); ?>

<?php //echo $form->textFieldRow($model,'ip_user_approved',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Save' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
