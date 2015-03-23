<?php
    class TagsModel extends Model{
 
	protected  $fields = array( 
	  	'TAG_ID',
		'TAG_NAME',
		'TAG_SLUG',
		'TAG_GROUP',
		'TAG_COUNT',
		'TAG_SORT',
		'_pk' => 'TAG_ID'
	 );
}
