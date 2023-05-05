<!DOCTYPE HTML>
<html>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<head>
</head>

<body>
    <h1> Table </h1>
    <?php echo Form::open(['action' => 'https://cs.colostate.edu:4444/~glemicnt/m1/fuelviews/index.php/milestone/rowfunction', 'method' => 'post']); ?>
    <?php echo Form::label('Enter Row Value: ', 'row_value'); ?>
    <?php echo Form::input('rowvalue'); ?>
    <br><br>
    <?php echo Form::label('Enter Color Value: ', 'color_value'); ?>
    <?php echo Form::input('colorvalue'); ?>
    <br><br>
    <?php echo Form::submit('submit', 'Submit'); ?>
    <?php echo Form::close(); ?>

    <h1> Add a Color to the Database </h1>
    <?php echo Form::open(['action' => 'https://cs.colostate.edu:4444/~glemicnt/m1/fuelviews/index.php/milestone/addcolor', 'method' => 'post']); ?>
    <?php echo Form::label('Enter Color Name: ', 'color_name'); ?>
    <?php echo Form::input('color_name'); ?>
    <br><br>
    <?php echo Form::label('Enter Color hex: ', 'color_hex'); ?>
    <?php echo Form::input('color_hex'); ?>
    <br><br>
    <?php echo Form::submit('submit', 'Submit'); ?>
    <?php echo Form::close(); ?>

   

    <?php if (isset($table)): ?>
        <?php echo $table; ?>
    <?php endif; ?>
</body>

</html>
