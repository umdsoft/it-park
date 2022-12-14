<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property GroupPerson[] $groupPeople
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
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
     * Gets query for [[GroupPeople]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupPeople()
    {
        return $this->hasMany(GroupPerson::className(), ['status_id' => 'id']);
    }
}
