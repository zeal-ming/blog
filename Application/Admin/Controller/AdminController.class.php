<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {

    public function lst(){
        
    	$Admin = D('Admin');
        $count = $Admin->count();

        $page = new \Think\Page($count,3);
        $show = $page->show();

        $Admins = $Admin->order('id desc')->limit($page->firstRow.','. $page->listRows)->select();
        
        $this->assign('Admins',$Admins);
        $this->assign('page',$show);
        $this->display();

    }

    public function add(){

    	$Admin = D('Admin');
    	if(IS_POST){

    	   $data = $_POST;
            $data['password'] = MD5($data['password']);
    		if($Admin->create($data)){
    			if($Admin->add()){
    			$this->success('管理员添加成功',U('lst'));
	    		} else {
	    			$this->error('管理员添加失败');
	    		}
    		} else {
    			$this->error($Admin->getError());
    		}
    		
    	}

    	$this->display();
    }

    public function del(){

    	$Admin = D('Admin');

    	if($Admin->delete(I('id'))){
    		$this->success('删除成功',U('lst'));
    	} else {
    		$this->error('删除失败');
    	}
    }

    public function edit(){

    
    	if(IS_POST){
    		$Admin = D('Admin');
    	       $data = $_POST;

    		if($Admin->create($data)){
    			if($Admin->save()){
    			$this->success('管理员修改成功',U('lst'));
	    		} else {
	    			$this->error('管理员修改失败');
	    		}
    		} else {
    			$this->error($Admin->getError());
    		}
    	 
    	} else{

    		$Admin = D('Admin');

	    	$Admin= $Admin->find(I('id'));
	    	$this->assign('Admin',$Admin);
	    	$this->display();
    	}
    }

    public function sort(){
    	if(IS_POST){

    		$Admin = D('Admin');

    		foreach ($_POST as $key => $value) {
    			$Admin->where(array('id'=>$key))->setField('listorder',$value);
    		}

    		$this->success('更新成功',U('lst'));
    	}
    }
}