<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $secret_key = '6LdaGhIqAAAAAIVyG980mCdy33TvZ-6FhF7w5sZR';
    $captcha_response = $_POST['g-recaptcha-response'];

    // Verify the captcha response
    $verify_url = "https://www.google.com/recaptcha/api/siteverify";
    $response = file_get_contents($verify_url . "?secret=" . $secret_key . "&response=" . $captcha_response);
    $response_data = json_decode($response);

    if ($response_data->success) {
        // Captcha verification successful, proceed with form processing
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];

        // Process the form data (e.g., save to database, send email, etc.)
        
        echo "Registration successful!";
    } else {
        // Captcha verification failed
        echo "Captcha verification failed. Please try again.";
    }
} else {
    // If the request method is not POST, redirect to the registration page
    header("Location: register.html");
    exit();
}
?>
