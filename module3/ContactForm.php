<?php
// Metin Yildiztas
// predictions: when i submit the form it should print back what i typed
// i think $_POST will hold all field values like name email topic and message
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $message = $_POST['message'];

    echo "<p>Thank you, " . $name . "! We received your message about: \"" . $topic . "\"</p>\n";
    echo "<p>We'll get back to you at " . $email . ".</p>\n";
}
?>

<form action="" method="POST">
    <p>Full Name: <input type="text" name="name" /></p>
    <p>Email Address: <input type="text" name="email" /></p>
    <p>Topic of Message: <input type="text" name="topic" /></p>
    <p>Message (50-150 words):<br />
    <textarea name="message" rows="6" cols="50"></textarea></p>
    <p><input type="submit" name="submit" value="Send" /></p>
</form>

</body>
</html>
