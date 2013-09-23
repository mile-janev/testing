<?php
    $offset=2*60*60;//Dva casa napred
    $now = date_create(gmdate("Y-m-d H:i:s", time()+$offset));
    $start = date_create($test->start);
    $end = date_create($test->end);

    if($start>$now)
    {   
        $menuva = 1;//Moze da se menuva
        $status = "Незапочнат";
    }
    else if($now>$start && $now<$end)//Ako segasnoto vreme e vo intrevalot megju start i end na testot
    {
        $menuva = 0;
        $status = "Тестирањето е во тек";
    }
    else
    {
        $menuva = 0;
        $status = "Завршен";
    }
?>

<div class="prasanja_test">
    Наслов на тестот: <?php echo $test->title; ?>
    <div id="linkovi">
        <?php echo CHtml::link('Избор', $this->createUrl('/clickQuestion/index', array('test_id'=>$_GET['test_id'], 'type'=>'click'))); ?>
        <?php echo CHtml::link('Дополнување', $this->createUrl('/fillQuestion/index', array('test_id'=>$_GET['test_id'], 'type'=>'fill'))); ?>
        <?php echo CHtml::link('Целоснo', $this->createUrl('/completeQuestion/index', array('test_id'=>$_GET['test_id'], 'type'=>'complete'))); ?>
        <?php echo CHtml::link('Туториали', $this->createUrl('test/forum', array('test_id'=>$_GET['test_id']))); ?>
    </div>
</div>

<div class="prasanje_left">
    <?php
        foreach ($tutoriali as $tutorial)
        {
            echo "<b>Наслов на туториалот:</b> ".$tutorial->title."<br />";
            echo "<b>Објаснување за туториалот:</b> ".$tutorial->explination."<br />";
            echo "<b>Симни:</b> <a href='".$tutorial->location."' target='_blank'>Кликни за симнување</a>";
            echo "<br /><br /><hr />";
        }
    ?>
    
    <?php if($now<$start){ ?>
        <form name='tutorial' enctype='multipart/form-data' action='<?php echo Yii::app()->createUrl('tutorial/prikaci&test_id='.$_GET['test_id']);?>' method='POST'>
            <b>Наслов на туториалот:</b><br />
            <input type='text' name='naslov' size='80' maxlength='100'><br />
            <b>Опис на туториалот:</b><br />
            <textarea name='opis' rows='5' cols='70' maxlength='300'></textarea><br/>
            <b>Одбери документ:</b><br />
            <input type='file' name='document' size='20' /><br />
            <input class='odgovaraj_test' type='submit' value='Прикачи' name='sub'/>
        </form>
    <?php } ?>
</div>

<div class="prasanje_right">
    <h3>Податоци за тестот</h3>

    <div class='test_eden1'>
        <b>Тестер:</b> <?php echo $test->testers->firstname." ".$test->testers->lastname;?><br />
        <b>Институција:</b> <?php echo $test->testers->institution; ?><br />
        <b>Статус:</b> <?php echo $status; ?><br />
        <b>Почеток:</b> <?php echo date('H:i:s d-m-Y', strtotime($test->start)); ?><br />
        <b>Крај:</b> <?php echo date('H:i:s d-m-Y', strtotime($test->end)); ?><br />
        <b>Просечна оцена:</b> <?php echo $test->average_grade; ?>
    </div><br />
    <hr />

    <?php
        if($now<$start)
        {
            echo CHtml::link('Измени ги податоците за тестот', $this->createUrl('test/update', array('test_id'=>$test->id)))."</br>";
        }
        else
        {
            echo "Тестот може да го менувате додека не е започнат.";
        }
    ?>
</div>