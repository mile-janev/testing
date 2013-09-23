<?php

/**
 * This is the model class for table "fill_reply".
 *
 * The followings are the available columns in table 'fill_reply':
 * @property integer $id
 * @property integer $fillanswer_id
 */
class FillReply extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FillReply the static model class
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
		return 'fill_reply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fillanswer_id, user_id, comment, isstudent', 'required', 'message'=>'Полето {attribute} не може да биде празно'),
			array('fillanswer_id, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fillanswer_id, user_id, comment, isstudent', 'safe', 'on'=>'search'),
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
                    'fill_answers' => array(self:: BELONGS_TO, 'FillAnswer', 'fillanswer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ИД',
			'fillanswer_id' => 'ИД на FillAnswer',
                        'comment' => 'Коментар',
                        'user_id' => 'Корисник',
                        'isstudent' => 'Студент'
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
		$criteria->compare('fillanswer_id',$this->fillanswer_id);
                $criteria->compare('comment',$this->comment);
                $criteria->compare('user_id',$this->user_id);
                $criteria->compare('isstudent',$this->isstudent);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}