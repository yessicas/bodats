<div class="view">

<table width="100%" id="user<?php echo $data->to_userid ?>" style="margin-bottom:0px;border-radius:5px;">
	<tr>
		<!-- foto user berdasarkan type-->
		<td width = "50" style="vertical-align:top;">
		<?php 

		echo $this->renderPartial('list_data_user', array('userid'=>$data->to_userid,'type'=>$data->user->type));

		?>
		</td>

	
		
<!--
	<td>
		<?php 
	
		echo CHtml::ajaxButton("Accept", array('friend/accept','userid'=>$data->to_userid), array('success'=>'allFine'),array('class'=>'btn btn-info btn-small', 'id'=>'useraccept'.$data->to_userid));
		echo" ";
		echo CHtml::ajaxButton("Reject", array('friend/reject','userid'=>$data->to_userid), array('success'=>'allFine'),array('class'=>'btn btn-danger btn-small', 'id'=>'userreject'.$data->to_userid));
		 ?>
	</td>
-->
</tr>
</table>
<!--
		<b><?php echo CHtml::encode($data->getAttributeLabel('id_friendship')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_friendship),array('view','id'=>$data->id_friendship)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_userid')); ?>:</b>
	<?php echo CHtml::encode($data->from_userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_userid')); ?>:</b>
	<?php echo CHtml::encode($data->to_userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_date')); ?>:</b>
	<?php echo CHtml::encode($data->req_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active_date')); ?>:</b>
	<?php echo CHtml::encode($data->active_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

-->
</div>

<script>
$(function () {

    var overPopup = false;

    $('[rel=popover]').popover({
        trigger: 'manual',
        placement: 'right'

    // replacing hover with mouseover and mouseout
    }).mouseover(function (e) {
        // when hovering over an element which has a popover, hide
        // them all except the current one being hovered upon
        $('[rel=popover]').not('#' + $(this).attr('id')).popover('hide');
        var $popover = $(this);
        $popover.popover('show');

        // set a flag when you move from button to popover
        // dirty but only way I could think of to prevent
        // closing the popover when you are navigate across
        // the white space between the two
        $popover.data('popover').tip().mouseenter(function () {
            overPopup = true;
        }).mouseleave(function () {
            overPopup = false;
            $popover.popover('hide');
        });

    }).mouseout(function (e) {
        // on mouse out of button, close the related popover
        // in 200 milliseconds if you're not hovering over the popover
        var $popover = $(this);
        setTimeout(function () {
            if (!overPopup) {
                $popover.popover('hide');
            }
        }, 200);
    });
});
</script>