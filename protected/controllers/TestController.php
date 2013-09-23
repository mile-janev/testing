<?php

class TestController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'polagaj', 'timer', 'pregledajtest', 'sesnum', 'markirajpregledan', 'markirajtest', 'archive', 'forum', 'tutoriali'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'administration'),
				'users' => $this->admin,
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Test;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Test']))
		{
			$model->attributes=$_POST['Test'];
                        $model->tester_id=Yii::app()->user->id;//Vo atributot tester_id na objektot $model od klasata Test go smestuvame id-to na tekovno najaveniot user, t.e. Testerot sto kreira
			
                        if($_GET['format'] === 'ekts') //Ako formatot na testot e EKTS togas se znae od koj tip po kolku prsanja kje ima
                        {
                            $model->click_num = 10;
                            $model->fill_num = 5;
                            $model->complete_num = 5;
                        }
                        
                        //Stavi vo sesiite po kolku prasanja ima od sekoj tip
                        Yii::app()->session['click_num'] = $model->click_num;
                        Yii::app()->session['fill_num'] = $model->fill_num;
                        Yii::app()->session['complete_num'] = $model->complete_num;
                        
                        if($model->save())
                        {
                            Yii::app()->session['test_id'] = $model->id;
                            $this->redirect(array('//clickQuestion/create','test_id'=>$model->id)); //Prenasoci ne na kreiranje prasanja so klikanje
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($test_id)
	{       $id=$test_id;
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Test']))
		{
			$model->attributes=$_POST['Test'];
			if($model->save())
				$this->redirect(array('clickQuestion/index','test_id'=>$model->id, 'type'=>'click'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            if(isset($_POST) && !empty($_POST))
            {   
                $test_student = new TestStudent;
                $code = $_POST['code'];   
                $test_id = $_POST['test_id'];
                $test = Test::model()->findByPk($_POST['test_id']);
                
                if($test->code != $code)
                {
                    echo "<script type='text/javascript'>alert('Погрешен код');</script>";
                }
                else
                {
                    $test_student->test_id = $test_id;
                    $test_student->student_id = Yii::app()->user->id;
                    $test_student->save();
                    echo "<script type='text/javascript'>alert('Пријавата е успешна');</script>";
                }
            }
                $student_id = Yii::app()->user->id;
                $connection=Yii::app()->db;
                $sql = "SELECT * FROM test WHERE test.id NOT IN
                        (SELECT test.id
                         FROM test, test_student
                         WHERE test_student.student_id = :student_id
                         AND test.id = test_student.test_id)
                         AND test.start > NOW()";
                $command = $connection->createCommand($sql);
                $command->bindParam(":student_id", $student_id,PDO::PARAM_STR);
                $all_tests=$command->queryAll();
                
		$this->render('index',array(
			'all_tests'=>$all_tests,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Test('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Test']))
			$model->attributes=$_GET['Test'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Test::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='test-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionPolagaj()
        {
            $test_id = $_GET['test_id'];
            $type = $_GET['type'];
            $student_id = Yii::app()->user->id;
            
            //Od tuka proverka dali testot e zapocnat ili ne
            $test = Test::model()->findByPk($test_id);
            $offset=2*60*60;//Dva casa napred
            $now = date_create(gmdate("Y-m-d H:i:s", time()+$offset));
            $start = date_create($test->start);
            $end = date_create($test->end);
            
            if($now>$start && $now<$end)//Ako segasnoto vreme e vo intrevalot megju start i end na testot
            {
                $zapocni = 1;
            }
            else
            {
                $zapocni = 0;
            }
            //Do tuka dali testot e zapocnat ili ne
            
            $test = Test::model()->findByPk($test_id);
            
            $connection = Yii::app()->db;
            
                $sql1 = "SELECT * FROM click_question WHERE click_question.id NOT IN
                            (SELECT click_answer.click_id
                             FROM click_answer
                             WHERE click_answer.student_id = :student_id)
                          AND click_question.test_id = :test_id";
                $command1 = $connection->createCommand($sql1);
                $command1->bindParam(":student_id", $student_id, PDO::PARAM_STR);
                $command1->bindParam(":test_id", $test_id, PDO::PARAM_STR);
                $prasanja1 = $command1->queryAll();

                $sql2 = "SELECT * FROM fill_question WHERE fill_question.id NOT IN
                            (SELECT fill_answer.fill_id
                             FROM fill_answer
                             WHERE fill_answer.student_id = :student_id)
                          AND fill_question.test_id = :test_id";
                $command2 = $connection->createCommand($sql2);
                $command2->bindParam(":student_id", $student_id, PDO::PARAM_STR);
                $command2->bindParam(":test_id", $test_id, PDO::PARAM_STR);
                $prasanja2 = $command2->queryAll();

                $sql3 = "SELECT * FROM complete_question WHERE complete_question.id NOT IN
                            (SELECT complete_answer.complete_id
                             FROM complete_answer
                             WHERE complete_answer.student_id = :student_id)
                          AND complete_question.test_id = :test_id";
                $command3 = $connection->createCommand($sql3);
                $command3->bindParam(":student_id", $student_id, PDO::PARAM_STR);
                $command3->bindParam(":test_id", $test_id, PDO::PARAM_STR);
                $prasanja3 = $command3->queryAll();

            $this->render('polagaj',array(
                'test_id'=>$test_id,
                'test'=>$test,
                'prasanja1'=>$prasanja1,
                'prasanja2'=>$prasanja2,
                'prasanja3'=>$prasanja3,
                'zapocni'=>$zapocni,
            ));
        }
        
        public function actionPregledajtest()
        {
            $test_id = $_GET['test_id'];
            
            $studenti_nepregledani = TestStudent::model()->findAllByAttributes(array(), 'test_id = :test_id and checked = 0', array(':test_id' => $test_id));
            if(isset($_GET['student_id']))
            {        
                $student_id = $_GET['student_id'];
                $this->redirect(array('/clickAnswer/pregledaj','test_id'=>$test_id, 'student_id'=>$student_id)); //Prenasoci ne na pregled na prasanja so klikanje
            }
            
            $studenti_pregledani = TestStudent::model()->findAllByAttributes(array(), 'test_id = :test_id and checked = 1', array(':test_id' => $test_id));
            if(isset($_GET['student_id']))
            {        
                $student_id = $_GET['student_id'];
                $this->redirect(array('/clickAnswer/pregledaj','test_id'=>$test_id, 'student_id'=>$student_id)); //Prenasoci ne na pregled na prasanja so klikanje
            }
            
            $nepregledani_broj = 0;
            foreach($studenti_nepregledani as $studenti_nepregledan)
            {
                $nepregledani_broj++;
            }
            
            //Presmetka na prosecnata ocena na testot
            $test_prosek = TestStudent::model()->findAllByAttributes(array(), 'test_id = :test_id and checked = 1', array(':test_id' => $test_id));
            $vkupna_ocena = 0; $vkupno_pregledani = 0;
            foreach ($test_prosek as $test_pr)
            {
                $vkupno_pregledani++;
                $vkupna_ocena = $vkupna_ocena + $test_pr->grade;
            }
            if($vkupno_pregledani != 0)
            {
                $prosek = $vkupna_ocena / $vkupno_pregledani;
            }
            else
            {
                $prosek = 5;
            }
            
            
            $test = Test::model()->findByPk($test_id);
            
            if($test->average_grade != $prosek)
            {
                $test->average_grade = $prosek;
                $test->save();
            }
            
            $this->render('pregledajtest', array(
                'studenti_nepregledani' => $studenti_nepregledani,
                'studenti_pregledani' => $studenti_pregledani,
                'nepregledani_broj' => $nepregledani_broj,
                'test' => $test,
            ));
        }
        
        public function actionSesnum()
        {
            if($_GET['type'] == 'click')
            {
                Yii::app()->session['click_num'] = 1;
                $this->redirect(array('clickQuestion/create','test_id'=>$_GET['test_id'], 'type'=>'click'));
            }
            else if($_GET['type'] == 'fill')
            {
                Yii::app()->session['fill_num'] = 1;
                $this->redirect(array('fillQuestion/create','test_id'=>$_GET['test_id'], 'type'=>'fill'));
            }
            else
            {
                Yii::app()->session['complete_num'] = 1;
                $this->redirect(array('completeQuestion/create','test_id'=>$_GET['test_id'], 'type'=>'complete'));
            }
            
        }
        
        public function actionMarkirajpregledan()//Za testot na studentot se odnesuva TestStudent
        {
            $test_id = $_GET['test_id'];
            $student_id = $_GET['student_id'];
            
            //Presmetaj gi negovite poeni
            $criteria1 = new CDbCriteria();
            $criteria1->select = "t.*";
            $criteria1->join = "JOIN `click_question` ON (t.click_id = click_question.id)";
            $criteria1->addCondition("click_question.test_id = :test_id");                
            $criteria1->params[':test_id'] = $test_id;
            $criteria1->addCondition("t.student_id = :student_id");
            $criteria1->params[':student_id'] = $student_id;
            $click_answers = ClickAnswer::model()->findAll($criteria1);
            $click_poeni = 0;
            foreach($click_answers as $click_answer){$click_poeni = $click_poeni + $click_answer->points;}
            
            $criteria2 = new CDbCriteria();
            $criteria2->select = "t.*";
            $criteria2->join = "JOIN `fill_question` ON (t.fill_id = fill_question.id)";
            $criteria2->addCondition("fill_question.test_id = :test_id");                
            $criteria2->params[':test_id'] = $test_id;
            $criteria2->addCondition("t.student_id = :student_id");
            $criteria2->params[':student_id'] = $student_id;
            $fill_answers = FillAnswer::model()->findAll($criteria2);
            $fill_poeni = 0;
            foreach($fill_answers as $fill_answer){$fill_poeni = $fill_poeni + $fill_answer->points;}
            
            $criteria3 = new CDbCriteria();
            $criteria3->select = "t.*";
            $criteria3->join = "JOIN `complete_question` ON (t.complete_id = complete_question.id)";
            $criteria3->addCondition("complete_question.test_id = :test_id");                
            $criteria3->params[':test_id'] = $test_id;
            $criteria3->addCondition("t.student_id = :student_id");
            $criteria3->params[':student_id'] = $student_id;
            $complete_answers = CompleteAnswer::model()->findAll($criteria3);
            $complete_poeni = 0;
            foreach($complete_answers as $complete_answer){$complete_poeni = $complete_poeni + $complete_answer->points;}
            
            $vkupno_poeni = $click_poeni + $fill_poeni + $complete_poeni;
            
            $teststudent = TestStudent::model()->findByAttributes(array('test_id'=>$test_id, 'student_id'=>$student_id));
            $teststudent->checked = 1;
            $teststudent->points = $vkupno_poeni;
            
            $broj_na_click = ClickQuestion::model()->count("test_id = :test_id", array(":test_id"=>$test_id));
            $broj_na_fill = FillQuestion::model()->count("test_id = :test_id", array(":test_id"=>$test_id));
            $broj_na_complete = CompleteQuestion::model()->count("test_id = :test_id", array(":test_id"=>$test_id));
            
            $broj_na_prasanja = $broj_na_click + $broj_na_fill + $broj_na_complete;
            
            $click_points_all = $broj_na_click * 0.5;
            $fill_points_all = $broj_na_fill * 1;
            $complete_points_all = $broj_na_complete * 2;
            $vkupno_test_poeni = $click_points_all + $fill_points_all + $complete_points_all;
            $edna_desetina = $vkupno_test_poeni / 10;
            
            //$vkupno_test_poeni e vkupniot broj na poeni sto gi nosi testot
            //$broj_na_prasanja e vkupniot broj na prasanja na testot
            //$vkupno_poeni e vkupniot broj na poeni sto gi osvoil studentot
            
            //Presmetka na ocenata, ako e povekje od 50%, povekje od 60% i tn.
            if($vkupno_poeni < $edna_desetina * 5){$ocena = 5;}
            else if($vkupno_poeni < $edna_desetina * 6){$ocena = 6;}
            else if($vkupno_poeni < $edna_desetina * 7){$ocena = 7;}
            else if($vkupno_poeni < $edna_desetina * 8){$ocena = 8;}
            else if($vkupno_poeni < $edna_desetina * 9){$ocena = 9;}
            else{$ocena = 10;}
            
            $teststudent->grade = $ocena;
            
            if($teststudent->save())
            {
                $this->redirect(Yii::app()->createUrl("test/pregledajtest&test_id=".$test_id));
            }
        }
        
        public function actionMarkirajtest()//Se odnesuva na testot Test
        {
            $test_id = $_GET['test_id'];
            
            //Markiranje na testot kako pregledan
            $test = Test::model()->findByPk($test_id);
            if($test->checked == 0)
            {
                $test->checked = 1;
                if($test->save())
                {
                    $this->redirect(Yii::app()->createUrl("test/pregledajtest&test_id=".$test_id));
                }
            }
        }
        
        public function actionArchive()
        {
            $pregledani_testovi = Test::model()->findAllByAttributes(array(), 'checked = 1 AND tester_id = :tester_id', array(':tester_id' => Yii::app()->user->id));

            $this->render('archive',array(
                'pregledani_testovi'=>$pregledani_testovi,
            ));
        }
        
        public function actionForum()
        {
            $test_id = $_GET['test_id'];
            
            $criteria1 = new CDbCriteria();
            $criteria1->addCondition("test_id = :test_id");
            $criteria1->params[':test_id'] = $test_id;
            $tutoriali = Tutorial::model()->findAll($criteria1);
                        
            $test = Test::model()->findByPk($test_id);
            
            $this->render('forum',array(
                'tutoriali'=>$tutoriali,
                'test'=>$test,
            ));
        }
        
        public function actionTutoriali()
        {
            $test_id = $_GET['test_id'];
            
            $criteria1 = new CDbCriteria();
            $criteria1->addCondition("test_id = :test_id");
            $criteria1->params[':test_id'] = $test_id;
            $tutoriali = Tutorial::model()->findAll($criteria1);
            
            $test = Test::model()->findByPk($test_id);
            
            $this->render('tutoriali',array(
                'tutoriali'=>$tutoriali,
                'test'=>$test,
            ));
        }


        public function actionAdministration()
        {
            $model = new Test;
            
            $this->render('administration',array(
                'model'=>$model,
            ));
        }
}
