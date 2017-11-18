<?php
namespace Admin\Model;
use Think\Model;
class CateModel extends Model {

   protected $_validate = array(
        array('name','require','添加栏目不能为空',1,'regex',3),
        array('name','require','添加栏目不能重复',1,'unique',3),
    );


}