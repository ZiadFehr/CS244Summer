<?php
    include "../Frontend/TopNav.html";
    require "UserInfo.php";
    require "User.php";
    require "DocApps.php";
    require "Treatment.php";
    class Doctor extends UserInfo implements User{
        private $specialty;
        use DoctorAppointments{
            DoctorAppointments::__construct as app;
        }
        use Treatment{
            Treatment::__construct as tr;
        }
        public function __construct($hid,$fn,$ln,$em,$pass,$spec){
            parent::__construct($hid,$fn,$ln,$em,$pass);
            $this->specialty=$spec;
        }
        public function setTreat($tid,$tn,$pid){
            $this->tr($tid,$tn,$pid);
        }
        public function setApp($day,$aptt,$rp){
            $this->app($day,$aptt,$rp);
        }
        public function getSpec(){
            return $this->specialty;
        }
        public function ShowProfile(){
            echo parent::gethospid()."<br>";
            echo parent::getfn()."<br>";
            echo parent::getln()."<br>";
            echo parent::getem()."<br>";
            echo $this->specialty;
        }
    }
?>