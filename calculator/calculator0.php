<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <div class="calculator-form">
        <form method="post">
            <h1>Calculator</h1>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="first_number" placeholder="First Number" required pattern="[0-9]+" title="Only numbers">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="second_number" placeholder="Second Number" required pattern="[0-9]+" title="Only numbers">
                    </div>
                </div>
            </div>
            <div class="form-group">
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
                    }
                }
                ?>

                <?php if (isset($result) && is_numeric($result)) { ?>
                    <h4 style="color: blue; font-weight: bold;">Result: <?php echo $result; ?></h4>
                <?php } ?>

                <?php if (isset($error)) { ?>
                    <h5 style="color: red; font-weight: bold;">Error: <?php echo $error; ?></h5>
                <?php } ?>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="calculate" value="+">
                <input class="btn btn-primary" type="submit" name="calculate" value="-">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="calculate" value="x">
                <input class="btn btn-primary" type="submit" name="calculate" value="/">
            </div>
        </form>
    </div>
</body>
</html>



<style>
    body {
        background-image: url("C:\xampp\htdocs\calculator\calc.PNG");
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
