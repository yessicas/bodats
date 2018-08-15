<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/iconcareerln.png" type="image/x-icon" /> 
	
	<!-- Base HREF -->
	<base href="http://<?php echo $_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl;?>/index.php">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css/animate.min.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->bootstrap->getAssetsUrl();?>/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->bootstrap->getAssetsUrl();?>/css/bootstrap-yii.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->bootstrap->getAssetsUrl();?>/css/jquery-ui-bootstrap.css"/>



<!-- di matiin yang menu ngikutin saat scroll (fix scroll)
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/css/fix_scroll/animated-scrol.js' ></script>
    <script type="text/javascript">
        $(function() {
            var offset = $("#sidebar").offset();
            var topPadding = 50;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $("#sidebar").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $("#sidebar").stop().animate({
                        marginTop: 18
                    });
                };
            });
        });
    </script>
-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div  id="page">
	<!-- header -->
	<div id="header">
		<div id="logo">
            <b><?php //echo CHtml::encode(Yii::app()->name); ?></b>
            <img src ="<?php echo Yii::app()->request->baseUrl; ?>/css/logo.png" align = "left" width =250>

            <br>
            <br>
            <?php $currentLang = Yii::app()->language;?>
            <?php echo CHtml::form(); ?>
            <div id="langdrop" align="right" style="font-size:14px;"><?php echo Yii::t('strings','Language'); ?> 
            <?php echo CHtml::dropDownList('_lang', $currentLang, array(
                'en' => 'English', 'id' => 'Indonesia'), array('submit' => '' , 'style'=>'width:120px;')); ?>
            </div>
            <?php echo CHtml::endForm(); ?>
         </div>
	</div>
	<!-- header -->

		<!-- notifications-->
		<?php
           if(!Yii::app()->user->isGuest){ 
                // notification biasa
                $crit = new CDbCriteria();
                //$crit->condition = "(notif_status = 'NEW' OR notif_status = 'UNREAD') AND userid='".Yii::app()->user->id."'";
                $crit->condition = "notif_status = 'NEW' AND userid='".Yii::app()->user->id."'";
                $crit->limit=5;
                $crit->order="notif_date desc";
                $pemberitahuan=Notification::model()->findAll($crit);
                $item_notification = array();

                $jumlah_pemberitahuan = count($pemberitahuan);  
                if( $jumlah_pemberitahuan > 0){
                    $label= '<sup class="note"><span class="badge badge-warning" style="margin-right:-20px;">'.$jumlah_pemberitahuan.'</span></sup>';
                    foreach($pemberitahuan as $list_notification)
                    {
                    $item_notification[]='---';
                    $item_notification[]= array('label' =>'<b>'.$list_notification->notif_tittle.'</b><br>'.$list_notification->notif_message.'<br>', 'url' => array('/notification/view','id'=>$list_notification->id_notification,'c'=>SecurityGenerator::SecurityDisplay($list_notification->code_id)) ,'linkOptions' => array('style'=>'font-size:9pt'),);
                    }
                    $item_notification[]='---';
                    $item_notification[]= array('label' =>'<center><b>'.'Lihat Semua  '.'</b></center>', 'url' => array('/notification/index') ,'linkOptions' => array('style'=>'font-size:10pt'),);
             
                }

                else {
                     $label= '&nbsp' ;
                }
                // end notifications biasa

                //message notifications

                $criteria = new CDbCriteria();
                $criteria->condition = "status = 'new' AND to_inbox='".Yii::app()->user->id."'";
                $criteria->limit=5;
                $criteria->order="date desc";
                $pemberitahuan_message=MessageInbox::model()->findAll($criteria);
                $item_notification_message = array();

                $jumlah_pemberitahuan_message = count($pemberitahuan_message);  
                if( $jumlah_pemberitahuan_message > 0){

                    $label_message= '<sup class="note"><span class="badge badge-warning" style="margin-right:-20px;">'.$jumlah_pemberitahuan_message.'</span></sup>';
                    foreach($pemberitahuan_message as $list_notification_message)
                    {
                    $item_notification_message[]='---';
                    $item_notification_message[]= array('label' =>'pesan baru dari <b>'.$list_notification_message->from_inbox.'</b>', 'url' => array('/messageinbox/view','id'=>$list_notification_message->id_inbox,'c'=>SecurityGenerator::SecurityDisplay($list_notification_message->code_id)) ,'linkOptions' => array('style'=>'font-size:9pt'),);
                    }
                    $item_notification_message[]='---';
                    $item_notification_message[]= array('label' =>'<center><b>'.'Lihat Semua  '.'</b></center>', 'url' => array('/messageinbox/admin') ,'linkOptions' => array('style'=>'font-size:10pt'),);
             
                }
                 else {
                     $label_message= '&nbsp';
                }
            }

            else{
				$label= '';
				$label_message= '';
				$item_notification = array();
				$item_notification_message = array();
            }

		?>
		<!-- End notifications-->

<!-- navbar menu  -->
<?php
	/*
	$this->widget(
    'bootstrap.widgets.TbNavbar',
    array(
        'type' => null, // null or 'inverse'
        'brand' => '',
        'brandUrl' => '#',
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => false,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                    array('label' => 'Home', 'url'=>Yii::app()->getHomeUrl(), 'icon'=>'home white'),
                ),
            ),




           array(
                'class' => 'bootstrap.widgets.TbMenu',
                'htmlOptions' => array('class' => 'pull-right'),
                'encodeLabel'=>false,
                'items' => array(


                    array(
                       
                        'label' => $label ,
                        'url' => '',
                        'icon'=>'bell white',
                        'visible'=>!Yii::app()->user->isGuest,
                        'linkOptions' => array('data-toggle' => 'tooltip','title'=>'Notifications'),
                        'items' => $item_notification,
                    ),

                    array(
                       
                        'label' => $label_message ,
                        'url' => '',
                        'icon'=>'envelope white',
                        'visible'=>!Yii::app()->user->isGuest,
                        'linkOptions' => array('data-toggle' => 'tooltip','title'=>'Messages'),
                        'items' => $item_notification_message,
                    ),
                   
                    array(
                       
                        'label' => Yii::app()->user->isGuest==!'isGuest'?Yii::app()->user->id:'Guest',
                       // 'label'=>'Admin',
                        'url' => '#',
                        'icon'=>'user white',
                        'visible'=>!Yii::app()->user->isGuest,
                        'items' => array(
                                       // array('label' => 'Profil', 'icon'=>'book', 'url'=>array('/datadiri/view') ),
                                        array('label' => 'Logout', 'icon'=>'off', 'url'=>array('/site/logout') ),

                                        )
                    ),
                    

        
                ),
            ),
        ),
    )
);

*/
?>
<!-- end navbar menu  -->
	
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<img src ="<?php echo Yii::app()->request->baseUrl; ?>/css/logo2.png" align = "center" width =100 heigth=40>
        <br/>
		Copyright  <?php echo date('Y'); ?> All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
