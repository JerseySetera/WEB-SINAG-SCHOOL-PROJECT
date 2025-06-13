<!doctype html>
<html>
	<head>
		<style>
			body {
				font-family: Arial, sans-serif;
			}
			
			.txtbox {
				margin: 20px;
				padding: 20px;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
			}
			
			h2 {
				margin-top: 0;
			}
			
			.payinput p {
				margin: 10px 0;
			}
			
			.payinput input[type="text"] {
				width: 100px;
				padding: 5px;
			}
			
			.payinput input[type="submit"] {
				padding: 10px 20px;
				background-color: #FFBF00;
				color: white;
				border: none;
				cursor: pointer;
			}
			
			.total {
				margin-top: 20px;
				padding-top: 10px;
				border-top: 1px solid #ccc;
			}
			
			.total span {
				display: block;
				margin-bottom: 5px;
			}
		</style>
	</head>
	<body>
		<div class="txtbox">
			<form method="POST" action="">
				<div class="payinput">
					<h2>Payroll</h2>
					<?php
					$philHealth = $tax = $pagIbig = $sss = $days_work = $rate = $g_sal = $deduct = $n_sal = 0;
					if(isset($_POST['compute'])){
						$days_work = $_POST['days_work'];
						$rate = $_POST['interest_rate'];
						$g_sal = $days_work * $rate;

						// Deduction calculations
						$philHealthRate = 0.04;  // 4% contribution rate for PhilHealth
						$pagIbigRate = 0.01;      // 1% contribution rate for Pag-IBIG
						$sssRate = 0.02;          // 2% contribution rate for SSS

						$philHealth = $g_sal * $philHealthRate;
						
						$pagIbig = $g_sal * $pagIbigRate;
						$sss = $g_sal * $sssRate;

						$deduct = $philHealth + $tax + $pagIbig + $sss;
						$n_sal = $g_sal - $deduct;
					}
					?>
					<p>Number of Days Work: <input type="text" name="days_work" size="8" value="<?=$days_work;?>"/></p>
					<p>Rate Per Day: <input type="text" name="interest_rate" size="8" value="<?=$rate;?>"/></p>
					<p><input type="submit" name="compute" value="Compute Salary"/></p>
				</div>
				<div class="total">
					<span>Gross Salary: <?=number_format($g_sal, 2);?></span>
					<span>PhilHealth:- <?=number_format($philHealth, 2);?></span>
					<span>Pag-IBIG:- <?=number_format($pagIbig, 2);?></span>
					<span>SSS:- <?=number_format($sss, 2);?></span>
					<span>Net Salary: <?=number_format($n_sal, 2);?></span>
				</div>
			</form>
		</div>
	</body>
</html>
