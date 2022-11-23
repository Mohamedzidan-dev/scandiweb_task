<?php 

include "backend/model.php";
$obj = new model();
$obj->delete();


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .product_body{
            border-style: solid; 
            align-items: center;
            padding: inherit;
            height: 150px;
            margin-bottom: 22px;
        }
        .product_body p{
            text-align: center;
            margin-bottom: auto;
        }
    </style>
  </head>
  <body>



    <form action="" method="POST">

        <div class="container" style="margin-top: 40px;">
            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <h1>Product List</h1>
                    </div>
                </div>
                <div class="col-lg-6" style="display: flex;  justify-content: end; align-items: center;">
                    <div>
                        <a href="addproduct.php" class="btn btn-info">ADD</a>
  <!-- *******************************  delete   ****************************************************************************** -->

                        <input type="submit" value="MASS DELETE" class="btn btn-info" name="delete">
                    </div>
                </div>
                <div class="col-lg-12" style="margin-top: -16px; margin-bottom: 15px;">
                    <div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    </div>
                </div>
            </div>
            <!-- products -->
            <div class="row">

                <?php 
                $data  = $obj->fetch();
                foreach($data as $product ){
                ?>

                <div class="col-lg-3">
                    <div class="product_body">
                      <!-- *******************************checkbox ****************************************************************************** -->
                        <input type="checkbox" name="deleteId[]" value="<?= $product['id']; ?>">

                        <p><?= $product['sku'] ?></p>
                        <p><?= $product['name'] ?></p>
                        <p>$<?= $product['price'] ?></p>
                        <p>
                            <?php if($product['type_switcher'] == "DVD-disc" ){
                            echo "Size : " .$product['size'] ." MB"; 
                        }elseif($product['type_switcher'] == "Book"){
                            echo "Weight : " .$product['weight'] ." KG"; 
                        }elseif($product['type_switcher'] == "Furniture"){
                            echo "Dimensions : " .$product['height']."x".$product['width']."x".$product['length']; 
                        }
                        ?></p>
                    </div>
                </div>
              <?php } ?>
            </div>


            <div class="row" style="margin-top: 250px;">
                <div class="col-lg-12">
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <p style="    text-align: center;">Scandiweb Test Assignment</p>
                </div>
            </div>
        </div>
    


    </form>



















    </div></div>










    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


  </body>
</html>
