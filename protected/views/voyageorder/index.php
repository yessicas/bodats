<?php
$this->breadcrumbs = array(
    'Voyage Orders',
);

$this->menu = array(
    array('label' => 'Create VoyageOrder', 'url' => array('create')),
    array('label' => 'Manage VoyageOrder', 'url' => array('admin')),
);
?>
<div id="content">
    <h2>Voyage Orders</h2>
    <hr>
</div>


<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
