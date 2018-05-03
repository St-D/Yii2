<?php


namespace app\models;


use yii\base\Model;
use Yii;
use yii\data\Pagination;

class MySearchForm extends Model
{
    public $search;

    public function attributeLabels()
    {
        return[
            'search' => '',
        ];
    }

    public function rules()
    {
        return[
            [['search'], 'required', 'message' => 'запрос пуст'],
                ];
    }

    public function search()
    {
        //string of search:
        $q = $this->search;

        // search in topic OR text:
        $query = Note::find()->andFilterWhere([
            'or',
            ['like', 'note_data',$q],
            ['like', 'note_topic', $q],
        ]);

        if (!empty($query))
        {
            //user_id requirement:
            $id_u = Yii::$app->user->identity['id'];
            $query->andWhere(['=', 'user_id', $id_u]);
        }
        else
        {
            return false;
        }

        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 5
            , 'forcePageParam' => false, 'pageSizeParam' => false]);
        $notes = $query->offset($pages->offset)->limit($pages->limit)->all();
//        echo '<pre>'. print_r($notes, true) . '</pre>';
//        die();

        return $notes;
    }

}