<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "group_person".
 *
 * @property int $id
 * @property int $group_id
 * @property int $person_id
 * @property int $status_id
 * @property int|null $person_status_id
 * @property int|null $social_status_id
 * @property int|null $training
 * @property int|null $project_id
 *
 * @property Groups $group
 * @property Person $person
 * @property Status $status
 */
class GroupPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'person_id', 'status_id'], 'required'],
            [['group_id', 'person_id', 'status_id', 'person_status_id', 'social_status_id', 'training', 'project_id'], 'integer'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'person_id' => 'Person ID',
            'status_id' => 'Status ID',
            'person_status_id' => 'Person Status ID',
            'social_status_id' => 'Social Status ID',
            'training' => 'Training',
            'project_id' => 'Project ID',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }
}
