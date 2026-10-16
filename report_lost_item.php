
<?php
require "db.php";

$message = "";
$messageType = "";
$itemName = "";
$category = "";
$description = "";
$dateLost = "";
$location = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $itemName = trim($_POST["item_name"] ?? "");
    $category = trim($_POST["category"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $dateLost = trim($_POST["date_lost"] ?? "");
    $location = trim($_POST["location"] ?? "");

    if (
        $itemName === "" ||
        $category === "" ||
        $dateLost === "" ||
        $location === ""
    ) {
        $message = "Please fill in all required fields.";
        $messageType = "error";

    } elseif (
        !DateTime::createFromFormat('!Y-m-d', $dateLost) ||
        DateTime::createFromFormat('!Y-m-d', $dateLost)->format('Y-m-d') !== $dateLost
    ) {
        $message = "Please enter a valid date.";
        $messageType = "error";

    } elseif ($dateLost > date('Y-m-d')) {
        $message = "Date lost cannot be in the future.";
        $messageType = "error";

    } else {
        $stmt = $conn->prepare(
            "INSERT INTO lost_items
            (item_name, category, description, date_lost, location)
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "sssss",
            $itemName,
            $category,
            $description,
            $dateLost,
            $location
        );

        if ($stmt->execute()) {
            $message = "Lost item report submitted successfully!";
            $messageType = "success";

            $itemName = "";
            $category = "";
            $description = "";
            $dateLost = "";
            $location = "";
        } else {
            $message = "Unable to save the report. Please try again.";
            $messageType = "error";
        }

        $stmt->close();
    }
}

$result = $conn->query(
    "SELECT id, item_name, category, description,
            date_lost, location, created_at
     FROM lost_items ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLFMS - Report Lost Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <header>
        <h1>Campus Lost and Found</h1>
        <p>Report and track items lost on campus</p>
    </header>

    <section class="card">
        <h2>Report a Lost Item</h2>

        <?php if ($message !== ""): ?>
            <div id="form-message"
                 class="message <?= htmlspecialchars($messageType) ?>"
                 role="status">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <form id="lost-item-form" method="POST"
              action="report_lost_item.php">

            <label for="item_name">Item Name *</label>
            <input type="text" id="item_name" name="item_name"
                   maxlength="100" required
                   value="<?= htmlspecialchars($itemName) ?>">

            <label for="category">Category *</label>
            <select id="category" name="category" required>
                <option value="">Select a category</option>
                <?php
                $categories = [
                    "Electronics", "ID Card", "Books",
                    "Accessories", "Wallet", "Other"
                ];
                foreach ($categories as $option):
                ?>
                    <option value="<?= htmlspecialchars($option) ?>"
                        <?= $category === $option ? "selected" : "" ?>>
                        <?= htmlspecialchars($option) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="description">Description</label>
            <textarea id="description" name="description"
                      rows="3"><?= htmlspecialchars($description) ?></textarea>

            <label for="date_lost">Date Lost *</label>
            <input type="date" id="date_lost" name="date_lost"
                   max="<?= date('Y-m-d') ?>" required
                   value="<?= htmlspecialchars($dateLost) ?>">

            <label for="location">Location *</label>
            <input type="text" id="location" name="location"
                   maxlength="100" required
                   value="<?= htmlspecialchars($location) ?>">

            <button type="submit" id="submit-report">
                Submit Report
            </button>
        </form>
    </section>

    <section class="card">
        <h2>Reported Lost Items</h2>

        <?php if ($result && $result->num_rows > 0): ?>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Category</th>
                            <th>Date Lost</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= (int)$row["id"] ?></td>
                            <td><?= htmlspecialchars($row["item_name"]) ?></td>
                            <td><?= htmlspecialchars($row["category"]) ?></td>
                            <td><?= htmlspecialchars($row["date_lost"]) ?></td>
                            <td><?= htmlspecialchars($row["location"]) ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p id="no-reports">No lost item reports yet.</p>
        <?php endif; ?>
    </section>

    <footer>
        <p>CLFMS | Campus Lost and Found Management System</p>
    </footer>
</div>

</body>
</html>
