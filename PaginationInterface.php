<?php
/**
 * Pagination used for pagination of list of Pages from Adapater.
 *
 * @author Bharat Pattani
 */

interface PaginationInterface
{
	/*
	 * function reset the page pointer value
	 */
	function reset();
	
	/*
	 * @param int $page_no
	 * 
	 * function set the page pointer value
	 */
	function seek($page_no);
	
	/*
	 * function return current page pointer value
	 */
	function tell();
	
	/*
	 * @param object $subset_data
	 * 
	 * that set the subset of the data
	 */
	function setPages($subset_data);
		
	/*
	 * @param int $maxPerPage
	 * 
	 * function set maximum records per page
	 */
	function setMaxPerPage($maxPerPage);
	
	/*
	 * function get maximum recoerds per page
	 */
	function getMaxPerPage();

	
	/*
	 * function deteremine wether has next page else return false 
	 */
	function hasNextPage();
	/*
	 *function return true if next page is available else return false
	 */
	function hasPreviousPage();
	
	/*
	 * function return true if previous page is available else return false
	 */
	function hasPage($page_no);
	
	/*
	 * @param int $page_no 
	 * 
	 * function get the specific page if specific page is not found then return false
	 */
	function getPage($page_no);
		
	/*
	 * @param int $page_no 
	 * 
	 *function return true if specific page is available else return false
	 */
	function getNextPage();
	
	/*
	 * function get previous page if previous page is not available then return false 
	 */
	function getPreviousPage();
	
	/*
	 * function returns maximum number of pages available
	 */
	function getMaxPage();

	/*
	 * @param int $page
	 * 
	 * function returns the Page value from offset value if available else return false
	 */
	function getOffsetFromPage($page);

	/*
	 * @param int $offset
	 * 
	 * function returns the Offset value from Page value if available else return false
	 */
	function getPageFromOffset($offset);
	
}
?>