<div class="container" style="padding-top: 20px">
    <h3>Edit Extension</h3>
    <div class="row">
        <form method="post" name="edit voter" action="<?php current_url(); ?>">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="depart">Department</label>
                    <!-- <input type="text" id="depart" name="department" value="<?php //echo set_value('department', $user['deptname']); ?>" class="form-control"> -->
                    <select name="department" id="depart" class="form-control">    
                        <option selected value="<?php echo $user['deptname'] ?>" <?php echo set_select('campus', $user['deptname']); ?> >
                        <?php 
                        echo $user['deptname'];?>
                        </option>
                        <?php
                        $array_list = [];
                        foreach($depts as $key => $value) 
                        {
                         if($value->deptname == $user['deptname'] || in_array($value->deptname,$array_list) )
                        {
                        continue;              
                        }   
                        ?>   
                        <option value="<?php echo $value->deptname; ?>" <?php echo set_select('campus',$value->deptname); ?> > <?php echo $value->deptname;
                        $array_list[] = $value->deptname;
                        ?></option>
                        <?php } ?>
                    </select>

                    <?php echo form_error('department') ?>
                </div>

                <div class="form-group" id="test">
                    <label for="camp">Campus</label>
                    <select name="campus" id="camp" class="form-control">    
                        <option selected value="<?php 
                        echo $user['ccode'];?>" <?php 
                        foreach($campuses as $key => $campus_value)
                        {
                            if($user['ccode'] == $campus_value->ccode)
                            {
                                $selected = $campus_value->cname;
                               //  echo $campus_value->cname;
                               echo set_select('campus', $campus_value->cname);
                                break;
                            }
                        }                        
                         ?> ><?php 
                        
                        foreach($campuses as $key => $campus_value)
                        {
                            if($user['ccode'] == $campus_value->ccode)
                            {
                                $selected = $campus_value->cname;
                                echo $campus_value->cname;
                                break;
                            }
                        } ?></option>
                        <?php foreach($campuses as $key => $value) 
                        {
                      
                        if($value->cname == $selected )
                        continue;    
                        ?> 
                        <option value="<?php                                            
                        echo $value->ccode; ?>"> <?php echo $value->cname; ?></option>
                        <?php } ?>

                    </select>
                    <?php echo form_error('campus') ?>
                </div>

                <div class="form-group">
                    <label for="cod">Extension no</label>
                    <input type="text" id="cod" name="code" value="<?php echo set_value('code', $user['extnumber']); ?>" class="form-control">
                    <?php echo form_error('code') ?>
                </div>
                <div class="form-group">
                    <label for="own">Assigned</label>
                    <input type="text" id="own" name="assigned" value="<?php echo set_value('assigned', $user['owerassigned']); ?>" class="form-control">
                    <?php echo form_error('assigned') ?>
                </div>

                <div class="form-group-A" style="padding-top: 20px">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
        </form>
    </div>
</div>