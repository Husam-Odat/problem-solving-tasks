<?php

// Node Class
class Node
{
    public $data;
    public $children = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    // Add a child to the node
    public function addChild(Node $child): void
    {
        $this->children[] = $child;
    }
}

// Tree Class
class Tree
{
    public $root;

    public function __construct($data)
    {
        $this->root = new Node(data: $data);
    }

    // Preorder Traversal (Root -> Left -> Right)
    public function preorderTraversal(Node $node): void
    {
        if ($node == null) return;

        echo $node->data . " "; // Print the current node's data
        foreach ($node->children as $child) {
            $this->preorderTraversal(node: $child); // Recursively traverse children
        }
    }

    // Postorder Traversal (Left -> Right -> Root)
    public function postorderTraversal(Node $node): void
    {
        if ($node == null) return;

        foreach ($node->children as $child) {
            $this->postorderTraversal(node: $child); // Recursively traverse children
        }
        echo $node->data . " "; // Print the current node's data
    }

    // Level-order Traversal (Breadth First)
    public function levelOrderTraversal(Node $node): void
    {
        if ($node == null) return;

        $queue = [$node]; // Start with the root
        // print_r(value: $queue);
        while (!empty($queue)) {
            $current = array_shift(array: $queue); // Dequeue a node
            echo $current->data . " "; // Print the node's data
            foreach ($current->children as $child) {
                $queue[] = $child; // Enqueue children
            }
        }
    }

    // Depth-First Traversal (Similar to Preorder)
    public function depthFirstTraversal(Node $node)
    {
        if ($node == null) return;

        $stack = [$node]; // Using a stack for DFS
        while (!empty($stack)) {
            $current = array_pop(array: $stack); // Pop a node from the stack
            echo $current->data . " "; // Print the node's data

            // Push children onto the stack in reverse order (so leftmost is processed first)
            for ($i = count(value: $current->children) - 1; $i >= 0; $i--) {
                $stack[] = $current->children[$i];
            }
        }
    }

    // Inorder Traversal (Left -> Root -> Right) [for binary trees]
    public function inorderTraversal(Node $node)
    {
        if ($node == null) return;

        if (count($node->children) > 0) {
            $this->inorderTraversal($node->children[0]); // Traverse left subtree
        }

        echo $node->data . " "; // Print the current node's data

        for ($i = 1; $i < count($node->children); $i++) {
            $this->inorderTraversal($node->children[$i]); // Traverse right subtree(s)
        }
    }
    public function drawTree(Node $node, $prefix = "", $isLast = true)
    {
        if ($node == null) return;

        echo $prefix;
        echo $isLast ? "└── " : "├── ";
        echo $node->data . "\n";

        $prefix .= $isLast ? "    " : "│   ";

        $childCount = count($node->children);
        foreach ($node->children as $index => $child) {
            $this->drawTree($child, $prefix, $index === $childCount - 1);
        }
    }

    // Draws the tree    
    private function getLevels3(Node $node, $level = 0, &$levels = [])
    {
        if ($node === null) return;

        $levels[$level][] = $node; // Ensure the full Node object is stored, not just $node->data

        foreach ($node->children as $child) {
            $this->getLevels3($child, $level + 1, $levels);
        }
    }

    public function drawTree3()
    {
        $levels = [];
        $this->getLevels3($this->root, 0, $levels);

        $maxWidth = 120; // Fixed width for better alignment
        $spacing = $maxWidth / 2;

        foreach ($levels as $levelIndex => $nodes) {
            // Print nodes at each level
            echo str_repeat(" ", $spacing);
            foreach ($nodes as $node) {
                echo $node->data . str_repeat(" ", $spacing * 2 - 1);
            }
            echo "\n";

            // Print connecting lines between parent and child nodes
            if ($levelIndex < count($levels) - 1) {
                echo str_repeat(" ", $spacing - 1); // Align the lines
                foreach ($nodes as $node) {
                    if (!empty($node->children)) {
                        $childCount = count($node->children);
                        foreach ($node->children as $index => $child) {
                            if ($index == 0) {
                                // echo "/";
                            } else {
                                // echo "\\";
                            }
                            echo str_repeat(" ", $spacing * 2 - 3);
                        }
                    } else {
                        echo str_repeat(" ", $spacing * 2 - 1);
                    }
                }
                echo "\n";
            }

            $spacing /= 2; // Reduce spacing for the next level to create a triangle shape
        }
    }
}

// Example Usage
$tree = new Tree(1);
$tree->root->children[] = new Node(data: 2);
$tree->root->children[] = new Node(data: 3);
$tree->root->children[0]->children[] = new Node(data: 4);
$tree->root->children[0]->children[] = new Node(data: 5);
$tree->root->children[1]->children[] = new Node(data: 6);
$tree->root->children[1]->children[] = new Node(data: 7);
//add more children
$tree->root->children[0]->children[0]->children[] = new Node(data: 8);
$tree->root->children[0]->children[0]->children[] = new Node(data: 9);
$tree->root->children[0]->children[1]->children[] = new Node(data: 10);
$tree->root->children[0]->children[1]->children[] = new Node(data: 11);
$tree->root->children[1]->children[0]->children[] = new Node(data: 12);
$tree->root->children[1]->children[0]->children[] = new Node(data: 13);
$tree->root->children[1]->children[1]->children[] = new Node(data: 14);
$tree->root->children[1]->children[1]->children[] = new Node(data: 15);
//add more children
$tree->root->children[0]->children[0]->children[0]->children[] = new Node(data: 16);
$tree->root->children[0]->children[0]->children[0]->children[] = new Node(data: 17);
$tree->root->children[0]->children[0]->children[1]->children[] = new Node(data: 18);
$tree->root->children[0]->children[0]->children[1]->children[] = new Node(data: 19);
$tree->root->children[0]->children[1]->children[0]->children[] = new Node(data: 20);
$tree->root->children[0]->children[1]->children[0]->children[] = new Node(data: 21);
$tree->root->children[0]->children[1]->children[1]->children[] = new Node(data: 22);
$tree->root->children[0]->children[1]->children[1]->children[] = new Node(data: 23);
$tree->root->children[1]->children[0]->children[0]->children[] = new Node(data: 24);
$tree->root->children[1]->children[0]->children[0]->children[] = new Node(data: 25);
$tree->root->children[1]->children[0]->children[1]->children[] = new Node(data: 26);
$tree->root->children[1]->children[0]->children[1]->children[] = new Node(data: 27);
$tree->root->children[1]->children[1]->children[0]->children[] = new Node(data: 28);
$tree->root->children[1]->children[1]->children[0]->children[] = new Node(data: 29);
$tree->root->children[1]->children[1]->children[1]->children[] = new Node(data: 30);
$tree->root->children[1]->children[1]->children[1]->children[] = new Node(data: 31);

//drow tree as comments to see the structure














echo "Preorder Traversal (Root -> Left -> Right): ";
$tree->preorderTraversal($tree->root);
echo "\n";

echo "Postorder Traversal (Left -> Right -> Root): ";
$tree->postorderTraversal($tree->root);
echo "\n";

echo "Level Order Traversal: ";
$tree->levelOrderTraversal($tree->root);
echo "\n";

echo "Depth-First Traversal: ";
$tree->depthFirstTraversal($tree->root);
echo "\n";

echo "Inorder Traversal (Left -> Root -> Right) (Binary Tree Only): ";
$tree->inorderTraversal($tree->root);
echo "\n";
$tree->drawTree($tree->root);
// $tree->drawTree($tree->root->children[0]);
// $tree->drawTree3();