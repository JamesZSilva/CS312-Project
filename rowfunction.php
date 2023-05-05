<meta charset="UTF-8">
<meta name="credit from W3schools about cards." content="About Page">
<meta name="keywords" content="HTML, CSS">
<meta name="author" content="Austin Persichetti">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<head>
</head>
  <body>
        <h1> Add a Color to the Database </h1>
        <?php echo Form::open(['action' => 'https://cs.colostate.edu:4444/~sketti/m1/fuelviews/index.php/milestone/addcolor', 'method' => 'post']); ?>
        <?php echo Form::label('Enter Color Name: ', 'color_name'); ?>
        <?php echo Form::input('color_name'); ?>
        <br><br>
        <?php echo Form::label('Enter Color hex: ', 'color_hex'); ?>
        <?php echo Form::input('color_hex'); ?>
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

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(e) {
                var rowValue = $("#rowValueInput").val();
                var colorValue = $("#colorValueInput").val();
                
                if (rowValue < 2 || rowValue > 26 || colorValue < 1 || colorValue > 10) {
                    alert("Invalid input. Please enter a row value between 2 and 26 and a color value between 1 and 10.");
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html> 
