<!-- This snippet was made by Glori4n(https://glori4n.com) -->

<?php

class Post{
    private $title;
    private $date;
    private $body;

    // Construct, this method is the first to be executed whenever an object is instantiated.
    public function __construct($t, $d, $b){
        $this->setTitle($t);        
        $this->setDate($d);        
        $this->setBody($b);        
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

    // setDate helper.
    private function dateChecker($d){
        $date = explode('-',$d);
        $day = $date[2];
        $month = $date[1];
        $year = $date[0];

        return checkdate($month, $day, $year);
    } 
}

// This object inherits Post, just to be instantiated below as to exemplify the inheritance concept.
class Inheritance extends Post{

}

// Receives inputs.
if(isset($_POST['submit'])){

    $t = addslashes($_POST["title"]);
    $d = addslashes($_POST["date"]);
    $b = addslashes($_POST["body"]);

    // Object instantiation.
    $post = new Inheritance($t,$d,$b);

    echo "Post Title: ".$post->getTitle()."<br>";
    echo "Post Date: ".$post->getDate()."<br>";
    echo "Post Body: ".$post->getBody()."<br>";

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

<input type="submit" name="submit">
</form>