<!DOCTYPE HTML>
<html>
<head>
<title>
</title>
</head>
<body>
<h1> Table </h1>
<?php echo Form::open(['action' => 'milestone/rowfunction', 'method' => 'post']); ?>
<?php echo Form::label('Enter Row Value: ', 'row_value'); ?>
<?php echo Form::input('rowvalue'); ?>
<?php echo Form::submit('submit', 'Submit'); ?>
<?php echo Form::close(); ?>
<?php echo Form::open(['action' => 'milestone/colorfunction', 'method' => 'post']); ?>
<?php echo Form::label('Enter Color Value: ', 'color_value'); ?>
<?php echo Form::input('colorvalue'); ?>
<?php echo Form::submit('submit', 'Submit'); ?>
<?php echo Form::close(); ?>
</body>
</html>
