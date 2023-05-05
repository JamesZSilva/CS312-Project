<meta charset="UTF-8">
<meta name="" content="About Page">
<meta name="keywords" content="HTML, CSS">
<meta name="author" content="Glen McIntosh">

<body>

    <!-- <?php echo Form::open(['action' => 'https://cs.colostate.edu:4444/~glemicnt/m1/fuelviews/index.php/milestone/addcolor', 'method' => 'post']); ?>
        <?php echo Form::label('Enter Row Value: ', 'row_value'); ?>
        <?php echo Form::input('rowvalue'); ?>
        <br><br>
        <?php echo Form::label('Enter Color Value: ', 'color_value'); ?>
        <?php echo Form::input('colorvalue'); ?>
        <br><br>
        <?php echo Form::submit('submit', 'Submit'); ?>
    <?php echo Form::close(); ?> -->

    <?php
    if (isset($_POST['color_name']) && isset($_POST['color_hex'])) {
        $color_name = $_POST['color_name'];
        $color_hex = $_POST['color_hex'];

        // Insert the color into the database
        $query = "INSERT INTO colors (color_name, color_hex) VALUES ('$color_name', '$color_hex')";
    }
    ?>

    <?php if (isset($success)): ?>
        <div class="success">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
