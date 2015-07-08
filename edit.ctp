<h2>編集ページ</h2>

<?php
	echo $this->Form->create('Board');
	echo $this->Form->hidden('id',array('value' => $data['Board']['id']));
	echo $this->Form->input('comment',array('label' => 'コメント','value' => $data['Board']['comment']));
	echo $this->Form->end('編集');
?>
