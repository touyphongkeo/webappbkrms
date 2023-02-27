<?PHP
  include('dbconfig.php');

//   $stuid=$_POST['stuid'];
//   $firstname=$_POST['firstname'];
//   $lastname=$_POST['lastname'];
//   $birthdate=$_POST['birthdate'];

  if($_SERVER['REQUEST_METHOD']=="GET"){
        try{
            $sql="SELECT * FROM RATE";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($result)){
                $response=array(
                    'status'=>true,
                    'response'=>$result,
                    'message'=>'success'
                    );
                http_response_code(200);
                echo json_encode($response);
            }else{
                http_response_code(400);
                echo json_encode(array('status'=>false,'message'=>'Something is wronng')); 
            }
        }catch(PDOException $e){
            echo"Faild".$e->getMessage();
        }

    
    }else{
        echo "This is other";
    }
?>