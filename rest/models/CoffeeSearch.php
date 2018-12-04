<?php

namespace rest\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Coffee;

/**
 * CoffeeSearch represents the model behind the search form of `common\models\Coffee`.
 */
class CoffeeSearch extends Coffee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parentid', 'rating', 'tpe', 'line', 'open'], 'integer'],
            [['title', 'info', 'image', 'composition', 'pack', 'shop1', 'shop2', 'shop3', 'shop4', 'shop5', 'shop6', 'shop7'], 'safe'],
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
        $query = Coffee::find()->active();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_ASC]],
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
            'rating' => $this->rating,
            'tpe' => $this->tpe,
            'line' => $this->line,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'composition', $this->composition])
            ->andFilterWhere(['like', 'pack', $this->pack])
            ->andFilterWhere(['like', 'shop1', $this->shop1])
            ->andFilterWhere(['like', 'shop2', $this->shop2])
            ->andFilterWhere(['like', 'shop3', $this->shop3])
            ->andFilterWhere(['like', 'shop4', $this->shop4])
            ->andFilterWhere(['like', 'shop5', $this->shop5])
            ->andFilterWhere(['like', 'shop6', $this->shop6])
            ->andFilterWhere(['like', 'shop7', $this->shop7]);

        return $dataProvider;
    }
}
