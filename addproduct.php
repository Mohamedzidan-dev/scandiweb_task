<?php 

include "backend/model.php";
$obj = new model();
$obj->insert();
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

        form label{
            width: 100px;
        }
    </style>

  </head>
  <body>
    <?php
        $n = 3;
        function getRandomString($n)
        {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
        }

    ?>
      <div class="container" style="margin-top: 40px;">

        <div class="row">
            <div class="col-lg-12">
                <!-- form -->
            <form action="" method="POST">

            <div class="row">
            <div class="col-lg-6">
              <div>
                 <h1>Product List</h1>
              </div>
            </div>

            <div class="col-lg-6" style="display: flex;  justify-content: end; align-items: center;">
              <div>
              <input type="submit" value="Save" class="btn btn-info">
                 <a  href="index.php" class="btn btn-info">Cancel</a>
              </div>
            </div>

            <div class="col-lg-12" style="margin-top: -16px; margin-bottom: 15px;">
              <div>
              <hr style="height:2px;border-width:0;color:gray;background-color:gray">
              </div>
            </div>
            </div>

                <label for="fname">SKU</label>
                <input  required type="text" id="sku" name="sku" placeholder='sku' value="<?= getRandomString($n);?>-yyy"><br>

                <label for="lname">Name</label>
                <input  required type="text" id="name" name="name"  placeholder=" name"><br>

                <label for="">Price($)</label>
                <input required  type="number" min="1" id='price' name='price' placeholder=" price"><br>
                
                <label for="">Type switcher</label>
                <select required name="typeswitcher" id="productType" name="typeswitcher">
                    <option value="" selected disabled>Type switcher</option>
                    <option value="DVD-disc" >DVD-disc</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select><br><br>

                <!-- size -->
                <div style="display: none;" id="size">
                    <label for="">Size(MB) </label>
                    <input class="size" required type="number" min="1" name="size" placeholder=" size"><br>
                    <div style="color: red;">Please, provide size in MB</div>
                </div>

                <!-- weight -->
                <div style="display: none;" id='weight'>
                    <label for="">Weight(KG) </label>
                    <input class='weight' required type="number" min="1" name="weight" placeholder=" weight"><br>
                    <div style="color: red;">Please, provide weight in KG</div>
                </div>

                <!--------------------------------------- furniture ---------------------------------------->

                <!-- height -->
                <div style="display: none;" id='Furniture'>
                    <label for="">Height(CM) </label>
                    <input required class='height' type="number" min="1" name="height" placeholder=" height" ><br>
                    
                    <!-- width -->
                    <label for="">Width(CM) </label>
                    <input required class='width' type="number" min="1" name="width" placeholder=" width"><br>

                    <!-- length -->
                    <label for="">Length(CM) </label>
                    <input required class='length' type="number" min="1" name="length" placeholder=" length"><br>

                    <div style="color: red;">Please, provide dimensions in CM</div>
                </div>


               
            </form> 

            </div>
        </div>
        <div class="row" style="margin-top: 300px;">
            <div class="col-lg-12">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <p style="    text-align: center;">Scandiweb Test Assignment</p>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $("#productType").change(function(){
                var selected_product = $('#productType').find(":selected").text();        
                
                if(selected_product == 'DVD-disc'){
                    $("#size").show();
                    $("#weight").hide();
                    $("#Furniture").hide();
                    $(".weight").removeAttr("required");
                    $(".height").removeAttr("required");
                    $(".width").removeAttr("required");
                    $(".length").removeAttr("required");
                }else if(selected_product == 'Book') {
                    $("#size").hide();
                    $("#weight").show();
                    $("#Furniture").hide();  
                    $(".size").removeAttr("required");
                    $(".height").removeAttr("required");
                    $(".width").removeAttr("required");
                    $(".length").removeAttr("required");                 
                }else if(selected_product == 'Furniture'){
                    $("#size").hide();
                    $("#weight").hide();
                    $("#Furniture").show();     
                    $(".weight").removeAttr("required");
                    $(".size").removeAttr("required");
            
                }
            })
           
        })
    </script>
  </body>
</html>
