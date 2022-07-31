<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pay_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property PaymentPersons[] $paymentPersons
 */
class PayType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
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
        ];
    }

    /**
     * Gets query for [[PaymentPersons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentPersons()
    {
        return $this->hasMany(PaymentPersons::className(), ['pay_type' => 'id']);
    }
}
