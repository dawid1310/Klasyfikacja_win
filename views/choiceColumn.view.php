<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="w-75 mx-auto"><br><br>
    <div class="w-50 mx-auto"><!--float-left">-->
        <div class="w-100 btn btn-success active">
            UploadFile.PHP
        </div><br><br>
        <div class="w-75 mx-auto">
                <div class="form-group">
                <form action="<?php echo $page?>" method="post">
                    <fieldset>
                        <legend>Selecting elements</legend>
                        <p>
                            <label>Select list</label>
                            <select name = "column">
                            <?php 
                            $i=0;
                            foreach ($heads as $head): ?>
                            <option value = <?=$i;?>><?=$head;?></option>
                            <?php 
                            $i++;
                            endforeach;?>
                            </select>
                        </p>
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div><br><br>
        </div>
    </div>
</div>

</body>
</html> 