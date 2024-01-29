<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitValue = $_POST['submit'];
    $id = $_POST['id'];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $birth = $_POST["birth"];
    $football = isset($_POST["football"]) ? 1 : 0; 
    $volleyball = isset($_POST["volleyball"]) ? 1 : 0;
    $language = $_POST["language"];
    $description = $_POST["description"];
    $url = $_POST["url"];
    $skills = $_POST["skills"];
    $country = $_POST["country"];
    if ($submitValue == 'Insert') {
        $sql = "INSERT INTO users (username, email, password, age, phone, birth, football, volleyball, language, description, url, skills, country)
        VALUES ('$username', '$email', '$password', $age, '$phone', '$birth', $football, $volleyball, '$language', '$description', '$url', $skills, '$country')";
	  echo ($conn->query($sql)) ? "Inserted successfully<br><br>" : "Error: " . $conn->error;
    }  
    elseif ($submitValue == 'Update' && isset($_POST['id'])) {
        $sql = "UPDATE users SET username='$username', email='$email', password='$password', age=$age, phone='$phone', birth='$birth', football=$football, volleyball=$volleyball, language='$language', description='$description', url='$url', skills=$skills, country='$country' WHERE id=$id";
        echo ($conn->query($sql)) ? "Record updated successfully<br><br>" : "Error updating record: " . $conn->error;
    }
}

if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    $id = $_GET["id"];
    $delete = "DELETE FROM users WHERE id = $id";
    if ($conn->query($delete) === true) {
        echo "Deleted Successfully<br>";
    } else {
        echo "Error deleting record: ";
    }
}

$retrieve = "SELECT * FROM users";
$result = $conn->query($retrieve);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Username: " . $row["username"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Password: " . $row["password"] . "<br>";
        echo "Age: " . $row["age"] . "<br>";
        echo "Phone: " . $row["phone"] . "<br>";
        echo "Birth: " . $row["birth"] . "<br>";
        echo "Football: " . $row["football"] . "<br>";
        echo "Volleyball: " . $row["volleyball"] . "<br>";
        echo "Language: " . $row["language"] . "<br>";
        echo "Description: " . $row["description"] . "<br>";
        echo "Url: " . $row["url"] . "<br>";
        echo "Skills: " . $row["skills"] . "<br>";
        echo "Country: " . $row["country"] . "<br>";
        echo "<a href='?action=delete&id={$row["id"]}'>Delete</a><br>";
        echo "<a href='index.html'>Update</a><br><br>";
    }
}
?>