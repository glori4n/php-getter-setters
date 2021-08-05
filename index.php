<!-- This snippet was made by Glori4n(https://glori4n.net) -->

<?php

class Post{
    private $title;
    private $date;
    private $body;
    public $polymorph;

    // Construct, this method is the first to be executed whenever an object is instantiated.
    public function __construct($t, $d, $b, $p){
        $this->setTitle($t);        
        $this->setDate($d);        
        $this->setBody($b);   
        $this->setPolymorph($p);     
    }

    // Setters
    public function setTitle($t){
        if(is_string($t)){
            $this->title = $t;
        }
    }

    public function setDate($d){
        if($this->dateChecker($d)){
            $this->date = $d;
        }
    }

    public function setBody($b){
        if(is_string($b)){
            $this->body = $b;
        }
    }

    // This method serves apply the concept of Polymorphism, it will immediately be replaced by itself on the extended object below, also, even if it's not used, it needs a parameter to look the same as the one which will replace it, otherwise it will throw an warning.
    public function setPolymorph($p){
        echo "I'll be replaced soon!";
    }

    // Getters
    public function getTitle(){
        return $this->title;
    }

    public function getDate(){
        return $this->date;
    }

    public function getBody(){
        return $this->body;
    }

    public function getPolymorph(){
        return $this->polymorph;
    }

    // setDate helper.
    private function dateChecker($d){
        $date = explode('-',$d);
        $day = $date[2];
        $month = $date[1];
        $year = $date[0];

        return checkdate($month, $day, $year);
    }

    // setPolymorph helper as a protected function, so it can only be used by its respective object and the ones that inherits it.
    protected function polymorphString($p){
        if(is_string($p)){
            $this->polymorph = $p;
        }
    }
}

// This object inherits Post, it will to be instantiated below as to exemplify the inheritance concept.
class Inheritance extends Post{

    // It will receive the string on $_POST and it will send it to the protected polymorphString protected method.
    public function setPolymorph($p){
       $this->polymorphString($p);
    }

}

// Receives inputs.
if(isset($_POST['submit'])){

    $t = addslashes($_POST["title"]);
    $d = addslashes($_POST["date"]);
    $b = addslashes($_POST["body"]);
    $p = addslashes($_POST["polymorph"]);

    // Object instantiation.
    $post = new Inheritance($t,$d,$b,$p);

    echo "Post Title: ".$post->getTitle()."<br>";
    echo "Post Date: ".$post->getDate()."<br>";
    echo "Post Body: ".$post->getBody()."<br>";
    echo "Polymorphed Value: ".$post->getPolymorph();

}else{
echo "Nothing sent yet.";
}

?>

<form method="POST">
<label>Title: </label>
<input type="text" name="title">

<label>Date: </label>
<input type="date" name="date">

<label>Body: </label>
<input type="textarea" name="body">

<label>Polymorph: </label>
<input type="textarea" name="polymorph">

<input type="submit" name="submit">
</form>

<br>
<br>
<footer style="text-align:center">This snippet was made by © Glori4n (<a href="https://glori4n.net" target="new">https://glori4n.net</a>)</footer>
