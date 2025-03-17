<?php
// 590. N-ary Tree Postorder Traversal
// Easy
// Topics
// Companies
// Given the root of an n-ary tree, return the postorder traversal of its nodes' values.

// Nary-Tree input serialization is represented in their level order traversal. Each group of children is separated by the null value (See examples)



// Example 1:


// Input: root = [1,null,3,2,4,null,5,6]
// Output: [5,6,3,2,4,1]
// Example 2:


// Input: root = [1,null,2,3,4,5,null,null,6,7,null,8,null,9,10,null,null,11,null,12,null,13,null,null,14]
// Output: [2,6,14,11,7,3,12,8,4,13,9,10,5,1]


// Constraints:

// The number of nodes in the tree is in the range [0, 104].
// 0 <= Node.val <= 104
// The height of the n-ary tree is less than or equal to 1000.


// Follow up: Recursive solution is trivial, could you do it iteratively?
// https://leetcode.com/problems/n-ary-tree-postorder-traversal/?envType=problem-list-v2&envId=stack

//   Definition for a Node.
class Node
{
    public $val = null;
    public $children = null;
    function __construct($val = 0)
    {
        $this->val = $val;
        $this->children = array();
    }
}

class Solution
{
    /**
     * @param Node $root
     * @return integer[]
     */
    function postorder($root)
    {
        if ($root === null) return []; // Base case

        $stack = [$root];
        $result = [];

        while (!empty($stack)) {
            $node = array_pop($stack);
            array_unshift($result, $node->val); // Add value in reverse order

            // Push children to stack (left to right)
            foreach ($node->children as $child) {
                $stack[] = $child;
            }
        }

        return $result; // Already in correct postorder
    }
}

// add test cases 
$root = new Node(1);
$root->children = [new Node(3), new Node(2), new Node(4)];
$root->children[0]->children = [new Node(5), new Node(6)];
$obj = new Solution;
print_r($obj->postorder($root)); // [5,6,3,2,4,1]
echo "\n";
$root = new Node(1);
$root->children = [new Node(2), new Node(3), new Node(4), new Node(5)];
$root->children[1]->children = [new Node(6), new Node(7)];
print_r($obj->postorder($root)); // [2,6,7,3,4,5,1]
echo "\n";
