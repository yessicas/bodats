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

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary(array($model, $modelPurchaseRequestDetail)); ?>


<?php
if ($model->isNewRecord) {
    
} else {
    echo $form->textFieldRow($model, 'PRNumber', array('class' => 'span4', 'maxlength' => 32, 'readonly' => 'readonly'));
}
?>

<?php
echo $form->hiddenField($model, 'dedicated_to', array('class' => 'span4', 'maxlength' => 32, 'value' => $model->dedicated_to, 'readonly' => 'readonly'));
?>

<?php
$pr_category = PoCategory::model()->findByAttributes(array('id_po_category' => $model->id_po_category));
echo FormCommonDisplayer::displayRowInputReadonlyAndHidden($form, $model, "id_po_category", "PR Category", $pr_category->category_name, "span6")
?>

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

<?php
if ($mode == "survey_class") {
    echo $form->dropDownListRow($model, 'id_vessel', VesselDB::getAllVesselListDropdown(), array('prompt' => Yii::t('strings', '-- Select --'), 'class' => 'span5'));
} else {
    if ($mode == "consumable_stock") {
        echo $form->dropDownListRow($model, 'id_vessel', VesselDB::getAllVesselListDropdown(), array('prompt' => Yii::t('strings', '-- Select --'), 'class' => 'span5'));
    } elseif ($mode == "ehs") {
        echo $form->dropDownListRow($model, 'id_vessel', VesselDB::getAllVesselListDropdown(), array('prompt' => Yii::t('strings', '-- Select --'), 'class' => 'span5'));
    } else {
        echo $form->dropDownListRow($model, 'id_vessel', VesselDB::getAllVesselListDropdown(), array('prompt' => Yii::t('strings', '-- Select --'), 'class' => 'span5'));
    }
}
?>

<?php
if ($model->is_mutliple_item != 1) {
    $labelSave = "Save";
    ?>

    <div class="control-group ">
        <label class="control-label required" for="Quotation_TotalQuantity"><?php echo $model::model()->getAttributeLabel('amount'); ?> <span class="required">*</span></label> <!-- label -->
        <div class="controls">
            <?php echo $form->textField($model, 'amount', array('class' => 'span3', 'maxlength' => 12)); ?>

            <?php
            echo FormCommonDisplayer::displayInputReadonlyAndHidden($form, $model, "metric", "", $model->metric, "span2");
            ?>

            <?php echo $form->error($model, 'amount'); ?> <!-- error message -->
        </div>
    </div>

    <?php
} else {
    $labelSave = "Save And Continue";
}
?>

<?php echo $form->textAreaRow($model, 'notes', array('rows' => 3, 'cols' => 50, 'class' => 'span6')); ?>

<?php echo $form->fileFieldRow($modelPurchaseRequestDetail, 'attachment', array('rows' => 3, 'cols' => 50, 'class' => 'span6')); ?>

<?php echo $form->textFieldRow($model, 'requested_user', array('class' => 'span5', 'maxlength' => 45, 'value' => Yii::app()->user->id, 'readonly' => 'readonly')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? $labelSave : $labelSave,
    ));
    ?>
</div>

<?php $this->endWidget(); ?>




<!-- harus validasi manual -->
<!--<script>
$(document).ready(function() {
        $("button:submit").click(function(){
    var fileName = $("input:file").val();
        var limitsize= 1024 * 1024 * 10; // 1 mb
        var limitsizeinmb= limitsize / (1024 * 1024);
        
if(fileName !=''){
                if (!fileName.match(/(?:pdf)$/)) {
                // inputted file path is not an image of one of the above types
                        alert("File Type Must .pdf");
                        
                        return false;
                }
                
                if ($("input:file")[0].files[0].size > limitsize) {
                        alert("File too large, Max Size "+limitsizeinmb+" MB");
                        return false;
                }
        
        }else {
                return true;
        }
                                
        });

});

</script> -->