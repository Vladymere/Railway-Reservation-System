<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}

// Dummy data for the administrator's profile
$adminProfile = [
    'username' => 'admin',
    'email' => 'admin@example.com',
    'fullName' => 'Administrator Name',
    'phone' => '123-456-7890',
    'address' => '123 Admin Street, Admin City, Admin Country'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator's Profile - BiyaheRail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <h4 class="text-center py-3">BiyaheRail</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Administrator's Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ticket-booking.php">
                                Ticket Booking
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reservation.php">
                                Reservation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reservation-against-cancellation.php">
                                Reservation Against Cancellation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ticket-cancellation.php">
                                Ticket Cancellation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3">
                    <h2>Administrator's Profile</h2>
                    <p>Manage your profile information here.</p>
                </div>

                <!-- Profile Information -->
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($adminProfile['username']); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($adminProfile['email']); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" value="<?php echo htmlspecialchars($adminProfile['fullName']); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" value="<?php echo htmlspecialchars($adminProfile['phone']); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" value="<?php echo htmlspecialchars($adminProfile['address']); ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>