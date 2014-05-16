<?php
// List array items formatted for CLI
function list_items($list)
{
    // Return string of list items separated by newlines.
    // Should be listed [KEY] Value like this:
    // [1] TODO item 1
    // [2] TODO item 2 - blah
    // DO NOT USE ECHO, USE RETURN
    return 
}

// Get STDIN, strip whitespace and newlines, 
// and convert to uppercase if $upper is true
function get_input($upper = FALSE) { 
    // Return filtered STDIN input
    if (get_input($upper = TRUE)) {
        return trim(strtoupper($upper));
    }
} 

// Create array to hold list of todo items
$items = array();
//array_unshift($items, "phoney");
//unset($items[0]);

// The loop!
do {
    // Iterate through list items
    foreach ($items as $key => $item) {
        // Display each item and a newline
        $key1 = $key++; 
        echo "[{$key}] {$item}\n";
    }

    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);

    // Check for actionable input
    if ($input == "N") {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $items[] = get_input();
    } elseif ($input == "R") {
        // Remove which item?  
        echo 'Enter item number to remove: ';
        // Get array key
        $key = get_input();
        // Remove from array
        $key--; 
        unset($items[$key]);
        // $items = array_values($items);
        // array_unshift($items, "");
        // unset($items[0]); 
    }
// Exit when input is (Q)uit
} while ($input != "Q");

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);