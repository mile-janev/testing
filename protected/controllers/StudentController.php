<?php

class StudentController extends Controller
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
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view', 'update', 'zavrseni'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
			'model'=>$this->loadModel($id),//Go zema od baza samo za korisnikot so ova ID
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Student;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))//Ako e popolneta formata kje se izvrsi ovoj if i kje zapise vo baza
		{
                    $model->attributes=$_POST['Student'];
                    $kime=$model->attributes['username'];//Vrednosta od formataza korisnicko ime

                    $ima_st = Student::model()->findByAttributes(array('username'=>$kime));//Vo $st e smesten celred od tabelata vo bazata za korisnicko ime zadadeno od formata. Ako go nema toa korisnicko ime vrakja null. Na nekoj podatok od vrateniot rezultat moze da mu pristapime na primer $rezultat->attributes['index']
                    if(empty($ima_st))//Ako nema zapis vo ovaa promenliva znaci nemalo drug korisnik vo baza so toa korisnicko ime
                    {
                        if($model->save())
                        {
                            $this->redirect(array('view','id'=>$model->id));
                        }
                    }
                    else
                    {
                        echo "Korisnickoto ime e zafateno";
                    }
		}

		$this->render('create',array( //Ako ne e popolneta formata znaci nemalo POST togas kje se izvrsi samo ova, odnosno kje go prikaze create view-to
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
                $student_id = Yii::app()->user->id;
                $connection=Yii::app()->db;
                $sql ="SELECT test.id, test.title, test.start, test.end, test.tester_id
                         FROM test, test_student
                         WHERE test_student.student_id = :student_id
                         AND test.id = test_student.test_id
                         AND test.start > NOW()
                         ORDER BY test.start";//Gi podreduva spored vremeto koe zapocnuva a najraniot e prv. Samo nezapocnatite
                $command = $connection->createCommand($sql);
                $command->bindParam(":student_id", $student_id,PDO::PARAM_STR);
                $nezapocnati_testovi=$command->queryAll();
                
                $sql2 ="SELECT test.id, test.title, test.start, test.end, test.tester_id
                         FROM test, test_student
                         WHERE test_student.student_id = :student_id
                         AND test.id = test_student.test_id
                         AND test.start > NOW()
                         ORDER BY test.start
                         LIMIT 1";//Go zema samo sledniot test. Samo nezapocnatite gi gleda
                $command2 = $connection->createCommand($sql2);
                $command2->bindParam(":student_id", $student_id,PDO::PARAM_STR);
                $sleden_test=$command2->queryAll();
                
                $sql3 ="SELECT test.id, test.title, test.start, test.end, test.tester_id
                         FROM test, test_student
                         WHERE test_student.student_id = :student_id
                         AND test.id = test_student.test_id
                         AND test.start < NOW()
                         AND test.end > NOW()
                         ORDER BY test.start";//Go zema samo sledniot test. Samo nezapocnatite gi gleda
                $command3 = $connection->createCommand($sql3);
                $command3->bindParam(":student_id", $student_id,PDO::PARAM_STR);
                $vo_tek=$command3->queryAll();

		$this->render('index',array(
                        'vo_tek'=>$vo_tek,
                        'sleden_test'=>$sleden_test,
			'nezapocnati_testovi'=>$nezapocnati_testovi,
                        
                        
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

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
		$model=Student::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionZavrseni()
        {
                $student_id = Yii::app()->user->id;
                $connection=Yii::app()->db;
                $sql ="SELECT test.id, test.tester_id, test.title, test.start, test.end, test.checked, test_student.points, test_student.grade
                         FROM test, test_student
                         WHERE test_student.student_id = :student_id
                         AND test.id = test_student.test_id
                         AND NOW() > test.end
                         ORDER BY test.start";//Gi podreduva spored vremeto koe zapocnuva a najraniot e prv
                $command = $connection->createCommand($sql);
                $command->bindParam(":student_id", $student_id,PDO::PARAM_STR);
                $zavrseni=$command->queryAll();
                
		$this->render('zavrseni',array(
			'zavrseni'=>$zavrseni,
		));
        }
}
