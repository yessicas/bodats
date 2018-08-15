<?php
$this->breadcrumbs = array(
    'EHS Items' => array('index'),
    $model->id_ehs_item => array('view', 'id' => $model->id_ehs_item),
    'Update',
);

$this->menu = array(
    /*
      array('label'=>'Manage EHS Item','url'=>array('admin')),
      array('label'=>'Create EHS Item','url'=>array('create')),
      array('label'=>'View EHS Item','url'=>array('view','id'=>$model->id_ehs_item)),
      array('label'=>'Update EHS Item','url'=>array('update','id'=>$model->id_ehs_item),'active'=>true),
      array('label'=>'Delete EHS Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ehs_item),'confirm'=>'Are you sure you want to delete this item?')),
     */

    array('label' => 'Manage CS/Part/Asset', 'url' => array('admin')),
    array('label' => 'Create CS/Part/Asset', 'url' => array('update', 'id' => $model->id_ehs_item), 'active' => true),
);
?>

<h3> Update EHS Item <font color=#BD362F> <?php echo $model->ehs_item; ?></h3>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>