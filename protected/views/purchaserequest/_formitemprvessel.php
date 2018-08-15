<style>
    .typeahead_wrapper { display: block; height: 60px; }
    .typeahead_photo { float: left; max-width: 230px; max-height: 30px; margin-right: 5px; border-radius: 6px;}
    .typeahead_labels { float: left; height: 30px;}
    .typeahead_primary { font-weight: bold; }
    .typeahead_secondary { font-size: .8em; margin-top: -5px; }
    .labeltype { } /*tak terpakai sebenarnya */
    .labeltypehead { font-weight :bold ; font-size: 12px;}
    .cjui_secondary { font-size: .8em;  } /*tak terpakai sebenarnya */
    .SecondData {  background-color: #E1F0ED ; }  /*tinggal uncommet ini agar bisa strip*/
    .SecondData { font-size: 12px;  }
    .firstData { font-size: 12px;  }
    .ui-autocomplete-loading { 
        background: white url('images/ajax-loader.gif') right center no-repeat; 
    }

</style>


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'purchase-request-detail-form',
    'enableAjaxValidation' => true,
    'type' => 'horizontal',
    'clientOptions' => array('validateOnSubmit' => true),
    'enableClientValidation' => true,
        ));
?>

<div class="alert alert-block alert-info">Please fill item.</div>

<?php echo $form->errorSummary($model); ?>

<?php //echo $form->textFieldRow($model,'purchase_item_table',array('class'=>'span4','maxlength'=>200));  ?>

<?php
if ($mode == "consumable_stock") {
    $csModel = "ConsumableStockItem";
    echo $form->hiddenField($model, 'purchase_item_table', array('class' => 'span4', 'maxlength' => 32, 'value' => $csModel, 'readonly' => 'readonly'));
    ?>
    <?php
    if (!$model->isNewRecord) {
        $value = isset($_POST['PurchaseRequestDetail']['consumable_stock_item']) ? $_POST['PurchaseRequestDetail']['consumable_stock_item'] : $model->consumablestockitem->consumable_stock_item;
    } else {
        $value = isset($_POST['PurchaseRequestDetail']['consumable_stock_item']) ? $_POST['PurchaseRequestDetail']['consumable_stock_item'] : '';
    }
    ?>
    <div class="control-group ">
        <label class="control-label required" for="consumable_stock_item"><?php echo $model::model()->getAttributeLabel('Item'); ?> <span class="required">*</span></label> <!-- label manual -->

        <div class="controls">
            <?php
            $this->widget('ext.costumautocomplete.myAutoComplete', array(
                'model' => $model,
                'attribute' => 'consumable_stock_item',
                'source' => 'js: function(request, response) {
            $.ajax({
                url: "' . $this->createUrl('purchaserequest/autoconsumablestock') . '",
                dataType: "json",
                data: {
                    term: request.term,
                    brand: $("#type").val()
                },
                success: function (data) {
                    response(data);
                }
            })
            }',
                'options' => array(
                    'showAnim' => 'fold',
                    'minLength' => '1',
                    'select' => 'js:function( event, ui ) {  
							$("#PurchaseRequestDetail_consumable_stock_item").val(ui.item.value);    
                            $("#PurchaseRequestDetail_id_item").val(ui.item.id);    
                          }'
                ),
                'htmlOptions' => array(
                    //'class' => "span6",
                    'style' => 'width:300px;',
                    'value' => $value,
                //'style'=>'height: 20px;'
                ),
                'methodChain' => '.data( "autocomplete" )._renderItem = function( ul, item ) {
            	
            	if( item.no  % 2 === 0 ) {
            		var iddata="firstData";
            	}else{
            		var iddata="SecondData";
            	}

                return $( "<div class=\'drop_class\'></div>" )
                    .data( "item.autocomplete", item )
					.append("<a class=\'" + iddata +"\'> <font class=\'labeltypehead\'>" + item.nama + " ( "+ item.parent_level1 + " - " +  item.parent_level2 + " ) </font><br> <font class=\'labeltype\'> Serial Number : </font> " + item.serial_number + "<br> <font class=\'labeltype\'> Impa : </font>"+ item.impa + "<br>"
							+ "</a>")
					.append("<div style=\'clear:both;\'></div>")
                    .appendTo( ul );
            };'
            ));
            ?>
            <?php echo $form->error($model, 'consumable_stock_item'); ?> 
        </div>
    </div>

    <?php echo $form->hiddenField($model, 'id_item', array('class' => 'span3', 'maxlength' => 20)); ?> 
<?php } ?>


<?php
if ($mode == "ehs") {
    $csModel = "EhsItem";
    echo $form->hiddenField($model, 'purchase_item_table', array('class' => 'span4', 'maxlength' => 32, 'value' => $csModel, 'readonly' => 'readonly'));
    ?>
    <?php
    if (!$model->isNewRecord) {
        $value = isset($_POST['PurchaseRequestDetail']['ehs_item']) ? $_POST['PurchaseRequestDetail']['ehs_item'] : $model->consumablestockitem->consumable_stock_item;
    } else {
        $value = isset($_POST['PurchaseRequestDetail']['ehs_item']) ? $_POST['PurchaseRequestDetail']['ehs_item'] : '';
    }
    ?>
    <div class="control-group ">
        <label class="control-label required" for="ehs_item"><?php echo $model::model()->getAttributeLabel('Item'); ?> <span class="required">*</span></label> <!-- label manual -->

        <div class="controls">
            <?php
            $this->widget('ext.costumautocomplete.myAutoComplete', array(
                'model' => $model,
                'attribute' => 'ehs_item',
                'source' => 'js: function(request, response) {
            $.ajax({
                url: "' . $this->createUrl('purchaserequest/autoehs') . '",
                dataType: "json",
                data: {
                    term: request.term,
                    brand: $("#type").val()
                },
                success: function (data) {
                    response(data);
                }
            })
            }',
                'options' => array(
                    'showAnim' => 'fold',
                    'minLength' => '1',
                    'select' => 'js:function( event, ui ) {  
							$("#PurchaseRequestDetail_ehs_item").val(ui.item.value);    
                            $("#PurchaseRequestDetail_id_item").val(ui.item.id);    
                          }'
                ),
                'htmlOptions' => array(
                    //'class' => "span6",
                    'style' => 'width:300px;',
                    'value' => $value,
                //'style'=>'height: 20px;'
                ),
                'methodChain' => '.data( "autocomplete" )._renderItem = function( ul, item ) {
            	
            	if( item.no  % 2 === 0 ) {
            		var iddata="firstData";
            	}else{
            		var iddata="SecondData";
            	}

                return $( "<div class=\'drop_class\'></div>" )
                    .data( "item.autocomplete", item )
					.append("<a class=\'" + iddata +"\'> <font class=\'labeltypehead\'>" + item.nama + " ( "+ item.parent_level1 + " - " +  item.parent_level2 + " ) </font><br> <font class=\'labeltype\'> Serial Number : </font> " + item.serial_number + "<br> <font class=\'labeltype\'> Impa : </font>"+ item.impa + "<br>"
							+ "</a>")
					.append("<div style=\'clear:both;\'></div>")
                    .appendTo( ul );
            };'
            ));
            ?>
            <?php echo $form->error($model, 'ehs_item'); ?> 
        </div>
    </div>

    <?php echo $form->hiddenField($model, 'id_item', array('class' => 'span3', 'maxlength' => 20)); ?> 
<?php } ?>

<?php
if ($mode == "survey_class") {
    $csModel = "SurveyItem";
    echo $form->hiddenField($model, 'purchase_item_table', array('class' => 'span4', 'maxlength' => 32, 'value' => $csModel, 'readonly' => 'readonly'));

//echo $form->dropDownListRow($model,'id_item',CHtml::listData($csModel::model()->findAll(array('order'=>'consumable_stock_item ASC')), 'id_consumable_stock_item', 'consumable_stock_item'),
//	array('prompt'=>Yii::t('strings','-- Select Consumable Stock Item --'),'class'=>'span4'));

    echo $form->dropDownListRow($model, 'id_item', CHtml::listData($csModel::model()->findAll(), 'id_survey_item', 'survey_item_name'), array('prompt' => Yii::t('strings', '-- Select Survey Class Item --'), 'class' => 'span4'));
}

if ($mode == "service") {
    $csModel = "ServiceItem";
    echo $form->hiddenField($model, 'purchase_item_table', array('class' => 'span4', 'maxlength' => 32, 'value' => $csModel, 'readonly' => 'readonly'));

    echo $form->dropDownListRow($model, 'id_item', CHtml::listData($csModel::model()->findAll(), 'id_service_item', 'service_item'), array('prompt' => Yii::t('strings', '-- Select Service Item --'), 'class' => 'span4'));
}
?>


<?php //echo $form->textFieldRow($model,'id_item',array('class'=>'span4','maxlength'=>20)); ?>

<?php //echo $form->textFieldRow($model,'quantity',array('class'=>'span4','maxlength'=>8));  ?>

<?php //echo $form->textFieldRow($model,'id_metric_pr',array('class'=>'span4'));  ?>

<?php
$firstcol = $form->labelEx($model, 'quantity');
$secondcol = $form->textField($model, 'quantity', array('class' => 'span3', 'maxlength' => 8));
$secondcol .= " " . $form->dropDownList($model, 'metric', CHtml::listData(MstMetricPr::model()->findAll(array('order' => 'metric_name ASC')), 'metric', 'metric_name'), array('class' => 'span1'));
$secondcol .= $form->error($model, 'quantity');
$secondcol .= $form->error($model, 'metric');
echo FormCommonDisplayer::displayRowInput($firstcol, $secondcol);
?>

<?php echo $form->textAreaRow($model, 'notes', array('rows' => 3, 'cols' => 50, 'class' => 'span4')); ?>

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
