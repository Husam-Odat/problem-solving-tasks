<?php
class Stack
{
    private $stack = [];

    // Push an element onto the stack
    public function push($item)
    {
        array_push($this->stack, $item);
    }

    // Pop an element from the stack
    public function pop()
    {
        if (!$this->isEmpty()) {
            return array_pop($this->stack);
        } else {
            return "Stack is empty.";
        }
    }

    // Peek at the top element
    public function peek()
    {
        return end($this->stack);
    }

    // Check if the stack is empty
    public function isEmpty()
    {
        return empty($this->stack);
    }

    // Get the current stack elements
    public function getStack()
    {
        return $this->stack;
    }
}

// Usage example
$myStack = new Stack();
$myStack->push("Apple");
$myStack->push("Banana");
$myStack->push("Cherry");

echo "Current stack: \n";
print_r($myStack->getStack());

echo "\nPopped element: " . $myStack->pop() . "\n";

echo "Peek at top element: " . $myStack->peek() . "\n";

echo "\nIs stack empty? " . ($myStack->isEmpty() ? 'Yes' : 'No') . "\n";

echo "\nStack after operations: \n";
print_r($myStack->getStack());
