<?php

namespace rstoetter\cbalancedbinarytree;


/**
  *
  * ## description
  *
  * The class cBalancedBinaryTreeNode implements a single node in the balanced binary tree of the type cBalancedBinaryTree
  * The class cBalancedBinaryTreeNode keeps the data part in the member variable m_data, which normally is represented by a class, which   
  * holds the data. Retrieve the data part with the method GetData( )
  * Normally you subclass your own class from cBalancedBinaryTreeNode, which will construct the Node with the data part
  *
  * ## Usage:  
  *
  *  ```php
  *
  *  class cMyTreeData {
  *
  *     // this class holds the data 
  *
  *      public $m_data_1 = '';    
  *      public $m_data_2 = -1;    
  *
  *      function __construct( string $data_1, int $data_2 ){
  *      
  *          $this->m_data_1 = $data_1;
  *          $this->m_data_1 = $data_2;
  *      
  *      }   // function __construct( )
  *
  *     public function GetKey( ) : string {
  *     
  *         // calculate the unique sort key of the Tree
  *
  *         return "{$this->m_data_1}-{$this->m_data_2}";
  *
  *     }   // function GetKey( )
  *     
  *     // other methods here
  *
  * }  // class cMyTreeData
  *
  * class cMyTreeNode extends \\rstoetter\\cbalancedbinarytree\\cBalancedBinaryTreeNode {
  *
  *     function __construct( string $data_1, int $data_2 ){
  *     
  *             $obj_data = new cMyTreeData( $data_1, $data_2 );
  *             
  *             parent::__construct( $obj_data->GetKey( ), $obj_data );
  *     
  *     }   // function __construct( )
  *     
  *     public function __toString( ) : string {
  *         
  *         $ret = $this->_data->GetKey();
  *         
  *         return $ret;
  *         
  *     }   // function __toString( )
  *
  * }   // class cMyTreeNode  
  *
  *  ```
  *
  *
  * @author Rainer Stötter
  * @copyright 2018 Rainer Stötter
  * @license MIT
  * @version =1.0
  *
  */


class cBalancedBinaryTreeNode {

// based on code found on http://www.stoimen.com

    /**
      * The version of the class cBalancedBinaryTreeNode
      *
      * @var string $m_version the version of the class cBinaryTreeNode
      *
      *
      */

    protected   $m_version = '1.0';
    
    /**
      * A pointer to the parent node of the actual node
      *
      * @var cBalancedBinaryTreeNode|null
      *
      *
      */
    
    
	protected   $m_parent = null;
	
    /**
      * A pointer to the left tree node after the actual node
      *
      * @var cBalancedBinaryTreeNode|null
      *
      *
      */
	
	
	protected   $m_left = null;

    /**
      * A pointer to the right tree node after the actual node
      *
      * @var cBalancedBinaryTreeNode|null
      *
      *
      */
	
	
	protected   $m_right = null;
	
    /**    
      *
      * The key the tree should be sorted on. In most cases this would be a string or an integer
      *
      * @var $m_key the key has no type
      *
      */
	
	
	protected   $m_key = null;     // the key we are sorting on
	
    /**
      *
      * The data part of the node - in most cases this will be an object of a special class which holds the data items and methods 
      * on them you need. 
      *
      * @var $m_data the data part has no type
      *
      */
	
	
    protected   $m_data = null;    // the data container
    
    
    /**
      *
      * The constructor of the class cBinaryTreeNodeData
      *
      * see the description of class cBinaryTreeNode for an example
      *
      * @param $key the key we are sorting the tree on 
      * @param $data the data part of the node - often an object of a specialized data class
      *
      * @return cBalancedBinaryTreeNode a new instance of cBalancedBinaryTreeNode
      *
      */    
 
	public function __construct($key, $data) {
	
		$this->m_key = $key;
        $this->m_data = $data;
	}
 
    /**
     * Empty the node - the key will stay untouched
     */
    public function ClearData() {
    
        $this->m_data = null;
    }
 
    /**
     * Print the key
     * 
     * @return string returns the key as string
     *
     */
     
	public function __toString( ) : string {
        return "{$this->m_key}";
	}
	
    /**
     * Returns a pointer to the father object or null
     * 
     * @return cBalancedBinaryTreeNode|null
     *
     */
	
 
    public function &GetParent() { 
        return $this->m_parent; 
    }
    
    /**
     * Sets the pointer the father object is pointing to or sets it to null
     * 
     * @param cBalancedBinaryTreeNode|null $parent
     *
     */
    
    
    public function SetParent( $parent ) { 
        $this->m_parent = $parent; 
    }
    
    /**
     *
     * Returns a pointer to the left tree after the actual node or null
     * 
     * @return cBalancedBinaryTreeNode|null
     *
     */    
 
    public function &GetLeft() { 
        return $this->m_left; 
    }
    
    /**
     * Sets the pointer the left tree after the actual object or to null
     * 
     * @param cBalancedBinaryTreeNode|null $left
     *
     */
    
    
    public function SetLeft($left) { 
        $this->m_left = $left; 
    }
    
    /**
     *
     * Returns a pointer to the right tree after the actual node or null
     * 
     * @return cBalancedBinaryTreeNode|null
     *
     */    
    
 
    public function &GetRight() { 
        return $this->m_right; 
    }
    
    /**
     * Sets the pointer the right tree after the actual object or to null
     * 
     * @param cBalancedBinaryTreeNode|null $right
     *
     */
    
    
    public function SetRight($right) { 
        $this->m_right = $right; 
    }
    
    /**
     *
     * Returns the key of the node on which the tree will be sorted on
     * 
     * @return the key is untyped
     *
     */    
    
 
    public function &GetKey() { 
        return $this->m_key; 
    }
    
    /**
     * Sets the key of the node on which the tree will be sorted on
     * 
     * @param cBalancedBinaryTreeNode|null $key
     *
     */
    
    
    public function SetKey($key) { 
        $this->m_key = $key; 
    }
    
    /**
     *
     * Returns the data part of the node
     * 
     * @return the data part is untyped - normally it is an object of a class which holds the data
     *
     */    
    
 
    public function &GetData( ) { 
        return $this->m_data; 
    }
    
    /**
     *
     * Sets the data part of the node
     * 
     * @param $date the data part is untyped - normally it is an object of a class which holds the data
     *
     */    
    
    
    public function SetData( $data ) { 
        $this->m_data = $data; 
    }
    
} // cBalancedBinaryTreeNode


/**
  *
  * ## description
  *
  * The class cBalancedBinaryTree implements a balanced binary tree, which manages nodes of the type cBalancedBinaryTreeNode
  * Normally you subclass your own class from cBalancedBinaryTree, which will handle the nodes in a more useful way you need
  *
  * This version of the tree is not able to delete nodes 
  *
  * ## Usage:  
  *
  *  ```php
  *
  *  class cMyTreeData {
  *
  *     // this class holds the data 
  *
  *      public $m_data_1 = '';    
  *      public $m_data_2 = -1;    
  *
  *      function __construct( string $data_1, int $data_2 ){
  *      
  *          $this->m_data_1 = $data_1;
  *          $this->m_data_1 = $data_2;
  *      
  *      }   // function __construct( )
  *
  *     public function GetKey( ) : string {
  *     
  *         // calculate the unique sort key of the Tree
  *
  *         return "{$this->m_data_1}-{$this->m_data_2}";
  *
  *     }   // function GetKey( )
  *     
  *     // other methods here
  *
  * }  // class cMyTreeData
  *
  * class cMyTreeNode extends \\rstoetter\\cbalancedbinarytree\\cBalancedBinaryTreeNode {
  *
  *     function __construct( string $data_1, int $data_2 ){
  *     
  *             $obj_data = new cMyTreeData( $data_1, $data_2 );
  *             
  *             parent::__construct( $obj_data->GetKey( ), $obj_data );
  *     
  *     }   // function __construct( )
  *     
  *     public function __toString( ) : string {
  *         
  *         $ret = $this->_data->GetKey();
  *         
  *         return $ret;
  *         
  *     }   // function __toString( )
  *
  * }   // class cMyTreeNode  
  *
  *
  * class cMyTree extends \rstoetter\cbalancedbinarytree\cBalancedBinaryTree {
  *
  *     function __construct( ){
  *     
  *         // do something here
  *         // $this->RebalanceTree( );
  *         
  *     }   // function __construct( )
  *
  *     public function MyInsert( string $data_1, int $data_2 ) {
  *     
  *         // inserts a new node in the tree
  *         
  *         $obj_new = new cMyTreeNode( $data_1, $data_2 );
  *             
  *         $this->InsertNode( $obj_new );
  *         
  *         // maybe you have to rebalance the tree now
  *         // NOTE: if you are filling the tree with a bunch of data, then you can rebalance the tree after reading all objects, too
  *         
  *         $this->RebalanceTree( );
  *         
  *     }  // function MyInsert( )
  *     
  *     public function MySearch( string $key ) {
  *     
  *         // returns an object of type cMyTreeData or false    
  *     
  *         $obj_found = $this->SearchByKey( $key );
  *         // $obj_found is of type cBalancedBinaryTreeNode
  *         
  *         if ( $obj_found !== false ) {
  *             return $obj_found->GetData( );
  *         }
  *         
  *         return false;
  *     
  *     }   // function MySearch( )
  *     
  *     public function PrintTree( ) : string {
  *     
  *         // return the ordered keys of the Tree as a string
  *     
  *         parent::_PrintTree( $this->m_root );
  *         
  *     }   // function PrintTree( )
  *     
  *     protected function _TraverseInOrder( $tree ) {
  *     
  *         // internal method to recurse the tree in order beginning with $tree and do something with each node
  *     
  *         if ( is_null( $tree ) ) { return ; }
  *         
  *         //
  * 
  *         $this->_TraverseInOrder( $tree->GetLeft( ) ); 
  *         
  *         //
  *         
  *         $obj = $tree->GetData( );
  *         
  *         //
  *         // do something with $obj, which is of the type cMyTreeData
  *         //
  *             
  *         //
  *         
  *         $this->_TraverseInOrder( $tree->GetRight( ) );         
  *     
  *     }   // function _TraverseInOrder( )
  *     
  *     
  *     public function TraverseInOrder( ) {
  *     
  *         // traverse the whole tree in ordered order
  *     
  *         // recurse the tree beginning with the root pointer
  *         $this->_TraverseInOrder( $this->m_root );
  *                 
  *     }   // function TraverseInOrder( )  
  *
  *  ```
  *
  *
  * @author Rainer Stötter
  * @copyright 2018 Rainer Stötter
  * @license MIT
  * @version =1.0
  *
  */

 
class cBalancedBinaryTree {

// based on code found on http://www.stoimen.com

    /**
      * The version of the class cBalancedBinaryTree
      *
      * @var string $m_version the version of the tree
      *
      *
      */

    protected   $m_version = '1.0';


    /**
     * the root tree node
     * 
     * @var $m_rootthe root node of the tree
     *
     */
	protected $m_root = null;
 
    /**
     * 
     * insert a new node $new_node above the tree $root_node based on key's value, which defines the sorting order 
     * $tree should be null in order to insert the node not into a subtree
     *
     * @param type $new_node the new node 
     * @param type|null $root_node the root node 
     *
     */
     
	protected function _InsertNode( $new_node, & $root_node = null )
	{
        // if the tree is empty we make a new root node
		if (is_null( $root_node ) ) {
			$root_node = $new_node;
			return;
		}
 
		if ($new_node->GetKey() <= $root_node->GetKey()) {
			if (is_null( $root_node->GetLeft() ) ) {
				$root_node->SetLeft($new_node);
				$new_node->SetParent($root_node);
			} else {
				$this->_InsertNode($new_node, $root_node->GetLeft());
			}
		} else {
			if ( is_null( $root_node->GetRight() ) ) {
				$root_node->SetRight($new_node);
				$new_node->SetParent($root_node);
			} else {
				$this->_InsertNode($new_node, $root_node->GetRight());
			}
		}		
	}
 
     
    /**
     * 
     * search the node with the unique key $key in the tree above $tree and return false if the key was not found or the pointer to the
     * object belonging to the key
     *
     * @param type $key the unique key we are searching for
     * @param type $tree the root node wherefrom we are searching on - should not be null
     * @return cBalancedBinaryTreeNode|bool the object we have searched for or false
     *
     */
     
    protected function _SearchByKey($key, &$tree ) {
        if ( is_null( $tree ) ) {
            return false;
        }
 
        if ($tree->GetKey() == $key) {
            return $tree;
        } else if ($tree->GetKey() > $key) {
            return $this->_SearchByKey($key, $tree->GetLeft());
        } else {
            return $this->_SearchByKey($key, $tree->GetRight());
        }
    }
 
    /**
     * 
     * traverse the tree beginning with $tree and return an array with the keys 'data' and 'key'. 
     *
     * @param cBalancedBinaryTree $tree or null
     * @return array array with the keys 'data' and 'key'
     *
     */     
    private function _GetAryLeftRootRight($tree) {
        if ($tree == null) {
            return array();
        }
 
        return array_merge(
                $this->_GetAryLeftRootRight($tree->GetLeft()),
                array(array('key' => $tree->GetKey(), 'data' => $tree->GetData())),
                $this->_GetAryLeftRootRight($tree->GetRight()));
    }
    
    /**
     * 
     * rebalance the tree beginning with $tree. 
     *
     * @param cBalancedBinaryTree $tree or null
     *
     */     
 
    public function _RebalanceTree($tree)
    {
    
        // TODO: rebalance without using an ordered array
        
        if ( empty( $tree ) ) {
            return;
        }
 
        // split the list
        $chunks = array_chunk($tree, ceil(count($tree) / 2));
        $mid = array_pop($chunks[0]);
 
        $node = new cBalancedBinaryTreeNode($mid['key'], $mid['data']);
        $this->InsertNode($node);
 
        $this->_RebalanceTree($chunks[0]);
        if (isset($chunks[1]))
            $this->_RebalanceTree($chunks[1]);
    }
 
    /**
     * 
     * rebalance the whole tree
     *
     */     
     
    public function RebalanceTree()
    {
        $list = array();
        // get the tree as an ordered array
        $list = $this->_GetAryLeftRootRight($this->m_root);
 
        // locate the medium node
        $chunks = array_chunk($list, ceil(count($list) / 2));
        $mid = array_pop($chunks[0]);
 
        // empty the tree        
        $this->_ClearTree( );
 
        // inser the root
        $node = new cBalancedBinaryTreeNode($mid['key'], $mid['data']);
        $this->InsertNode($node);
 
        $this->_RebalanceTree($chunks[0]);
        $this->_RebalanceTree($chunks[1]);
    }

    
    /**
     * 
     * empty the whole tree by setting the root node to null
     *
     */     
    
    protected function _ClearTree() {
    
         // TODO: do this recursevely by implementing node deletion
    
        $this->m_root = null;
        
    }   // function _ClearTree( )

     
    /**
     * 
     * insert a new node into the tree by obeying the unique key of the node
     *
     * @param cBalancedBinaryTree $new_node
     *
     */     
     
     
	public function InsertNode($new_node)
	{
		$this->_InsertNode($new_node, $this->m_root);
	}
 
    /**
     *
     * Search the tree for the node with the unique key $key
     * 
     * @param typo $key the unique key we are searching for
     * @return cBalancedBinaryTreeNode|bool returns the object we have found in the tree or false, if $key was not found
     *
     */
     
    public function SearchByKey($key)
    {
        return $this->_SearchByKey($key, $this->m_root);
    }
 
    /**
     * 
     * print the tree from $tree on by buliding a string consisting of the unique keys of the nodes we have visited
     *
     * @param cBalancedBinaryTree|null $tree the tree we are combing through
     * @return string the tree from $tree on as a string consisting of the unique keys of the nodes found in the tree $tree
     *
     */     
    protected function _PrintTree($tree) : string
    {
        if ( is_null( $tree ) ) { 
            return ''; 
        }
 
        return $this->_print($tree->GetLeft()) . ' ' 
                . $tree->GetKey() . ' ' 
                . $this->_print($tree->GetRight());
    }
 
    /**
     * 
     * print the whole tree by buliding a string consisting of the unique keys of the nodes we have visited
     *
     * @return string the tree as a string consisting of the unique keys of the nodes found in the tree 
     *
     */     
     
    public function __toString()
    {
        if ($this->m_root == null) {
            return 'This tree is empty!';
        }
 
        return $this->_print($this->m_root->GetLeft()) . ' '
                . $this->m_root->GetKey() . ' '
                . $this->_print($this->m_root->GetRight());
    }
    
    
    
}   // class cBalancedBinaryTree



?>