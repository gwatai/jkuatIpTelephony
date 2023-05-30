<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Manage</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h3>Admins</h3>
                    <div class="col-6">
                        <a href="<?php echo base_url(); ?>dashboard/create_new_admin" class="btn btn-info btn-sm" style="color:#fff; background-color:red;">Create New Admin</a>
                    </div>

                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Admins's First Name</th>
                                <th>Admins's Surname</th>
                                <th>Admins's Other Names</th>
                                <th>Admins's Email</th>
                                <th>Admin Type</th>
                                <th>Admins Added by</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Admins's First Name</th>
                                <th>Admins's Surname</th>
                                <th>Admins's Other Names</th>
                                <th>Admins's Email</th>
                                <th>Admin Type</th>
                                <th>Admins Added by</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($admins as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value->fname; ?></td>
                                    <td><?php
                                        echo $value->surname;
                                        ?></td>
                                    <td><?php echo $value->othernames; ?></td>
                                    <td><?php echo $value->email; ?></td>
                                    <td><?php echo $value->adminType; ?></td>
                                    <td><?php echo $value->addedBy; ?></td>
                                    <td>
                                        <?php $id = $value->id; ?>
                                        <a href="<?php echo base_url() . 'dashboard/edit_admin/' . $id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <?php $id = $value->id; ?>
                                        <a href="<?php echo base_url() . 'dashboard/delete_admin/' . $id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>