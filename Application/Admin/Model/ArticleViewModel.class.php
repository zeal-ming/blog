<?php
namespace Admin\Model;
use Think\Model\ViewModel;

class ArticleViewModel extends ViewModel {

   protected $_viewFields = array(
   		'Article' => array('id','title','pic','_type=>LEFT'),
   		'Cate' => array('name','_on'=>'Cate.id=Article.cateId'),
   	);

}