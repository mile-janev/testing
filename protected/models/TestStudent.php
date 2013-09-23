<?php

/**
 * This is the model class for table "test_student".
 *
 * The followings are the available columns in table 'test_student':
 * @property integer $id
 * @property integer $test_id
 * @property integer $student_id
 * @property integer $points
 * @property integer $grade
 */
class TestStudent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TestStudent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_id, student_id, points, grade', 'required', 'message'=>'Полето {attribute} не може да биде празно'),
			array('test_id, student_id, grade, checked', 'numerical', 'integerOnly'=>true, 'message'=>'Полето {attribute} може да биде само цел број'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, test_id, student_id, points, grade, checked', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'tests' => array(self:: BELONGS_TO, 'Test', 'test_id'),
                    'students' => array(self:: BELONGS_TO, 'Student', 'student_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'test_id' => 'Test',
			'student_id' => 'Student',
			'points' => 'Points',
			'grade' => 'Grade',
                        'checked' => 'Pregledano'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('test_id',$this->test_id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('points',$this->points);
		$criteria->compare('grade',$this->grade);
                $criteria->compare('checked',$this->checked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}