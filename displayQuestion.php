<?php
    include("session.php");
    $_SESSION['qno']++;
    $sqlq="SELECT * FROM questionbank WHERE qno= ".$_SESSION['qno'];
    $result = mysqli_query($conn,$sqlq);
    global $row;$sans=0;
    //echo $_SESSION['score'];
    //echo $_SESSION['handle'];
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $_SESSION['question']=$row['question'];
            $_SESSION['a']=$row['a'];
            $_SESSION['b']=$row['b'];
            $_SESSION['c']=$row['c'];
            $_SESSION['d']=$row['d'];
            $_SESSION['correct']=$row['correct'];
        }
    }
?>
<html lang ="en">
<head>
<title>Test</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/mdb.min.css">
    <style>
        .container{
            padding: 10px;
            margin: auto;
            display: block;
        }
        .btn-toolbar{
            margin: auto;
            float: right;
        
            
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="display-4"><small class="text-muted">Hello </small><?php echo $_SESSION['handle']?></h1>
        <p class="lead" >Your score: <?php echo $_SESSION['score']?></p>
        
    <form id="statement" action="score.php" method="post">
        <div id="stage"> </div>
    <div class="md-form">
        <textarea type="text" name="quest" id="quest" class="md-textarea" readonly ><?php echo $_SESSION['question'];  ?></textarea>
        <label for="quest">Question <?php echo $_SESSION['qno'];  ?></label>
        
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="md-form">
               <!-- <textarea type = "text" name="opt1" id="opt1" class="md-textarea" ></textarea>
                <label for = "opt1" >Option A</label>-->
                    <fieldset class="form-group">
                        <input type="radio" class="radio" name ="radiobutton" id="checkbox1" value="1">
                        <label for="checkbox1"><?php echo $_SESSION['a'];  ?></label>
                        
                    </fieldset>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="md-form">
                    <fieldset class="form-group">
                        <input type="radio" class="radio" name ="radiobutton" id="checkbox2" value="2">
                        <label for="checkbox2"><?php echo $_SESSION['b'];  ?></label>
                        
                    </fieldset>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="md-form">
                    <fieldset class="form-group">
                        <input type="radio" class="radio" name ="radiobutton" id="checkbox3" value="3">
                        <label for="checkbox3"><?php echo $_SESSION['c'];  ?></label>
                      
                    </fieldset>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="md-form">
                    <fieldset class="form-group">
                        <input type="radio" class="radio" name ="radiobutton" id="checkbox4" value="4">
                        <label for="checkbox4"><?php echo $_SESSION['d'];  ?></label>
                        
                    </fieldset>
            </div>
        </div>
    </div>
    <button class="btn btn-primary waves-effect waves-light " type="button"  name="btn-save" id="btn-save" >Save</button>
        <button class="btn btn-warning waves-effect waves-light " type="button"  name="btn-mark" id="btn-mark" >BOOKMARK</button>
            <button class="btn btn-default waves-effect waves-light " type="button"  name="btn-clear" id="btn-clear" >CLEAR</button>
        <?php 
        if($_SESSION['total']>$_SESSION['qno'])
        {
            ?>
            <button class="btn btn-dark-green waves-effect waves-light " type="submit"  name="btn-next" id="btn-next" >NEXT</button>
              <?php
        }
        ?>
            <button class="btn btn-danger waves-effect waves-light " type="submit"  name="btn-submit" id="btn-submit" >SUBMIT</button>
    </form>
        
        </div>
</body>
</html>