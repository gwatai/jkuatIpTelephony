<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                <div class="container" style="padding-top: 20px">
                    <h3>Telephony</h3>
                    <div class="row">

                        <form action="<?php echo current_url(); ?>" method="post">
                            <div class="form-group">
                                <?php //echo current_url().'departments'; 
                                ?>
                                <label for="camp">Campus</label>
                                <select name="campus" id="camp" class="form-control">
                                    <option selected disabled>select campus</option>
                                    <?php foreach ($campuses as $key => $value) {
                                    ?>
                                        <option value="<?php echo $value->ccode; ?>" <?php echo set_select('test_select', $value->ccode); ?>> <?php echo ($key + 1) . ' ' . $value->cname; ?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="depart">Department</label>
                                <select name="departments" id="depart" class="form-control">

                                </select>
                            </div>



                            <script>
                                $(document).ready(function() {
                                    //alert("sasa");

                                    // var uri = '<?php //echo base_url('public_dash/get_campuses_depart'); 
                                                    ?>';
                                    // console.log(uri);
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
                                                    // console.log(data);
                                                    $('#depart').empty();
                                                    $('#ext').empty();
                                                    // const options = JSON.parse(data);
                                                    // console.log(options);
                                                    $('#depart').append($('<option>', {
                                                        text: "select department",
                                                        class: 'selected'
                                                    }));
                                                    $.each(data, function(i, val) {

                                                        // Create a new option element and append it to the select element
                                                        $('#depart').append($('<option>', {
                                                            value: val,
                                                            text: val
                                                        }));
                                                        // console.log(i + ":" + val);


                                                    });

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
                                                    $('#ext').empty();
                                                    // const options2 = JSON.parse(data2);
                                                    // console.log(options2);

                                                    $.each(data2, function(i, val) {

                                                        $('#ext').append($('<p>', {
                                                            text: "Extension number: " + val.extnumber + " Department: " + val.deptname + " Assigned: " + val.owerassigned,
                                                        }));
                                                        console.log("Extension number: " + val.extnumber + " Department: " + val.deptname + " Assigned: " + " Assigned" + val.owerassigned);
                                                    });

                                                }
                                            });

                                        }

                                    });

                                    $("#search").on("input", function() {

                                        var searchExt = $(this).val();
                                        if (searchExt !== "") {
                                            // var uri = '<?php // echo base_url('public_dash/search'); 
                                                            ?>';
                                            //     console.log(uri);

                                            $.ajax({
                                                url: '<?php echo base_url('public_dash/search'); ?>',
                                                type: 'POST',
                                                data: {
                                                    ext: searchExt
                                                },
                                                success: function(data3) {
                                                    console.log(data3);

                                                    $('#ext').empty();
                                                    // const extensions = JSON.parse(data3);
                                                    console.log(data3);
                                                    $('#ext').empty();
                                                    // const options2 = JSON.parse(data2);
                                                    // console.log(options2);

                                                    $.each(data3, function(i, val) {

                                                        $('#ext').append($('<p>', {
                                                            text: "Extension number: " + val.extnumber + " Department: " + val.deptname + " Assigned: " + val.owerassigned,
                                                        }));
                                                        console.log("Extension number: " + val.extnumber + " Department: " + val.deptname + " Assigned: " + " Assigned" + val.owerassigned);
                                                    });


                                                }

                                            });
                                        }
                                    });


                                });
                            </script>

                            <div class="form-group">
                                <label for="search">Search extension</label>
                                <input type="text" name="code" class="form-control" id="search">
                            </div>

                            <div class="form-group" id="ext">
                                <label for="ext">Extensions</label>
                            </div>




                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>