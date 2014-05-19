<?php
// Create array to hold list of todo items
$items = array();
// List array items formatted for CLI
// Return string of list items separated by newlines.
    // Should be listed [KEY] Value like this:
    // [1] TODO item 1
    // [2] TODO item 2 - blah
    // DO NOT USE ECHO, USE RETURN
function list_items($list) {
    $result = '';
    foreach ($list as $key => $value) { 
        $result .= "[" . ($key + 1) . "] $value .  PHP_EOL";
    } 
    return $result; 
}
echo list_items($items); 


// Get STDIN, strip whitespace and newlines, 
// and convert to uppercase if $upper is true
// Return filtered STDIN input
function get_input($upper = false) { 
    $result = trim(fgets(STDIN)); 
    return $upper ? strtoupper($result) : $result;
} 

function sort_menu() {

}



// The loop!
do {
    // Iterate through list items
    foreach ($items as $key => $item) {
        // Display each item and a newline
        $key++; 
        echo "[{$key}] {$item}\n";
    }

    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit, (S)ort : ';

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
        unset($items[$key - 1]); 
        $items = array_values($items);
    } elseif ($input == "S") {
        echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered : '; 
        $input = get_input(TRUE); 

    }
// Exit when input is (Q)uit
} while ($input != "Q");

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);