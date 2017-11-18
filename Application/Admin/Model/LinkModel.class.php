<?php
namespace Admin\Model;
use Think\Model;
class LinkModel extends Model {

   protected $_validate = array(
        array('title','require','连接标题不能为空',1,'regex',3),
        array('url','require','链接路径不能为空',1,'regex',3),
        array('description','require','链接简介不能为空',1,'regex',3),

    );


}