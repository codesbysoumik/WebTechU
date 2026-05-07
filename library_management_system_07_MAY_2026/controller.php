<?php
require_once 'model.php';

$action = $_POST['action'] ?? '';

if ($action == 'fetch') {
    $result = getAllBooks();
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['title']}</td>
                <td>{$row['author']}</td>
                <td>{$row['category']}</td>
                <td>{$row['status']}</td>
                <td>
                    <button onclick='editBook(".json_encode($row).")'>Edit</button>
                    <button onclick='removeBook({$row['id']})'>Delete</button>
                </td>
              </tr>";
    }
}

if ($action == 'insert') {
    addBook($_POST['title'], $_POST['author'], $_POST['category']);
}

if ($action == 'update') {
    updateBook($_POST['id'], $_POST['title'], $_POST['author'], $_POST['category'], $_POST['status']);
}

if ($action == 'delete') {
    deleteBook($_POST['id']);
}
?>