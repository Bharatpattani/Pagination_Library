<?php
/*
 * This is Factory class for the PHP Pagination
 * 
 * @author Bharat Pattani
 */

/*
 * importing  files
 */
require_once 'ArrayAdapter.php';

class paginationFactory
{
	/*
    * this is private constructor that is invoke only within this class.
    */
	private function __construct()
	{
		//that you want to write in constructor
	}
	
	/*
	 * @param string $pagination_type (Default is 'array')
	 * 
	 * funcion is apply with the factory pattern
	 * 
	 * it returns the instance of the Adaptor class if available else return false 
	 */
	
	public static function getInstance($pagination_type='array')
	{
		switch ($pagination_type)
		{
			case "array":
				return new ArrayAdapter();
			default:
				return false;
		}
	}
	
	
	
}

?>