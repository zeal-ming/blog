<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {

    public function lst(){
        
    	$Article = D('Article');
        $count = $Article->count();

       // dump($count);die();
        $page = new \Think\Page($count,3);
        $show = $page->show();

        $Articles = $Article->order('listorder desc,id desc')->limit($page->firstRow.','. $page->listRows)->select();
        
       // dump($Articles); die(); cateId 拿出来后变成cateid?
        $this->assign('Articles',$Articles);
        $this->assign('page',$show);
        $this->display();

    }

    public function add(){

    	$Article = D('Article');
    	if(IS_POST){

            $data = $_POST;
            dump($data);die();
            //获取上传文件信息(单文件上传)
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =  3145728 ;// 设置附件上传大小
                $upload->exts      =  array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =  './Public/Uploads/'; // 设置附件上传根目录
                // 上传单个文件 
                $info   =  $upload->uploadOne($_FILES['photo1']);
                if(!$info) {        
                // 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{
                // 上传成功 获取上传文件信息
                     $data['pic'] = './Public/Uploads/'.$info['savepath'].$info['savename']; 
                }

            $data['publish_time'] = time();

    		if($Article->create($data)){
    			if($Article->add()){
    			$this->success('文章添加成功',U('lst'));
	    		} else {
	    			$this->error('文章添加失败');
	    		}
    		} else {
    			$this->error($Article->getError());
    		}
    		
    	} else {

             $this->display();
        }

    }

    public function del(){

    	$Article = D('Article');

    	if($Article->delete(I('id'))){
    		$this->success('删除成功',U('lst'));
    	} else {
    		$this->error('删除失败');
    	}
    }

    public function edit(){

    
    	if(IS_POST){
    		$Article = D('Article');
    		$data = $_POST;
            $data['publish_time'] = time();

           // dump($data);die();
    		if($Article->create($data)){
    			if($Article->save()){
    			$this->success('文章修改成功',U('lst'));
	    		} else {
	    			$this->error('文章修改失败');
	    		}
    		} else {
    			$this->error($Article->getError());
    		}
    	 
    	} else{

    		$Article = D('Article');

	    	$Article = $Article->find(I('id'));
	    	$this->assign('Article',$Article);
	    	$this->display();
    	}
    }

    public function sort(){
    	if(IS_POST){

    		$Article = D('Article');

    		foreach ($_POST as $key => $value) {
    			$Article->where(array('id'=>$key))->setField('listorder',$value);
    		}

    		$this->success('更新成功',U('lst'));
    	}
    }
}