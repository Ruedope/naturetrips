<!DOCTYPE html>
<html>
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #dff6ff, #ffffff);
        color: #333;
        text-align: center;
        margin: 0;
        padding: 0;
    }
    h2 {
        background-color: #0077b6;
        color: white;
        padding: 20px 0;
        margin: 0;
    }
    form {
        background: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 10px;
        width: 300px;
        margin: 30px auto;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    input[type="number"], select {
        width: 90%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #0077b6;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }
    input[type="submit"]:hover {
        background-color: #0096c7;
    }
    .result-box {
        background: #e8f7ff;
        border: 1px solid #b3e0f5;
        border-radius: 10px;
        width: 300px;
        margin: 20px auto;
        padding: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    small {
        color: #777;
        font-size: 12px;
    }
</style>
</head>
<body>

<?php
define("BANK_NAME", "SimplePHP Bank");
$welcome = "Welcome to " . BANK_NAME . "!";
echo "<h2>$welcome</h2>";

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $balance = floatval($_POST['balance']);
    $amount = floatval($_POST['amount']);
    $action = $_POST['action'];

    if ($action == "deposit") {
        $balance = $balance + abs($amount);
    } elseif ($action == "withdraw") {
        $balance = $balance - abs($amount);
    }

    echo "<div class='result-box'>";
    echo "<h3>Transaction Summary:</h3>";
    $transactions = array("Initial Balance", "Transaction", "Final Balance");
    foreach ($transactions as $item) {
        echo "$item<br>";
    }
    echo "<br><strong>New Balance:</strong> ₱" . number_format($balance, 2) . "<br><br>";
    echo "</div>";
}
?>

<form method="post" action="">
  <h3>Bank Transaction Form</h3>
  Current Balance (₱): <br>
  <input type="number" step="0.01" name="balance" required><br><br>
  
  Amount (₱): <br>
  <input type="number" step="0.01" name="amount" required><br><br>
  
  Action: <br>
  <select name="action" required>
    <option value="deposit">Deposit</option>
    <option value="withdraw">Withdraw</option>
  </select><br><br>
  
  <input type="submit" value="Submit">
</form>

<?php
if (isset($_SERVER['SERVER_NAME'])) {
    echo "<br><small>Server: " . $_SERVER['SERVER_NAME'] . "</small>";
}
?>

</body>
</html>
