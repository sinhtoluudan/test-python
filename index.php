<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="father">
        <?php 
        include("layout/header.php");
        include("layout/top_menu.php");
        include("layout/mid_menu.php");
        include("layout/footer.php");
        ?>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>

    <script src="js/scripts.js"></script>
</body>
<script>
    function calculateJS() {
    let num1 = parseFloat(document.getElementById('num1').value);
    let num2 = parseFloat(document.getElementById('num2').value);
    let operation = document.getElementById('operation').value;
    let result;

    switch(operation) {
        case '+': result = num1 + num2; break;+
        case '-': result = num1 - num2; break;
        case '*': result = num1 * num2; break;
        case '/': result = num2 !== 0 ? num1 / num2 : 'Error'; break;
        default: result = 'Invalid';
    }

    document.getElementById('result').value = result;
}

function calculatePHP() {
    let num1 = document.getElementById('num1').value;
    let num2 = document.getElementById('num2').value;
    let operation = document.getElementById('operation').value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "handle/calculate.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            console.log("Response: ", xhr.responseText); // Debug dữ liệu trả về từ PHP
            document.getElementById('result').value = xhr.responseText;
        }
    };

    // Encode dữ liệu, đặc biệt là dấu "+"
    let params = "num1=" + encodeURIComponent(num1) + 
                 "&num2=" + encodeURIComponent(num2) + 
                 "&operation=" + encodeURIComponent(operation);

    console.log("Sending Data: ", params); // Debug dữ liệu gửi đi
    xhr.send(params);
}



</script>
</html>