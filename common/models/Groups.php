<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property int $id
 * @property string $name
 * @property int $rtom_id
 * @property int $course_id
 * @property string|null $begin_date
 * @property string|null $end_date
 * @property int $group_status
 * @property int|null $teacher_id
 *
 * @property Courses $course
 * @property GroupPerson[] $groupPeople
 * @property GroupStatus $groupStatus
 * @property Rtom $rtom
 * @property User $teacher
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rtom_id', 'course_id', 'group_status'], 'required'],
            [['rtom_id', 'course_id', 'group_status', 'teacher_id'], 'integer'],
            [['begin_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['group_status'], 'exist', 'skipOnError' => true, 'targetClass' => GroupStatus::className(), 'targetAttribute' => ['group_status' => 'id']],
            [['rtom_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rtom::className(), 'targetAttribute' => ['rtom_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['teacher_id' => 'id']],
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
            'course_id' => 'Course ID',
            'begin_date' => 'Begin Date',
            'end_date' => 'End Date',
            'group_status' => 'Group Status',
            'teacher_id' => 'Teacher ID',
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
     * Gets query for [[GroupPeople]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupPeople()
    {
        return $this->hasMany(GroupPerson::className(), ['group_id' => 'id']);
    }

    /**
     * Gets query for [[GroupStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupStatus()
    {
        return $this->hasOne(GroupStatus::className(), ['id' => 'group_status']);
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
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['id' => 'teacher_id']);
    }
}
