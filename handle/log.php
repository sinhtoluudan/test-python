<?php
    $mode = isset($_GET["mode"]) ? $_GET["mode"] : "home";
    $response =[];
    switch ($mode) {
        case "home":
            $response['html']= 'This is Home page';
            break;
        case "info":
            $response["html"]= "This is Thong tin tuyen sinh page";
            break;
        case "daotao":
            $response["html"]= "This is Dao tao page";
            break;
        case "contact":
            $response["html"]= "This is Contact page";
            break;
        case  "product":
            $response['html']= '<div class="sanpham">
            <img src="./img/meme.jpg" alt="">
            <div>Mã SP: 001</div>
            <div>Tên SP: Giày số 1</div>
            <div>Giá SP: 300000</div>
            <div>
                <span>Mua</span>
                <span>Chi tiết</span>
            </div>
        </div>
        <div class="sanpham">
            <img src="./img/meme.jpg" alt="">
            <div>Mã SP: 002</div>
            <div>Tên SP: Giày số 2</div>
            <div>Giá SP: 400000</div>
            <div>
                <span>Mua</span>
                <span>Chi tiết</span>
            </div>
        </div>
        <div class="sanpham">
            <img src="./img/meme.jpg" alt="">
            <div>Mã SP: 003</div>
            <div>Tên SP: Giày số 3</div>
            <div>Giá SP: 500000</div>
            <div>
                <span>Mua</span>
                <span>Chi tiết</span>
            </div>
        </div>'; 
            break;
        case "cal":
            $response['html']='
        <div class="container">
    <h3>Basic Arithmetic Operations</h3>
    <form action"post">
        <label>Number 1:</label> <br>
        <input type="text" id="num1"> <br>

        <label>Number 2:</label> <br>
        <input type="text" id="num2"> <br>

        <label>Operation:</label> <br>
        <select id="operation"> <br>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select> <br>

        <label>Result:</label> <br>
        <input type="text" id="result" readonly> <br>

        <div class="button-group">
            <button type="button" onclick="calculateJS()">Calculate JS</button>
            <button type="button" onclick="calculatePHP()">Calculate PHP</button>
        </div>
    </form>
</div>';
    break;
    }
    echo json_encode($response);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = isset($_POST["num1"]) ? (float) $_POST["num1"] : 0;
        $num2 = isset($_POST["num2"]) ? (float) $_POST["num2"] : 0;
        $operation = $_POST["operation"];
    
        switch ($operation) {
            case "+":
                $result = $num1 + $num2;
                break;
            case "-":
                $result = $num1 - $num2;
                break;
            case "*":
                $result = $num1 * $num2;
                break;
            case "/":
                $result = ($num2 != 0) ? ($num1 / $num2) : "Error (Division by 0)";
                break;
            default:
                $result = "Invalid Operation";
        }
    }
?>