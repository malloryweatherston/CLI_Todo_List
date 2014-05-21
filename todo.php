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
    $input = get_input(false);

     echo "Do you want to add the new item to the beginning or end of the list? Enter (B) for beginning or (E) for end: \n";
       

    $new_item = get_input(TRUE);

    if ($new_item == "B") {
        echo array_unshift($items, $input);
    } else {
        echo array_push($items, $input); 
    }
    return ($items);
}

function add_file($items) {
     echo "Enter the file path you want to add: \n";
    $filename = get_input(TRUE);
    $filesize = filesize($filename);
    $read = fopen($filename, "r"); 
    $string_list = trim(fread($read, $filesize));
    $list_array = explode("\n", $string_list);
    $output = array_merge($items, $list_array);
    fclose($read);
    return ($output);
}

function save_file($items) {
    echo "Enter the file path you want to save: \n";
    $filename = get_input();
    
    if (file_exists($filename)) {
        echo "The file $filename exists, do you want to overwrite the file? Enter Yes or No\n";
     
        $input = get_input(true);
    
        if ($input == "YES") {
            $handle = fopen($filename, 'w');
            foreach ($items as $item) {
                fwrite($handle, $item . PHP_EOL);
            } 
            echo "Save was successful\n";
            fclose($handle);
        
        }
    }
} 



// The loop!
do {
    // Iterate through list items
    
    echo list_items($items);
    // Show the menu options
    echo '(N)ew item, (R)emove item, (S)ort, (O)pen, s(A)ve, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);

    // Check for actionable input
    if ($input == "N") {
        $items = beginning_or_end($items);

    } elseif ($input == "R") {
        // Remove which item?  
        echo 'Enter item number to remove: ';
        // Get array key
        $key = (get_input());
        // Remove from array 
        unset($items[$key - 1]); 
        
    } elseif ($input == "S") {  
        $items = sort_menu($items);

    } elseif ($input == "F") {
        array_shift($items); 

    } elseif ($input == "L") {
        array_pop($items);

    } elseif ($input == "O") {
        $items = add_file($items);
    
    } elseif ($input == "A") {
        save_file($items);
    }
// Exit when input is (Q)uit
} while ($input != "Q");

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);
