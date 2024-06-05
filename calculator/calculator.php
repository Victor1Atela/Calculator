<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
    <style>
        body {
            background-color: green;
        }
    </style>
</head>
<body>
    <h1><b><u>Multipurpose Calculator</u></b></h1>
    <form method="post" action="calculator.php">
        <input type="number" name="num1" placeholder="Enter first number" required><br><br>
        <select name="operator">
            <option value="add">Addition (+)</option>
            <option value="subtract">Subtraction (-)</option>
            <option value="multiply">Multiplication (*)</option>
            <option value="divide">Division (/)</option>
            <option value="power">Exponentiation (^)</option>
            <option value="percentage">Percentage (%)</option>
            <option value="sqrt">Square Root (√)</option>
            <option value="log">Natural Logarithm (ln)</option>
        </select><br><br>
        <input type="number" name="num2" placeholder="Enter second number" required><br><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

    // Validate input (check if both operands are numeric)
    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Both operands must be numeric.";
    } else {
        switch ($operator) {
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            case "divide":
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $error = "Cannot divide by zero.";
                }
                break;
            case "power":
                $result = $num1 ** $num2; // Exponentiation
                break;
            case "percentage":
                $result = ($num1 / $num2) * 100; // Percentage
                break;
            case "sqrt":
                $result = sqrt($num1); // Square root
                break;
            case "log":
                $result = log($num1); // Natural logarithm (base e)
                break;
            default:
                $error = "Invalid operator.";
        }
    }
}
?>



<?php if (isset($result)): ?>
    <p>Result: <?php echo $result; ?></p>
<?php endif; ?>

<?php if (isset($error)): ?>
    <body result="cyan"><?php echo $error; ?></p>
<?php endif; ?>
