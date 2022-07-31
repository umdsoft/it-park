<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rtom_manager".
 *
 * @property int $id
 * @property int $user_id
 * @property int $rtom_id
 * @property int $status
 *
 * @property Rtom $rtom
 * @property User $user
 */
class RtomManager extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rtom_manager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'rtom_id', 'status'], 'required'],
            [['user_id', 'rtom_id', 'status'], 'integer'],
            [['rtom_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rtom::className(), 'targetAttribute' => ['rtom_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'rtom_id' => 'Rtom ID',
            'status' => 'Status',
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
