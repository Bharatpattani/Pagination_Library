<?php

require_once 'AdapterInterface.php';

/**
 * Adapter for a PHP array.
 *
 * @author Bharat Pattani
 */
class ArrayAdapter implements AdapterInterface
{
    /**
     * @var array
     */
    private $array;
    

    /*
     * this is private constructor that is invoke only within this class.
     */
    public function __construct()
    {
    	$this->array=Array();
    }

    public function count()
    {
        return count($this->array);
    }
    
    /**
     * {@inheritdoc}
     */
    public function get($offset, $limit)
    {
    	$temp_array=Array();
    	for($i=$offset;$i<($offset+$limit);$i++)
    	{
	   	if($this->count()<=$i)
    	{
			break;
    	}
   		$temp_array=array_merge($temp_array,$this->array[$i]);
    	}
    	return $temp_array;
    }
    
    
    /**
     * {@inheritdoc}
     */
    public function set($appendData)
    {
	if($appendData==null)
	{
		return false;		
	}
	$temp_array=Array();
	$last_offset=$this->count();
	foreach($appendData as $key=>$data)
	{
		$temp_array[$last_offset]=Array($key=>$data);
		$last_offset++;
	}
	$this->array=array_merge($this->array,$temp_array);
    
    return true;
    }
    
    /**
     * {@inheritdoc}
     */
    public function clear($from=0,$length=0)
    {
    	for($i=$from;$i<($from+$length);$i++)
    	{
    		unset($this->array[$i]);
    	}
    }
}
?>	