<h2>ログインページ</h2>

<?php
echo $this->Session->flash('Auth');
echo $this->Form->create('User');
echo $this->Form->input('name',array('label' => '名前'));
echo $this->Form->input('pass',array('label' => 'パスワード','type' => 'password'));
echo $this->Form->end('ログイン');


echo $this->Html->link('会員登録ページ', 'useradd', array('class' => 'button'));