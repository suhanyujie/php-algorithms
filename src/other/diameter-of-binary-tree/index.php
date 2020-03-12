<?php
/**
 * 标题：二叉树的直径
 * 题目地址：https://leetcode-cn.com/problems/diameter-of-binary-tree/
 * 状态：ok
 */

class Solution
{
    /**
     * @param TreeNode $root
     * @return Integer
     */
    public function diameterOfBinaryTree($root)
    {
        $node = $root;
        if (empty($node)) {
            return 0;
        }
        if (empty($root->left) && empty($root->right)) {
            return 0;
        }
        $max = Root::$maxDiameter;
        if (!empty($node->left)) {
            $this->diameterOfBinaryTree($node->left);
        }
        // 获取自身节点的左右深度之和
        $leftLen = Root::getleftLength($node) - 1;
        $rightLen = Root::getRightLength($node) - 1;
        $totalDeepNum = $leftLen + $rightLen;
        if ($max < $totalDeepNum) {
            Root::$maxDiameter = $totalDeepNum;
        }
        if (!empty($node->right)) {
            $this->diameterOfBinaryTree($node->right);
        }

        return Root::$maxDiameter;
    }
}

class Node
{
    protected $val = null;

    public $left = null;

    public $right = null;

    public function __construct($data)
    {
        $this->val = $data;
    }

    public function getData()
    {
        return $this->val;
    }
}

class Root
{
    /**@var Node */
    public static $root = null;

    protected $nodeNum = 0;

    public static $maxDiameter = 0;

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

    public static function getLeftLength($node = null)
    {
        if (empty($node)) {
            return 0;
        }
        $currentNode = $node;
        if (empty($currentNode->left)) {
            return 1;
        }
        $leftLen = Root::getLeftLength($currentNode->left) + 1;
        $rightLen = Root::getRightLength($currentNode->right);

        return $leftLen > $rightLen ? $leftLen : $rightLen;
    }

    public static function getRightLength($node = null)
    {
        if (empty($node)) {
            return 0;
        }
        $currentNode = $node;
        if (empty($currentNode->right)) {
            return 1;
        }
        $leftLen = Root::getLeftLength($currentNode->left);
        $rightLen = Root::getRightLength($currentNode->right) + 1;

        return $leftLen > $rightLen ? $leftLen : $rightLen;
    }

    // 获取最大的树直径
    function getMaxDiameter($node)
    {
        if (empty($node)) {
            return 0;
        }
        $max = Root::$maxDiameter;
        if (!empty($node->left)) {
            getMaxDiameter($node->left);
        }
        // 获取自身节点的左右深度之和
        $leftLen = Root::getleftLength($node) - 1;
        $rightLen = Root::getRightLength($node) - 1;
        $totalDeepNum = $leftLen + $rightLen;
        if ($max < $totalDeepNum) {
            Root::$maxDiameter = $totalDeepNum;
        }
        if (!empty($node->right)) {
            getMaxDiameter($node->right);
        }

        return Root::$maxDiameter;
    }
}

/**
 * 更直观地打印二叉树
 */
function prettyPrint(Root $root, $type = 1)
{
    if (empty($root)) {
        echo "空二叉树\n";
    }

    $rootNode = $root->getRootNode();

}

// 前序遍历打印节点数据
function preTraversePrintData($node = null)
{
    if (empty($node)) {
        return [];
    }
    if (!empty($node->left)) {
        preTraversePrintData($node->left);
    }

    echo "{$node->getData()} ";
    if (!empty($node->right)) {
        preTraversePrintData($node->right);
    }

}

// 前序遍历打印左右深度之和
function preTraversePrintDeep($node = null)
{
    if (empty($node)) {
        return 0;
    }
    if (!empty($node->left)) {
        preTraversePrintDeep($node->left);
    }
    // 获取自身节点的左右深度之和
    $leftLen = Root::getleftLength($node) - 1;
    $rightLen = Root::getRightLength($node) - 1;
    $totalDeepNum = $leftLen + $rightLen;
    echo "$totalDeepNum ";
    if (!empty($node->right)) {
        preTraversePrintDeep($node->right);
    }
}

// test
$root = new Root((new Node(20)));
$dataList = [15, 3, 4, 5, 6, 7, 8, 16, 17, 18, 19];
foreach ($dataList as $k=>$val) {
    $root->insert($root, (new Node($val)));
}
$rootNode = $root->getRootNode();
$maxDiameter = (new Solution)->diameterOfBinaryTree($rootNode);
echo "the max diameter:{$maxDiameter}\n";
preTraversePrintData($rootNode);
