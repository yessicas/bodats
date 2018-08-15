<?php
$this->breadcrumbs = array(
    'EHS Items' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage EHS', 'url' => array('admin'), 'active' => true),
    array('label' => 'Create EHS', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('ehs-item-grid', {
data: $(this).serialize()
});
return false;
});
");
?>



<div id="content">
    <h2>Manage EHS</h2>
    <hr>

</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'ehs-item-grid',
    'dataProvider' => $model->search(),
//'dataProvider'=>$model->searchByPo(),
    'type' => 'striped bordered condensed',
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No', 'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
        //'id_ehs_item',
        //'id_po_category',
        /*
          array(
          'header'=>PoCategory::model()->getAttributeLabel('category_name'), //column header
          'value'=>'$data->getRelated("po")->category_name', //column name, php expression
          'type'=>'raw',
          //'filter'=>CHtml::listData(PoCategory::model()->findAll(),'id_po_category', 'category_name'),
          ),
         */
        'ehs_item',
        //'ehs_category',
        //'category',
        //'parent_level1',
        //'parent_level2',
        //'parent_level3',
        'serial_number',
        'description',
        array(
            'name' => 'estimated_unit_price',
            'value' => 'NumberAndCurrency::formatCurrency($data->estimated_unit_price)',
            'visible' => UsersAccess::checkUserAccess("ADM", "PRO", "TEC"),
        ),
        //'estimated_unit_price',
        'metric',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array(
                'update' =>
                array(
                    'url' => 'Yii::app()->createUrl("ehsitem/update",array("id"=>$data->id_ehs_item))',
                    'options' => array(
                        'class' => '',
                        'rel' => '',
                    ),
                ),
                'view' =>
                array(
                    'url' => 'Yii::app()->createUrl("ehsitem/view",array("id"=>$data->id_ehs_item))',
                    'options' => array(
                        'class' => '',
                        'rel' => '',
                    ),
                ),
                'delete' =>
                array(
                    'url' => 'Yii::app()->createUrl("ehsitem/delete",array("id"=>$data->id_ehs_item))',
                ),
            ),
        ),
    ),
));
?> 

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => '.popup_foto',
    'config' => array(
        'maxWidth' => 800,
        'maxHeight' => 600,
        'fitToView' => false,
        'width' => 400,
        'height' => 'auto',
        'autoSize' => false,
        'closeClick' => false,
        'closeBtn' => true,
        //'title'=>'dfsf',
        'helpers' => array(
            'title' => array('type' => 'inside'), // inside or outside
            'overlay' => array('closeClick' => false),
        ),
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
    ),
));
?>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => '.various',
    'config' => array(
        'maxWidth' => 800,
        'maxHeight' => 600,
        'fitToView' => false,
        'width' => 400,
        'height' => 'auto',
        'autoSize' => false,
        'closeClick' => false,
        'closeBtn' => true,
        //'title'=>'dfsf',
        'helpers' => array(
            'title' => false, // inside or outside
            'overlay' => array('closeClick' => false),
        ),
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
    ),
));
?>


