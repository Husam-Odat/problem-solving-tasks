<?php
class AVLNode01
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
        $this->height = 1;
    }
}

class AVLTree01
{
    // Right Rotation
    public function rightRotate($root)
    {
        $newRoot = $root->left;
        $root->left = $newRoot->right;
        $newRoot->right = $root;

        // Update heights
        $root->height = max($this->getHeight($root->left), $this->getHeight($root->right)) + 1;
        $newRoot->height = max($this->getHeight($newRoot->left), $this->getHeight($newRoot->right)) + 1;

        return $newRoot; // New root after rotation
    }

    public function getHeight($node)
    {
        return $node == null ? 0 : $node->height;
    }



    // Left Rotation
    public function leftRotate($root)
    {
        $newRoot = $root->right;
        $root->right = $newRoot->left;
        $newRoot->left = $root;

        // Update heights
        $root->height = max($this->getHeight($root->left), $this->getHeight($root->right)) + 1;
        $newRoot->height = max($this->getHeight($newRoot->left), $this->getHeight($newRoot->right)) + 1;

        return $newRoot; // New root after rotation
    }


    // Left-Right Rotation (Double Rotation)
    public function leftRightRotate($root)
    {
        $root->left = $this->leftRotate($root->left);
        return $this->rightRotate($root);
    }


    // Right-Left Rotation (Double Rotation)
    public function rightLeftRotate($root)
    {
        $root->right = $this->rightRotate($root->right);
        return $this->leftRotate($root);
    }



    // Insert a node and balance the tree
    public function insert($root, $data)
    {
        if ($root == null) {
            return new AVLNode($data);
        }

        if ($data < $root->data) {
            $root->left = $this->insert($root->left, $data);
        } else {
            $root->right = $this->insert($root->right, $data);
        }

        // Update height
        $root->height = max($this->getHeight($root->left), $this->getHeight($root->right)) + 1;

        // Check balance and perform rotations if necessary
        $balanceFactor = $this->getHeight($root->left) - $this->getHeight($root->right);

        // Left heavy situation
        if ($balanceFactor > 1) {
            if ($data < $root->left->data) {
                // Left-Left case
                return $this->rightRotate($root);
            } else {
                // Left-Right case
                return $this->leftRightRotate($root);
            }
        }

        // Right heavy situation
        if ($balanceFactor < -1) {
            if ($data > $root->right->data) {
                // Right-Right case
                return $this->leftRotate($root);
            } else {
                // Right-Left case
                return $this->rightLeftRotate($root);
            }
        }

        return $root; // Return the root if no rotation is needed
    }


    // Delete a node and balance the tree
    public function delete($root, $data)
    {
        if ($root == null) {
            return $root; // Node not found
        }

        // Perform standard BST deletion
        if ($data < $root->data) {
            $root->left = $this->delete($root->left, $data);
        } elseif ($data > $root->data) {
            $root->right = $this->delete($root->right, $data);
        } else {
            // Node with one child or no child
            if ($root->left == null || $root->right == null) {
                $temp = ($root->left) ? $root->left : $root->right;

                if ($temp == null) {
                    // No child case
                    $temp = $root;
                    $root = null;
                } else {
                    // One child case
                    $root = $temp;
                }
                unset($temp);
            } else {
                // Node with two children: Get the inorder successor (smallest in the right subtree)
                $temp = $this->getMinValueNode($root->right);
                $root->data = $temp->data;
                $root->right = $this->delete($root->right, $temp->data);
            }
        }

        // If the tree had only one node, return
        if ($root == null) {
            return $root;
        }

        // Update height
        $root->height = max($this->getHeight($root->left), $this->getHeight($root->right)) + 1;

        // Check balance factor
        $balanceFactor = $this->getHeight($root->left) - $this->getHeight($root->right);

        // Left heavy situation
        if ($balanceFactor > 1) {
            if ($this->getBalanceFactor($root->left) >= 0) {
                // Left-Left case
                return $this->rightRotate($root);
            } else {
                // Left-Right case
                $root->left = $this->leftRotate($root->left);
                return $this->rightRotate($root);
            }
        }

        // Right heavy situation
        if ($balanceFactor < -1) {
            if ($this->getBalanceFactor($root->right) <= 0) {
                // Right-Right case
                return $this->leftRotate($root);
            } else {
                // Right-Left case
                $root->right = $this->rightRotate($root->right);
                return $this->leftRotate($root);
            }
        }

        return $root;
    }

    // Get the node with the minimum value (used for deletion)
    public function getMinValueNode($node)
    {
        while ($node->left != null) {
            $node = $node->left;
        }
        return $node;
    }

    // Get the balance factor of a node
    public function getBalanceFactor($node)
    {
        if ($node == null) {
            return 0;
        }
        return $this->getHeight($node->left) - $this->getHeight($node->right);
    }

    // Preorder traversal: Root -> Left -> Right
    public function preorderTraversal($node)
    {
        if ($node != null) {
            echo $node->data . " "; // Print the root
            $this->preorderTraversal($node->left); // Visit left subtree
            $this->preorderTraversal($node->right); // Visit right subtree
        }
    }


    // Draw the tree
    public function drawTree()
    {
        if ($this->root === null) {
            echo "Tree is empty\n";
            return;
        }

        $levels = [];
        $this->getLevels($this->root, 0, $levels);

        $maxWidth = 64; // Fixed width for better alignment
        $spacing = $maxWidth / 2;

        foreach ($levels as $levelIndex => $nodes) {
            // Print nodes at each level
            echo str_repeat(" ", $spacing);
            foreach ($nodes as $node) {
                echo ($node ? $node->data : " ") . str_repeat(" ", $spacing * 2 - 1);
            }
            echo "\n";

            // Print connecting lines between parent and child nodes
            if ($levelIndex < count($levels) - 1) {
                echo str_repeat(" ", $spacing - 1);
                foreach ($nodes as $node) {
                    if ($node !== null) {
                        echo ($node->left ? "/" : " ") . str_repeat(" ", $spacing * 2 - 3) . ($node->right ? "\\" : " ");
                    } else {
                        echo str_repeat(" ", $spacing * 2 - 1);
                    }
                }
                echo "\n";
            }

            $spacing /= 2; // Reduce spacing for the next level to create a triangle shape
        }
    }

    private function getLevels($node, $level, &$levels)
    {
        if ($node === null) {
            $levels[$level][] = null;
            return;
        }

        $levels[$level][] = $node;

        $this->getLevels($node->left, $level + 1, $levels);
        $this->getLevels($node->right, $level + 1, $levels);
    }
}
class AVLNode
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
        $this->height = 1;
    }
}

class AVLTree
{

    public $root;

    public function __construct()
    {
        $this->root = null;
    }
    // Right Rotation
    public function rightRotate($root)
    {
        $newRoot = $root->left;
        $root->left = $newRoot->right;
        $newRoot->right = $root;

        // Update heights
        $root->height = max($this->getHeight($root->left), $this->getHeight($root->right)) + 1;
        $newRoot->height = max($this->getHeight($newRoot->left), $this->getHeight($newRoot->right)) + 1;

        return $newRoot; // New root after rotation
    }

    public function getHeight($node)
    {
        return $node == null ? 0 : $node->height;
    }

    // Left Rotation
    public function leftRotate($root)
    {
        $newRoot = $root->right;
        $root->right = $newRoot->left;
        $newRoot->left = $root;

        // Update heights
        $root->height = max($this->getHeight($root->left), $this->getHeight($root->right)) + 1;
        $newRoot->height = max($this->getHeight($newRoot->left), $this->getHeight($newRoot->right)) + 1;

        return $newRoot; // New root after rotation
    }

    // Left-Right Rotation (Double Rotation)
    public function leftRightRotate($root)
    {
        $root->left = $this->leftRotate($root->left);
        return $this->rightRotate($root);
    }

    // Right-Left Rotation (Double Rotation)
    public function rightLeftRotate($root)
    {
        $root->right = $this->rightRotate($root->right);
        return $this->leftRotate($root);
    }

    // Insert a node and balance the tree
    public function insert($root, $data)
    {
        if ($root == null) {
            return new AVLNode($data);
        }

        if ($data < $root->data) {
            $root->left = $this->insert($root->left, $data);
        } else {
            $root->right = $this->insert($root->right, $data);
        }

        // Update height
        $root->height = max($this->getHeight($root->left), $this->getHeight($root->right)) + 1;

        // Check balance and perform rotations if necessary
        $balanceFactor = $this->getHeight($root->left) - $this->getHeight($root->right);

        // Left heavy situation
        if ($balanceFactor > 1) {
            if ($data < $root->left->data) {
                // Left-Left case
                return $this->rightRotate($root);
            } else {
                // Left-Right case
                return $this->leftRightRotate($root);
            }
        }

        // Right heavy situation
        if ($balanceFactor < -1) {
            if ($data > $root->right->data) {
                // Right-Right case
                return $this->leftRotate($root);
            } else {
                // Right-Left case
                return $this->rightLeftRotate($root);
            }
        }

        return $root; // Return the root if no rotation is needed
    }

    // Delete a node and balance the tree
    public function delete($root, $data)
    {
        if ($root == null) {
            return $root; // Node not found
        }

        // Perform standard BST deletion
        if ($data < $root->data) {
            $root->left = $this->delete($root->left, $data);
        } elseif ($data > $root->data) {
            $root->right = $this->delete($root->right, $data);
        } else {
            // Node with one child or no child
            if ($root->left == null || $root->right == null) {
                $temp = ($root->left) ? $root->left : $root->right;

                if ($temp == null) {
                    // No child case
                    $temp = $root;
                    $root = null;
                } else {
                    // One child case
                    $root = $temp;
                }
                unset($temp);
            } else {
                // Node with two children: Get the inorder successor (smallest in the right subtree)
                $temp = $this->getMinValueNode($root->right);
                $root->data = $temp->data;
                $root->right = $this->delete($root->right, $temp->data);
            }
        }

        // If the tree had only one node, return
        if ($root == null) {
            return $root;
        }

        // Update height
        $root->height = max($this->getHeight($root->left), $this->getHeight($root->right)) + 1;

        // Check balance factor
        $balanceFactor = $this->getHeight($root->left) - $this->getHeight($root->right);

        // Left heavy situation
        if ($balanceFactor > 1) {
            if ($this->getBalanceFactor($root->left) >= 0) {
                // Left-Left case
                return $this->rightRotate($root);
            } else {
                // Left-Right case
                $root->left = $this->leftRotate($root->left);
                return $this->rightRotate($root);
            }
        }

        // Right heavy situation
        if ($balanceFactor < -1) {
            if ($this->getBalanceFactor($root->right) <= 0) {
                // Right-Right case
                return $this->leftRotate($root);
            } else {
                // Right-Left case
                $root->right = $this->rightRotate($root->right);
                return $this->leftRotate($root);
            }
        }

        return $root;
    }

    // Get the node with the minimum value (used for deletion)
    public function getMinValueNode($node)
    {
        while ($node->left != null) {
            $node = $node->left;
        }
        return $node;
    }

    // Get the balance factor of a node
    public function getBalanceFactor($node)
    {
        if ($node == null) {
            return 0;
        }
        return $this->getHeight($node->left) - $this->getHeight($node->right);
    }

    // Preorder traversal: Root -> Left -> Right
    public function preorderTraversal($node)
    {
        if ($node != null) {
            echo $node->data . " "; // Print the root
            $this->preorderTraversal($node->left); // Visit left subtree
            $this->preorderTraversal($node->right); // Visit right subtree
        }
    }

    // Draw the tree
    public function drawTree()
    {
        // if ($this->root === null) {
        //     echo "Tree is empty\n";
        //     return;
        // }

        $levels = [];
        $this->getLevels($this->root, 0, $levels);

        $maxWidth = 64; // Fixed width for better alignment
        $spacing = $maxWidth / 2;

        foreach ($levels as $levelIndex => $nodes) {
            // Print nodes at each level
            echo str_repeat(" ", $spacing);
            foreach ($nodes as $node) {
                echo ($node ? $node->data : " ") . str_repeat(" ", $spacing * 2 - 1);
            }
            echo "\n";

            // Print connecting lines between parent and child nodes
            if ($levelIndex < count($levels) - 1) {
                echo str_repeat(" ", $spacing - 1);
                foreach ($nodes as $node) {
                    if ($node !== null) {
                        echo ($node->left ? "/" : " ") . str_repeat(" ", $spacing * 2 - 3) . ($node->right ? "\\" : " ");
                    } else {
                        echo str_repeat(" ", $spacing * 2 - 1);
                    }
                }
                echo "\n";
            }

            $spacing /= 2; // Reduce spacing for the next level to create a triangle shape
        }
    }

    private function getLevels($node, $level, &$levels)
    {
        if ($node === null) {
            $levels[$level][] = null;
            return;
        }

        $levels[$level][] = $node;

        $this->getLevels($node->left, $level + 1, $levels);
        $this->getLevels($node->right, $level + 1, $levels);
    }
}

$tree = new AVLTree();
$root = 1;

$root = $tree->insert($root, 30);
$root = $tree->insert($root, 20);
$root = $tree->insert($root, 40);
$root = $tree->insert($root, 10);
$root = $tree->insert($root, 25);
$root = $tree->insert($root, 35);
$root = $tree->insert($root, 50);

echo "Tree before deletion: ";
$tree->preorderTraversal($root); // Output: 30 20 10 25 40 35 50

$root = $tree->delete($root, 40);

echo "\nTree after deleting 40: ";
$tree->preorderTraversal($root); // Output: 30 20 10 25 50 35

$tree->drawTree();


// $tree = new AVLTree01();
// $root = null;

// $root = $tree->insert($root, 30);
// $root = $tree->insert($root, 20);
// $root = $tree->insert($root, 40);
// $root = $tree->insert($root, 10);
// $root = $tree->insert($root, 25);
// $root = $tree->insert($root, 35);
// $root = $tree->insert($root, 50);

// echo "Tree before deletion: ";
// $tree->preorderTraversal($root); // Output: 30 20 10 25 40 35 50

// $root = $tree->delete($root, 40);

// echo "\nTree after deleting 40: ";
// $tree->preorderTraversal($root); // Output: 30 20 10 25 50 35

// $tree->drawTree();