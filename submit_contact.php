<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare the data to be written
    $data = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message\n\n";

    // Check if file is writable
    $file = 'contact_submissions.txt';
    if (is_writable($file)) {
        // Save the data to a text file
        file_put_contents($file, $data, FILE_APPEND);
        // Display a success message
        echo "Thank you for contacting us! We will get back to you shortly.";
    } else {
        echo "Error: The file $file is not writable.";
    }
} else {
    // Redirect back to the form if the request method is not POST
    header("Location: index.html");
    exit;
}
?>
