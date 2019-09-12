<?php include("includes/header.php"); ?>

<?php
echo $_SERVER['DOCUMENT_ROOT'];






use Carbon\Carbon;



  if(isset($_POST['submit'])){
    $token = $_POST['__token'];

    if($token == $_SESSION['token']){
      $store = new Store();


       $store->buying_house_email = $_POST['bmail'];
       $store->factory_md_email = $_POST['mdmail'];
       $store->factory_gm_email = $_POST['fgmail'];
       $store->buyer_house_email = $_POST['buyermail'];
       $store->md_house_email = $_POST['md2mail'];
       $store->item = $_POST['item'];
       $store->pd_no = $_POST['pd'];
       $store->knitting = $_POST['knitting'];
       $store->ap_date = $_POST['ap_date'];
       $store->qty = $_POST['qty'];
       $store->dyeing = $_POST['dyeing'];
       $store->sewing = $_POST['sewing'];
       $store->cutting = $_POST['cutting'];
       $store->finishing = $_POST['finishing'];
       $store->ship_date = $_POST['ship_date'];
       $store->inline_date = $_POST['inline_date'];
       $store->final_date = $_POST['final_date'];
       $store->eta = $_POST['eta'];
       $store->shipment_status = $_POST['status'];
       $store->alert_date = date('Y-m-d',strtotime('-5 days',strtotime($store->ship_date)));
       

      
       
       if($file = $_FILES['file']){
          if(!empty($file['name'])){
          
            $store->image =  $store->set_file($_FILES['file']);
          }
         

        }



       $store->created_at = Carbon::now('Asia/Dhaka');

      

       if($store->create() === TRUE){
          $mail = new Mail();

          $mail->mail_array = array($store->buying_house_email,$store->factory_md_email,$store->factory_gm_email,$store->buyer_house_email,$store->md_house_email);
          $mail->subject = "BD Source Ltd | Shipment Date";
          $mail->message = '<html>
                        <head>
                        	<meta charset="UTF-8">
                        	<title>Shipment Date</title>
                        </head>
                        <body>
                        	<h3>Greetings from BD Source Ltd,</h3><p>We are felling happy to let you know that your Product  <strong>'. $store->item ." (Qty: ". $store->qty .') </strong> is ready 
                                          for Shipment. <strong>Shipment date is '. $store->ship_date .' </strong> 
                        
                                  </p>,<h5>Regards,</h5><h5>BD Source Ltd</h5>
                        </body>
                        </html>';




          $mail->mailer();
          $success = '<script>toastr.success("Your Data Stored Successfully");</script>';       
        }
       else{
        echo "Job Failed";
       }










    }
    else{
      die('Request Died');
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
                <a class="navbar-brand" href="index.html" style="color:#FF00FF;" >BD Sourceltd Admin</a>
            </div>
           <?php 

           include_once('includes/top_menu.php'); 
           include_once('includes/sidebar.php');

           ?>
           
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">


            <!-- /.container-fluid -->
            <h2 style="text-align:center; color:#FF8C00;">Welcome To Bangla-Den Sourcing (Pvt.) Limited</h2>
            <?php
              if(isset($store->errors)){
                foreach ($store->errors as $error) {
                  echo '<div class="alert alert-danger" role="alert">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                          <span class="sr-only">Error:</span>
                          '. $error .'
                        </div>';
                  }
              }



            ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title" style="color:#808000;">
                        Production Monitoring System
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                          <?php  echo $form->csrf_token();    ?>
                          
                          <div class="form-group">
                              <label>Email no 1</label>
                              <input type="email" name="bmail" class="form-control" placeholder="Email no 1">
                          </div>

                          <div class="form-group">
                              <label>Email no 2</label>
                              <input type="email" name="mdmail" class="form-control" placeholder="Email no 2">
                          </div>

                          <div class="form-group">
                              <label>Email no 3</label>
                              <input type="email" name="fgmail" class="form-control" placeholder="Email no 3">
                          </div>

                          
                           <div class="form-group">
                              <label>Email no 4</label>
                              <input type="email" name="buyermail" class="form-control" placeholder="Email no 4">
                          </div>
                          
                           <div class="form-group">
                              <label>Email no 5</label>
                              <input type="email" name="md2mail" class="form-control" placeholder="Email no 5">
                          </div>
                          


                          <div class="form-group">
                              <label>ITEM:</label>
                              <input type="text" name="item" class="form-control" placeholder="ITEM">
                          </div>

                           <div class="form-group">
                              <label>PO NO:</label>
                              <input type="number" name="pd" class="form-control" placeholder="PO NO" min="1">
                          </div>

                           <div class="form-group">
                              <label>Quantity:</label>
                              <input type="number" name="qty" class="form-control" placeholder="QTY: " min="1">
                          </div>
                          <div class="form-group">
                              <label>PP Approval Date:</label>
                              <input type="text" name="ap_date" id="datepicker" class="form-control" placeholder="Date">
                          </div>
                          
                           <div class="form-group">
                              <label>Knitting:</label>
                              <input type="text" name="knitting" id="datepicker6" class="form-control" placeholder="Kinitting Date">
                          </div>


                           

                          


                           <div class="form-group">
                              <label>Dyeing:</label>
                              <input type="text" name="dyeing" id="datepicker7" class="form-control" placeholder="Dyeing Date">
                          </div>


                          <div class="form-group">
                              <label>Cutting:</label>
                              <input type="text" name="cutting" id="datepicker8" class="form-control" placeholder="Cutting Date">
                          </div>
                        



                           <div class="form-group">
                              <label>Sewing:</label>
                              <input type="text" name="sewing" id="datepicker9" class="form-control" placeholder="Sewing Date">
                          </div>



                           



                           <div class="form-group">
                              <label>Finishing:</label>
                              <input type="text" name="finishing" id="datepicker10" class="form-control" placeholder="Finishing Date">
                          </div>

                            <div class="form-group">
                              <label>Inline Inspection Date:</label>
                              <input type="text" name="inline_date" class="form-control" placeholder="Inline Inspection Date" id="datepicker4">
                          </div>
                          
                          
                            <div class="form-group">
                              <label>Final Inspection Date:</label>
                              <input type="text" name="final_date" class="form-control" placeholder="Final Inspection Date" id="datepicker5">
                          </div>
                            
                          <div class="form-group">
                              <label>Shipment Date:</label>
                              <input type="text" name="ship_date" class="form-control" placeholder="Shipment Date" id="datepicker2">
                          </div>


                          

                          


                          <div class="form-group">
                              <label>ETA:</label>
                              <input type="text" name="eta" class="form-control" placeholder="ETA">
                          </div>

                          <div class="form-group">
                              <label>Remarks:</label>
                              <input type="text" name="status" class="form-control" placeholder="Remarks">
                          </div>

                           <div class="form-group">
                              <label>Image:</label>
                             <input type="file" name="file">
                          </div>


                          <div class="form-group">
                            <input type="submit" value="Store" class="btn btn-primary" name="submit">
                          </div>
                          


                        
                          

                        </form>

                    </div>
                </div>
            </div>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>

  <?php  

  if(isset($success)){
    echo $success;
  }


  ?>

  <script>
    $( function() {
      $( "#datepicker" ).datepicker({ 
          minDate: 0,
          maxDate: "+10M +20D",
          dateFormat : "yy-mm-dd"

       });

        $( "#datepicker2" ).datepicker({ 
          minDate: 0,
          maxDate: "+10M +20D",
          dateFormat : "yy-mm-dd"

       });

        $( "#datepicker3" ).datepicker({ 
          minDate: 0,
          maxDate: "+10M +20D",
          dateFormat : "yy-mm-dd"

       });
        $( "#datepicker4" ).datepicker({ 
          minDate: 0,
          maxDate: "+10M +20D",
          dateFormat : "yy-mm-dd"

       });

        $( "#datepicker5" ).datepicker({ 
          minDate: 0,
          maxDate: "+10M +20D",
          dateFormat : "yy-mm-dd"

       });  


        $( "#datepicker6" ).datepicker({ 
          minDate: 0,
          maxDate: "+10M +20D",
          dateFormat : "yy-mm-dd"

       });  
       
       $( "#datepicker7" ).datepicker({ 
          minDate: 0,
          maxDate: "+10M +20D",
          dateFormat : "yy-mm-dd"

       });  
       
       $( "#datepicker8" ).datepicker({ 
          minDate: 0,
          maxDate: "+10M +20D",
          dateFormat : "yy-mm-dd"

       });  
       
       $( "#datepicker9" ).datepicker({ 
          minDate: 0,
          maxDate: "+10M +20D",
          dateFormat : "yy-mm-dd"

       });  
       
       $( "#datepicker10" ).datepicker({ 
          minDate: 0,
          maxDate: "+10M +20D",
          dateFormat : "yy-mm-dd"

       });  








    } );



  </script>