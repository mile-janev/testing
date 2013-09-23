<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="index-left">
    <h3>Последни тестови</h3>
    <?php
        foreach ($testovi as $test)
        {
            $start = date_format(date_create($test->start), "H:i:s d-m-Y");
            $end = date_format(date_create($test->end), "H:i:s d-m-Y");
            echo "<div class='test_eden'>";
            echo "<b>Наслов на тестот:</b> ".$test->title."<br />";
            echo "<b>Тестер:</b> ".$test->testers->firstname." ".$test->testers->lastname."<br />";
            echo "<b>Почеток:</b> ".$start."<br />";
            echo "<b>Крај:</b> ".$end."</div><br /><hr />";
        }
    ?>
</div>

<div class="index-center">
        <h3>Најава</h3>
        <div class="form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                    ),
            )); ?>

            <div class="row">
                    <?php echo $form->labelEx($model,'Корисничко име'); ?>
                    <?php echo $form->textField($model,'username'); ?>
                    <?php echo $form->error($model,'username'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'Лозинка'); ?>
                    <?php echo $form->passwordField($model,'password'); ?>
                    <?php echo $form->error($model,'password'); ?>
            </div>

            <div class="row rememberMe">
                <div class="gender">
                    <?php echo $form->radioButtonList($model, 'student', array('student'=>'Студент','tester'=>'Тестер'), array('separator'=>' ')); ?>
                    <?php echo $form->error($model,'student'); ?>
                </div>

            </div>

            <div class="row buttons">
                    <?php echo CHtml::submitButton('Најави се!!!', array('class'=>'vnes')); ?>
            </div>
        <?php $this->endWidget();?>
    </div><!-- form -->
</div>

<div class="index-right">
    <h3>Последни регистрирани студенти</h3>
    <?php
    
        foreach ($studenti as $student)
        {
            echo "<img src='images/list_student.png'><div id='student-index'>".$student->firstname." ".$student->lastname."</div><br /><br />";
        }
    ?>
</div>