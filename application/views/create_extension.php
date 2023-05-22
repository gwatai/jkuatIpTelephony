<div class="container" style="padding-top: 20px">
    <h3>Add new extension</h3>
    <div class="row">
        <form method="post" name="create_extension" action="<?php current_url(); ?>">
            <div class="col-md-12">
            <div class="form-group">
                    <label for="camp">Campus</label>
                    <select name="campus" id="camp" class="form-control">
                    <option selected disabled>select campus</option>
                    <?php foreach ($campuses as $key => $value) {
                    ?>
                    <option value="<?php echo $value->ccode; ?>" <?php echo set_select('test_select',$value->ccode); ?>> <?php echo ($key + 1) . ' ' . $value->cname; ?></option>

                    <?php } ?>
                    </select>
                    <?php echo form_error('campus');
                    ?>
                </div>
                <div class="form-group">
                    <label for="depart">Department</label>
                    <select name="department" id="depart" class="form-control">
                    <option selected disabled>select department</option>
                       <?php
                        $array_list = [];
                        foreach($departments as $key => $value) 
                        {
                       
                         if(in_array($value->deptname,$array_list) )
                        {
                        continue;              
                        }   
                        ?>   
                        <option value="<?php echo $value->deptname; ?>" <?php echo set_select('campus',$value->deptname); ?> > <?php echo $value->deptname;
                        $array_list[] = $value->deptname;
                        ?></option>
                        <?php } ?>
                    </select>
                    <?php echo form_error('department')
                    ?>
                </div>
                <div class="form-group">
                    <label for="cod">Extension Number</label>
                    <input type="text" name="code" id="cod" value="<?php echo set_value('code'); ?>"  class="form-control">
                    <?php echo form_error('code')
                    ?>
                </div>
                <div class="form-group">
                    <label for="cod">Owner Assigned</label>
                    <input type="text" name="assigned" id="cod" value="<?php echo set_value('assigned'); ?>"  class="form-control">
                    <?php echo form_error('assigned')
                    ?>
                </div>
                
            </div>
            <div class="form-group-A" style="padding-top: 20px">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
        </form>
    </div>
</div>