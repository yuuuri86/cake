<h2>投稿ページ</h2>

<?php
echo $this->Form->create('Board');
echo $this->Form->input('comment',array('label' => 'コメント'));
echo $this->Form->hidden('username',array('value' => $this->Session->read('myname')));
echo $this->Form->end('Save Post');