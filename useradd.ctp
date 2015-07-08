	<h2>新規ユーザー登録</h2>
	<?php echo $this->Session->flash('Auth'); ?>
	<?php echo $this->Form->create('User', array('url' => 'useradd')); ?>
	<?php echo $this->Form->input('User.name',array('label'=>'ユーザ名')); ?>
	<?php echo $this->Form->input('User.pass',array('label'=>'パスワード')); ?>
	<?php echo $this->Form->input('User.pass_check',array('label'=>'パスワード確認','type' => "pass")); ?>
	<?php echo $this->Form->end('新規ユーザを作成する'); ?>
	
	<?php echo $this->Html->link('ログインページ', 'login', array('class' => 'button')); ?>