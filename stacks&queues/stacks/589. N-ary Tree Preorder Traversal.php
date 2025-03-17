<?php
// 589. N-ary Tree Preorder Traversal
// Solved
// Easy
// Topics
// Companies
// Given the root of an n-ary tree, return the preorder traversal of its nodes' values.

// Nary-Tree input serialization is represented in their level order traversal. Each group of children is separated by the null value (See examples)



// Example 1:



// Input: root = [1,null,3,2,4,null,5,6]
// Output: [1,3,5,6,2,4]
// Example 2:



// Input: root = [1,null,2,3,4,5,null,null,6,7,null,8,null,9,10,null,null,11,null,12,null,13,null,null,14]
// Output: [1,2,3,6,7,11,14,4,8,12,5,9,13,10]


// Constraints:

// The number of nodes in the tree is in the range [0, 104].
// 0 <= Node.val <= 104
// The height of the n-ary tree is less than or equal to 1000.


// Follow up: Recursive solution is trivial, could you do it iteratively?

// https://leetcode.com/problems/n-ary-tree-preorder-traversal/?envType=problem-list-v2&envId=stack
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
    function preorder($root)
    {
        if ($root === null) return []; // Base case: if root is null, return empty array

        $result = [];
        $stack = [$root]; // Use a stack for iteration

        while (!empty($stack)) {
            $node = array_pop($stack); // Get the last node
            $result[] = $node->val; // Store the value

            // Add children in reverse order to process them in the correct order
            for ($i = count($node->children) - 1; $i >= 0; $i--) {
                $stack[] = $node->children[$i];
            }
        }

        return $result;
    }
}

//add test cases 
$root = new Node(1);
$root->children = [new Node(3), new Node(2), new Node(4)];
$root->children[0]->children = [new Node(5), new Node(6)];
$solution = new Solution();
print_r($solution->preorder($root)); // [1, 3, 5, 6, 2, 4]
echo "\n";
$root = new Node(1);
$root->children = [new Node(2), new Node(3), new Node(4), new Node(5)];
$root->children[1]->children = [new Node(6), new Node(7)];
$root->children[1]->children[0]->children = [new Node(11)];
$root->children[1]->children[0]->children[0]->children = [new Node(14)];
$root->children[2]->children = [new Node(8)];
$root->children[2]->children[0]->children = [new Node(12)];
$root->children[3]->children = [new Node(9), new Node(10)];
$root->children[3]->children[0]->children = [new Node(13)];
$solution = new Solution();
print_r($solution->preorder($root)); // [1, 2, 3, 6, 7, 11, 14, 4, 8, 12, 5, 9, 13, 10]