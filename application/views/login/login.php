<div class="container">
<?php
    if ($this->session->userdata('user') != null) {
        echo 'Already logged in';
    }
?>
<form action="<?php echo $action;?>" method="post">
    <label>E-mail</label>
    <div class="form-group">
        <input type="text" placeholder="E-mail" class="form-control" name="email">
    </div>
    <label>Password</label>
    <div class="form-group">
        <input type="password" placeholder="Password" class="form-control" name="password">
    </div>
    
    <input type="submit" value="Login" class="btn btn-primary">
<form>
<?php echo validation_errors('<p class="error">'); ?>
<br><hr>
<a href="<?php echo site_url('register');?>" class="btn btn-success">Registreren</a>
<?php if (isset($success)) {
    echo $success;
} ?>
<?php if (isset($failed)) {
    echo $failed;
} ?>
</div>