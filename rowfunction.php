<meta charset="UTF-8">
  <meta name="credit from W3schools about cards." content="About Page">
  <meta name="keywords" content="HTML, CSS">
  <meta name="author" content="Austin Persichetti">
  <body>
    <h1> Row Function Table </h1>
    <?php echo Form::open(['action' => 'https://cs.colostate.edu:4444/~sketti/m1/fuelviews/index.php/milestone/rowfunction', 'method' => 'post']); ?>
        <?php echo Form::label('Enter Row Value: ', 'row_value'); ?>
        <?php echo Form::input('rowvalue'); ?>
        <br><br>
        <?php echo Form::label('Enter Color Value: ', 'color_value'); ?>
        <?php echo Form::input('colorvalue'); ?>
        <br><br>
        <?php echo Form::submit('submit', 'Submit'); ?>
    <?php echo Form::close(); ?>

    <?php if (isset($color_table)): ?>
        <h2> Color Table </h2>
        <?php echo $color_table; ?>
    <?php endif; ?>

    <?php if (isset($normal_table)): ?>
        <h2> Normal Table </h2>
        <?php echo $normal_table; ?>
    <?php endif; ?>
</body>
</html> 