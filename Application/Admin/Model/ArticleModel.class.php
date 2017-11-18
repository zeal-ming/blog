<?php
namespace Admin\Model;
use Think\Model;
class LinkModel extends Model {

   protected $_validate = array(
        array('title','require','文章标题不能为空',1,'regex',3),
        array('description','require','文章简介不能为空',1,'regex',3),
        array('content','require','文章内容不能为空',1,'regex',3),
        array('content','require','文章内容不能为空',1,'regex',3),

    );

}