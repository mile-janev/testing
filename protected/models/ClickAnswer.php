<?php

/**
 * This is the model class for table "click_answer".
 *
 * The followings are the available columns in table 'click_answer':
 * @property integer $id
 * @property string $answer
 * @property integer $click_id
 * @property integer $student_id
 */
class ClickAnswer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClickAnswer the static model class
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
		return 'click_answer';
	}
        

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('answer, click_id, student_id', 'required', 'message'=>'Полето {attribute} не може да биде празно'),
			array('click_id, student_id', 'numerical', 'integerOnly'=>true, 'message'=>'Полето {attribute} може да биде само цел број'),
			array('answer', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, answer, click_id, student_id, points', 'safe', 'on'=>'search'),
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
                     'clicks' => array(self:: BELONGS_TO, 'ClickQuestion', 'click_id'),
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
			'answer' => 'Answer',
			'click_id' => 'Click',
			'student_id' => 'Student',
                        'points' => 'Points',
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
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('click_id',$this->click_id);
		$criteria->compare('student_id',$this->student_id);
                $criteria->compare('points',$this->points);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}