<?php

namespace rest\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Abc;

/**
 * AbcSearch represents the model behind the search form of `common\models\Abc`.
 */
class AbcSearch extends Abc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parentid'], 'integer'],
            [['title', 'info', 'image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Abc::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['title' => SORT_ASC]],
            'pagination' => [
                'pageSize' => 1000,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'parentid' => $this->parentid,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
