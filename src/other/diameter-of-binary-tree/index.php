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
    protected $data = null;

    public $left = null;

    public $right = null;

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

    public function getLeftLength($node=null)
    {
        if (empty($node)) {
            return 0;
        }
        $currentNode = $node;
        if (empty($currentNode->left)) {
            return 1;
        }
        $leftLen = $this->getLeftLength($currentNode->left) + 1;
        $rightLen = $this->getRightLength($currentNode->right);

        return $leftLen > $rightLen ? $leftLen : $rightLen;
    }

    public function getRightLength($node=null)
    {
        if (empty($node)) {
            return 0;
        }
        $currentNode = $node;
        if (empty($currentNode->right)) {
            return 1;
        }
        $leftLen = $this->getLeftLength($currentNode->left);
        $rightLen = $this->getRightLength($currentNode->right) + 1;

        return $leftLen > $rightLen ? $leftLen : $rightLen;
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
$root->insert($root, (new Node(-4)));
$root->insert($root, (new Node(-6)));

$rootNode = $root->getRootNode();
$leftLen = $root->getleftLength($rootNode) - 1;
$rightLen = $root->getRightLength($rootNode) - 1;
var_dump($leftLen, $rightLen);
var_dump($root->getRootNode());
