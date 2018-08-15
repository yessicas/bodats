<?php 

echo '<tr class="even">';
echo '<td>';
echo $widget->dataProvider->getPagination()->getCurrentPage()*$widget->dataProvider->getPagination()->pageSize + $index+1;
echo '</td>';




echo '<td>';
$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'type_set_power',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));


echo',';

$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'type_set_feet',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo' ft ';
echo '</td>';




echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'select',
    'model'        => $data,
    'attribute'	   => 'JettyIdStart',
    'source'       => Editable::source(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';

echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'select',
    'model'        => $data,
    'attribute'	   => 'JettyIdEnd',
    'source'       => Editable::source(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';

echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'jarak',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';

echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'speed_standard',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';

echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'target_sailing_time',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';

echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'lay_time',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';

echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'sailing_time',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';

echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'cycle_time',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';

echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'total_bbm',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';

echo '<td>';

echo '</td>';



echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'agency_rate',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';
//agency_rate_id_currency

echo '<td>';

$this->widget('editable.EditableField', array(
    'type'         => 'text',
    'model'        => $data,
    'attribute'    => 'type',
    'url'          => $this->createUrl('standardfuel/editable'),
    'placement'    => 'top',
    'emptytext' => '-',
    'liveTarget'   => $widget->id, //for live update
    ));

echo '</td>';


echo'<td class="button-column">';
echo '<a class="deleteajax" title="delete" rel="tooltip" onClick = "javascript:deletestrfuel('.$data->id_standard_fuel.')" ><i class="icon-trash"></i></a>';
echo'</td>';

echo '</tr>';


 


/*
<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_standard_fuel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_standard_fuel),array('view','id'=>$data->id_standard_fuel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_set_power')); ?>:</b>
	<?php echo CHtml::encode($data->type_set_power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_set_feet')); ?>:</b>
	<?php echo CHtml::encode($data->type_set_feet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JettyIdStart')); ?>:</b>
	<?php echo CHtml::encode($data->JettyIdStart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JettyIdEnd')); ?>:</b>
	<?php echo CHtml::encode($data->JettyIdEnd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jarak')); ?>:</b>
	<?php echo CHtml::encode($data->jarak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('speed_standard')); ?>:</b>
	<?php echo CHtml::encode($data->speed_standard); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('target_sailing_time')); ?>:</b>
	<?php echo CHtml::encode($data->target_sailing_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lay_time')); ?>:</b>
	<?php echo CHtml::encode($data->lay_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sailing_time')); ?>:</b>
	<?php echo CHtml::encode($data->sailing_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cycle_time')); ?>:</b>
	<?php echo CHtml::encode($data->cycle_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_bbm')); ?>:</b>
	<?php echo CHtml::encode($data->total_bbm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_rate')); ?>:</b>
	<?php echo CHtml::encode($data->agency_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_rate_id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->agency_rate_id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	 ?>

</div>

*/ ?>