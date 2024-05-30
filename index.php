<?php
    if (isset($_POST['generate'])) {
        $prefix = trim($_POST['prefix']);
        $password = ($_POST['password']);
        $alphabeth = "abcdefghijklmnopqrstuvwxyz@" ;
        $generated = substr($prefix.str_shuffle($alphabeth),0,$password);
        $arr =[];

        for($i=0;$i<5;$i++){
            if (in_array($generated,$arr)){
                $generated = substr($prefix.str_shuffle($generated),0,$password);
                array_push($arr, $generated);
            }else{
                array_push($arr,$generated);
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Password Generator App</title>
</head>
<body>
    <div class="container mt-3">
        <h2 class="text-center mb-5 mt-3">Password Generator</h2>
        <div class="row">
            <div class="col-md-5">
                <h4>Generator</h4>
                <form action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" name='prefix' placeholder="Enter a Prefix (Optional) Eg: Fa">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="pwdlenval" name='password' type="range" min="6" max="30" value="6"/>

                    </div>
                    <div class="form-group">
                        <input type="text" name="password_length" id="pwdlen" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" name='generate'/>
                    </div>
                </form>
            </div>
            <div class="col-md-6 ml-5">
                <h4>Passwords Generated</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                    <th>No.</th>
                    <th>Password</th>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                            if (!empty($arr)) {
                                foreach ($arr as $val) {
                                    $counter ++;
                                    echo "<tr></tr>"."<td>$counter</td>"."<td>$val</td>";
                                }
                            }
                        ?>
                    
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        var pwdlenvalue = document.getElementById("pwdlenval");
        var pwdlen = document.getElementById("pwdlen");
        pwdlen.value = pwdlenvalue.value;
        pwdlenvalue.addEventListener('click',function(){
            pwdlen.value = pwdlenvalue.value;
        });

        pwdlen.addEventListener('keyup',function(){
            pwdlenvalue.value = pwdlen.value;
        })
    </script>
</body>
</html>