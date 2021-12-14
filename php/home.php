<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>

<html>
<head>
    <title>Expense Tracker</title>
    <!--'style1.css' in the folder 'css'  will be the stylesheet for this page-->
    <link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>
    <!--logout option-->
    <a href="logout.php">LOGOUT</a>
    <h1> Expense Tracker app </h1>
    <!--welcome message-->
    <h2>Welcome <?php echo $_SESSION['username']; ?> </h2>
    
    <div class="container3">
        <?php
        require_once 'connect.php';
        #the sum of all cashout is substracted from the sum of all cashin
        $sql2 = "SELECT (sum(cashin) - sum(spent)) AS Balance from expense";
        $res1 = $conn->query($sql2);

        #display balance
        while ($row3 = $res1-> fetch_row()){
        echo "<div class= 'balance'>";
        echo "<p> <h3> Balance: MUR " . $row3[0]."</h3></p>";
        echo "</div>";
        }
        
        ?>
    </div>
    
    <div class="container1">
        <!--this form is posted to cashin.php-->
        <form action="cashin.php" method="POST">
        <label for="cash">Cash In (MUR):</label>
        <input type="number" id="cash" name="cash">
        <p></p>
        <label for="date">Date:</label>
        <input type="date" id="date1" name="date1">
        <p></p>
        <button type="submit" name="in">Save</button>
        </form>
    </div>
    
    <div class="container">
        <!--This form is posted to insert.php-->
        <form action="insert.php" method="POST">
            <label for="expense">Amount spent (MUR):</label>
            <input type="number" id="expense" name="expense">
            <p></p>
            <label for="details">Details of amount spent:</label>
            <input type="text" id="details" name="details">
            <p></p>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date">
            <p></p>
            <button type="submit" name="exp">Save</button>
        </form>
    </div>

    <div class="container2">
        <label>Click here for Monthly Summary</label>
        <p></p>
        <!--on clicking on the button,we will be redirected to month.php-->
        <a href="month.php">
            <button>Monthly</button>
        </a>
    </div>
</body>
</html>

<div class="container4">
<?php
require_once 'connect.php';

#summary section
print("<h2> Summary </h2>");
#everything is selected from the expense table
$sql = "SELECT * FROM expense";
$res = $conn->query($sql);

if($res-> num_rows > 0){
    #the result rows are being fetched as associative array
    while ($row = $res-> fetch_assoc()){
    echo "<div class= 'summary'>";
    echo "<p> Cashin: " . $row['cashin']."</p>". "<p> Expense: " . $row['spent'] . "</p>" . "<p> Details: " . $row['details'] . "</p>" . "<p> Date: " .$row['date'];
    echo "</div>";
    echo "--------------------------";
    }
}

?>
</div>