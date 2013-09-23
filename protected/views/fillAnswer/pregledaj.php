<div class="prasanja_test">
    Наслов на тестот: <?php echo $test_naslov->title; ?>
    <?php echo $this->renderPartial('../test/_menupregledaj', array('odgovori'=>$odgovori, 'fill_num'=>$fill_num, 'complete_num'=>$complete_num)); ?>
</div>

<div class="pregledaj_form">
    <h3>Прашања со дополнување</h3>
    <h4><b>Студент:</b> <?php echo $student->username," ".CHtml::button("Промени студент", array('submit'=>array('test/pregledajtest&test_id='.$_GET['test_id']), 'class'=>'odgovaraj_test')); ?></h4>
    <?php
        echo $this->renderPartial('_pregledajform', array('odgovori'=>$odgovori));
    ?>

    <?php
        if(($fill_num + $complete_num) == 0)
        {
            $teststudent = TestStudent::model()->findByAttributes(array('test_id'=>$_GET['test_id'], 'student_id'=>$_GET['student_id']));
            if($teststudent->checked == 0)
            {
                echo CHtml::button('Маркирај го тестот на овој студент како прегледан', array('submit' => array('/test/markirajpregledan&test_id='.$_GET['test_id'].'&student_id='.$_GET['student_id']), 'class'=>'pogledni_test'));
            }
            else
            {
                echo CHtml::button('Заврши со промените', array('submit' => array('/test/markirajpregledan&test_id='.$_GET['test_id'].'&student_id='.$_GET['student_id']), 'class'=>'pogledni_test'));
            }
        }
    ?>
    <?php echo CHtml::button('Продолжи кон прашања со целосен одговор', array('submit' => array('/completeAnswer/pregledaj&test_id='.$_GET['test_id'].'&student_id='.$_GET['student_id']), 'class'=>'odgovaraj_test')); ?>
</div>