<div class="container" style="padding-top: 20px">
    <h3>Add New Admin</h3>
    <div class="row">
        <form method="post" name="create_extension" action="<?php current_url(); ?>">
            <div class="col-md-12">
            <div class="form-group">
                    <label for="cod">Admin's First Name</label>
                    <input type="text" name="fname" id="cod" value="<?php echo set_value('fname'); ?>"  class="form-control">
                    <?php echo form_error('fname')
                    ?>
            </div>
            <div class="form-group">
                    <label for="cod">Admin's Surname</label>
                    <input type="text" name="sname" id="cod" value="<?php echo set_value('sname'); ?>"  class="form-control">
                    <?php echo form_error('sname')
                    ?>
                </div>

                <div class="form-group">
                    <label for="cod">Admin's Othernames</label>
                    <input type="text" name="oname" id="cod" value="<?php echo set_value('oname'); ?>"  class="form-control">
                    <?php echo form_error('oname')
                    ?>
                </div>

                <div class="form-group">
                    <label for="cod">Admin's Email</label>
                    <input type="email" name="email" id="cod" value="<?php echo set_value('email'); ?>"  class="form-control">
                    <?php echo form_error('email')
                    ?>
                </div>
                <div class="form-group">
                    <label for="admintype">Admin Type</label>
                    <select name="admintype" id="admintype" class="form-control">
                    <option selected disabled>select admin type</option>
                        <option value="Superadmin" <?php echo set_select('admintype','Superadmin'); ?>>Super Admin</option>
                        <option value="LimitedAdmin" <?php echo set_select('admintype','LimitedAdmin'); ?>>Limited Admin</option>
                    </select>
                    <?php echo form_error('admintype');
                    ?>
                </div>
                <div class="form-group">
                    <label for="user">Admin's Username</label>
                    <input type="text" name="username" id="user" value="<?php echo set_value('username'); ?>"  class="form-control">
                    <?php echo form_error('username')
                    ?>
                </div>
                <div class="form-group">
                    <label for="cod">Admin's Password</label>
                    <input type="password" name="pass" id="cod" value="<?php echo set_value('pass'); ?>"  class="form-control">
                    <?php echo form_error('pass')
                    ?>
                </div>
                <div class="form-group">
                    <label for="conpass">Admin's Confirm Password</label>
                    <input type="password" name="conpass" id="conpass" value="<?php echo set_value('conpass'); ?>"  class="form-control">
                    <?php echo form_error('conpass')
                    ?>
                </div>

                <div class="form-group">
                    <label for="secr">Admin's Secret Word</label>
                    <input type="text" name="secret" id="secr" value="<?php echo set_value('secret'); ?>"  class="form-control">
                    <?php echo form_error('secret')
                    ?>
                </div>
                <div class="form-group-A" style="padding-top: 20px">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>


            </div>
        </form>
    </div>
</div>
