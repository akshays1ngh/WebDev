<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        #search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        input {
            padding: 8px;
            margin-right: 10px;
        }

        #result-container {
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Employee Search</h2>

<div id="search-form">
    <label for="employeeId">Enter Employee ID:</label>
    <input type="text" id="employeeId" name="employeeId" placeholder="Enter Employee ID">
    <button onclick="searchEmployee()">Search</button>
</div>

<div id="result-container"></div>

<script>
    function searchEmployee() {
        var employeeId = document.getElementById('employeeId').value;

        if (employeeId.trim() === "") {
            alert("Please enter an Employee ID.");
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('result-container').innerHTML = xhr.responseText;
            }
        };

        xhr.open("GET", "search_employee.php?employeeId=" + employeeId, true);
        xhr.send();
    }
</script>

</body>
</html>
