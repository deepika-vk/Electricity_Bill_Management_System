<?php
 /**
  * 
  */
 class Format{
 	
 public function imgformat($image){
             $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            // $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            // $uploaded_image = "../images/".$unique_image;

            $uploaded_image="img".".".$file_ext;
            return array($uploaded_image,$file_temp);
 }
 public function movefolder($name,$path){
     move_uploaded_file($path, $name);
 }
 public function removefromfolder($imgloc){
     unlink($imgloc);

 }
    public function validation($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    public function BillCalculate($watt){
            $unit = $watt;
            $bill = 0;
            if ($watt > 500){
                $bill += ($watt - 500) * 7;
                $watt = 500;
            }
            if( $watt > 300 && $watt <= 500){
                $bill += ($watt - 300) * 5;
                $watt = 300;
            }
            if($watt > 100 && $watt <= 300){
                $bill += ($watt - 100) * 4;
                $watt = 100;
            }
            if($watt <= 100){
                $bill += $watt * 3.5;
            }
            
            if($unit < 500){
                $bill += $bill * 0.05;
            }
            if($unit >= 500){
                $bill += $bill * 0.1;
            }
            return $bill + 50;

    }
        public function DateFormat($date){
        return date("F j, Y, g:i a",strtotime($date));
    }


 	
 }




 ?>