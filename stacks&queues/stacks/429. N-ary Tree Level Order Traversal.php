<?php

// 429. N-ary Tree Level Order Traversal
// Medium
// Topics
// Companies
// Given an n-ary tree, return the level order traversal of its nodes' values.

// Nary-Tree input serialization is represented in their level order traversal, each group of children is separated by the null value (See examples).



// Example 1:



// Input: root = [1,null,3,2,4,null,5,6]
// Output: [[1],[3,2,4],[5,6]]
// Example 2:



// Input: root = [1,null,2,3,4,5,null,null,6,7,null,8,null,9,10,null,null,11,null,12,null,13,null,null,14]
// Output: [[1],[2,3,4,5],[6,7,8,9,10],[11,12,13],[14]]


// Constraints:

// The height of the n-ary tree is less than or equal to 1000
// The total number of nodes is between [0, 104]

// https://leetcode.com/problems/n-ary-tree-level-order-traversal/
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
     * @return integer[][]
     */
    function levelOrder($root)
    {
        if ($root === null) return []; // Base case

        $queue = [$root]; // Initialize queue with root
        $result = [];

        while (!empty($queue)) {
            $levelSize = count($queue); // Get number of nodes at current level
            $levelNodes = []; // Store values of current level nodes

            for ($i = 0; $i < $levelSize; $i++) {
                $node = array_shift($queue); // Dequeue node
                $levelNodes[] = $node->val; // Store node value

                // Enqueue children for next level
                foreach ($node->children as $child) {
                    $queue[] = $child;
                }
            }

            $result[] = $levelNodes; // Add level nodes to result
        }

        return $result;
    }
}

//add test cases
$root = new Node(1);
$root->children = [new Node(3), new Node(2), new Node(4)];
$root->children[0]->children = [new Node(5), new Node(6)];
$obj = new Solution;
print_r($obj->levelOrder($root)); //[[1],[3,2,4],[5,6]]
echo "\n";
$root = new Node(1);
$root->children = [new Node(2), new Node(3), new Node(4), new Node(5)];
print_r($obj->levelOrder($root)); //[[1],[2,3,4,5]]
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
print_r($obj->levelOrder($root)); //[[1],[2,3,4,5],[6,7,8,9,10],[11,12,13],[14]]
echo "\n";
