<?php

class Node
{
    public $data;
    public $left;
    public $right;

    public function __construct($data)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree
{
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    // Insert a new node into the BST
    public function insert($data)
    {
        $this->root = $this->_insert($this->root, $data);
    }

    private function _insert($node, $data)
    {
        if ($node === null) {
            return new Node($data);
        }

        if ($data < $node->data) {
            $node->left = $this->_insert($node->left, $data);
        } else {
            $node->right = $this->_insert($node->right, $data);
        }

        return $node;
    }

    // Search for a node in the BST
    public function search($data)
    {
        return $this->_search($this->root, $data);
    }

    private function _search($node, $data)
    {
        if ($node === null || $node->data === $data) {
            return $node;
        }

        if ($data < $node->data) {
            return $this->_search($node->left, $data);
        }

        return $this->_search($node->right, $data);
    }

    // In-order traversal to display the tree data
    // Inorder Traversal (Left -> Root -> Right) [for binary trees]
    public function inorder()
    {
        $this->_inorder($this->root);
    }

    private function _inorder($node)
    {
        if ($node !== null) {
            $this->_inorder($node->left);
            echo $node->data . " ";
            $this->_inorder($node->right);
        }
    }

    // Pre-order traversal (Root -> Left -> Right)
    public function preorder()
    {
        $this->_preorder($this->root);
    }

    private function _preorder($node)
    {
        if ($node !== null) {
            echo $node->data . " ";
            $this->_preorder($node->left);
            $this->_preorder($node->right);
        }
    }

    // Post-order traversal (Left -> Right -> Root)
    public function postorder()
    {
        $this->_postorder($this->root);
    }

    private function _postorder($node)
    {
        if ($node !== null) {
            $this->_postorder($node->left);
            $this->_postorder($node->right);
            echo $node->data . " ";
        }
    }

    // Depth-First Traversal (Similar to Preorder)
    public function depthFirst()
    {
        $this->_depthFirst($this->root);
    }

    private function _depthFirst($node)
    {
        if ($node !== null) {
            echo $node->data . " ";
            $this->_depthFirst($node->left);
            $this->_depthFirst($node->right);
        }
    }

    // Level-order Traversal (Breadth-First)
    public function levelOrder()
    {
        if ($this->root === null) {
            return;
        }

        $queue = [];
        array_push($queue, $this->root);

        while (!empty($queue)) {
            $node = array_shift($queue);
            echo $node->data . " ";

            if ($node->left !== null) {
                array_push($queue, $node->left);
            }

            if ($node->right !== null) {
                array_push($queue, $node->right);
            }
        }
    }

    // Delete a node from the BST
    public function delete($data)
    {
        $this->root = $this->_delete($this->root, $data);
    }

    private function _delete($node, $data)
    {
        if ($node === null) {
            return $node;
        }

        if ($data < $node->data) {
            $node->left = $this->_delete($node->left, $data);
        } elseif ($data > $node->data) {
            $node->right = $this->_delete($node->right, $data);
        } else {
            // Node to be deleted found
            if ($node->left === null) {
                return $node->right;  // If no left child, return the right child
            } elseif ($node->right === null) {
                return $node->left;   // If no right child, return the left child
            }

            // Node has two children: Get the inorder successor (smallest in the right subtree)
            $node->data = $this->_minValueNode($node->right)->data;

            // Delete the inorder successor
            $node->right = $this->_delete($node->right, $node->data);
        }

        return $node;
    }

    private function _minValueNode($node)
    {
        $current = $node;
        while ($current->left !== null) {
            $current = $current->left;
        }

        return $current;
    }

    // Draw the tree in a visual format
    public function draw()
    {
        $this->_draw($this->root, "", true);
    }

    private function _draw($node, $prefix, $isLeft)
    {
        if ($node !== null) {
            echo $prefix . ($isLeft ? "├── " : "└── ") . $node->data . "\n";
            $this->_draw($node->left, $prefix . ($isLeft ? "│   " : "    "), true);
            $this->_draw($node->right, $prefix . ($isLeft ? "│   " : "    "), false);
        }
    }
}

// Example usage:
$bst = new BinarySearchTree();
$bst->insert(30);
$bst->insert(20);
$bst->insert(40);
$bst->insert(10);
$bst->insert(25);
$bst->insert(35);
$bst->insert(50);

// In-order traversal
echo "In-order traversal (Left -> Root -> Right) [for binary trees]: ";
$bst->inorder();  // Output: 10 20 25 30 35 40 50
echo "\n";

// Pre-order traversal
echo "Pre-order traversal (Root -> Left -> Right): ";
$bst->preorder();  // Output: 30 20 10 25 40 35 50
echo "\n";

// Post-order traversal
echo "Post-order traversal (Left -> Right -> Root): ";
$bst->postorder();  // Output: 10 25 20 35 50 40 30
echo "\n";

// Depth-First traversal
echo "Depth-First traversal (Similar to Preorder): ";
$bst->depthFirst();  // Output: 30 20 10 25 40 35 50
echo "\n";

// Level-order traversal
echo "Level-order traversal (Breadth First): ";
$bst->levelOrder();  // Output: 30 20 40 10 25 35 50
echo "\n";

// Delete a node
$bst->delete(20);  // Delete node with value 20
echo "In-order traversal after deletion of 20: ";
$bst->inorder();  // Output: 10 25 30 35 40 50
echo "\n";

// Draw the tree
echo "Tree structure:\n";
$bst->draw();  // Display the tree structure