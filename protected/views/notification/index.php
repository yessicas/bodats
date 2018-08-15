<style>
.highlight
{
background: #EAEFFF;
border: 1px solid #e3e3e3;
border-radius:5px;
padding: 10px 0px 0px 10px;
padding-bottom: 10px;
margin-bottom:5px;
}
.white
{
background: #FFFFFF;
border: 1px solid #e3e3e3;
border-radius:5px;
padding: 10px 0px 0px 10px;
padding-bottom: 10px;
margin-bottom:5px;
}
.notifdate
{
font-size: 80%;
margin-bottom:0px;
margin-right:5px;
}

div .white table :hover{
background: #EAEFFF;
border-radius:5px;
}

div .highlight table :hover{
background: #EAEFFF;
border-radius:5px;
}
table td, table th {
padding: 0px 0px;
text-align: left;
}
</style>

<?php
$this->breadcrumbs=array(
	'Notifications',
);

//Hanya bisa baca saja.
/*
$this->menu=array(
array('label'=>'Create Notification','url'=>array('create')),
array('label'=>'Manage Notification','url'=>array('admin')),
);
*/
?>

<center>
<h3 class= "header"><img src="repository/icon/notifbig.png"> <?php echo Yii::t('strings','Notifications') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>


<script>
        function allFine(data) {
          $("#results").html(data);
          $.fn.yiiListView.update('notificationslist', {   
			        data: $(this).serialize()
			    });
        }
</script>
<script>
$(document).ready(function(){

    $('.notifdelete').hide()

    $('div .white table').hover(
    function(){  //this is fired when the mouse hovers over
        $(this).find('.notifdelete').show();
    },
    function(){  //this is fired when the mouse hovers out
         $(this).find('.notifdelete').hide();
    });

    $('div .highlight table').hover(
    function(){  //this is fired when the mouse hovers over
        $(this).find('.notifdelete').show();
    },
    function(){  //this is fired when the mouse hovers out
         $(this).find('.notifdelete').hide();
    });

});
</script>


<div id="results"> </div>
<div class="view">
<?php $this->widget('bootstrap.widgets.TbListView',array(
'id'=>'notificationslist',
'dataProvider'=>$dataProvider,
'afterAjaxUpdate' => 'reloaddata', 
/*
'sortableAttributes'=>array(
		'attribute1',
		'attribute2',
        ),
*/
'itemView'=>'_view',
)); ?>

</div>

<script>
function reloaddata(id, data) {
     $('.notifdelete').hide()

    $('div .white table').hover(
    function(){  //this is fired when the mouse hovers over
        $(this).find('.notifdelete').show();
    },
    function(){  //this is fired when the mouse hovers out
         $(this).find('.notifdelete').hide();
    });

    $('div .highlight table').hover(
    function(){  //this is fired when the mouse hovers over
        $(this).find('.notifdelete').show();
    },
    function(){  //this is fired when the mouse hovers out
         $(this).find('.notifdelete').hide();
    });

}
</script>