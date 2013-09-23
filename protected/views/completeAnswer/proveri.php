<div class="prasanja_test">
    Наслов на тестот: <?php echo $test->title; ?>
    <?php echo $this->renderPartial('../test/_menuproveri', array('odgovori'=>$odgovori)); ?>
</div>

<div class="prasanje_naslov">Прашања со давање на целосен одговор</div>

<?php
    echo $this->renderPartial('_proveriform', array('odgovori'=>$odgovori));
?>