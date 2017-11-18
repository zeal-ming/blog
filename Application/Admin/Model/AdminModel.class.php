<?php
namespace Admin\Model;
use Think\Model;
class LinkModel extends Model {

   protected $_validate = array(
        array('username','require','用户名不能为空',1,'regex',3),
        array('password','require','密码不能为空',1,'regex',3),
    );


}