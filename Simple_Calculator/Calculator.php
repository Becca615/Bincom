<!DOCTYPE html>
<html lang="en">
<body>
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>

<form action = "calc_process.php" method = "POST">
    <label>Select an operation: </label>
    <select name = "dropdown">
        <option></option>
        <option value = "Addition">Addition</option>
        <option value = "Subtraction">Subtraction</option>
        <option value = "Multiplication">Multiplication</option>
        <option value = "Division">Division</option>
    </select><br></br>
    Enter the first number: <input type="text" name = "FirstNum" required><br></br>
    Enter the second number: <input type="text" name = "SecondNum" required><br></br>
    <input type = "submit" value = "Enter"/>
</form>
</body>
</html>
