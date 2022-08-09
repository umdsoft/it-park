<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property int|null $rtom_id
 * @property string|null $full_name
 * @property string|null $phone
 * @property string|null $birthday
 * @property int|null $gender
 * @property string|null $uid
 *
 * @property GroupPerson[] $groupPeople
 * @property Rtom $rtom
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender','phone','full_name','birthday'],'required'],
            [['rtom_id', 'gender'], 'integer'],
            ['uid','unique'],
            [['birthday'], 'safe'],
            [['full_name', 'phone', 'uid'], 'string', 'max' => 255],
            [['rtom_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rtom::className(), 'targetAttribute' => ['rtom_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rtom_id' => 'Rtom ID',
            'full_name' => 'Full Name',
            'phone' => 'Phone',
            'birthday' => 'Birthday',
            'gender' => 'Gender',
            'uid' => 'Uid',
        ];
    }

    /**
     * Gets query for [[GroupPeople]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupPeople()
    {
        return $this->hasMany(GroupPerson::className(), ['person_id' => 'id']);
    }

    /**
     * Gets query for [[Rtom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRtom()
    {
        return $this->hasOne(Rtom::className(), ['id' => 'rtom_id']);
    }
}
