<?php
/**
 * Class: csci490
 * Users: Matthew Simpson, Justin Bartholomew, Austin Taylor
 * Date: 10/9/21
 */

//SESSIONS
session_start();
$currentfile = basename($_SERVER['PHP_SELF']);

//CURRENT TIME
$rightnow = time();

//ERROR REPORTING
error_reporting(E_ALL);
ini_set('display_errors','1');

//REQUIRED FILES
require_once "includes/header.php";

/* ***********************************************************************
* SET INITIAL VARIABLES
* ***********************************************************************
*/
$showform = 1;
$errmsg= 0;
$errcname ="";
$errcimage ="";
$errcprice="";
$errcquantity="";
/* ***********************************************************************
* PROCESS THE FORM UPON SUBMIT
* ***********************************************************************
*/
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $cname = (trim($_POST['cname']));
    $cimage = (trim($_POST['cimage']));
    $cprice = (trim($_POST["cprice"]));
    $cquantity = (trim($_POST["cquantity"]));


/* ***********************************************************************
* CHECK EMPTY FIELDS
* ***********************************************************************
*/
    if (empty($cname)){
        $errcname = "<span class='error'>Name is required </span>";
        $errmsg = 1;
    }
    if (empty($cimage)){
        $errimage = "<span class='error'>Image is required</span>";
        $errmsg = 1;
    }
    if (empty($cprice)){
       $errcprice = "<span class='error'>Price is required</span>";
       $errmsg = 1;
    }
    if (empty($cquantity)){
        $errcquantity = "<span class='error'>Quantity is required</span>";
        $errmsg = 1;
    }
/* ***********************************************************************
* CHECK EXISTING DATA
* ***********************************************************************
*/
   // $sql = "SELECT * FROM csci490 WHERE cname = ?";
  //  $cnametaken = checkDuplicates($pdo, $sql, $cname);
  //  if ($cnametaken){
 //       $errmsg = 1;
  //      $errcname .= "<span class='error'>The Card name is already listed</span>";
 //   }

/* ***********************************************************************
* CONTROL CODE
* ***********************************************************************
*/
    if ($errmsg == 1){
        echo "<p class ='error'>There are errors. Please make changes and try again.</p>";
    }else{

/* ***********************************************************************
* INSERT INTO THE DATABASE
* ***********************************************************************
*/
        try {
            $sql = "INSERT INTO cards (`cardName`, `cardImage`, `cardPrice`, `cardQuantity`)
                   VALUES (:cname, :cimage, :cprice, :cquantity)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue('cname', $cname);
            $stmt->bindValue('cimage', $cimage);
            $stmt->bindValue('cprice', $cprice);
            $stmt->bindValue('cquantity', $cquantity);
            $stmt->execute();
			$showform = 0;
			echo "<p class='success'>Thank you! Form Submitted.</p>";

        } catch (PDOException $e){
            die($e->getMESSage());
        }
    }
}

/* ***********************************************************************
* DISPLAY FORM
* ***********************************************************************
*/
if ($showform == 1){
    ?>
    <form name="insert" id="insert" action="<?php echo $currentfile;?>" method="post">
    <fieldset>
        <legend> New Card Registration</legend>
        <table>
            <tr>
                <?php
                if (isset($errcname)){
                    echo $errcname . "<br>";
                }
                ?>
                <th><label for="cname"> Card Name: </label></th>
                <td><input type="text" name="cname" id="cname" placeholder="Enter a Card Name" value="<?php if (isset($cname)) {echo $cname;}?>"/></td>
            </tr>
            <tr>
                <?php
                if (isset($errimage)){
                    echo $errimage . "<br>";
                }
                ?>
                <th><label for="cimage"> Enter the URL for your card's image: </label></th>
                <td><input type="text" class="form-control" name="cimage" id="cimage" placeholder="https://testimage.jpg"
                           value="<?php if (isset($cimage)) {echo $cimage;}?>"</td>
            </tr>
            <tr>
                <?php
                if (isset($errcprice)){
                    echo $errcprice . "<br>";
                }
                ?>
                <th><label for="cprice"> Card Price: </label></th>
                <td><input type="text" class="form-control" name="cprice" id="cprice" placeholder="$9.99"
                           value="<?php if (isset($cprice)) {echo $cprice;}?>"</td>
            </tr>
            <tr>
                <?php
                if (isset($errcquantity)){
                    echo $errcquantity . "<br>";
                }
                ?>
                <th><label for="cquantity"> How many cards?: </label></th>
                <td><input type="text" class="form-control" name="cquantity" id="cquantity" placeholder="3"
                           value="<?php if (isset($cquantity)) {echo $cquantity;}?>"</td>
            </tr>
            <tr>
                <th><label for="submit">Submit: </label></th>
                <td><input type="submit" name="submit" id="submit" value="submit"></td>
            </tr>
        </table>
    </fieldset>
</form>
    <?php
}
require_once "includes/footer.php";
?>