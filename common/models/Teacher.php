<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $rtom_id
 *
 * @property Rtom $rtom
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rtom_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
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
            'name' => 'Name',
            'rtom_id' => 'Rtom ID',
        ];
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
