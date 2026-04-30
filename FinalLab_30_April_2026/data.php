<?php
header("Content-Type: application/json");

$students = [
    [
        "name" => "Asif",
        "id" => "22-11513-4",
        "department" => "CSE",
        "cgpa" => 3.85
    ],
    [
        "name" => "Imtiaz",
        "id" => "22-15567-8",
        "department" => "EEE",
        "cgpa" => 3.65
    ],
    [
        "name" => "Ivan",
        "id" => "22-15999-1",
        "department" => "CSE",
        "cgpa" => 3.75
    ]
];

echo json_encode($students);
?>