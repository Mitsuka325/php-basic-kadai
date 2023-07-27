<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP課題15章</title>
</head>
<body>
    <p>
        <?php
    class Food{
        private $name,
                $price;
        public function __construct($name,$price){
             $this->name=$name;
             $this->price=$price;
        }
        public function show_price(){
            return $this->price;

        }
        
    }
    
    class Animal{
        private $name,
                $height,
                $weight;

        public function __construct($name,$height,$weight){
            $this->name=$name;
            $this->height=$height;
            $this->weight=$weight;
        }
        public function show_height(){
             return $this->height;
        }
        
    }
    $food=new Food("potato",250);
    $animal=new Animal("dog",60,5000);
    print_r($food);
    print_r($animal);

    echo $food->show_price()."<br>";
    echo $animal->show_height();
    ?>
    </p>
</body>
</html>