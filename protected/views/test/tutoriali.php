<div class="prasanja_test">
    Наслов на тестот: <?php echo $test->title; ?>
</div>

<div class="tutoriali_student">
    <?php
        foreach ($tutoriali as $tutorial)
        {
            echo "<b>Наслов на туториалот:</b> ".$tutorial->title."<br />";
            echo "<b>Објаснување за туториалот:</b> ".$tutorial->explination."<br />";
            echo "<b>Симни:</b> <a href='".$tutorial->location."' target='_blank'>Кликни за симнување</a>";
            echo "<br /><br /><hr />";
        }
    ?>
</div>