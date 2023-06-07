
<!-- <script src="<?php // echo base_url() ?>assets/js/telephony_admin.js"></script> -->
<script src="<?php echo base_url() ?>assets/js/telephony.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <div class="col-6">
                        <a href="<?php current_url() ?>create_extension" class="btn btn-info btn-sm" style="color:#fff; background-color:red;">Create New Extension</a>
                    </div>
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Extension's Campus</th>
                                <th>Extension's Department</th>
                                <th>Extension's Number</th>
                                <th>Owner Assigned</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Extension's Campus</th>
                                <th>Extension's Department</th>
                                <th>Extension's Number</th>
                                <th>Owner Assigned</th>
                                
                            </tr>
                        </tfoot>
                        <tbody id="tbody">
                            <?php
                            $i = 1;
                            $t = 0;
                            foreach ($extensions as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $value->id; ?></td>
                                    <td><?php
                                        foreach ($campuses as $key => $campus_value) {
                                            if ($value->ccode == $campus_value->ccode) {
                                                echo $campus_value->cname;
                                                break;
                                            }
                                        }
                                        ?></td>
                                    <td><?php echo $value->deptname; ?></td>
                                    <td><?php echo $value->extnumber; ?></td>
                                    <td><?php echo $value->owerassigned; ?></td>
                                    <td>
                                        <?php $id = $value->id; ?>
                                        <a href="<?php echo base_url() . 'dashboard/edit_extension/' . $id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    </td>

                                    <td>
                                        <?php $id = $value->id; ?>
                                        <button type="button" class="btn btn-danger btn-sm delete" onclick="check(<?php echo $value->id; ?>)" id="<?php echo "ext-".$value->id ?>" data-extension="<?php echo $value->id; ?>">Delete</button>

                                    </td>
                                </tr>

                            <?php
                                $i++;
                            } // end of foreach 
                            ?>
                        </tbody>
                    </table>
                    <p class="links" id="links">

                        <?php echo $links; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>