<?php

    include('connection.php');
    include('debugger.php');

    if(isset($_POST['state']))
    {
        $state = $_POST['state'];
        
        $add_state_sql = "INSERT INTO selected_states (id_state) VALUES ('".$state."')";
        $result = mysqli_query($conn, $add_state_sql);

        if($result)
        {
            echo json_encode("success");
        }
    }

?>