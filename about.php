<html>


<body>
    <div class="center_abtpg">
        <h1 style="color:blue">About Page</h1>
    </div>
    <div class="center_abtpg">
        <?php
        //use Fuel\Core\Asset;
        
        echo Asset::img('Austin-Picture.jpeg', array('style' => 'width:100%')) ?>
        <div class="container">
            <h4 style="color:blue"><b>Austin Persichetti</b></h4>
            <p style="color:blue">My name is Austin Persichetti, I am a third year Colorado State University student studying
                Computer Science with a minor in Business Administration. My main goals are to better myself and
                learn the most I can to prepare for my future careeer.
            <p>
        </div>
    </div>
    <div class="center_abtpg">
        <?php
        //use Fuel\Core\Asset;
        echo Asset::img('selfie.jpg', array('style' => 'width:100%')) ?>
        <div class="container">
            <h4 style="color:yellow"><b>Glen</b></h4>
            <p>
            <p style="color:yellow">My name is Glen McIntosh, I am a third year Colorado State University student studying
                Computer Science with a minor in Business Administration. I want to learn as much as I can so I
                can have a fun and fulfilling career.
            </p>
        </div>
    </div>
</body>

</html>
