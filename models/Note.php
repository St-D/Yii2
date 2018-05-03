<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "note".
 *
 * @property int $id
 * @property int $user_id
 * @property string $create_date
 * @property string $note_data
 * @property string $note_topic
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'note_data', 'note_topic'], 'required'],
            [['user_id'], 'integer'],
            [['create_date'], 'safe'],
            [['note_data'], 'string'],
            [['note_topic'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'create_date' => 'Create Date',
            'note_data' => 'Note Data',
            'note_topic' => 'Note Topic',
        ];
    }


    public function getUser()
    {
        return $this -> hasOne(User::class, ['id' => 'user_id']);
    }

}
