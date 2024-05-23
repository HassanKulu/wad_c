<h1>Loops</h1?>

<h4>WHILE LOOP</h4>
<?php
$init = 0;
while($init < 7)
{
    print $init."<br>";
    $init++;
}
?>

<h4>DO-WHILE LOOP</h4>
<?php
//do-while
$i = 11;
do
{
    print $i."<br>";
    $i++;
}
while($i < 16);
?>

<h4>FOR LOOP</h4>
<?php
for($s = 45; $s < 55; $s+=2)
    {
        print $s."<br>";
    }
?>

<h4>FOR EACH</h4>
<form action="process_form.php" method="POST">
    <select name="month" id="month">
        <option value="">--Months--</option>
        <?php
        $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        foreach ($months as $month) {
            echo '<option value="' . $month . '">' . $month . '</option>';
        }
        ?>
    </select>
    <button type="submit">Submit</button>
</form>


