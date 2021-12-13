
<html>
<head>
    <title>Monthly Summary</title>
    <!--'style2.css' in the folder 'css' will be the stylesheet for this page-->
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <!--this link is for the chart-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php
require_once 'connect.php';

#name of the month is retrieved
$sql3 = "SELECT MONTHNAME(date) AS mname,
        sum(cashin) AS input, 
        sum(spent) AS output
        FROM expense
        GROUP BY MONTH(date)";
$result2=$conn->query($sql3);
?>
<div class="container5">
<table class="table table-striped" cellpadding = "10">
    <tr>
        <th>Month</th>
        <th>Cashin</th>
        <th>Expense</th>
    </tr>
    <!--the results are fetched to be displayed-->
    <?php while ($row3 = $result2->fetch_object()): ?>
    <tr>
        <td><?php echo $row3->mname; ?></td>
        <td><?php echo $row3->input; ?></td>
        <td><?php echo $row3->output; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<a href="home.php">Back</a>
</div>

<?php
require_once 'connect.php';
$query = $conn->query(
    "SELECT MONTHNAME(date) AS mname,
        (sum(cashin)-sum(spent)) AS chart
    FROM expense
    GROUP BY MONTH(date)"
);

foreach($query as $data){
$month[] = $data['mname'];
$amount = $data['chart'];
}
?>

<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>

<script>
  const labels = <?php echo json_encode($month) ?>;
const data = {
  labels: labels,
  datasets: [{
    label: 'Bar Chart',
    data: <?php echo json_encode($amount) ?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>