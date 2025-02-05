<?php
@include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url("background.jpg");
            background-size: cover;
            margin: 0;
            padding: 20px;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.2); /* Transparent background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
            color: #fff; /* Text color */
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
            color: #000; /* Black color */
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box;
            color: #000; /* Black text */
        }
        button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #343a40; /* Dark grey background */
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #1d2124;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Post</h1>
        <form action="create.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
            <button type="submit">Create Post</button>
        </form>
    </div>
</body>
</html>
