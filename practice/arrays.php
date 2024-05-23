<h1>Arrays</h1>

<?php
// Indexed Arrays
$fname = ["Alex Okama", "Peter", "James"];

// Printing Arrays
print_r($fname) ;

echo '<br>'; // Line Break

$colors = array("Black","Green","Yellow","White","Red","Blue");

// Length of array
var_dump($colors);
?>


<pre>
    <?php
        print_r($colors);
    ?>
</pre>
<?php
       print $colors[5];
?>

<?php
//Assosiative Arrays
$user = 
[
    "fullname" => "Alex Okama",
    "email" => "AOkama@yahoo.com",
    "phone" => "+254740328459"
];
?>

<pre>
    <?php
        print_r($user);
    ?>
</pre>

<?php
//Multidimensional Arrays
$user_details = 
[
    "Director" => array
    (
    "fullname" => "Alex Okama",
    "email" => "director@yahoo.com",
    "phone" =>
    [
        "Mobile" => "254765986879",
        "Work" => "254765986879",
        "School" => "254765986879"
    ]
    ),
    "Manager" => array
    (
    "fullname" => "Alex Okama",
    "email" => "manager@yahoo.com",
    "phone" =>
    [
        "Mobile" => "254765986879",
        "Work" => "254765986879",
        "School" => "254765986879"
    ]
    ),
    "Secretary" => array
    (
    "fullname" => "Alex Okama",
    "email" => "secretary@yahoo.com",
    "phone" =>
    [
        "Mobile" => "254765986879",
        "Work" => "254765986879",
        "School" => "254765986879"
    ]
    ),
];
?>

<pre>
    <?php
        print($user_details["Secretary"]["phone"]["Work"]);
    ?>
</pre>

<?php
    $items = ["book","pen",456,45.5,"File54"];
?>

<pre>
    <?php
        var_dump($items);
    ?>
</pre>

<?php
    $age = [45,42,23];

    $user_age = array_combine($fname,$age);
    $user_data = array_merge($fname,$age);

    print_r($user_age);
    print_r($user_data);
?>



