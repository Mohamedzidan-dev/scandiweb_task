<?php 

class model{
    public $sku;
    public $name;
    public $price;
    public $typeswitcher;
    public $size;
    public $weight;
    public $height;
    public $width;
    public $length;

    public $host = 'localhost';
    public $user = 'root';
    public $pass = '';
    public $db_name = 'scandiweb';
    public $conn;

    public function __construct()
    {
       if($this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db_name)) {
        return $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db_name);
       }else{
        return "error";
       }
    }

    public function insert(){
        if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
            if(isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['size']) && isset($_POST['weight']) && isset($_POST['height']) && isset($_POST['width']) && isset($_POST['length'])){
                
                $this->sku = $_POST['sku'];
                $this->name = $_POST['name'];
                $this->price = $_POST['price'];
                $this->size = $_POST['size'];
                $this->weight = $_POST['weight'];
                $this->height = $_POST['height'];
                $this->width = $_POST['width'];
                $this->length = $_POST['length'];
                $this->typeswitcher = $_POST['typeswitcher'];

                $insert = "INSERT INTO products (sku,name,price,size,weight,height,width,length,type_switcher) 
                VALUES ('$this->sku','$this->name','$this->price','$this->size','$this->weight','$this->height','$this->width','$this->length','$this->typeswitcher')";

              
                if($this->conn->query($insert)){
                    header("location:../index.php");
                }else{
                    echo $this->conn->error;
                }
              

            }
        }
    }

    public function fetch(){
        $select = "SELECT * FROM products";
        $data = $this->conn->query($select);
        
        return $data;
    }

    public function delete(){
        if(isset($_POST['delete']) && isset($_POST['deleteId'])){
            foreach($_POST['deleteId'] as $deleteById){
                $delete = "DELETE FROM products WHERE id = '$deleteById'";
                $this->conn->query($delete);
            }
        }
    }
}