<?php

namespace backend\modules\user\models\searches;

use common\modules\signup\models\TempUser;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TempUserSearch represents the model behind the search form about `common\modules\signup\models\TempUser`.
 */
class TempUserSearch extends TempUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'status', 'reference_type', 'tld', 'nationality', 'debt_collector'], 'integer'],
            [['email', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = TempUser::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id'             => $this->id,
            'type'           => $this->type,
            'status'         => $this->status,
            'reference_type' => $this->reference_type,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
            'tld'            => $this->tld,
            'nationality'    => $this->nationality,
            'debt_collector' => $this->debt_collector,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
