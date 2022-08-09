<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rtom".
 *
 * @property int $id
 * @property string $name
 * @property int $region_id
 * @property int $district_id
 *
 * @property District $district
 * @property Groups[] $groups
 * @property PaymentPersons[] $paymentPersons
 * @property Person[] $people
 * @property Region $region
 * @property RtomManager[] $rtomManagers
 * @property Teacher[] $teachers
 */
class Rtom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rtom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'district_id'], 'required'],
            [['region_id', 'district_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
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
            'region_id' => 'Region ID',
            'district_id' => 'District ID',
        ];
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['rtom_id' => 'id']);
    }

    /**
     * Gets query for [[PaymentPersons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentPersons()
    {
        return $this->hasMany(PaymentPersons::className(), ['rtom_id' => 'id']);
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['rtom_id' => 'id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * Gets query for [[RtomManagers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRtomManagers()
    {
        return $this->hasMany(RtomManager::className(), ['rtom_id' => 'id']);
    }

    /**
     * Gets query for [[Teachers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['rtom_id' => 'id']);
    }
}
