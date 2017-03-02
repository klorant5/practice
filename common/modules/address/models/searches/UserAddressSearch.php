<?php

namespace common\modules\address\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\address\models\UserAddress;

/**
 * UserAddressSearch represents the model behind the search form about `common\modules\address\models\UserAddress`.
 */
class UserAddressSearch extends UserAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'is_temp', 'address_type', 'country_id'], 'integer'],
            [['city', 'street', 'street_section', 'building_number', 'floor', 'door', 'name_of_venue', 'district', 'zipcode', 'created_at', 'updated_at'], 'safe'],
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
        $query = UserAddress::find();

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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'is_temp' => $this->is_temp,
            'address_type' => $this->address_type,
            'country_id' => $this->country_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'street_section', $this->street_section])
            ->andFilterWhere(['like', 'building_number', $this->building_number])
            ->andFilterWhere(['like', 'floor', $this->floor])
            ->andFilterWhere(['like', 'door', $this->door])
            ->andFilterWhere(['like', 'name_of_venue', $this->name_of_venue])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode]);

        return $dataProvider;
    }
}
