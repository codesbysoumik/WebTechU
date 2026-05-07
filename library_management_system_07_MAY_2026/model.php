<?php
require_once 'config.php';

function getAllBooks() {
    global $conn;
    $sql = "SELECT * FROM books ORDER BY id DESC";
    return mysqli_query($conn, $sql);
}

function addBook($title, $author, $category) {
    global $conn;
    $sql = "INSERT INTO books (title, author, category) VALUES ('$title', '$author', '$category')";
    return mysqli_query($conn, $sql);
}

function updateBook($id, $title, $author, $category, $status) {
    global $conn;
    $sql = "UPDATE books SET title='$title', author='$author', category='$category', status='$status' WHERE id=$id";
    return mysqli_query($conn, $sql);
}

function deleteBook($id) {
    global $conn;
    $sql = "DELETE FROM books WHERE id=$id";
    return mysqli_query($conn, $sql);
}

?>