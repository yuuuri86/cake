<?php
class BoardsController extends AppController{
	public $name='Boards';
	public $uses=array('Board'); //モデルを利用
	public $components = array('Session','DebugKit.Toolbar');
	public $helper = array('Html','Form'); 

	public function index(){
		$this->set('data',$this->Board->find('all'));
	}

	public function create(){
		if($this->request->is('post')){
			if($this->Board->save($this->request->data)){
				$this->Session->setFlash('Success!');
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash('failed!');
			}
		}
	}

	public function edit(){
		$id=(int)$this->request->data['Board']['id'];
		$data=$this->Board->find('first',
			array('conditions'=>array('Board.id'=> $id)));
		$this->set('data',$data);
	}

	public function edit2(){
		$this->Board->id=$data['Board']['id'];
		if($this->Board->save($this->request->data)){
			$this->Session->setFlash('Success!');
			$this->redirect(array('action'=>'index'));
		}else{
			$this->Session->setFlash('failed!');
		}
	}

	public function delete(){
		$id=(int)$this->request->data['Board']['id'];
		$this->Board->delete($id);
		$this->redirect(array('action'=>'index'));
	}
}
