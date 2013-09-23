<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
        <link rel="shortcut icon" href="images/icon.png" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.2.js" type="text/javascript"></script>

	<title>Електронско тестирање</title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><img src="images/logo.png" /></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
                    if(isset($_SESSION['student']) && Yii::app()->user->name != 'Guest')//Ako korisnikot e najaven a ne e Guest
                    {
                        if($_SESSION['student'])//Ako e student ova meni
                        {
                            $this->widget('zii.widgets.CMenu',array(
                                'items'=>array(
                                        array('label'=>'Дома', 'url'=>array('/student/index')),
                                        array('label'=>'Сите тестови', 'url'=>array('/test/index')),
                                        array('label'=>'Завршени тестови', 'url'=>array('/student/zavrseni')),
                                        array('label'=>'Одјави се ('. Yii::app()->user->name.')', 'url'=>array('/site/logout'))
                                ),
                            ));
                        }
                        else if( Yii::app()->session['isadmin'] == true)
                        {
                            $this->widget('zii.widgets.CMenu',array(
                                'items'=>array(
                                        array('label'=>'Дома', 'url'=>array('/tester/index')),
                                        array('label'=>'Креирај ЕКТС тест', 'url'=>array('test/create&format=ekts')),
                                        array('label'=>'Креирај обичен тест', 'url'=>array('test/create&format=ordinary')),
                                        array('label'=>'Архива', 'url'=>array('/test/archive')),
                                        array('label'=>'Администрација', 'url'=>array('/test/administration')),
                                        array('label'=>'Одјави се ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'))
                                ),
                            ));
                        }
                        else //Ako e tester
                        {
                            $this->widget('zii.widgets.CMenu',array(
                                'items'=>array(
                                        array('label'=>'Дома', 'url'=>array('/tester/index')),
                                        array('label'=>'Креирај ЕКТС тест', 'url'=>array('test/create&format=ekts')),
                                        array('label'=>'Креирај обичен тест', 'url'=>array('test/create&format=ordinary')),
                                        array('label'=>'Архива', 'url'=>array('/test/archive')),
                                        array('label'=>'Одјави се ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'))
                                ),
                            ));
                        }
                    }
                    else //Ako ne e postavena sesiskata znaci ne e nikoj najaven
                    {
                        $this->widget('zii.widgets.CMenu',array(
                            'items'=>array(
                                    array('label'=>'Дома', 'url'=>array('/site/index')),
                                    array('label'=>'Нов студент', 'url'=>array('/student/create')),
                                    array('label'=>'Нов тестер', 'url'=>array('/tester/create')),
                            ),
                        ));
                    }
                    
                    ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
            <div id="copyrightM">Copyright &copy; <?php echo date('Y'); ?> Миле Јанев 10419</div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
