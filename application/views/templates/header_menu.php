
<script type="text/javascript">
     var theme = "<?php echo $_SESSION['theme']; ?>";
  </script>

<div class="main-header">
  <!-- Logo Header -->
  <div class="logo-header" data-background-color="green">
    <a href="<?php echo base_url() ?>" class="logo">
      <img src="<?php echo base_url() ?>/assets/img/jkuat_logo_transparent.png" alt="..." class="avatar-img rounded-circle">
    </a>
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
        <i class="icon-menu"></i>
      </span>
    </button>
    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
    <div class="nav-toggle">
      <button class="btn btn-toggle toggle-sidebar">
        <i class="icon-menu"></i>
      </button>
    </div>
  </div>
  <!-- End Logo Header -->

  <!-- Navbar Header -->
  <nav class="navbar navbar-header navbar-expand-lg" data-background-color="green">

    <div class="container-fluid">
      <div class="collapse" id="search-nav">
        <form class="navbar-left navbar-form nav-search mr-md-3">
          <div class="input-group">
            <div class="input-group-prepend">
              <button type="submit" class="btn btn-search pr-1">
                <i class="fa fa-search search-icon"></i>
              </button>
            </div>
            <input type="text" id="search_extensions" placeholder="Search ..." class="form-control">

          </div>

          <script>
            $(document).ready(function() {

              $("#search_extensions").on("input", function() {
                var searchData = $(this).val();
                // console.log("sasa2");
                // $("#tbody").empty();

                $.ajax({
                  url: '<?php echo base_url('dashboard/search_extensions'); ?>',
                  type: 'POST',
                  data: {
                    search: searchData
                  },
                  success: function(data) {
                   
                    var table_data = "";
                    var links = "";
                    var j = 0;

                    $.each(data.extensions, function(i, obj) {
                      //links = val.
                      table_data += "<tr>";
                      table_data += "<td>" + obj.id + "</td>";
                      table_data += "<td>" + obj.cname + "</td>";
                      table_data += "<td>" + obj.deptname + "</td>";
                      table_data += "<td>" + obj.extnumber + "</td>";
                      table_data += "<td>" + obj.owerassigned + "</td>";
                      <?php // $id = $value->id; 
                      ?>
                      //var id = 
                      var href_edit = '<?php echo base_url() . "dashboard/edit_extension/" ?>' + obj.id;
                      //id="del" data-id="<?php //echo $value->id; 
                                          ?>"
                      var href_delete = '<?php echo base_url() . "dashboard/delete_extension/" ?>' + obj.id;
                      // console.log(href_edit);
                      table_data += "<td>";

                      table_data += "<a href=" + href_edit + " class='btn btn-primary btn-sm'>Edit</a>";
                      table_data += "</td>";
                      table_data += "<td>";
                      table_data += "<button class='btn btn-danger btn-sm' onclick='check("+obj.id+")' id='del' data-id=" + obj.id + ">Delete</button>";

                      table_data += "</tr>";
                    });

                    $('#tbody').html(table_data);

                    $('#links').html(data.links);

                  }

                });

              });

          });
          </script>

        </form>
      </div>
      <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
        <li class="nav-item toggle-nav-search hidden-caret">
          <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
            <i class="fa fa-search"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
            <div class="avatar-sm">
            </div>
            Admin
          </a>
          <ul class="dropdown-menu dropdown-user animated fadeIn">
            <div class="dropdown-user-scroll scrollbar-outer">
              <li>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">Logout</a>
              </li>
            </div>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!-- End Navbar -->
</div>