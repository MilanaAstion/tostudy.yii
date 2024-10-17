<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\School;

/**
 * SchoolSearch represents the model behind the search form of `app\models\School`.
 */
class SchoolSearch extends School
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_id', 'col_city_id', 'col_home_page', 'col_currency'], 'integer'],
            [['col_alias', 'col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_title', 'col_url', 'col_img_mini', 'col_img', 'col_description_en', 'col_description_es', 'col_description_ua', 'col_description_ru', 'col_description_cn', 'col_about_us_en', 'col_about_us_es', 'col_about_us_ua', 'col_about_us_ru', 'col_about_us_cn', 'col_residence_en', 'col_residence_es', 'col_residence_ua', 'col_residence_ru', 'col_residence_cn', 'col_registration_fee', 'col_pdf'], 'safe'],
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
        $query = School::find();

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
            'col_id' => $this->col_id,
            'col_city_id' => $this->col_city_id,
            'col_home_page' => $this->col_home_page,
            'col_currency' => $this->col_currency,
        ]);

        $query->andFilterWhere(['like', 'col_alias', $this->col_alias])
            ->andFilterWhere(['like', 'col_meta_title', $this->col_meta_title])
            ->andFilterWhere(['like', 'col_meta_description', $this->col_meta_description])
            ->andFilterWhere(['like', 'col_meta_keywords', $this->col_meta_keywords])
            ->andFilterWhere(['like', 'col_title', $this->col_title])
            ->andFilterWhere(['like', 'col_url', $this->col_url])
            ->andFilterWhere(['like', 'col_img_mini', $this->col_img_mini])
            ->andFilterWhere(['like', 'col_img', $this->col_img])
            ->andFilterWhere(['like', 'col_description_en', $this->col_description_en])
            ->andFilterWhere(['like', 'col_description_es', $this->col_description_es])
            ->andFilterWhere(['like', 'col_description_ua', $this->col_description_ua])
            ->andFilterWhere(['like', 'col_description_ru', $this->col_description_ru])
            ->andFilterWhere(['like', 'col_description_cn', $this->col_description_cn])
            ->andFilterWhere(['like', 'col_about_us_en', $this->col_about_us_en])
            ->andFilterWhere(['like', 'col_about_us_es', $this->col_about_us_es])
            ->andFilterWhere(['like', 'col_about_us_ua', $this->col_about_us_ua])
            ->andFilterWhere(['like', 'col_about_us_ru', $this->col_about_us_ru])
            ->andFilterWhere(['like', 'col_about_us_cn', $this->col_about_us_cn])
            ->andFilterWhere(['like', 'col_residence_en', $this->col_residence_en])
            ->andFilterWhere(['like', 'col_residence_es', $this->col_residence_es])
            ->andFilterWhere(['like', 'col_residence_ua', $this->col_residence_ua])
            ->andFilterWhere(['like', 'col_residence_ru', $this->col_residence_ru])
            ->andFilterWhere(['like', 'col_residence_cn', $this->col_residence_cn])
            ->andFilterWhere(['like', 'col_registration_fee', $this->col_registration_fee])
            ->andFilterWhere(['like', 'col_pdf', $this->col_pdf]);

        return $dataProvider;
    }
}
