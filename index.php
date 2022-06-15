<?php
$emailerror=false;
include './conn.php';
if(isset($_POST['submit'])){
    //  echo $_POST['email'];
    $email= input($_POST['email']);
    if(empty($email)){
        $emailerror=true;
        // echo 'it is empty;';
    }else{
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
         // echo $email;
        $sql='INSERT INTO `user`(`email`,`password`) VALUES (?,?)';
        $exc=$pdo->prepare($sql);
        $exc->execute(array($email,'pass'));
        }else{
            $emailerror=true;
 
        }


    }


}
function input($value){
    $newvalue=trim($value);
    $newvalue=htmlspecialchars($newvalue);
    $newvalue=stripslashes($newvalue);
    return $newvalue;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class='container'>
            <form method='post'>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control <?php if($emailerror) echo 'is-invalid' ?> " id="email" name='email'>
                    <div id="validationServer05Feedback" class="invalid-feedback">
                         Please email not be empty
                    </div>
                    <div id="email" class="form-text">please enter your Email.</div>
                </div>


                <button type="submit" name='submit' class="btn btn-primary">Add</button>
            </form>

    </div>
    


</body>
</html>