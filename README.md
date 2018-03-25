The repository rstoetter\\cbalancedbinarytree-php implements the class cBalancedBinaryTree in PHP which is a balanced binary tree.

You will need PHP 7 or later to use this repository

The class cBalancedBinaryTree consists of nodes of the type cBalancedBinaryTreeNode. You provide a class which holds the data part, a
class subclassing cBalancedTreeNode, which manages the class with the data and a class subclassing cBalancedBinaryTree, which handles 
the class, which was subclassed from cBalancedBinaryTreeNode.

You need to know how to sort the Tree as you have to provide a unique key for each node, too. You could implement a method GetKey( ) in
the class providing the data part to calculate such an unique key on the data it is holding.

An Example would be:

```php

class cMyTreeData {

    public $m_data_1 = '';    
    public $m_data_2 = -1;    

    function __construct( string $data_1, int $data_2 ){
    
        $this->m_data_1 = $data_1;
        $this->m_data_1 = $data_2;
    
    }   // function __construct( )

    public function GetKey( ) : string {
    
        // calculate the unique sort key for the Tree

        return "{$this->m_data_1}-{$this->m_data_2}";

    }   // function GetKey( )
    
    // other methods here

}  // class cMyTreeData

class cMyTreeNode extends \rstoetter\cbalancedbinarytree\cBalancedBinaryTreeNode {

    function __construct( string $data_1, int $data_2 ){
    
            $obj_data = new cMyTreeData( $data_1, $data_2 );
            
            parent::__construct( $obj_data->GetKey( ), $obj_data );
    
    }   // function __construct( )
    
    public function __toString( ) : string {
        
        $ret = $this->_data->GetKey();
        
        return $ret;
        
    }   // function __toString( )

}   // class cMyTreeNode

class cMyTree extends \rstoetter\cbalancedbinarytree\cBalancedBinaryTree {

    function __construct( ){
    
        // do something here
        // $this->RebalanceTree( );
        
    }   // function __construct( )

	public function MyInsert( string $data_1, int $data_2 ) {
	
        // inserts a new node in the tree
        
        $obj_new = new cMyTreeNode( $data_1, $data_2 );
            
        $this->InsertNode( $obj_new );
        
        // maybe you have to rebalance the tree now
        // NOTE: if you are filling the tree with a bunch of data, then you can rebalance the tree after reading all objects, too
        
        $this->RebalanceTree( );
		
	}  // function MyInsert( )
	
    public function MySearch( string $key ) {
    
        // returns an object of type cMyTreeData or false    
    
        $obj_found = $this->SearchByKey( $key );
        // $obj_found is of type cBalancedBinaryTreeNode
        
        if ( $obj_found !== false ) {
            return $obj_found->GetData( );
        }
        
        return false;
    
    }   // function MySearch( )
    
    public function PrintTree( ) : string {
    
        // return the ordered keys of the Tree as a string
    
        parent::_PrintTree( $this->m_root );
        
    }   // function PrintTree( )
    
    protected function _TraverseInOrder( $tree ) {
    
        // internal method to recurse the tree in order beginning with $tree and do something with each node
    
        if ( is_null( $tree ) ) { return ; }
        
        //
 
        $this->_TraverseInOrder( $tree->GetLeft( ) ); 
        
        //
        
        $obj = $tree->GetData( );
        
        //
        // do something with $obj, which is of the type cMyTreeData
        //
            
        //
        
        $this->_TraverseInOrder( $tree->GetRight( ) );         
    
    }   // function _TraverseInOrder( )
    
    
    public function TraverseInOrder( ) {
    
        // traverse the whole tree in ordered order
    
        // recurse the tree beginning with the root pointer
        $this->_TraverseInOrder( $this->m_root );
                
    }   // function TraverseInOrder( )
    
    
    
	

}   // class cMyTree

$my_tree = new cMyTree( );
$my_tree->MyInsert( 'data 1', 1 );
$my_tree->MyInsert( 'data 2', 2 );
$my_tree->MyInsert( 'data 3', 3 );

$obj = $my_tree->MySearch( 'data 1' );
if ( $obj !== false ) {
    // do something withe $obj
}



```
