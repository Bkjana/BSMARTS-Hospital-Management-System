<?php
    class userLogin
    {
        var $name,$mobile,$email,$password;
        public function __construct($name,$mobile,$email,$password) {
            $this->name = $name;
            $this->mobile=$mobile;
            $this->email=$email;
            $this->password=$password;
        }
        // public function __construct($mobile,$password) {
        //     $this->mobile=$mobile;
        //     $this->password = $password;
        //     $this->email="";
        //     $this->name="";
        // }
    }
    

?>