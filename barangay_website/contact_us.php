<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/consolidated.css">
    <link rel="stylesheet" href="assets/css/cssContact.css"> <!-- Additional custom styles -->
</head>
<body>

    <!-- Header with logo and title -->
    <div class="header">
        <img src="assets/images/brgylogo.jpg" alt="Barangay Logo"> <!-- Replace with actual logo path -->
        <h1>Contact Us</h1>
        <h5>We’re here to help. Reach out with any questions or concerns.</h5>
    </div>

    <!-- Navbar with links -->
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="captain_info.html">Barangay Captain</a>
            <a href="request_registration.html">Request Forms</a>
            <a href="about.html">About the Barangay</a>
            <a href="announcements.php">Announcements</a> <!-- Link to Announcements page -->
            <a href="contact_us.php" id="selected">Contact Us</a>
        </div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2>Contact Form</h2>
                <form action="contact_process.php" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="section">
            <img src="assets/images/brgylogo.jpg" alt="Government Logo" height="300px" width="300px"> <!-- Replace with actual logo path -->
        </div>
        
        <div class="section">
            <h4>Republic of the Philippines</h4>
            <p>All content is in the public domain unless otherwise stated.</p>
        </div>

        <div class="section">
            <h4>About GOVPH</h4>
            <ul>
                <li><a href="#">Official Gazette</a></li>
                <li><a href="#">Open Data Portal</a></li>
                <li><a href="#">Send us your feedback</a></li>
            </ul>
        </div>
        <div class="section">
            <h4>Government Links</h4>
            <ul>
                <li><a href="https://www.foi.gov.ph/agencies/op/">Office of the President</a></li>
                <li><a href="https://www.ovp.gov.ph/">Office of the Vice President</a></li>
                <li><a href="https://legacy.senate.gov.ph/">Senate of the Philippines</a></li>
                <li><a href="https://www.congress.gov.ph/">House of Representatives</a></li>
                <li><a href="https://sc.judiciary.gov.ph/">Supreme Court</a></li>
                <li><a href="https://ca.judiciary.gov.ph/">Court of Appeals</a></li>
                <li><a href="https://sb.judiciary.gov.ph/">Sandiganbayan</a></li>
            </ul>
        </div>

        <div class="section"> <!--Social Links-->
        <h4>Social Links</h4>
            <a href="https://www.facebook.com/profile.php?id=100069919052937&sk=about" id="whitelink"> <i class="fa-brands fa-facebook"></i></a>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-youtube"></i>
        </div>  <!--Social Links End-->
    </footer>
</body>
</html>
