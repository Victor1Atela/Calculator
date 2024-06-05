<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <h1>Simple Calculator</h1>
    <form method="post" action="calculator.php">
        <input type="number" name="Operand1" placeholder="Enter first number" required><br><br>
        <select name="Operator">
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
            <option value="**">Exponentiation (^)</option>
        </select><br><br>
        <input type="number" name="Operand2" placeholder="Enter second number" required><br><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $operand1 = $_POST["Operand1"];
    $operand2 = $_POST["Operand2"];
    $operator = $_POST["Operator"];

    // Validate input (check if both operands are numeric)
    if (!is_numeric($operand1) || !is_numeric($operand2)) {
        $error = "Both operands must be numeric.";
    } else {
        // Perform calculations based on the selected operator
        switch ($operator) {
            case "+":
                $result = $operand1 + $operand2;
                break;
            case "-":
                $result = $operand1 - $operand2;
                break;
            case "*":
                $result = $operand1 * $operand2;
                break;
            case "/":
                if ($operand2 != 0) {
                    $result = $operand1 / $operand2;
                } else {
                    $error = "Cannot divide by zero.";
                }
                break;
            case "**":
                $result = $operand1 ** $operand2; // Exponentiation
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
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>
