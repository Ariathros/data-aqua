<?php
    include("../../includes/connections.php");
    include("../includes/sessions.php");

    $sales = 0;
    $profit = 0;
    $roi = 0;
    $interval = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $start_date = $_POST['start_date'];
        $expenses = $_POST['expenses'];
        $harvest_date = $_POST['harvest_date'];
        $harvest = $_POST['harvest'];
        $price = $_POST['price'];

        $start_date_obj = date_create($start_date);
        $harvest_date_obj = date_create($harvest_date);
        $sales = $harvest * $price;
        $profit = $sales - $expenses;
        $roi = ($profit / $expenses) * 100;
        $interval = date_diff($start_date_obj, $harvest_date_obj);
    }
?>

<html>
<head>
    <title>Calculations</title>
    <?php include("../../includes/bootstrap-header.php"); ?>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include "../includes/sidebar.php"; ?>
    <div class="calculations">
        <h1>Return of Investment Calculator</h1>
        <p>1. Fill in the input fields.</p>
        <p>2. Press "Calculate ROI".</p>
        <p>3. Results will be shown in the 2nd column.</p>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-6">
                    <form method="post" action="">
                        <div class="input-group mb-3 has-validation">
                            <span class="input-group-text">Start of Farming</span>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <div class="input-group mb-3 has-validation">
                            <span class="input-group-text">Total expenses</span>
                            <input type="number" class="form-control" name="expenses" required>
                            <span class="input-group-text end">₱</span>
                        </div>
                        <div class="input-group mb-3 has-validation">
                            <span class="input-group-text">Harvest Time</span>
                            <input type="date" class="form-control" name="harvest_date" required>
                        </div>
                        <div class="input-group mb-3 has-validation">
                            <span class="input-group-text">Total harvest</span>
                            <input type="number" class="form-control" name="harvest" required>
                            <span class="input-group-text end">kg</span>
                        </div>
                        <div class="input-group mb-3 has-validation">
                            <span class="input-group-text">Market price</span>
                            <input type="number" class="form-control" name="price" required>
                            <span class="input-group-text end">₱/kg</span>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-auto">
                                <input class="btn btn-primary fs-5" type="submit" name="calcu" value="Calculate ROI">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Sales</span>
                        <input type="number" class="form-control" name="sales" value="<?php echo $sales; ?>" readonly>
                        <span class="input-group-text end">₱</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Profit</span>
                        <input type="number" class="form-control" name="profit" value="<?php echo $profit; ?>" readonly>
                        <span class="input-group-text end">₱</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">ROI</span>
                        <input type="number" class="form-control" name="roi" value="<?php echo $roi; ?>" readonly>
                        <span class="input-group-text end">%</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Duration</span>
                        <input type="" class="form-control" name="roi" value="<?php echo $interval->format("%m months and %d days"); ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
