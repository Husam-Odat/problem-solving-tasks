<?php
// 1475. Final Prices With a Special Discount in a Shop
// Easy
// Topics
// Companies
// Hint
// You are given an integer array prices where prices[i] is the price of the ith item in a shop.

// There is a special discount for items in the shop. If you buy the ith item, then you will receive a discount equivalent to prices[j] where j is the minimum index such that j > i and prices[j] <= prices[i]. Otherwise, you will not receive any discount at all.

// Return an integer array answer where answer[i] is the final price you will pay for the ith item of the shop, considering the special discount.



// Example 1:

// Input: prices = [8,4,6,2,3]
// Output: [4,2,4,2,3]
// Explanation: 
// For item 0 with price[0]=8 you will receive a discount equivalent to prices[1]=4, therefore, the final price you will pay is 8 - 4 = 4.
// For item 1 with price[1]=4 you will receive a discount equivalent to prices[3]=2, therefore, the final price you will pay is 4 - 2 = 2.
// For item 2 with price[2]=6 you will receive a discount equivalent to prices[3]=2, therefore, the final price you will pay is 6 - 2 = 4.
// For items 3 and 4 you will not receive any discount at all.
// Example 2:

// Input: prices = [1,2,3,4,5]
// Output: [1,2,3,4,5]
// Explanation: In this case, for all items, you will not receive any discount at all.
// Example 3:

// Input: prices = [10,1,1,6]
// Output: [9,0,1,6]


// Constraints:

// 1 <= prices.length <= 500
// 1 <= prices[i] <= 1000
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 305.9K
// Submissions
// 367.7K
// Acceptance Rate
// 83.2%
// Topics
// Companies
// Hint 1
// Use brute force: For the ith item in the shop with a loop find the first position j satisfying the conditions and apply the discount, otherwise, the discount is 0.

class Solution
{

    /**
     * @param integer[] $prices
     * @return integer[]
     */
    function finalPrices($prices)
    {
        $n = count($prices);
        $ans = array();

        for ($i = 0; $i < $n; $i++) {
            $discount = 0;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($prices[$j] <= $prices[$i]) {
                    $discount = $prices[$j];
                    break;
                }
            }
            $ans[] = $prices[$i] - $discount;
        }

        return $ans;
    }
}

//add test casess 
$solution = new Solution();
echo implode(',', $solution->finalPrices([8, 4, 6, 2, 3])) . "\n"; // Output: [4,2,4,2,3]
echo implode(',', $solution->finalPrices([1, 2, 3, 4, 5])) . "\n"; // Output: [1,2,3,4,5]
echo implode(',', $solution->finalPrices([10, 1, 1, 6])) . "\n"; // Output: [9,0,1,6]
// Complexity Analysis
// Time complexity: O(n^2) where n is the length of prices.
// Space complexity: O(n) where n is the length of prices.
// The time complexity is O(n^2) because for each item i, we are iterating over the remaining items to find the first item with a price less than or equal to prices[i].
// The space complexity is O(n) because we are using an array to store the final prices of the items.
// The above solution is not efficient as it has a time complexity of O(n^2) where n is the length of prices. We can optimize the solution to have a time complexity of O(n) using a stack.
// 1475. Final Prices With a Special Discount in a Shop