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

        return "{$data_1}-{$data_2}";

    }   // function GetKey( )
    
    // other methods here

}  // class cMyTreeData

class cMyTreeNode extends \\rstoetter\\cbalancedbinarytree\\cBalancedBinaryTreeNode {

    function __construct( string $data_1, int $data_2 ){
    
            $obj_data = new cMyTreeData( $data_1, $data_2 );
            
            parent::__construct( $obj_data->GetKey( ), $obj_data );
    
    }   // function __construct( )
    
    public function __toString( ) : string {
        
        $ret = $this->_data->GetKey();
        
        return $ret;
        
    }   // function __toString( )

}   // class cMyTreeNode

class cMyTree extends \\rstoetter\\cbalancedbinarytree\\cBalancedBinaryTree {

    function __construct( ){
    
        // do something here
        // $this->RebalanceTree( );
        
    }   // function __construct( )

	public function MyInsert( string $data_1, int $data_2 ) {
        
        $obj_new = new cMyTreeNode( $data_1, $data_2 );
            
        $this->InsertNode( $obj_new );
		
	}  // function MyInsert( )

}   // class cMyTree


```
