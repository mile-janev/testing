<?php

/**
 * This is the model class for table "fill_answer".
 *
 * The followings are the available columns in table 'fill_answer':
 * @property integer $id
 * @property string $answer
 * @property integer $fill_id
 */
class FillAnswer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FillAnswer the static model class
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
		return 'fill_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('answer, fill_id, student_id', 'required', 'message'=>'Полето {attribute} не може да биде празно'),
			array('fill_id, student_id', 'numerical', 'integerOnly'=>true, 'message'=>'Полето {attribute} може да биде само цел број'),
			array('answer', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, answer, fill_id, student_id, points, checked', 'safe', 'on'=>'search'),
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
                    'fills' => array(self:: BELONGS_TO, 'FillQuestion', 'fill_id'),
                    'students' => array(self:: BELONGS_TO, 'Student', 'student_id'),
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
			'fill_id' => 'Fill',
                        'student_id'=>'Id na studentot',
                        'points' => 'Points',
                        'checked' => 'Checked'
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
		$criteria->compare('fill_id',$this->fill_id);
                $criteria->compare('student_id',$this->student_id);
                $criteria->compare('points',$this->points);
                $criteria->compare('checked',$this->checked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}