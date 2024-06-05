<!DOCTYPE html>
<html lang="en">
<head>
    <background-color: "cyan";></background-color:>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body 
        {
            background-color: green;
            background-image: url('c:\xampp\htdocs\calculator\calc.PNG');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="calculator-form">
        <form method="post">
            <h1>Calculator</h1>
            <p>Created by Victor Opili</p>
            <hr>
            <div class="form-group">
                <input type="text" class="form-control" name="first_number" placeholder="First Number" required pattern="[0-9]+" title="Only numbers">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="second_number" placeholder="Second Number" required pattern="[0-9]+" title="Only numbers">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="calculate" value="+">
                <input class="btn btn-primary" type="submit" name="calculate" value="-">
                <input class="btn btn-primary" type="submit" name="calculate" value="x">
                <input class="btn btn-primary" type="submit" name="calculate" value="/">
                <input class="btn btn-primary" type="submit" name="calculate" value="√">
                <input class="btn btn-primary" type="submit" name="calculate" value="^">
                <input class="btn btn-primary" type="submit" name="calculate" value="log">
            </div>

            <?php
            if (isset($_POST['calculate'])) {
                $fn = $_POST['first_number'];
                $sn = $_POST['second_number'];
                $operation = $_POST['calculate'];

                if ($operation == "/" && ($fn == 0 || $sn == 0)) {
                    $error = "Never divide any number by zero";
                } else {
                    if ($operation == "+") $result = $fn + $sn;
                    else if ($operation == "-") $result = $fn - $sn;
                    else if ($operation == "x") $result = $fn * $sn;
                    else if ($operation == "/") $result = $fn / $sn;
                    else if ($operation == "√") $result = sqrt($fn);
                    else if ($operation == "^") $result = pow($fn, $sn);
                    else if ($operation == "log") $result = log($fn, $sn);
                }
            }
            ?>

            <?php if (isset($result) && is_numeric($result)) { ?>
                <h4 style="color: silver; font-weight: bold;">Result: <?php echo $result; ?></h4>
            <?php } ?>

            <?php if (isset($error)) { ?>
                <h5 style="color: red; font-weight: bold;">Error: <?php echo $error; ?></h5>
            <?php } ?>
        </form>
    </div>
</body>
</html>
