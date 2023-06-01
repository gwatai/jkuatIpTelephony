<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                <div class="container" style="padding-top: 20px">
                    <h3 id="title_public">JKUAT ONLINE TELEPHONY DIRECTORY</h3>
                    <h2 style="color: blue">Search Extension to call:</h2>
                    <div class="row">

                        <form action="<?php echo current_url(); ?>" method="post" id="tel">
                            <div class="form-group">
                                <label for="camp">Campus</label>
                                <select name="campus" id="camp" class="form-control">
                                    <option selected disabled>select campus</option>
                                    <?php foreach ($campuses as $key => $value) {
                                    ?>
                                        <option value="<?php echo $value->ccode; ?>" <?php echo set_select('test_select', $value->ccode); ?>> <?php echo $value->cname; ?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="depart">Department</label>
                                <select name="departments" id="depart" class="form-control">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="search">Search extension</label>
                                <input type="text" name="code" class="form-control" id="search">
                            </div>
                        </form>
                        <div class="table-responsive">
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

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/js/telephony.js"></script>
<script>
    $(document).ready(function() {
        $("#search").on("input", function() {

            var searchExt = $(this).val().trim();
            if (searchExt !== '') {
                $.ajax({
                    url: '<?php echo base_url('public_dash/search'); ?>',
                    type: 'POST',
                    data: {
                        ext: searchExt
                    },
                    success: function(data) {
                        console.log(data);

                        var table_data = "";

                        $.each(data, function(i, val) {
                            table_data += "<tr>";
                            table_data += "<td>" + (i + 1) + "</td>";
                            table_data += "<td>" + val.cname + "</td>";
                            table_data += "<td>" + val.deptname + "</td>";
                            table_data += "<td>" + val.extnumber + "</td>";
                            table_data += "<td>" + val.owerassigned + "</td>";
                            table_data += "</tr>";


                        });

                        $('#tbody').html(table_data);

                    }

                });
            }
        });



        $("#tel").on("submit", function(e) {
            e.preventDefault();
        });

        $("#camp").change(function() {
            var selectedCampus = $(this).val();

            if (selectedCampus !== "") {
                $.ajax({
                    url: '<?php echo base_url('public_dash/get_campuses_depart'); ?>',
                    type: 'POST',
                    data: {
                        campus: selectedCampus
                    },
                    success: function(data) {
                        console.log(data);

                        var options = "";
                        $.each(data, function(i, val) {

                            options += "<option>" + val + "</option>";


                        });

                        $('#depart').html(options);

                        $('#depart').prepend("<option selected>Select Department</option>");

                    }



                });
            }
        });

        $("#depart").change(function() {

            var selectedDepart = $(this).val();

            if (selectedDepart !== "") {
                $.ajax({

                    url: '<?php echo base_url('public_dash/get_campuses_depart_ext'); ?>',
                    type: 'POST',
                    data: {
                        depart: selectedDepart
                    },
                    success: function(data2) {

                        console.log(data2);

                        var table_data = "";
                        $.each(data2, function(i, val) {
                            table_data += "<tr>";
                            table_data += "<td>" + (i + 1) + "</td>";
                            table_data += "<td>" + val.cname + "</td>";
                            table_data += "<td>" + val.deptname + "</td>";
                            table_data += "<td>" + val.extnumber + "</td>";
                            table_data += "<td>" + val.owerassigned + "</td>";
                            table_data += "</tr>";


                        });

                        $('#tbody').html(table_data);

                    }
                });

            }

        });
    });
</script>