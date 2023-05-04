<!DOCTYPE HTML>
<html>
<script type = "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<head>
</head>
<body>
    <h1> Table </h1>
    <?php echo Form::open(['action' => 'https://cs.colostate.edu:4444/~sketti/m1/fuelviews/index.php/milestone/rowfunction', 'method' => 'post']); ?>
        <?php echo Form::label('Enter Row Value: ', 'row_value'); ?>
        <?php echo Form::input('rowvalue'); ?>
        <br><br>
        <?php echo Form::label('Enter Color Value: ', 'color_value'); ?>
        <?php echo Form::input('colorvalue'); ?>
        <br><br>
        <?php echo Form::submit('submit', 'Submit'); ?>
    <?php echo Form::close(); ?>
    
    <?php if (isset($table)): ?>
        <?php echo $table; ?>
    <?php endif; ?>
</body>
</html>
