
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    header("Content-Type: application/json");

    // Read JSON input
    $json = file_get_contents("php://input");

    // Decode JSON
    $data = json_decode($json, true);

    if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {

        $username = htmlspecialchars($data["username"] ?? "");
        $password = htmlspecialchars($data["password"] ?? "");

        echo "Username: " . $username . "\n";
        echo "Password: " . $password;

    } else {
        echo "Invalid JSON input.";
    }

    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab 4 - JSON Input</title>
</head>
<body>

<h2>JSON Input</h2>

<form id="myForm">

    Username:
    <input type="text" id="username" required>
    <br><br>

    Password:
    <input type="password" id="password" required>
    <br><br>

    <button type="submit">Submit</button>

</form>

<h3>Output:</h3>
<pre id="result"></pre>

<script>
document.getElementById("myForm").addEventListener("submit", function(e) {

    e.preventDefault();

    let data = {
        username: document.getElementById("username").value,
        password: document.getElementById("password").value
    };

    fetch("lab4_input.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(result => {
        document.getElementById("result").textContent = result;
    });

});
</script>

</body>
</html>

