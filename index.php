<?php

    include("connection.php");
    include("debugger.php");
    
    // Fetch list
    $sql_dropdown = "SELECT s.id, s.state FROM states s LEFT JOIN selected_states ss ON s.id = ss.id_state WHERE ss.id_state IS NULL";
    $result = mysqli_query($conn, $sql_dropdown);
    $state_list = mysqli_fetch_all($result, MYSQLI_BOTH);

    // Selected List
    $sql_selected = "SELECT ss.id AS id_selected, s.state FROM selected_states ss JOIN states s ON ss.id_state = s.id";
    $result = mysqli_query($conn, $sql_selected);
    $selected_state_list = mysqli_fetch_all($result, MYSQLI_BOTH);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test 2</title>

    <!-- Bootstrap 3 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

    <form class="form-horizontal">
        <fieldset>
            <legend>Pemilihan Negeri</legend>

            <!-- Dropdown State -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="state">Pilih Negeri</label>
            <div class="col-md-4">
                <select id="state" name="state" class="form-control">
                    
                    <?php if(!empty($state_list)): ?>
                        <option value="" selected disabled>SILA PILIH...</option>
                    <?php foreach ($state_list as $sl_key => $sl_val): ?>
                        <option id="state_item_<?= $sl_val['id'] ?>" value="<?= $sl_val['id'] ?>"><?= $sl_val['state'] ?></option>
                    <?php endforeach;
                    else: ?>
                        <option id="state_no_value" value=""></option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-md-1"><button type="button" id="btn_submit" class="btn btn-primary">Pilih</button></div>
            </div>

            <!-- Select Multiple -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="selected_state_list">Negeri Dipilih:</label>
            <div class="col-md-4">
                <select id="selected_state_list" name="selected_state_list" class="form-control" multiple="multiple">
                    <?php 
                    if(!empty($selected_state_list)):
                        foreach ($selected_state_list as $ssl_key => $ssl_val): 
                    ?>
                        <option id="selected_state_item_<?= $ssl_val['id_selected'] ?>" value="<?= $ssl_val['id_selected'] ?>"><?= $ssl_val['state'] ?></option>
                    <?php 
                        endforeach;
                    else:
                    ?>
                        <option id="selected_no_value" value="" disabled>Tiada negeri dalam senarai...</option>
                    <?php endif; ?>
                </select>
            </div>
            </div>

        </fieldset>
    </form>

    
    <!-- JavaScript Section -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
        $('#btn_submit').click(function(){
            var state = $('#state').val();
            if(state != null)
            {
                console.log(state);

                var ajax = $.ajax({
                    method: "POST",
                    url: "add_state_process.php",
                    data: { state: state }
                });

                ajax.done(function() { 
                    console.log( "success" ); 
                    // Remove from dropdown
                    var state_name = $('#state_item_' + state).text();
                    $('#state_item_' + state).remove();

                    // Add to list
                    $('#selected_no_value').remove(); // Remove no value in list
                    $('#selected_state_list').append('<option id="selected_state_item_"'+state+' value="'+state+'">'+state_name+'</option>');
                });
                ajax.fail(function() {console.log( "error" ); });
                ajax.always(function() {console.log( "complete" ); });
            } else {
                alert("RALAT: Sila pilih negeri yang disenaraikan");
            }
        });
    </script>
</body>
</html>