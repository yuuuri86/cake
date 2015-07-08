<?php
class BoardsController extends AppController{
	public $name = 'Boards';
	public $uses = array('Board','User'); //モデルを利用

	public function index(){
		$this->set('data',$this->Board->find('all'));

		if(isset($this->request->data['Board']['search'])){
			$search = $this->request->data['Board']['search'];
			$data = $this->Board->find('all',
	 		array('conditions' => array('Board.comment LIKE' => '%'.$search.'%')));
			$this->set('data',$data);
		}

		if(isset($this->request->data['Board']['field'])){
			$field = $this->request->data['Board']['field'];
			if($field == 'asc'){
				$params = 'ASC';
			}else if($field == 'desc'){
				$params = 'DESC';
			}
			$data = $this->Board->find('all',
				array('order' => array('Board.id' => $params)));

			$this->set('data', $data);
		}
		
	}

	 public function create(){
	 	if($this->request->is('post')){
	 		if($this->Board->save($this->request->data)){
	 			$this->Session->setFlash('Success!');
	 			$this->redirect(array('action' => 'index'));
	 		}else{
	 			$this->Session->setFlash('failed!');
	 		}
	 	}
	 }

	 public function edit(){
	 	$id = (int)$this->request->data['Board']['id'];
	 	$data = $this->Board->find('first',
	 		array('conditions'=>array('Board.id' => $id)));
	 	$this->set('data',$data);

	 	if(isset($this->request->data['Board']['comment'])){
	 		$this->Board->id = $data['Board']['id'];
	 		if($this->Board->save($this->request->data)){
	 			$this->Session->setFlash('Success!');
	 			$this->redirect(array('action'=>'index'));
	 		}else{
	 			$this->Session->setFlash('failed!');
	 		}
	 	}

	 }

	 public function delete(){
	 	$id=(int)$this->request->data['Board']['id'];
	 	$this->Board->delete($id);
	 	$this->redirect(array('action' => 'index'));
	 }

	public function login(){//ログイン
			if($this->request->is('post')){//POST送信なら
				if($this->Auth->login()){//ログイン成功なら
					//$this->Session->delete('Auth.redirect'); //前回ログアウト時のリンクを記録させない
					$username = $this->request->data['User']['name'];
					$this->Session->write('myname',$username);
					return $this->redirect($this->Auth->redirect()); //Auth指定のログインページへ移動

				}else{ //ログイン失敗なら
					$this->Session->setFlash(__('ユーザ名かパスワードが違います'), 'default', array(), 'auth');
				}
			}
		}

		public function logout(){ //ログアウト
			$this->Auth->logout();
			$this->Session->destroy(); //セッションを完全削除
			$this->Session->setFlash(__('ログアウトしました'));
			$this->redirect(array('action' => 'login'));
		}

		public function useradd(){
			//POST送信なら
			if($this->request->is('post')) {
				//パスワードとパスチェックの値をハッシュ値変換
				$this->request->data['User']['pass'] = AuthComponent::password($this->request->data['User']['pass']);
				$this->request->data['User']['pass_check'] = AuthComponent::password($this->request->data['User']['pass_check']);
				//入力したパスワートとパスワードチェックの値が一致
				if($this->request->data['User']['pass_check'] === $this->request->data['User']['pass']){		
					$this->User->create();//ユーザーの作成
					$mse = ($this->User->save($this->request->data))? '新規ユーザーを追加しました' : '登録できませんでした。やり直して下さい';
					$this->Session->setFlash(__($mes));
				}else{
					$this->Session->setFlash(__('パスワード確認の値が一致しません．'));
				}
				$this->redirect(array('action' => 'login'));//リダイレクト	
			}
		}
	}
