<?php
// 1779. Find Nearest Point That Has the Same X or Y Coordinate
// Solved
// Easy
// Topics
// Companies
// Hint
// You are given two integers, x and y, which represent your current location on a Cartesian grid: (x, y). You are also given an array points where each points[i] = [ai, bi] represents that a point exists at (ai, bi). A point is valid if it shares the same x-coordinate or the same y-coordinate as your location.

// Return the index (0-indexed) of the valid point with the smallest Manhattan distance from your current location. If there are multiple, return the valid point with the smallest index. If there are no valid points, return -1.

// The Manhattan distance between two points (x1, y1) and (x2, y2) is abs(x1 - x2) + abs(y1 - y2).



// Example 1:

// Input: x = 3, y = 4, points = [[1,2],[3,1],[2,4],[2,3],[4,4]]
// Output: 2
// Explanation: Of all the points, only [3,1], [2,4] and [4,4] are valid. Of the valid points, [2,4] and [4,4] have the smallest Manhattan distance from your current location, with a distance of 1. [2,4] has the smallest index, so return 2.
// Example 2:

// Input: x = 3, y = 4, points = [[3,4]]
// Output: 0
// Explanation: The answer is allowed to be on the same location as your current location.
// Example 3:

// Input: x = 3, y = 4, points = [[2,3]]
// Output: -1
// Explanation: There are no valid points.


// Constraints:

// 1 <= points.length <= 104
// points[i].length == 2
// 1 <= x, y, ai, bi <= 104
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 123K
// Submissions
// 177.9K
// Acceptance Rate
// 69.1%
// Topics
// Companies
// Hint 1
// Iterate through each point, and keep track of the current point with the smallest Manhattan distance from your current location.


class Solution001
{

    /**
     * @param integer $x
     * @param integer $y
     * @param integer[][] $points
     * @return integer
     */
    function nearestValidPoint($x, $y, $points)
    {
        $min = PHP_INT_MAX;
        $index = -1;
        for ($i = 0; $i < count($points); $i++) {
            $point = $points[$i];
            if ($point[0] == $x || $point[1] == $y) {
                $distance = abs($point[0] - $x) + abs($point[1] - $y);
                if ($distance < $min) {
                    $min = $distance;
                    $index = $i;
                }
            }
        }
        return $index;
    }
}
class Solution002
{

    /**
     * @param integer $x
     * @param integer $y
     * @param integer[][] $points
     * @return integer
     */
    function nearestValidPoint($x, $y, $points)
    {
        $disarr = [];

        foreach ($points as $key => $value) {
            if ($x == $value[0] || $y == $value[1]) {
                $disarr[$key] = abs($x - $value[0]) + abs($y - $value[1]);
            }
        }

        // If no valid points are found, return -1
        if (empty($disarr)) {
            return -1;
        }
        print_r($disarr);
        // Find the index of the minimum distance
        return array_search(min($disarr), $disarr);
        // return $disarr[min($disarr)];
        //  return array_key_exists(min($disarr), $disarr) ? $minIndex : -1;
    }
}
class Solution002ch
{

    /**
     * @param integer $x
     * @param integer $y
     * @param integer[][] $points
     * @return integer
     */
    function nearestValidPoint($x, $y, $points)
    {
        $disarr = [];

        foreach ($points as $key => $value) {
            if ($x == $value[0] || $y == $value[1]) {
                $disarr[$key] = abs($x - $value[0]) + abs($y - $value[1]);
            }
        }

        // If no valid points are found, return -1
        if (empty($disarr)) {
            return -1;
        }
        // Find the minimum distance
        $minDis = min($disarr);

        // Find the index of the first occurrence of the minimum distance
        foreach ($disarr as $key => $value) {
            if ($value == $minDis) {
                return $key;
            }
        }

        return -1; // Fallback case (should never be reached)
    }
}
class Solution0021
{

    /**
     * @param integer $x
     * @param integer $y
     * @param integer[][] $points
     * @return integer
     */
    function nearestValidPoint($x, $y, $points)
    {
        $disarr = [];

        foreach ($points as $key => $value) {
            if ($x == $value[0] || $y == $value[1]) {
                // $disarr[$key] = abs($x - $value[0]) + abs($y - $value[1]);
                if (!isset($disarr[abs($x - $value[0]) + abs($y - $value[1])])) {

                    $disarr[abs($x - $value[0]) + abs($y - $value[1])] = $key;
                }
            }
        }

        // If no valid points are found, return -1
        if (empty($disarr)) {
            return -1;
        }
        print_r($disarr);
        // Find the index of the minimum distance
        // return array_search(min($disarr), $disarr);
        return $disarr[min($disarr)];
        //  return array_key_exists(min($disarr), $disarr) ? $minIndex : -1;
    }
}
class Solution003
{

    /**
     * @param integer $x
     * @param integer $y
     * @param integer[][] $points
     * @return integer
     */
    function nearestValidPoint($x, $y, $points)
    {
        $minDistance = 0;
        $index = -1;

        foreach ($points as $i => $point) {
            if ($x === $point[0] || $y === $point[1]) {
                $distance = abs($x - $point[0]) + abs($y - $point[1]);

                if ($index === -1 || $distance < $minDistance) {
                    $minDistance = $distance;
                    $index = $i;
                }
            }
        }

        return $index;
    }
}




// Create an instance of the Solution class
$sol = new Solution002();

// Define test cases
$testCases = [
    [
        "x" => 3,
        "y" => 4,
        "points" => [[1, 2], [3, 1], [2, 4], [2, 3], [4, 4]],
        "expected" => 2
    ],
    [
        "x" => 3,
        "y" => 4,
        "points" => [[3, 4]],
        "expected" => 0
    ],
    [
        "x" => 3,
        "y" => 4,
        "points" => [[2, 3]],
        "expected" => -1
    ]
];

// Run tests
foreach ($testCases as $i => $testCase) {
    $output = $sol->nearestValidPoint($testCase["x"], $testCase["y"], $testCase["points"]);
    echo "Test Case " . ($i + 1) . ": Expected " . $testCase["expected"] . ", Got " . $output . " -> " . ($output === $testCase["expected"] ? "✅ Passed" : "❌ Failed") . "\n";
}
