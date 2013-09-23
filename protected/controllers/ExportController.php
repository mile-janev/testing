<?php

class ExportController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array(),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('excel'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionUsersExcel() {

        $test_id = $_GET['test_id'];
        $results = TestStudent::model()->findAllByAttributes(array(), 'test_id = :test_id', array(':test_id' => $test_id));

        $firstname = array(); $fn=0;
        foreach($results as $result)
        {
            $firstname[$fn] = $result->students->firstname;
            $fn++;
        }
        
        $lastname = array(); $ln=0;
        foreach($results as $result)
        {
            $lastname[$ln] = $result->students->lastname;
            $ln++;
        }
        
        $index = array(); $in=0;
        foreach($results as $result)
        {
            $index[$in] = $result->students->index;
            $in++;
        }
        
 // get a reference to the path of PHPExcel classes 
        $phpExcelPath = Yii::getPathOfAlias('ext.phpexcel.Classes');

        // Turn off our amazing library autoload 
        spl_autoload_unregister(array('YiiBase', 'autoload'));

        //
        // making use of our reference, include the main class
        // when we do this, phpExcel has its own autoload registration
        // procedure (PHPExcel_Autoloader::Register();)
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Mile Janev")
                ->setLastModifiedBy("Mile Janev")
                ->setTitle("Rezultati - Testing")
                ->setSubject("Rezultati - Testing")
                ->setDescription("Rezultati - Testing")
                ->setKeywords("")
                ->setCategory("");
        

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Име')
                ->setCellValue('B1', 'Презиме')
                ->setCellValue('C1', 'Индекс')
                ->setCellValue('D1', 'Поени')
                ->setCellValue('E1', 'Оцена');
//        var_dump(count($results));exit();
        for ($i = 2; $i < count($results)+2; $i++) {
//            $i = (string) $i;
//                $ime = $results[$i-2]->students->firstname;
//                var_dump($ime); exit();
            // Miscellaneous glyphs, UTF-8
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $firstname[$i-2])
                ->setCellValue('B' . $i, $lastname[$i-2])
                ->setCellValue('C' . $i, $index[$i-2])
                ->setCellValue('D' . $i, $results[$i-2]->points)
                ->setCellValue('E' . $i, $results[$i-2]->grade);
        }
        
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        
        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="rezultati_testing.xlsx"');
        header('Cache-Control: max-age=0');

        // Save Excel 2007 file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        //$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
        //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
        $objWriter->save('php://output');

        //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        //$objWriter->save(str_replace('.php', '.xls', __FILE__));


        

        // 
        // Once we have finished using the library, give back the 
        // power to Yii... 
        spl_autoload_register(array('YiiBase', 'autoload'));
        
        Yii::app()->end();
    }

}
