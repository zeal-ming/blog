<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends Controller {

    public function lst(){
        
    	$link = D('Link');
        $count = $link->count();

        $page = new \Think\Page($count,3);
        $show = $page->show();

        $links = $link->order('listorder desc,id desc')->limit($page->firstRow.','. $page->listRows)->select();
        
        $this->assign('links',$links);
        $this->assign('page',$show);
        $this->display();

    }

    public function add(){

    	$Link = D('Link');
    	if(IS_POST){

    		$data['title'] = I('title');
            $data['url'] = I('url');
            $data['description'] = I('description');

    		if($Link->create($data)){
    			if($Link->add()){
    			$this->success('链接添加成功',U('lst'));
	    		} else {
	    			$this->error('链接添加失败');
	    		}
    		} else {
    			$this->error($Link->getError());
    		}
    		
    	}

    	$this->display();
    }

    public function del(){

    	$Link = D('Link');

    	if($Link->delete(I('id'))){
    		$this->success('删除成功',U('lst'));
    	} else {
    		$this->error('删除失败');
    	}
    }

    public function edit(){

    
    	if(IS_POST){
    		$Link = D('Link');
    		$data['id'] = I('id');
    		$data['title'] = I('title');
            $data['url'] = I('url');
            $data['description'] = I('description');

    		if($Link->create($data)){
    			if($Link->save()){
    			$this->success('链接修改成功',U('lst'));
	    		} else {
	    			$this->error('链接修改失败');
	    		}
    		} else {
    			$this->error($Link->getError());
    		}
    	 
    	} else{

    		$Link = D('Link');

	    	$link= $Link->find(I('id'));
	    	$this->assign('link',$link);
	    	$this->display();
    	}
    }

    public function sort(){
    	if(IS_POST){

    		$Link = D('Link');

    		foreach ($_POST as $key => $value) {
    			$Link->where(array('id'=>$key))->setField('listorder',$value);
    		}

    		$this->success('更新成功',U('lst'));
    	}
    }
}