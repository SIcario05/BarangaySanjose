<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Website</title>

    <!--Boostrap Links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--CSS-->
    <link rel="stylesheet" href="assets/css/consolidated.css">
    <link rel="stylesheet" href="assets/css/css1.css">

</head>
<body>
    <!-- Header with logo and title -->
    <div class="header">
        <img src="assets/images/brgylogo.jpg" alt="Barangay Logo"> <!-- Replace with actual logo path -->
        <h1>Barangay San Jose</h1>
    </div>

    <!-- Navbar with links -->
        <div class="navbar">
        <a href="index.php" id="selected">Home</a>
        <a href="captain_info.html">Barangay Captain</a>
        <a href="request_registration.html">Request Forms</a>
        <a href="about.html">About the Barangay</a>
        <a href="announcements.php">Announcements</a> <!-- Link to Announcements page -->
        <a href="contact_us.php">Contact Us</a>
        </div>


    
    <!-- Main content section -->
    <div class="container">
        <!-- Dynamic Announcements Section -->
        <h2 style="text-align: center; margin-top: 20px;">Latest Announcements</h2>
        <div class="announcement-container">
            <?php
            include 'db.php'; // Include database connection

            // Fetch the latest 3 announcements
            $query = "SELECT * FROM announcements ORDER BY created_at DESC LIMIT 3";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="announcement">
                        <div class="announcement-content">
                            <h3>' . htmlspecialchars($row['title']) . '</h3>
                            <p>' . htmlspecialchars($row['content']) . '</p>
                            <span>Posted on: ' . date("F j, Y, g:i a", strtotime($row['created_at'])) . '</span>
                        </div>
                    </div>';
                }
            } else {
                echo '<p style="text-align:center;">No announcements available.</p>';
            }

            $conn->close();
            ?>
        </div>
        <!-- Content goes here -->
    </div>


    <!-- Footer -->
    <footer class="footer">
        <div class="section">
            <img src="assets/images/brgylogo.jpg" alt="Barangay Logo">
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
