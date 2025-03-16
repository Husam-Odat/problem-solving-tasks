<?php
// 234. Palindrome Linked List
// Solved
// Easy
// Topics
// Companies
// Given the head of a singly linked list, return true if it is a palindrome or false otherwise.



// Example 1:


// Input: head = [1,2,2,1]
// Output: true
// Example 2:


// Input: head = [1,2]
// Output: false


// Constraints:

// The number of nodes in the list is in the range [1, 105].
// 0 <= Node.val <= 9


// Follow up: Could you do it in O(n) time and O(1) space?
// https://leetcode.com/problems/palindrome-linked-list/description/?envType=problem-list-v2&envId=stack




/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution02
{

    /**
     * @param ListNode $head
     * @return boolean
     */
    function isPalindrome($head)
    {
        if ($head == null || $head->next == null) {
            return true;
        }

        $slow = $head;
        $fast = $head;

        // Find the middle of the list
        while ($fast->next != null && $fast->next->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        // Reverse the second half
        $secondHalf = $this->reverseList($slow->next);
        $slow->next = null; // Disconnect the first half from the second half

        // Compare the first half and the reversed second half
        $p1 = $head;
        $p2 = $secondHalf;
        $result = true;

        while ($p2 != null) {
            if ($p1->val != $p2->val) {
                $result = false;
                break;
            }
            $p1 = $p1->next;
            $p2 = $p2->next;
        }

        // Restore the original list (optional)
        $slow->next = $this->reverseList($secondHalf);

        return $result;
    }

    function reverseList($head)
    {
        $prev = null;
        $current = $head;

        while ($current != null) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        return $prev;
    }
}


//   Definition for a singly-linked list.
// class ListNode
// {
//     public $val = 0;
//     public $next = null;
//     function __construct($val = 0, $next = null)
//     {
//         $this->val = $val;
//         $this->next = $next;
//     }
// }

class Solution
{

    /**
     * @param ListNode $head
     * @return boolean
     */
    function isPalindrome($head)
    {
        $values = [];

        // Convert linked list to array
        while ($head !== null) {
            $values[] = $head->val;
            $head = $head->next;
        }

        // Check if array is a palindrome
        return $values === array_reverse($values);
    }
}


// Definition for a singly linked list node
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

// Function to convert array to linked list
function arrayToLinkedList($arr)
{
    $dummyHead = new ListNode();
    $current = $dummyHead;

    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }

    return $dummyHead->next;  // Return the head of the list
}

// Convert array [1, 2, 2, 1] to linked list
$head = arrayToLinkedList([1, 2, 2, 1]);

$solution = new Solution();
print_r($solution->isPalindrome($head)); //true
echo "\n";
$head = arrayToLinkedList([1, 2]);

print_r($solution->isPalindrome($head)); //false
echo "\n";
