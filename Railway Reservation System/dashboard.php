<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BiyaheRail</title>
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
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="administrator-profile.php">
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
                    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
                    <p>Manage your railway reservations here.</p>
                </div>

                <!-- Cards -->
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Passengers</h5>
                                <p class="card-text">17</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Trains</h5>
                                <p class="card-text">9</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">Reservations</h5>
                                <p class="card-text">5</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">Pending Tickets</h5>
                                <p class="card-text">1</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="mt-4">
                    <h4>Trains</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Train Number</th>
                                <th>Train</th>
                                <th>Route</th>
                                <th>Departure</th>
                                <th>Arrival</th>
                                <th>Dep.Time</th>
                                <th>Total Passengers</th>
                                <th>Fare</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>CA-707</td>
                                <td>Silver Meteor</td>
                                <td>New York - Miami</td>
                                <td>New York</td>
                                <td>Miami</td>
                                <td>10:00 AM</td>
                                <td>200</td>
                                <td>$128</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <h4>Passenger Reservations</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Passenger</th>
                                <th>Address</th>
                                <th>Train Number</th>
                                <th>Train</th>
                                <th>Departure</th>
                                <th>Arrival</th>
                                <th>Fare</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Barnes</td>
                                <td>32 Ocello Street</td>
                                <td>CA-697</td>
                                <td>Iron Range Express</td>
                                <td>Stockton</td>
                                <td>San Diego</td>
                                <td>$43</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>