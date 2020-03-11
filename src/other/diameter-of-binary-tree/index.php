<?php
/**
 * 标题：二叉树的直径
 * 题目地址：https://leetcode-cn.com/problems/diameter-of-binary-tree/
 */

class Solution
{
    public function diameter_of_binary_tree()
    {
        
    }
}

class Node 
{
    public $left = null;

    public $right = null;

    protected $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}

class Root
{
    /**@var Node */
    public static $root = null;

    protected $nodeNum = 0;

    public function __construct(Node $node)
    {
        Root::$root = $node;
        $this->nodeNum++;
    }

    public function insert(Root $root, Node $newNode)
    {
        if (is_null($root)) {
            Root::$root = new self($newNode);
            return true;
        }
        $cmpNode = $root->getRootNode();

        while (!empty($cmpNode)) {
            if ($newNode->getData() > $cmpNode->getData()) {
                if (!empty($cmpNode->right)) {
                    $cmpNode = $cmpNode->right;
                } else {
                    $cmpNode->right = $newNode;
                    break;
                }
            } else {
                if (!empty($cmpNode->left)) {
                    $cmpNode = $cmpNode->left;
                } else {
                    $cmpNode->left = $newNode;
                    break;
                }
            }
        }
        $root->nodeNum++;

        return true;
    }

    public function getData()
    {
        return Root::$root->getData();
    }

    public function getRootNode()
    {
        return Root::$root;
    }

    public function getMaxLength(Node $node)
    {

    }
}

/**
 * 更直观地打印二叉树
 */
function prettyPrint(Root $root, $type = 1)
{   
    if (empty($root)) echo "空二叉树\n";
    $rootNode = $root->getRootNode();
    
}

$root = new Root((new Node(1)));
$root->insert($root, (new Node(2)));
$root->insert($root, (new Node(3)));
$root->insert($root, (new Node(-1)));
var_dump($root, $root->getRootNode());
