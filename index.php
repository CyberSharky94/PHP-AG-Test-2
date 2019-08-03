<?php

    include("connection.php");
    include("debugger.php");
    
    // Fetch list
    $sql = "SELECT * FROM states";
    $result = mysqli_query($conn, $sql);
    $state_list = mysqli_fetch_all($result, MYSQLI_BOTH);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test 2</title>

    <form class="form-horizontal">
        <fieldset>
            <legend>State Selection</legend>

            <!-- Dropdown State -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="state">Pilih Negeri</label>
            <div class="col-md-4">
                <select id="state" name="state" class="form-control">
                    <option value="" selected disabled>SILA PILIH...</option>
                    <?php foreach ($state_list as $sl_key => $sl_val): ?>
                        <option id="item_<?= $sl_val['id'] ?>" value="<?= $sl_val['id'] ?>"><?= $sl_val['state'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-1"><button class="btn btn-primary">Pilih</button></div>
            </div>

            <!-- Select Multiple -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="selectmultiple">Select Multiple</label>
            <div class="col-md-4">
                <select id="selectmultiple" name="selectmultiple" class="form-control" multiple="multiple">
                <option value="1">Option one</option>
                <option value="2">Option two</option>
                </select>
            </div>
            </div>

        </fieldset>
    </form>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
    
    <!-- JavaScript Section -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    
</body>
</html>