<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "biyahe_rail";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $passenger = $_POST['passenger'];
    $address = $_POST['address'];
    $trainNumber = $_POST['trainNumber'];
    $train = $_POST['train'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $fare = $_POST['fare'];

    $stmt = $conn->prepare("INSERT INTO reservations (passenger, address, trainNumber, train, departure, arrival, fare) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $passenger, $address, $trainNumber, $train, $departure, $arrival, $fare);
    $stmt->execute();
    $stmt->close();
}

// Retrieve reservations
$reservations = [];
$result = $conn->query("SELECT * FROM reservations");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation - BiyaheRail</title>
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
                            <a class="nav-link active" href="#">
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
                    <h2>Reservations</h2>
                    <p>Manage your reservations here.</p>
                </div>

                <!-- Reservation Table -->
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
                            <?php foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reservation['passenger']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['address']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['trainNumber']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['train']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['departure']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['arrival']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['fare']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Add Reservation Form -->
                <div class="mt-4">
                    <h4>Add New Reservation</h4>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="passenger" class="form-label">Passenger</label>
                            <input type="text" class="form-control" id="passenger" name="passenger" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="trainNumber" class="form-label">Train Number</label>
                            <input type="text" class="form-control" id="trainNumber" name="trainNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="train" class="form-label">Train</label>
                            <input type="text" class="form-control" id="train" name="train" required>
                        </div>
                        <div class="mb-3">
                            <label for="departure" class="form-label">Departure</label>
                            <input type="text" class="form-control" id="departure" name="departure" required>
                        </div>
                        <div class="mb-3">
                            <label for="arrival" class="form-label">Arrival</label>
                            <input type="text" class="form-control" id="arrival" name="arrival" required>
                        </div>
                        <div class="mb-3">
                            <label for="fare" class="form-label">Fare</label>
                            <input type="text" class="form-control" id="fare" name="fare" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Reservation</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>