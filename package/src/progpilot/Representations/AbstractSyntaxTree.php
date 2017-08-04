<?php

namespace progpilot\Representations;

use PhpParser\Error;
use PhpParser\ErrorHandler;
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt;
use PhpParser\NodeVisitorAbstract;

class AbstractSyntaxTree extends NodeVisitorAbstract
{
	private $nodes;
	private $edges; 
	
	public function __construct() {

		$this->nodes = [];
		$this->edges = []; 
	}

	public function get_nodes()
	{
		return $this->nodes;
	}

	public function get_edges()
	{
		return $this->edges;
	}

	public function add_node($node)
	{
		$this->nodes[] = $node;
	}

	public function add_edge($caller, $callee)
	{
		$this->edges[] = [$caller, $callee];
	}
	
    public function beforeTraverse(array $nodes)   
    { 
    
    }
    
    public function enterNode(Node $node) 
    { 
        $this->add_node($node);
        
        foreach ($node->getSubNodeNames() as $name) 
        {
            $subNode =& $node->$name;
            
            if(is_object($subNode))
                $this->add_edge($node, $subNode);
        }
    }
    
    public function leaveNode(Node $node) 
    { 
    
    }
    
    public function afterTraverse(array $nodes)     
    { 
    
    }
}
 