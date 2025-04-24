<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .contact-info div {
            width: 48%;
            margin-bottom: 20px;
        }

        .contact-info i {
            font-size: 20px;
            color: #007bff;
            margin-right: 10px;
        }

        .social-icons a {
            text-decoration: none;
            margin-right: 15px;
            font-size: 24px;
            color: #007bff;
        }

        .social-icons a:hover {
            color: #0056b3;
        }

        .contact-form {
            margin-top: 20px;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact-form button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #007bff;
            color: white;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background: #0056b3;
        }

        @media (max-width: 600px) {
            .contact-info div {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Contact Me</h2>
        
        <div class="contact-info">
            <div><i class="fas fa-phone"></i> <strong>Phone:</strong> +966 592304816</div>
            <div><i class="fas fa-envelope"></i> <strong>Email:</strong> fazlielahi03060155124@gmail.com</div>
            <div><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> Shamesi, Riyadh, Saudi Arabia</div>
            <div><i class="fas fa-university"></i> <strong>Bank Account:</strong> Alrajhi - Account No: 1234XXXXXX</div>
        </div>

        <div class="social-icons" style="text-align:center;">
            <a href="https://linkedin.com/in/fazlielahi" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
        </div>

        <h3>Send a Query</h3>
        <form class="contact-form">
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
            <textarea placeholder="Your Message" rows="5" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>

</body>
</html>
