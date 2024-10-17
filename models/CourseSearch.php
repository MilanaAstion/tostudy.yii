<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Course;

/**
 * CourseSearch represents the model behind the search form of `app\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_id', 'col_prog_id'], 'integer'],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_description_en', 'col_description_es', 'col_description_ua', 'col_description_ru', 'col_description_cn', 'col_price', 'col_school_id'], 'safe'],
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
        $query = Course::find();

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

        // $query->joinWith('program');
        $query->joinWith('school');
        
        // grid filtering conditions
        $query->andFilterWhere([
            'col_id' => $this->col_id,
            // 'col_school_id' => $this->col_school_id,
            'col_prog_id' => $this->col_prog_id,
        ]);

        $query->andFilterWhere(['like', 'col_title_en', $this->col_title_en])
            ->andFilterWhere(['like', 'col_title_es', $this->col_title_es])
            ->andFilterWhere(['like', 'col_title_ua', $this->col_title_ua])
            ->andFilterWhere(['like', 'col_title_ru', $this->col_title_ru])
            ->andFilterWhere(['like', 'col_title_cn', $this->col_title_cn])
            ->andFilterWhere(['like', 'col_description_en', $this->col_description_en])
            ->andFilterWhere(['like', 'col_description_es', $this->col_description_es])
            ->andFilterWhere(['like', 'col_description_ua', $this->col_description_ua])
            ->andFilterWhere(['like', 'col_description_ru', $this->col_description_ru])
            ->andFilterWhere(['like', 'col_description_cn', $this->col_description_cn])
            ->andFilterWhere(['like', 'col_price', $this->col_price])
            // ->andFilterWhere(['like', 'tbl_programs.col_name', $this->col_prog_id])
            ->andFilterWhere(['like', 'tbl_schools.col_title', $this->col_school_id]);

        return $dataProvider;
    }
}
