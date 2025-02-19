<?php
// Source: https://www.techiedelight.com/avl-tree-implementation-php/

class AVLTreeNode
{
    public $data;
    public $left;
    public $right;
    public $height;

    public function __construct($data)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
        $this->height = 1;  // New node is initially at height 1
    }
}

class AVLTree
{
    private $root;

    public function __construct()
    {
        $this->root = null;
    }

    // Get height of node
    private function height($node)
    {
        if ($node === null) {
            return 0;
        }
        return $node->height;
    }

    // Get balance factor of node
    private function getBalance($node)
    {
        if ($node === null) {
            return 0;
        }
        return $this->height($node->left) - $this->height($node->right);
    }

    // Right rotate subtree rooted with y
    private function rightRotate($y)
    {
        $x = $y->left;
        $T2 = $x->right;

        // Perform rotation
        $x->right = $y;
        $y->left = $T2;

        // Update heights
        $y->height = max($this->height($y->left), $this->height($y->right)) + 1;
        $x->height = max($this->height($x->left), $this->height($x->right)) + 1;

        // Return new root
        return $x;
    }

    // Left rotate subtree rooted with x
    private function leftRotate($x)
    {
        $y = $x->right;
        $T2 = $y->left;

        // Perform rotation
        $y->left = $x;
        $x->right = $T2;

        // Update heights
        $x->height = max($this->height($x->left), $this->height($x->right)) + 1;
        $y->height = max($this->height($y->left), $this->height($y->right)) + 1;

        // Return new root
        return $y;
    }

    // Insert node
    public function insert($root, $key)
    {
        // Step 1: Perform normal BST insert
        if ($root === null) {
            return new AVLTreeNode($key);
        }

        if ($key < $root->data) {
            $root->left = $this->insert($root->left, $key);
        } else if ($key > $root->data) {
            $root->right = $this->insert($root->right, $key);
        } else {  // Equal keys are not allowed
            return $root;
        }

        // Step 2: Update height of this ancestor node
        $root->height = max($this->height($root->left), $this->height($root->right)) + 1;

        // Step 3: Get balance factor of this ancestor node to check whether it became unbalanced
        $balance = $this->getBalance($root);

        // If node becomes unbalanced, then there are 4 cases

        // Left Left Case
        if ($balance > 1 && $key < $root->left->data) {
            return $this->rightRotate($root);
        }

        // Right Right Case
        if ($balance < -1 && $key > $root->right->data) {
            return $this->leftRotate($root);
        }

        // Left Right Case
        if ($balance > 1 && $key > $root->left->data) {
            $root->left = $this->leftRotate($root->left);
            return $this->rightRotate($root);
        }

        // Right Left Case
        if ($balance < -1 && $key < $root->right->data) {
            $root->right = $this->rightRotate($root->right);
            return $this->leftRotate($root);
        }

        // Return the (unchanged) node pointer
        return $root;
    }

    // Delete node
    public function delete($root, $key)
    {
        // STEP 1: Perform standard BST delete
        if ($root === null) {
            return $root;
        }

        if ($key < $root->data) {
            $root->left = $this->delete($root->left, $key);
        } else if ($key > $root->data) {
            $root->right = $this->delete($root->right, $key);
        } else {
            // Node with only one child or no child
            if ($root->left === null) {
                return $root->right;
            } else if ($root->right === null) {
                return $root->left;
            }

            // Node with two children: Get the inorder successor
            $root->data = $this->minValueNode($root->right)->data;

            // Delete the inorder successor
            $root->right = $this->delete($root->right, $root->data);
        }

        // STEP 2: Update height of this ancestor node
        $root->height = max($this->height($root->left), $this->height($root->right)) + 1;

        // STEP 3: Get balance factor of this ancestor node to check whether it became unbalanced
        $balance = $this->getBalance($root);

        // If this node becomes unbalanced, then there are 4 cases

        // Left Left Case
        if ($balance > 1 && $this->getBalance($root->left) >= 0) {
            return $this->rightRotate($root);
        }

        // Right Right Case
        if ($balance < -1 && $this->getBalance($root->right) <= 0) {
            return $this->leftRotate($root);
        }

        // Left Right Case
        if ($balance > 1 && $this->getBalance($root->left) < 0) {
            $root->left = $this->leftRotate($root->left);
            return $this->rightRotate($root);
        }

        // Right Left Case
        if ($balance < -1 && $this->getBalance($root->right) > 0) {
            $root->right = $this->rightRotate($root->right);
            return $this->leftRotate($root);
        }

        return $root;
    }

    // Find node with minimum value
    private function minValueNode($node)
    {
        $current = $node;
        while ($current->left !== null) {
            $current = $current->left;
        }
        return $current;
    }

    // In-order traversal (to print tree structure)     (Left -> Root -> Right) [for binary trees]
    public function inorderTraversal($root)
    {
        if ($root === null) {
            return;
        }

        $this->inorderTraversal($root->left);
        echo $root->data . " ";
        $this->inorderTraversal($root->right);
    }


    public function drawTree($root, $level = 0, $prefix = "")
    {
        if ($root === null) {
            return;
        }

        // Print the current node with indentation
        if ($level > 0) {
            echo "\n" . str_repeat("    ", $level - 1) . $prefix . "─── " . $root->data;
        } else {
            echo $root->data;
        }

        // Recursively print the left and right children
        $this->drawTree($root->left, $level + 1, "L");
        $this->drawTree($root->right, $level + 1, "R");
    }



    // Public methods for inserting and deleting from the tree
    public function insertNode($key)
    {
        $this->root = $this->insert($this->root, $key);
    }

    public function deleteNode($key)
    {
        $this->root = $this->delete($this->root, $key);
    }

    public function showInOrder()
    {
        echo "In-order traversal (Left -> Root -> Right) [for binary trees]: ";
        $this->inorderTraversal($this->root);
        echo "\n";
    }

    public function showTree()
    {
        echo "Tree structure: \n";
        $this->drawTree($this->root);
    }
    // Assuming AVLTreeNode is the correct class for nodes in your AVL tree
    private function getLevels3(AVLTreeNode $node, $level = 0, &$levels = [])
    {
        if ($node === null) return; // Check if node is null

        // Store the full Node object at each level
        if (!isset($levels[$level])) {
            $levels[$level] = [];
        }

        $levels[$level][] = $node; // Store node at the appropriate level

        // Recurse for left and right children if they exist
        if ($node->left !== null) {
            $this->getLevels3($node->left, $level + 1, $levels);
        }

        if ($node->right !== null) {
            $this->getLevels3($node->right, $level + 1, $levels);
        }
    }
    public function drawTree3()
    {
        if ($this->root === null) {
            echo "The tree is empty.\n";
            return; // Early return if the tree is empty
        }
        $levels = [];
        $this->getLevels3($this->root, 0, $levels);

        $maxWidth = 50; // Fixed width for better alignment
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
                    if ($node->left !== null || $node->right !== null) {
                        // Draw line for the left child
                        if ($node->left !== null) {
                            // echo "/";
                        } else {
                            echo " ";
                        }

                        echo str_repeat(" ", $spacing * 2 - 3); // Adjust spacing between lines

                        // Draw line for the right child
                        if ($node->right !== null) {
                            // echo "\\";
                        } else {
                            echo " ";
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

// Example usage
$tree = new AVLTree();
$tree->insertNode(10);
$tree->insertNode(20);
$tree->insertNode(30);
$tree->insertNode(25);
$tree->insertNode(5);
$tree->showInOrder();
$tree->drawTree3();
// $tree->showTree();
echo "\n";
// $tree->drawTree1();

$tree->deleteNode(20);
$tree->showInOrder();
// $tree->showTree();
// $tree->drawTree1();
$tree->drawTree3();
echo "\n";
