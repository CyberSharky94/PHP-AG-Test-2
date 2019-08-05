<?php

    include('connection.php');
    include('debugger.php');

    // Fetch list
    $sql_dropdown = "SELECT s.id, s.state FROM states s LEFT JOIN selected_states ss ON s.id = ss.id_state WHERE ss.id_state IS NULL";
    $result = mysqli_query($conn, $sql_dropdown);
    $state_list = mysqli_fetch_all($result, MYSQLI_BOTH);

    // Prepare list in HTML
    if(!empty($state_list))
    {
        $state_list_item = '<option value="" selected disabled>SILA PILIH...</option>';
        foreach ($state_list as $sl_key => $sl_val) {
            $state_list_item .= '<option id="state_item_' .$sl_val['id']. '" value="' .$sl_val['id']. '">' .$sl_val['state']. '</option>';            
        }
    } else {
        $state_list_item = '<option value="" selected disabled>Tiada Pilihan Negeri...</option>';
    }
    $output['state_list_item'] = $state_list_item;

    // Fetch selected List
    $sql_selected = "SELECT ss.id AS id_selected, s.state FROM selected_states ss JOIN states s ON ss.id_state = s.id";
    $result = mysqli_query($conn, $sql_selected);
    $selected_state_list = mysqli_fetch_all($result, MYSQLI_BOTH);

    // Prepare selected list in HTML
    if(!empty($selected_state_list))
    {
        $selected_state_list_item = '';
        foreach ($selected_state_list as $ssl_key => $ssl_val) {
            $selected_state_list_item .= '<option id="selected_state_item_'. $ssl_val['id_selected'] .'" value="'. $ssl_val['id_selected'] .'">'. $ssl_val['state'] .'</option>';
        }
    } else {
        $selected_state_list_item = '<option id="selected_no_value" value="" disabled>Tiada negeri dalam senarai...</option>';
    }
    $output['selected_state_list_item'] = $selected_state_list_item;

    echo json_encode($output);
?>