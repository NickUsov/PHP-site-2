<?php
    if(isset($_POST['log_in'])) {
        if(login($_POST['log_check'], $_POST['pas_check'])){
            if(isset($_SESSION['admin'])){
                echo 'Welcome '.$_SESSION['admin']; 
            }
            else if(isset($_SESSION['user'])){
                echo 'Welcome '.$_SESSION['user'];
            }
        }
        else echo 'Uncorrect login or password';  
    }
    if(isset($_POST['log_out'])) {
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']); 
        }
        else if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }   
    }
?>
<?php if(isset($_SESSION['admin']) || isset($_SESSION['user'])){?>
    <form action="index.php" method="post" class="pull-right">
        <input type="submit" class="btn btn-warning" value="Unsign" name="log_out">
    </form> 
<?php } else if(!isset($_SESSION['admin']) || !isset($_SESSION['user'])){?>
    <form action="index.php" class="form-inline pull-right" method="post">
        <div class="form-group">
            <label for="log_check">Login: </label>
            <input type="text" name="log_check" class="form-control">
        </div>
        <div class="form-group">
            <label for="pas_check">Password: </label>
            <input type="password" name="pas_check" class="form-control">
        </div>
        <button type="submit" name="log_in" class="btn-primary btn">Done</button>
    </form>
<?php }?>