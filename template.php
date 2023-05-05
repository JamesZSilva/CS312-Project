
<meta charset="UTF-8">
<meta name="description" content="My Homepage">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="Glen McIntosh">
<?php

echo Asset::css($css) ?>
<?php

$url = Uri::current();
$url = str_replace("fuelviews/", "fuelviews/index/", $url);
?>
<!-- <div class="nav">
    <?php echo '<a href ="https://cs.colostate.edu:4444/~glemicnt/m1/fuelviews/index.php/milestone/index"> Home </a>  </li>' ?>
    <?php echo '<a href ="https://cs.colostate.edu:4444/~glemicnt/m1/fuelviews/index.php/milestone/about"> About </a>  </li>' ?>
    <?php echo '<a href ="https://cs.colostate.edu:4444/~glemicnt/m1/fuelviews/index.php/milestone/table"> Table </a>  </li>' ?>
</div> -->

<div class="nav">
    <button onclick="window.location.href='https://cs.colostate.edu:4444/~glemicnt/m1/fuelviews/index.php/milestone/index';">Home</button></li>
    <button onclick="window.location.href='https://cs.colostate.edu:4444/~glemicnt/m1/fuelviews/index.php/milestone/about';">About</button></li>
    <button onclick="window.location.href='https://cs.colostate.edu:4444/~glemicnt/m1/fuelviews/index.php/milestone/table';">Table</button></li>

<?php echo $content ?>
