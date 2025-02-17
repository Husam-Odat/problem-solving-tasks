<?php
// 225. Implement Stack using Queues
// https://leetcode.com/problems/implement-stack-using-queues/description/
// Solved
// Easy
// Topics
// Companies
// Implement a last-in-first-out (LIFO) stack using only two queues. The implemented stack should support all the functions
// of a normal stack (push, top, pop, and empty).

// Implement the MyStack class:

// void push(int x) Pushes element x to the top of the stack.
// int pop() Removes the element on the top of the stack and returns it.
// int top() Returns the element on the top of the stack.
// boolean empty() Returns true if the stack is empty, false otherwise.
// Notes:

// You must use only standard operations of a queue, which means that only push to back, peek/pop from front, size and is
// empty operations are valid.
// Depending on your language, the queue may not be supported natively. You may simulate a queue using a list or deque
// (double-ended queue) as long as you use only a queue's standard operations.


// Example 1:

// Input
// ["MyStack", "push", "push", "top", "pop", "empty"]
// [[], [1], [2], [], [], []]
// Output
// [null, null, null, 2, 2, false]

// Explanation
// MyStack myStack = new MyStack();
// myStack.push(1);
// myStack.push(2);
// myStack.top(); // return 2
// myStack.pop(); // return 2
// myStack.empty(); // return False


// Constraints:

// 1 <= x <=9 At most 100 calls will be made to push, pop, top, and empty. All the calls to pop and top are valid.
//     Follow-up: Can you implement the stack using only one queue? 

class MyStack
{
    private $q1;
    private $q2;

    function __construct()
    {
        $this->q1 = [];
        $this->q2 = [];
    }

    function push(int $x)
    {
        array_push($this->q2, $x);

        while (!empty($this->q1)) {
            array_push($this->q2, array_shift($this->q1));
        }

        $temp = $this->q1;
        $this->q1 = $this->q2;
        $this->q2 = $temp;
    }

    function pop()
    {
        return array_shift($this->q1);
    }

    function top()
    {
        return reset($this->q1);
    }

    function empty()
    {
        return empty($this->q1);
    }
}

$operations = ["MyStack", "push", "push", "top", "pop", "empty"];
$values = [[], [1], [2], [], [], []];

$stack = null;
$result = [];

foreach ($operations as $index => $operation) {
    switch ($operation) {
        case "MyStack":
            $stack = new MyStack();
            $result[] = null;
            break;
        case "push":
            $stack->push($values[$index][0]);
            $result[] = null;
            break;
        case "top":
            $result[] = $stack->top();
            break;
        case "pop":
            $result[] = $stack->pop();
            break;
        case "empty":
            $result[] = $stack->empty();
            break;
    }
}

print_r($result);
