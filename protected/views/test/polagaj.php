<?php if($zapocni == 0){ header("location: index.php?r=student/index&obid=1"); }?>
<?php
    $offset=2*60*60;//Dva casa napred
    $now = date_create(gmdate("Y-m-d H:i:s", time()+$offset));
    $end = date_create($test->end);
?>
<?php
//Ova gi broe prasanjata
    $broj_click = 0; foreach ($prasanja1 as $prasanje){$broj_click++;}
    $broj_fill = 0; foreach ($prasanja2 as $prasanje){$broj_fill++;}
    $broj_complete = 0; foreach ($prasanja3 as $prasanje){$broj_complete++;}
    $broj_vkupno = $broj_click + $broj_fill + $broj_complete;
?>
<div class="prasanja_test">
    Наслов на тестот: <?php echo $test->title." (".$broj_vkupno.")"; ?>
    <div id="linkovi">
        <?php echo CHtml::link('Избор ('.$broj_click.')', $this->createUrl('test/polagaj', array('test_id'=>$test_id, 'type'=>'click'))); ?>
        <?php echo CHtml::link('Надополнување ('.$broj_fill.')', $this->createUrl('test/polagaj', array('test_id'=>$test_id, 'type'=>'fill'))); ?>
        <?php echo CHtml::link('Целосни ('.$broj_complete.')', $this->createUrl('test/polagaj', array('test_id'=>$test_id, 'type'=>'complete'))); ?>
    </div>
</div>

<?php
    if(isset($_GET['type']))
    {
        $type = $_GET['type'];
        if($type==='click')
        {
        ?>
            <div class="prasanje_naslov">Прашања со избор на еден од повеќе понудени одговори</div>
        <?php
            $this->renderPartial('_polagajclick', array('prasanja1'=>$prasanja1));
            if($broj_click == 0 && $broj_vkupno == 0 && $now>$end)
            {
                echo "<br />".CHtml::button("Погледни резултат на прашањата со избор", array('submit' => array('clickAnswer/proveri','test_id'=>$test_id, 'student_id'=>Yii::app()->user->id), 'class'=>'pogledni_test'));
            }
            else if($broj_click == 0)
            {
                echo CHtml::button("Продолжи кон прашања со надополнување", array('submit' => array('test/polagaj','test_id'=>$test_id, 'type'=>'fill'), 'class'=>'odgovaraj_test'));
            }
        }
        else if($type==='fill')
        {
         ?>
            <div class="prasanje_naslov">Прашања со дополнување на збор или фраза</div>
        <?php
            $this->renderPartial('_polagajfill', array('prasanja2'=>$prasanja2));
            if($broj_fill == 0 && $broj_vkupno != 0)
            {
                echo CHtml::button("Продолжи кон прашања со целосен одговор", array('submit' => array('test/polagaj','test_id'=>$test_id, 'type'=>'complete'), 'class'=>'odgovaraj_test'));
            }
        }
        else
        {
         ?>
            <div class="prasanje_naslov">Прашања со давање на целосен одговор</div>
        <?php
            $this->renderPartial('_polagajcomplete', array('prasanja3'=>$prasanja3));
        }
    }
    
    echo "<br />";
    if($broj_vkupno == 0)
    {
        echo "<h4>Сите прашања се пополнети.</h4>";
        echo CHtml::button("Врати се дома", array('submit' => array('student/index'), 'class'=>'odgovaraj_test'));
    }
?>