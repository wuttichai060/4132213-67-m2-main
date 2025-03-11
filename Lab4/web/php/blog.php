<?php
header('Content-Type: application/json');
require 'condb.php';

$method = $_SERVER['REQUEST_METHOD'];
$response = ['status' => 'error', 'message' => 'Invalid request'];

switch ($method) {
    case 'POST': // Insert new blog
        $title = $_POST['title'] ?? null;
        $post = $_POST['post'] ?? null;

        if ($title && $post) {
            $stmt = $conn->prepare("INSERT INTO tb_blog (title, post, createAt) VALUES (?, ?, NOW())");
            $stmt->bind_param("ss", $title, $post);
            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Blog inserted successfully'];
            } else {
                $response = ['status' => 'error', 'message' => 'Insert failed: ' . $conn->error];
            }
            $stmt->close();
        } else {
            $response = ['status' => 'error', 'message' => 'Title and Post are required'];
        }
        break;

        //curl -X POST -d "title=My Blog&post=This is my first post" http://localhost:8080/php/blog.php



    case 'DELETE': // Delete a blog
        parse_str(file_get_contents("php://input"), $_DELETE);
        $id = $_DELETE['id'] ?? null;

        if ($id) {
            $stmt = $conn->prepare("DELETE FROM tb_blog WHERE id = ?");
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Blog deleted successfully'];
            } else {
                $response = ['status' => 'error', 'message' => 'Delete failed: ' . $conn->error];
            }
            $stmt->close();
        } else {
            $response = ['status' => 'error', 'message' => 'ID is required for deletion'];
        }
        break;

        //curl -X DELETE -d "id=1" http://localhost:8080/php/blog.php

    default:
        $response = ['status' => 'error', 'message' => 'Unsupported request method'];
}

echo json_encode($response);
$conn->close();
