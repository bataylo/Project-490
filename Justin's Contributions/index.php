<?php
/**
 * Class: csci330fa20
 * User: Justin Bartholomew
 * Date: 9/21/2020
 * Time: 12:29 PM
 */

$pagename = "Home";

//include the header at the top
include "includes/header.php";



?>


<div class="center"><form name="cardsearch" id="cardsearch" method="post" action="<?php echo $currentfile; ?>">
            <br><br>
            <label for="cname">Card Name:</label>
            <input type="text" name="cname" id="cname" size="60" maxlength="100" placeholder="Card Name" value="<?php if (isset($cname)) {echo $cname;} ?>"><br>
            <br><br>
            <label for="descr">Card Game:</label><br>
            <input type="text" name="cgame" id="cgame" size="60" maxlength="250" placeholder="Card Game Name" value="<?php if (isset($cgame)) {echo $cgame;} ?>"><br>
            <br><br>
			<label for="descr">Card Condition:</label><br>
            <input type="text" name="ccondition" id="ccondition" size="60" maxlength="250" placeholder="Card Condition" value="<?php if (isset($ccondition)) {echo $ccondition;} ?>"><br>
            <br><br>
			<label for="descr">Card Set:</label><br>
            <input type="text" name="cset" id="cset" size="60" maxlength="250" placeholder="Card Set" value="<?php if (isset($cset)) {echo $cset;} ?>"><br>
            <br><br>
			<label for="descr">Card Price:</label><br>
            <input type="text" name="cprice" id="cprice" size="60" maxlength="250" placeholder="Card Price" value="<?php if (isset($cprice)) {echo $cprice;} ?>"><br>
            <br><br>
			<label for="descr">Card Quantity:</label><br>
            <input type="text" name="cquantity" id="cquantity" size="60" maxlength="250" placeholder="Card Quantity" value="<?php if (isset($cquantity)) {echo $cquantity;} ?>"><br>
            <br><br>
            <?php if (!empty($errdescr)) {echo "<span class='error'>$errdescr</span>";} ?>
            <br><br>
            <label for="submit">Submit:</label>
            <input type="submit" name="submit" id="submit" value="submit"><br><br>
        </form></div>

    <br><br>


<?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$cname = $_POST['cname'];
		$cgame = $_POST['cgame'];
		$ccondition = $_POST['ccondition'];
		$cset = $_POST['cset'];
		$cprice = $_POST['cprice'];
		$cquantity = $_POST['cquantity'];

        $sql = "SELECT * FROM cards
			INNER JOIN cardcondition ON cards.cardconditionid = cardcondition.cardconditionid
			INNER JOIN cardset ON cards.cardsetid = cardset.cardsetid
			INNER JOIN cardgame ON cards.cardgameid = cardgame.cardgameid 
                        WHERE cardname LIKE '%" . $cname . "%'
                        AND cardgamename LIKE '%" . $cgame . "%'
						AND cardcondition LIKE '%" . $ccondition . "%'
						AND cardsetname LIKE '%" . $cset . "%'
						AND cardprice LIKE '%" . $cprice . "%'
						AND cardquantity LIKE '%" . $cquantity . "%'
						
						
						";

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

	}else {
    
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
	
	}

//include footer at the bottom
include "includes/footer.php";
?>