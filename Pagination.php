<?php

/*
 * importing files
 */
require_once 'PaginationInterface.php';
require_once 'Adapter/paginationFactory.php';

/*
 * Represent pagination
 * 
 * @author Bharat Pattani 
 */

class Pagination implements PaginationInterface
{
	private $adapter;
	private $maxPerPage;
	private $currentPage;
	private $offset;
	
	/*
	 * @param string $adapterType
	 */
	public function __construct($adapterType="array")
	{
		$this->adapter=paginationFactory::getInstance($adapterType);
        $this->maxPerPage = 10;
        $this->currentPage = 1;
        $this->offset=0;
	}
	
	
	/*
	 * @inheritDoc
	 */
	public function setPages($subset_data)
	{
		$this->adapter->set($subset_data);
	}
	
	
	
	/*
	 * @inheritDoc
	 */
	public function setMaxPerPage($maxPerPage)
	{
		$this->maxPerPage=$maxPerPage;
	}
	
	/*
	* @inheritDoc
	*/
	public function getMaxPerPage()
	{
		return $this->maxPerPage;		
	}	
	
	
	/*
	 * @inheritDoc
	 */
	public function getMaxPage()
	{
		return intval(($this->adapter->count()/($this->maxPerPage)+1));
	}
	
	/*
	 * @inheritDoc
	 */
	public function getOffsetFromPage($page_no)
	{
		if($this->hasPage($page_no))
		{
			return (($page_no-1)*$this->maxPerPage);
		}
		else 
		{
			return false;
		}
	}
	
	/*
	 * @inheritDoc
	 */
	public function getPageFromOffset($offset)
	{
		$page_no=$offset/$this->maxPerPage;
		$page_no=$page_no+1;
		if($this->hasPage($page_no))
		{
			return intval($page_no);
		}
		else
		{
			return false;
		}
	}
	
	/*
	 * @inheritDoc
	 */
	public function hasNextPage()
	{
		if($this->offset<$this->adapter->count())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/*
	* @inheritDoc
	*/
	public function hasPreviousPage()
	{
		if($this->offset>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/*
	* @inheritDoc
	*/
	public function hasPage($page_no)
	{
		if($page_no<=$this->getMaxPage())
		{
			return true;
		}	
		else
		{
			return false;
		}
	}
	
	/*
	* @inheritDoc
	*/
	public function getNextPage()
	{
		if($this->hasNextPage())
		{
			$page=$this->adapter->get($this->offset,$this->maxPerPage);
			$this->offset=$this->offset+$this->maxPerPage;
			return $page;
			
		}
		else 
		{
			return false;
		}
	}
	
	/*
	* @inheritDoc
	*/
	public function getPreviousPage()
	{
		if($this->hasPreviousPage())
		{
			$page=$this->adapter->get($this->offset,$this->maxPerPage);
			$this->offset=$this->offset-$this->maxPerPage;
			return $page;
		}
		else
		{
			return false;
		}
	}
	
	/*
	* @inheritDoc
	*/
	public function getPage($page_no)
	{
		if($this->hasPage($page_no))
		{
			$offset=$this->getOffsetFromPage($page_no);
			$page=$this->adapter->get($offset,$this->maxPerPage);
			return $page;
		}
		else
		{
			return false;			
		}
	}
	
	/*
	* @inheritDoc
	*/
	public function reset()
	{
		$this->offset=0;
	}
	
	/*
	* @inheritDoc
	*/
	public function seek($page_no)
	{
		$this->offset=$this->getOffsetFromPage($page_no);
	}
	
	/*
	* @inheritDoc
	*/
	public function tell()
	{
		return $this->getPageFromOffset($this->offset);
	}
	
	
	
} 
?>