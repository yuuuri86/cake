<?php
class Board extends Model{
	public $name = 'Board';
	public $validate = array(
		'title' => array(
			'rule'=>'notEmpty',
			'message'=>'空じゃだめ！'
			),
		'comment'=>array(
			'rule'=>'notEmpty'
			)
		);

}
