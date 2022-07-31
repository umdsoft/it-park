<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_persons".
 *
 * @property int $id
 * @property float $amount
 * @property int $rtom_id
 * @property string|null $date
 * @property int $pay_type
 * @property int $social_status
 * @property int|null $course_id
 * @property string|null $file
 *
 * @property Courses $course
 * @property PayType $payType
 * @property Rtom $rtom
 * @property SocialStatus $socialStatus
 */
class PaymentPersons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_persons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'rtom_id', 'pay_type', 'social_status'], 'required'],
            [['amount'], 'number'],
            [['rtom_id', 'pay_type', 'social_status', 'course_id'], 'integer'],
            [['date'], 'safe'],
            [['file'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['pay_type'], 'exist', 'skipOnError' => true, 'targetClass' => PayType::className(), 'targetAttribute' => ['pay_type' => 'id']],
            [['rtom_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rtom::className(), 'targetAttribute' => ['rtom_id' => 'id']],
            [['social_status'], 'exist', 'skipOnError' => true, 'targetClass' => SocialStatus::className(), 'targetAttribute' => ['social_status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'rtom_id' => 'Rtom ID',
            'date' => 'Date',
            'pay_type' => 'Pay Type',
            'social_status' => 'Social Status',
            'course_id' => 'Course ID',
            'file' => 'File',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[PayType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayType()
    {
        return $this->hasOne(PayType::className(), ['id' => 'pay_type']);
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
     * Gets query for [[SocialStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSocialStatus()
    {
        return $this->hasOne(SocialStatus::className(), ['id' => 'social_status']);
    }
}
