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
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $topic = htmlspecialchars($_POST['topic']);
    $message = htmlspecialchars($_POST['message']);

    $errors = [];
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($email)) $errors[] = "Email is required.";
    if (empty($topic)) $errors[] = "Topic is required.";

    $wordCount = str_word_count($message);
    if ($wordCount < 50 || $wordCount > 150) $errors[] = "Message must be between 50 and 150 words.";

    if (empty($errors)) {
        echo "<p>Thank you, " . $name . "! We received your message about: \"" . $topic . "\"</p>\n";
        echo "<p>We'll get back to you at " . $email . ".</p>\n";
    } else {
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>\n";
        }
    }
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

<?php
// reflections: htmlspecialchars was more important than i thought, stops XSS
// the word count validation was tricky, str_word_count worked well
// $_POST had everything i expected, no surprises there
// didnt realize empty fields would cause warnings without validation
?>

</body>
</html>
