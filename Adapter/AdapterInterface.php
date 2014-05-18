<?php

//namespace Pagination;

/**
 * Adapter used for pagination of a list of items.
 *
 * @author Bharat Pattani
 */
interface AdapterInterface
{
    /**
     * Fetch a subset of data.
     *
     * @param int $offset Starting offset (0 indexed)
     * @param int $limit  Limit the number of results
     */
    public function get($offset, $limit);

    /**
     * Count number of elements in data.
     */
    
    public function count();
    
    
    /*
     * Append the data in existing data and return new number of elements in subset
     * 
     * @param  Array $appendData that  
     */

    public function set($appendData);
    
    /*
     * Clear Entire subset of data
     * 
     * @param int $from starting index of dataset(default is 0)
     * @param int $length Length of the dataset(default is the length of entire subset)
     *  
     */
    
    public function clear($from=0,$length=0);
    
}
