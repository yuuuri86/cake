<?php
echo $this->Html->script('board', array('inline' => false));
?>
<h2>TOPページ</h2>
<?php
echo $this->Html->link('投稿する','create');
echo $this->Html->tag('br');

foreach($data as $value):
	echo $value['Board']['id'];
	echo $value['Board']['comment'];
	echo " ";
	echo $value['Board']['created'];
	echo " ";

	echo $this->Form->create('Board',array('url'=>'edit'));
	echo $this->Form->hidden('id',array('value'=>$value['Board']['id']));
	echo $this->Form->end('編集');

	echo " ";
	echo $this->Form->create('Board',array('url'=>'delete'));
	echo $this->Form->hidden('id',array('value'=>$value['Board']['id']));
	echo $this->Form->end('削除');
	echo $this->Html->tag('br');
	endforeach;