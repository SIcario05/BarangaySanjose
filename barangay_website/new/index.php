<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Website</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="css1.css">
    <style>
        /* Header styling */
        .header {
            background-color: #ffffff;
            padding: 10px;
            text-align: center;
            border-bottom: 5px solid #ffd700;
        }

        .header img {
            height: 80px;
            margin-right: 20px;
            vertical-align: middle;
        }

        .header h1 {
            display: inline;
            font-size: 2rem;
            color: #333;
            font-weight: bold;
        }

        .navbar {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        .navbar a {
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            background-color: #555;
            color: #ffd700;
        }

        /* Footer styling */
        .footer {
            background-color: #d3d3d3;
            color: #333;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .footer .section {
            max-width: 200px;
            margin: 10px;
            text-align: left;
        }

        .footer .section h4 {
            font-weight: bold;
        }

        .footer .section ul {
            list-style: none;
            padding: 0;
        }

        .footer .section ul li {
            margin: 5px 0;
        }

        .footer .section ul li a {
            text-decoration: none;
            color: #333;
        }

        .footer .section ul li a:hover {
            color: #555;
        }

        .footer img {
            height: 80px;
        }
    </style>
</head>
<body>
    <!-- Header with logo and title -->
    <div class="header">
        <img src="path/to/your/logo.png" alt="Barangay Logo"> <!-- Replace with actual logo path -->
        <h1>Barangay Officials Directory</h1>
    </div>

    <!-- Navbar with links -->
    <div class="navbar">
    <a href="index.php">Home</a>
    <a href="captain_info.html">Barangay Captain</a>
    <a href="request_registration.html">Request Forms</a>
    <a href="about.html">About the Barangay</a>
    <a href="announcements.php">Announcements</a> <!-- Link to Announcements page -->
    <a href="contact_us.php">Contact Us</a>
</div>


    <!-- Main content section -->
    <div class="container">
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
            <img src="path/to/government-logo.png" alt="Government Logo"> <!-- Replace with actual logo path -->
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
                <li><a href="#">Office of the President</a></li>
                <li><a href="#">Office of the Vice President</a></li>
                <li><a href="#">Senate of the Philippines</a></li>
                <li><a href="#">House of Representatives</a></li>
                <li><a href="#">Supreme Court</a></li>
                <li><a href="#">Court of Appeals</a></li>
                <li><a href="#">Sandiganbayan</a></li>
            </ul>
        </div>
        <div class="section">
            <h4>Connect with us</h4>
            <ul>
                <li><a href="#">Like us on Facebook</a></li>
                <li><a href="#">Follow us on Twitter</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
