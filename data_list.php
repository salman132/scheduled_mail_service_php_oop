<?php include("includes/header.php"); ?>
<?php



  if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $image = $_POST['photo'];



    if($store->delete($id) === TRUE){
      unlink($image);
      $success = '<script>toastr.success("You Deleted Data Successfully");</script>'; 

     
    }
    else{
      $fail = '<script>toastr.error("You Deleted Data Successfully");</script>'; 
    }
  }





?>







        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
           <?php 

           include_once('includes/top_menu.php'); 
           include_once('includes/sidebar.php');

           ?>
           
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <?php include_once('includes/adminContent.php');


                

                

               


              ?>

              <div class="panel panel-default">
                <!-- Default panel contents -->
                  <div class="panel-heading">All Data</div>
                  <div class="panel-body">
                    
                  </div>

                  <!-- Table -->
                  <table class="table">
                      <thead>
                          <tr>
                              <th>Product Name</th>
                              <th>QTY</th>
                              <th>AP Date</th>
                              <th>Shipment Date</th>
                              <th>Image</th>
                              <th>Edit</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $stores = $store->find_all();

                            foreach ($stores as $store) { ?>

                              <tr>
                                <td><?php  echo $store->item;   ?></td>
                                <td><?php  echo $store->qty;   ?></td>
                                <td><?php  echo $store->ap_date;   ?></td>
                                <td><?php  echo $store->ship_date;   ?></td>
                                <td><img src="<?php echo $store->image;  ?>" alt="<?php echo $store->image;  ?>" width="80px" height="80px"></td>
                                <td><a href="editStore.php?id=<?php  echo $store->id;   ?>"><span class="glyphicon glyphicon-edit"></span></a> &nbsp;</td>
                                <td>
                                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <input type="hidden" name="id" value="<?php  echo $store->id;   ?>">
                                    <input type="hidden" name="photo" value="<?php    echo $store->image;  ?>">
                                    <input type="submit" value="x" class="btn btn-danger" name="delete">
                                   
                                  </form>
                                  

                              </tr>
                             
                        <?php   
                         }

                          ?>
                      </tbody>
                  </table>
              </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>

  <?php

    if(isset($success)){
      echo $success;
    }
    if(isset($fail)){
      echo $fail;
    }


  ?>