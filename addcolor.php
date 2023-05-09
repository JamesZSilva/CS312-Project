<meta charset="UTF-8">
<meta name="" content="About Page">
<meta name="keywords" content="HTML, CSS">
<meta name="author" content="Glen McIntosh">
<link rel="stylesheet" type="text/css" href="m1.css" />
<form id="color-form" method="POST">

    <body>

        <?php echo Form::open(['action' => 'https://cs.colostate.edu:4444/~glemicnt/m1/fuelviews/index.php/milestone/rowfunction', 'method' => 'post']); ?>
        <?php echo Form::label('Enter Row Value: ', 'row_value'); ?>
        <?php echo Form::input('rowvalue'); ?>
        <br><br>
        <?php echo Form::label('Enter Color Value: ', 'color_value'); ?>
        <?php echo Form::input('colorvalue'); ?>
        <br><br>
        <?php echo Form::submit('submit', 'Submit'); ?>
        <?php echo Form::close(); ?>

        <?php 
        if (isset($_POST['name']) && isset($_POST['color_hex'])) {
            $color_name = Input::post("color_name");
            $hex_value = Input::post("hex_value");
        
            // insert color into database
            $sql = "INSERT INTO colors (color_name, hex_value) VALUES ( '$color_name', '$hex_value')";
            if ($conn->query($sql) === TRUE) {
                //$new_id = $conn->insert_id;
                Session::set_flash("success", "Color added to database");
            } else {
                Session::set_flash("error", "Error: " . $sql . "<br>" . $conn->error);
            }
        }
        ?>

    </body>

