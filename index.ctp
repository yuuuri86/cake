<?php
//echo $this->Html->script('board', array('inline' => false));
//echo $this->Html->script('jquery-1.11.3.min.js', array('inline' => false));
?>

<h2><?php echo $this->Session->read('myname');?>さんのページ</h2>

<p><?php echo $this->Html->link('ログアウト', 'logout', array('class' => 'button')); ?></p>
<?php
echo $this->Html->link('投稿する','create');
echo $this->Html->tag('br');
?>

<?php
echo $this->Form->create('Board');
echo $this->Form->input('search',array('label' => '検索文字','style' => 'width:100px'));
echo $this->Form->end('検索');
?>

<?php
echo $this->Form->create('Board');
echo $this->Form->select('field', array('asc' => '昇順', 'desc' => '降順'), array('label'=>'false', 'empty'=>array('0' =>'昇順降順')));
echo $this->Form->end('送信');
?>

<?php
foreach($data as $value){ ?>
	<p><?php echo $value['Board']['id'];
	echo " ";
	echo $value['Board']['created'];
	echo " ";
	echo $value['Board']['username'];
	echo " ";
	echo $value['Board']['comment'];
	echo " "; ?></p>
	<?php
if($this->Session->read('myname') == $value['Board']['username']){ ?>
	<p><?php echo $this->Form->create('Board',array('url' => 'edit'));
	echo $this->Form->hidden('id',array('value' => $value['Board']['id']));
	echo $this->Form->end('編集');

	echo " ";
	echo $this->Form->create('Board',array('url' => 'delete'));
	echo $this->Form->hidden('id',array('value' => $value['Board']['id']));
	echo $this->Form->end('削除'); ?></p>
	<?php
	}
	 echo $this->Html->tag('br');
}