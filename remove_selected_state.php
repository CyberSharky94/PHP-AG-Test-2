<?php

    include('connection.php');
    include('debugger.php');

    if(isset($_POST['selected_state']))
    {
        $id_selected_state = $_POST['selected_state'];
        
        $remove_selected_state_sql = "DELETE FROM selected_states WHERE id = '".$id_selected_state."'";
        $result = mysqli_query($conn, $remove_selected_state_sql);

        if($result)
        {
            echo json_encode("success");
        }
    }

?>