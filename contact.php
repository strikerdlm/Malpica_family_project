<?php
// Form handling
$success_message = null;
$error_message = null;

// Need to include header early to get language functions
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get raw input
    $raw_name = $_POST['name'] ?? '';
    $raw_email = $_POST['email'] ?? '';
    $raw_message = $_POST['message'] ?? '';

    // Basic validation: Check if fields are empty
    if (!empty($raw_name) && !empty($raw_email) && !empty($raw_message)) {
        
        // Validate email format
        if (filter_var($raw_email, FILTER_VALIDATE_EMAIL)) {
            
            // Sanitize for email headers (remove newlines)
            $name_safe_header = str_replace(["\r", "\n"], '', $raw_name);
            $email_safe_header = str_replace(["\r", "\n"], '', $raw_email);

            // Sanitize for email body (HTML context)
            $name_safe_html = htmlspecialchars($raw_name);
            $email_safe_html = htmlspecialchars($raw_email);
            $message_safe_html = htmlspecialchars($raw_message);
            // Convert newlines in message to <br> for HTML email
            $message_safe_html = nl2br($message_safe_html);

            $to = "dlmalpicah@unal.edu.co";
            $subject = "New Contact Form Submission from $name_safe_header";
            $headers = "From: $email_safe_header\r\n";
            $headers .= "Reply-To: $email_safe_header\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion(); // Optional: Identify mailer
            
            $email_content = "
                <html>
                <body>
                    <h2>New Contact Form Submission</h2>
                    <p><strong>Name:</strong> $name_safe_html</p>
                    <p><strong>Email:</strong> $email_safe_html</p>
                    <p><strong>Message:</strong></p>
                    <p>$message_safe_html</p>
                </body>
                </html>
            ";
            
            if (mail($to, $subject, $email_content, $headers)) {
                $success_message = "Thank you for your message! We'll get back to you soon.";
                // Clear post values on success to prevent resubmission issues
                $_POST = []; 
            } else {
                $error_message = "Sorry, there was an error sending your message. Please try again later.";
            }
        } else {
            // Invalid email format
            $error_message = "Please enter a valid email address.";
        }
    } else {
        // Fields were empty
        $error_message = "Please fill in all required fields.";
    }
}
?>

<main class="contact-container">
  <h1 class="contact-title">CONTACT US</h1>
  <p class="contact-subtitle">Get in touch with us for any questions or inquiries</p>
  
  <?php if (isset($success_message)): ?>
    <div class="alert alert-success"><?php echo $success_message; ?></div>
  <?php endif; ?>
  
  <?php if (isset($error_message)): ?>
    <div class="alert alert-error"><?php echo $error_message; ?></div>
  <?php endif; ?>
  
  <div class="contact-grid">
    <div class="contact-info">
      <div class="contact-card">
        <h2 class="contact-section-title">EMAIL</h2>
        <a href="mailto:dlmalpicah@unal.edu.co" class="contact-link">
          dlmalpicah@unal.edu.co
        </a>
      </div>
      
      <div class="contact-card">
        <h2 class="contact-section-title">GITHUB</h2>
        <a href="https://github.com/strikerdlm" class="contact-link" target="_blank">
          github.com/strikerdlm
        </a>
      </div>
      
      <div class="contact-card">
        <h2 class="contact-section-title">LOCATION</h2>
        <p class="contact-text">Bogotá, Colombia</p>
      </div>
    </div>
    
    <form class="contact-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
      </div>
      
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
      </div>
      
      <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
      </div>
      
      <button type="submit" class="submit-button">SEND MESSAGE</button>
    </form>
  </div>
</main>

<?php include 'footer.php'; ?>