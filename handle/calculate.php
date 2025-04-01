<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST["num1"]) ? (float) $_POST["num1"] : null;
    $num2 = isset($_POST["num2"]) ? (float) $_POST["num2"] : null;
    $operation = isset($_POST["operation"]) ? trim($_POST["operation"]) : null;

    if ($num1 === null || $num2 === null || !$operation) {
        echo "Invalid Input";
        exit;
    }

    $result = "";
    switch ($operation) {
        case "+": $result = $num1 + $num2; break;
        case "-": $result = $num1 - $num2; break;
        case "*": $result = $num1 * $num2; break;
        case "/": $result = ($num2 != 0) ? ($num1 / $num2) : "Error (Division by 0)"; break;
        default: $result = "Invalid Operation";
    }

    echo $result;
}
?>
