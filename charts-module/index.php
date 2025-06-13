<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Access Level', 'Count'],
                <?php
                $accessLevels = array(
                    'Baker' => 0,
                    'Manager' => 0,
                    'Staff' => 0,
                    'Cashier' => 0
                );
                
                if($user->list_users() != false){
                    foreach($user->list_users() as $value){
                        extract($value);
                        if (isset($accessLevels[$user_access])) {
                            $accessLevels[$user_access]++;
                        }
                    }
                }
                
                foreach ($accessLevels as $accessLevel => $count) {
                    echo "['$accessLevel', $count],";
                }
                ?>
            ]);

            var options = {
                title: 'User Access Levels',
                is3D: true,
                backgroundColor: 'transparent'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h3 {
            margin-bottom: 20px;
        }

        #piechart_3d {
            width: 800px;
            height: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h3>&nbsp &nbsp User Access Level Pie Chart</h3>

    <div id="piechart_3d"></div>

   
    </div>
</body>
</html>
