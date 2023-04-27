<!DOCTYPE HTML>
<html>
<script type = "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<head>
    <title>Austin Persichetti</title>
    <div id="counter" class="steps">Step #10</div>
    <h1>
        Austin Persichetti
    </h1>
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

<table id="tableRow" class="tableOne">
        <tr>
            <script>
                var colorList = ['black', 'red', 'blue', 'yellow', 'green', 'purple', 'orange', 'cyan', 'magenta', 'gray'];
                var i = 0;
                var selectedCell = null;
                var selectedColor = 'black';


                for (i; i < 10; i++) {
                    var currId = 'color' + i;
                    var currColor = colorList[i];
                    document.write('<td id="' + currId + '" class="' + currColor + '"></td>');
                    if (i == 0){
                        selectedCell = document.getElementById('color0');
                        selectedCell.classList.add('selected');
                        selectedColor = selectedCell.className;
                    }
                    document.getElementById(currId).addEventListener('click', function () {

                        if (selectedCell !== null) {
                            selectedCell.classList.remove('selected');
                        }

                        this.classList.add('selected');
                        selectedCell = this;
                        selectedColor = this.className;
                    }); 
                }
            </script>
        </tr>
    </table>
    <table id="mainTable" class="tableTwo">
        <script>
            var i = 0
            for (i; i<20; i++){
                document.write('<tr>')
                var k = 0
                for (k; k<20; k++){
                    document.write('<td id=cell'+i+','+k+' class="myCell"></td>') // onclick="showCoords('+i+','+k+')"
                }
                document.write('</tr>')
            }
            
            function showCoords(x, y) {
                alert('Cell clicked: (' + x + ',' + y + ')');
            }

            var cells = document.querySelectorAll('.myCell');
            cells.forEach(function(cell) {
                cell.addEventListener('click', function() {
                    var selectedColor = document.querySelector('.selected').classList[0];

                    if (this.style.backgroundColor === selectedColor){
                        this.style.backgroundColor = "";
                    }
                    else{
                        this.style.backgroundColor = selectedColor;
                    }
                    var coords = this.id.substring(4).split(',');
                    var x = parseInt(coords[0]);
                    var y = parseInt(coords[1]);

                    var cellAbove = document.getElementById('cell' + (x - 1) + ',' + y);
                    if (cellAbove && cellAbove.style.backgroundColor === selectedColor) {
                        cellAbove.style.backgroundColor = "";
                    } else if(cellAbove){
                        cellAbove.style.backgroundColor = selectedColor;
                    }

                    var cellToTheLeft = document.getElementById('cell' + x + ',' + (y - 1));
                    if (cellToTheLeft && cellToTheLeft.style.backgroundColor === selectedColor){
                        cellToTheLeft.style.backgroundColor = "";       
                    }             
                    else if(cellToTheLeft){
                        cellToTheLeft.style.backgroundColor = selectedColor;
                    }

                    var cellToTheRight = document.getElementById('cell' + x + ',' + (y + 1));
                    if (cellToTheRight && cellToTheRight.style.backgroundColor === selectedColor){
                        cellToTheRight.style.backgroundColor = "";       
                    }             
                    else if(cellToTheRight){
                        cellToTheRight.style.backgroundColor = selectedColor;
                    }
                    
                    var cellBelow = document.getElementById('cell' + (x + 1) + ',' + y);
                    if (cellBelow && cellBelow.style.backgroundColor === selectedColor){
                        cellBelow.style.backgroundColor = "";       
                    }             
                    else if (cellBelow){
                        cellBelow.style.backgroundColor = selectedColor;
                    }
                    
                    var cells = document.querySelectorAll('.myCell');
                        cells.forEach(function(cell) {
                            if (cell.style.backgroundColor !== '') 
                                cell.style.backgroundColor = selectedColor;
                        });
                });
            });

        </script>
    </table>
</body>

<style>
.selected {
  border: 4px solid #58fe00;
}

h1{
    text-align: left;
}

td {
    border: 1px solid lightgrey;
}

.tableOne{
    width: 800px;
    height: 80px;
}

.myCell{
    width: 33.9px;
    height: 33.9px;
}

.steps{
    float: right;
    background-color: black;
    color: white;
    font-size: 40px;
}

.black {
    background-color: black;
}

.red {
    background-color: red;
}

.blue {
    background-color: blue;
}

.yellow {
    background-color: yellow;
}

.green {
    background-color: green;
}

.purple {
    background-color: purple;
}

.orange {
    background-color: orange;
}

.cyan {
    background-color: cyan;
}

.magenta {
    background-color: magenta;
}

.gray {
    background-color: gray;
}

</style>
</html>
