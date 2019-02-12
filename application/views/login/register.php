<h1><?php echo $title; ?></h1>
<form action="<?php echo $action;?>" method="post">
    <div class="form-group">
        <label>First name </label>
        <input type="text"  class="form-control" name="firstname">
    </div>
    <div class="form-group">
        <label>Last name </label>
        <input type="text"  class="form-control" name="lastname">
    </div>
    <div class="form-group">
        <label>Phone number</label>
        <input type="text"  class="form-control" name="phonenumber">
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <input type="text"  class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label>Confirm password</label>
        <input type="password" class="form-control" name="confirmpassword">
    </div>
    <div class="form-group">
        <label>Organisation</label>        
        <select name="organisation">
            <option value="" selected disabled hidden>Choose here</option>
            <?php 
            foreach ($organisations as $org)
            {
                ?><option value="<?php echo $org->orgName;?>"><?php echo $org->orgName;?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Description</label>
        <select name="occupation">
        <?php 
            foreach ($occupations as $occu)
            {
                ?><option value="<?php echo $occu->id;?>"><?php echo $occu->occName;?></option>
            <?php } ?>
        </select>
    </div>
    <input type="submit" value="Register" class="btn btn-primary">
<form>
<?php echo validation_errors('<p class="error">'); ?>