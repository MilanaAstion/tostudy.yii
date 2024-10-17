<?php
namespace app\components; 
use yii\base\Widget; 

class BreadcrumbsWidget extends Widget { 
    public $breadcrumbs; 

    public function init() { 
        parent::init(); 
        if($this->breadcrumbs){
            // dd($this->breadcrumbs);
            array_unshift($this->breadcrumbs, ['label' => 'Главная', 'url' => '/']);
        }
    } 

    public function run() { 
        return $this->render('breadcrumbs', ['breadcrumbs' => $this->breadcrumbs]); 
    } 
}