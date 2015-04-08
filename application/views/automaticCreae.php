<?php
class AppleProductComputer
{
   
	

private  $product_name;
private  $product_code;
private  $product_description;
private  $category_id;
private $product_price;

    public function __construct($name, $code,$desc,$cat_id,$price)
    {
        $this->product_name = $name;
        $this->product_code = $code;
		$this->product_description = $desc;
        $this->category_id = $cat_id;
		$this->product_price = $price;
       
    }

    public function getproductName()
    {
        return $this->product_name;
    }
	public function getproduct_code()
    {
        return $this->product_code;
    }
	public function getproduct_description()
    {
        return $this->product_description;
    }
	public function getcategory_id()
    {
        return $this->category_id;
    }
	public function getproduct_price()
    {
        return $this->product_price;
    }
}

class AppleProductComputerFactory
{
    public static function create($name, $code ,$desc,$cat_id,$price)
    {
        return new AppleProductComputer($name, $code ,$desc,$cat_id,$price);
    }
}

// have the factory create the apple object
$veyron = AppleProductComputerFactory::create('Apple', '65465' ,'lovely product from apple', '2' , '1200');


$gav = $veyron->getproductName();
$gav1 = $veyron->getproduct_code();
$gav2 = $veyron->getproduct_description();
$gav3 = $veyron->getcategory_id();
$gav4 = $veyron->getproduct_price();

$sql = "INSERT INTO products (product_name, product_code,product_description, category_id, product_price)
VALUES ('$gav','$gav1', '$gav2','$gav3', '$gav4')";
$this -> db -> query($sql);

echo "success";

