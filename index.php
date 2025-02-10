<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Check if the email already exists in the database
    $sql_check = "SELECT * FROM subscribers WHERE email = '$email'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // If email exists, display an alert
        echo "<script>alert('This email is already subscribed.');</script>";
    } else {
        // Insert the new subscriber if the email is not already in the database
        $sql = "INSERT INTO subscribers (name, email) VALUES ('$name', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Subscription Successful!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Error: Unable to subscribe.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jacket Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Hero Section with Background Image -->
    <section class="hero d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <h1 class="display-4 fw-bold text-white animated fadeInUp">Exclusive Jacket Offer</h1>
            <p class="lead text-white animated fadeInUp" style="animation-delay: 0.5s;">Get the best quality jackets at
                amazing discounts! Limited-time offers available.</p>
            <a href="#offers" class="btn btn-custom mt-3 animated fadeInUp" style="animation-delay: 1s;">Shop Now</a>
        </div>
    </section>

    <!-- Jacket Offers -->
    <section id="offers" class="container mt-5">
        <h2 class="text-center fw-bold animated fadeInUp">Exclusive Offers</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="images/denim.jpg" class="card-img-top" alt="Jacket 1" style="height:400px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Leather Jacket</h5>
                        <p class="text-danger">30% OFF</p>
                        <p>Premium quality leather jacket.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="images/images.jpg" class="card-img-top" alt="Jacket 2" style="height:400px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Winter Jacket</h5>
                        <p class="text-danger">20% OFF</p>
                        <p>Stay warm with our stylish winter jackets.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="images/winter.jpg" class="card-img-top" alt="Jacket 3" style="height:400px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Denim Jacket</h5>
                        <p class="text-danger">25% OFF</p>
                        <p>Perfect for all seasons with a trendy look.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Subscribe Form -->
    <section id="subscribe" class="container mt-5 p-4 rounded shadow text-center">
        <h2 class="fw-bold animated fadeInUp">Subscribe for Offers</h2>
        <p class="animated fadeInUp" style="animation-delay: 0.5s;">Sign up with your email and name to get the latest
            offers!</p>
        <form method="POST" class="mt-3">
            <div class="d-flex justify-content-center mb-3">
                <input type="text" class="form-control mx-2" name="name" placeholder="Full Name" required>
                <input type="email" class="form-control mx-2" name="email" placeholder="Email" required>
            </div>
            <button type="submit" class="btn btn-custom w-100 animated fadeInUp"
                style="animation-delay: 1s;">Subscribe</button>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>