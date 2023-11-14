<?php
// Read JSON data from the file
$jsonData = file_get_contents('employee_data.json');

// Decode JSON data
$employees = json_decode($jsonData, true);

// Get employee ID from the AJAX request
$employeeId = isset($_GET['employeeId']) ? $_GET['employeeId'] : '';

// Search for the employee
$foundEmployee = null;
foreach ($employees as $employee) {
    if ($employee['employee_id'] == $employeeId) {
        $foundEmployee = $employee;
        break;
    }
}

// Display the result
if ($foundEmployee !== null) {
    echo '<h3>Employee Details</h3>';
    echo '<p><strong>Employee ID:</strong> ' . $foundEmployee['employee_id'] . '</p>';
    echo '<p><strong>Employee Name:</strong> ' . $foundEmployee['employee_name'] . '</p>';
    echo '<p><strong>Designation:</strong> ' . $foundEmployee['designation'] . '</p>';
    echo '<p><strong>Salary:</strong> $' . number_format($foundEmployee['salary'], 2) . '</p>';
} else {
    echo '<p style="color: red;">Employee not found.</p>';
}
?>
