<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller {



    public function lst(){
        
    	$cate = D('cate');

        $cates = $cate->order('listorder desc,id desc')->select();
        $this->assign('cates',$cates);
        $this->display();

    }

    public function add(){

    	$cate = D('cate');
    	if(IS_POST){
    		$date['name'] = I('catename');
    		if($cate->create($date)){
    			if($cate->add()){
    			$this->success('栏目添加成功',U('lst'));
	    		} else {
	    			$this->error('栏目添加失败');
	    		}
    		} else {
    			$this->error($cate->getError());
    		}
    		
    	}

    	$this->display();
    }

    public function del(){

    	$cate = D('cate');

    	if($cate->delete(I('id'))){
    		$this->success('删除成功',U('lst'));
    	} else {
    		$this->error('删除失败');
    	}
    }

    public function edit(){

    
    	if(IS_POST){
    		$cate = D('cate');
    		$data['id'] = I('id');
    		$data['name'] = I('name');

    		if($cate->create($data)){
    			if($cate->save()){
    			$this->success('栏目修改成功',U('lst'));
	    		} else {
	    			$this->error('栏目修改失败');
	    		}
    		} else {
    			$this->error($cate->getError());
    		}
    	 
    	} else{

    		$cate = D('cate');

	    	$category = $cate->find(I('id'));
	    	$this->assign('category',$category);
	    	$this->display();
    	}
    }

    public function sort(){
    	if(IS_POST){

    		$cate = D('cate');

    		foreach ($_POST as $key => $value) {
    			$cate->where(array('id'=>$key))->setField('listorder',$value);
    		}

    		$this->success('更新成功',U('lst'));
    	}
    }
}