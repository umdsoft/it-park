<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property int|null $rtom_id
 * @property string|null $full_name
 *
 * @property GropsPersons[] $gropsPersons
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
            [['rtom_id'], 'integer'],
            [['full_name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[GropsPersons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGropsPersons()
    {
        return $this->hasMany(GropsPersons::className(), ['person_id' => 'id']);
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
