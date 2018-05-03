<?php


namespace app\models;

use Yii;
use yii\base\Model;

class MyNoteForm extends Model
{
    public $topic;
    public $text_data;

    public function attributeLabels()
    {
        return[
            'topic' => 'О чем:',
            'text_data' => 'Заметка:',
        ];
    }


    public function rules()
    {
        return[
            [['topic', 'text_data',], 'required', 'message' => '...нужно что-то написать...'],
            ['topic', 'string', 'min' => 1, 'max' =>  49],
            ['text_data', 'string', 'min' => 1, 'max' =>  65534],
//            ['topic', 'unique', 'targetClass' => 'app\models\Note',  'targetAttribute' => 'user_id',
//                'message' => 'заметка с такой темой у Вас уже есть'],
        ];
    }


    public function create_note()
    {
        $note = new Note();

        $note->user_id = Yii::$app->user->identity->id;
        $note->create_date =  date("Y-m-d G:i:s");
        $note->note_data =  $this->text_data;
        $note->note_topic =   $this->topic;

        return $note -> save();
    }


}