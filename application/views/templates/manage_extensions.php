<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Manage Extensions</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <!-- <h3>Extensions</h3> -->
                    <div class="col-6">
                        <a href="<?php current_url() ?>create_extension" class="btn btn-info btn-sm" style="color:#fff; background-color:red;">Create New Extension</a>
                    </div>
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Extension's Department</th>
                                <th>Extension's Campus</th>
                                <th>Extension's Number</th>
                                <th>Owner Assigned</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Extension's Department</th>
                                <th>Extension's Campus</th>
                                <th>Extension's Number</th>
                                <th>Owner Assigned</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $i = 1;
                            $t = 0;
                            foreach ($extensions as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $value->id; ?></td>
                                    <td><?php echo $value->deptname; ?></td>
                                    <td><?php
                                        foreach ($campuses as $key => $campus_value) {
                                            if ($value->ccode == $campus_value->ccode) {
                                                echo $campus_value->cname;
                                                break;
                                            }
                                        }


                                        ?></td>
                                    <td><?php echo $value->extnumber; ?></td>
                                    <td><?php echo $value->owerassigned; ?></td>
                                    <td>
                                        <?php $id = $value->id; ?>
                                        <a href="<?php echo base_url() . 'dashboard/edit_extension/' . $id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <?php $id = $value->id; ?>
                                        <a href="<?php echo base_url() . 'dashboard/delete_extension/' . $id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>

                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <p class="links" >
  
  <?php echo $links; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>