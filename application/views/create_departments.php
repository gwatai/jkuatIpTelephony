<div class="container" style="padding-top: 20px">
    <div class="row">

        <form method="post" name="create_department" action="<?php current_url(); ?>">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="camp">Campus</label>
                    <select name="campus" id="camp" class="form-control">

                        <option selected disabled>select campus</option>
                        <?php foreach ($campuses as $key => $value) {
                        ?>
                            <option value="<?php echo $value->ccode; ?>" <?php echo set_select('test_select', $value->ccode); ?>> <?php echo  $value->cname; ?></option>

                        <?php } ?>

                    </select>
                    
                    <?php echo form_error('campus');
                    ?>
                </div>

                <div class="form-group">
                    <label for="cod">New Department Name</label>
                    <input type="text" name="department" id="depart" value="<?php echo set_value('department'); ?>" class="form-control">
                    <?php echo form_error('department')
                    ?>
                </div>
                <div class="form-group">
                    <label for="dept_code">Department Code</label>
                    <input type="text" name="dept_code" id="depart" value="<?php echo set_value('dept_code'); ?>" class="form-control">
                    <?php echo form_error('dept_code')
                    ?>
                </div>
                <div class="form-group-A" style="padding-top: 5px">
                    <button class="btn btn-primary niko" type="submit">Create</button>
                </div>
            </div>
            
        </form>
        
    </div>
</div>