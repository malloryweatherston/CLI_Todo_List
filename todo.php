<?php
// Create array to hold list of todo items
$items = array();
// List array items formatted for CLI
// Return string of list items separated by newlines.
    // Should be listed [KEY] Value like this:
    // [1] TODO item 1
    // [2] TODO item 2 - blah
    // DO NOT USE ECHO, USE RETURN
// function list_items($list) {
//     $result = '';
//     foreach ($list as $key => $value) { 
//         $result .= "[" . ($key + 1) . "]" $value . PHP_EOL;
//     } 
//     return $result; 
// }

function list_items($list) {
    $result = '';
    foreach ($list as $key => $value) { 
        $result .= "[" . ($key + 1) . "]" . " " . $value . PHP_EOL;
    } 
    return $result; 
}
 


// Get STDIN, strip whitespace and newlines, 
// and convert to uppercase if $upper is true
// Return filtered STDIN input
function get_input($upper = false) { 
    $result = trim(fgets(STDIN)); 
    return $upper ? strtoupper($result) : $result;
} 

function sort_menu($A) { 
    echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered : '; 
    $input = get_input(TRUE); 
    
    switch($input) {
        case "A" : 
            asort($A);
            break;
        case "Z" : 
            arsort($A);
            break;
        case "O" : 
            ksort($A);
            break;
        case "R" : 
            krsort($A);
            break;
    }  
    return $A; 

} 

function beginning_or_end($items) {
    echo "Enter item: \n";
    $input = get_input(TRUE);

    //$items[] = get_input();
     echo "Do you want to add the new item to the beginning or end of the list? Enter (B) for beginning or (E) for end: \n";
         //$items[] = get_input();   
        //$input = get_input(TRUE);

    $new_item = get_input(TRUE);

    if ($new_item == "B") {
        echo array_unshift($items, $input);
    } else {
        echo array_push($items, $input); 


    // switch($input) {
    //     case "B":
    //         array_unshift($items, $new_item);
    //         break;
    //     case "E":
    //         array_push($items, $new_item);
    //         break;

    }
    return ($items);
}


//print_r(sort_menu($items)); 


// The loop!
do {
    // Iterate through list items
    // foreach ($items as $key => $item) {
    //     // Display each item and a newline
    //     $key++; 
    //     echo "[{$key}] {$item}\n";
    // }

    
    echo list_items($items);
    // Show the menu options
    echo '(N)ew item, (R)emove item, (S)ort, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);

    // Check for actionable input
    if ($input == "N") {
        // Ask for entry
        $items = beginning_or_end($items);
        //$items = beginning_or_end($items);
        //echo 'Enter item: ';
        // Add entry to list array
        //$items[] = get_input();
        // echo "Do you want to add the new item to the beginning or end of the list?\n
        // Enter (B) for beginning or (E) for end: \n";
        //$items[] = get_input();
        //$items = beginning_or_end($items);
    //     echo "Do you want to add the new item to the beginning or end of the list?\n
    //     Enter (B) for beginning or (E) for end: \n";

    // $input = get_input(TRUE); 

    //$new_item = get_input();
    
    // switch($input) {
    //     case "B":
    //         array_unshift($items, $new_item);
    //         break;
    //     case "E":
    //         array_push($items, $new_item);
    //         break;
    //     }

    } elseif ($input == "R") {
        // Remove which item?  
        echo 'Enter item number to remove: ';
        // Get array key
        $key = (get_input()) - 1;
        // Remove from array 
        unset($items[$key - 1]); 
        //$items = array_values($items);
    } elseif ($input == "S") {  
        
        $items = sort_menu($items);
       


    } elseif ($input == "F") {
        array_shift($items); 
    } elseif ($input == "L") {
        array_pop($items); 
    }
// Exit when input is (Q)uit
} while ($input != "Q");

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);