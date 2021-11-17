<?php
/**
 * User: Brian Taylor
 * Date: 10/29/2021
 */

$pagename = "Home";

//include the header at the top
include "includes/header.php";





?>


<div class="center"><form name="cardsearch" id="cardsearch" method="post" action="<?php echo $currentfile; ?>">
            <br><br>
            <label for="cname">Card Name:</label>
            <input type="text" name="cname" id="cname" size="60" maxlength="100" placeholder="Card Name" value="<?php if (isset($cname)) {echo $cname;} ?>"><br>
	        <label for="cquant">Number of cards you want to remove:</label>
            <input type="text" name="cquant" id="cquant" size="60" maxlength="100" placeholder="1" value="<?php if (isset($cquant)) {echo $cquant;} ?>"><br>		

            <?php if (!empty($errdescr)) {echo "<span class='error'>$errdescr</span>";} ?>
            <br><br>
            <label for="submit">Submit:</label>
            <input type="submit" name="submit" id="submit" value="submit"><br><br>
			
			<?php
                if (isset($errormsg)){
                    echo $errormsg;
                }
            ?>
        </form></div>

    <br><br>


<?php


    if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$cname = $_POST['cname'];
		$cquant = $_POST['cquant'];
		$errormsg = "";
		$error = 0;
		
		if (empty($cname)){
        echo "<span class='error'>Name is required </span><br>";
        $error = 1;
		}
		if (empty($cquant)){
        echo "<span class='error'>Quantity is required</span><br>";
        $error = 1;
		}

		if ($error == 1){
		}else{


		
		$sql = "SELECT * FROM cards
						WHERE cardname LIKE '%" . $cname . "%'
						
						";

		$result = $pdo->query($sql);

		

		foreach ($result as $row) {
			if($row['cardquantity'] <= $cquant){
				$sql = "DELETE from cards
                        WHERE cardname LIKE '%" . $cname . "%'
          
						
						";

				$result = $pdo->query($sql);
				
			}
			else if($row['cardquantity'] > $cquant){
				
				
				$new = $row['cardquantity'] - $cquant;
				
				$sql = "UPDATE cards
						SET cards.cardquantity = $new
						WHERE cardname LIKE '%" . $cname . "%'
						
						";

				$pdo->query($sql);
				
				
				
			}
			else{
				
			}	
			
		}

		}


	} 
    

	
		$sql = "SELECT * FROM cards
				INNER JOIN cardcondition ON cards.cardconditionid = cardcondition.cardconditionid
				INNER JOIN cardset ON cards.cardsetid = cardset.cardsetid
				INNER JOIN cardgame ON cards.cardgameid = cardgame.cardgameid";

		$result = $pdo->query($sql);

		?>

		<div class="center">
		<table>

			<tr><th>Card Name</th><th>Card Game</th><th>Card Condition</th><th>Card Set</th><th>Card Price</th><th>Card Quantity</th></tr>

		<?php

		foreach ($result as $row) {

			 ?>

			<tr><td><?php echo $row['cardname']?></td><td><?php echo $row['cardgamename']?></td><td><?php echo $row['cardcondition']?></td><td><?php echo $row['cardsetname']?></td><td><?php echo $row['cardprice']?></td><td><?php echo $row['cardquantity']?></td></tr>

			<?php

		}

		?>

		</table></div>
		<br><br><br>

    <?php
	
	

//include footer at the bottom
include "includes/footer.php";
?>