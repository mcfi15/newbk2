<?php

require_once 'dbconfig.php';

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function create($temp_acc,$firstname,$lastname,$email,$phone,$dob,$gender,$address,$city,$zipcode,$country,$state,$currency,$empname,$emptype,$salary,$bname,$boccu,$badd,$q1,$ans1,$q2,$ans2,$password,$pin,$acctype,$cot,$tax,$imf,$atc,$telex_code,$code)
	{
		try
		{							
			// $password = md5($password);
			$stmt = $this->conn->prepare("INSERT INTO account(acc_no, firstname,lastname,email,phone,dob,gender,address,city,zipcode,country,state,currency,empname,emptype,salary,bname,boccu,badd,q1,ans1,q2,ans2,password,pin,acctype,cot,tax,imf,atc,telex_code,code) 
			                                             VALUES(:temp_acc, :firstname, :lastname, :email, :phone, :dob, :gender, :address, :city, :zipcode, :country, :state, :currency, :empname, :emptype, :salary, :bname, :boccu, :badd, :q1, :ans1, :q2, :ans2, :password, :pin, :acctype, :cot, :tax, :imf, :atc, :telex_code, :code)");
			
			$stmt->bindparam(":temp_acc",$temp_acc);
			$stmt->bindparam(":firstname",$firstname);
			$stmt->bindparam(":lastname",$lastname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":phone",$phone);
			$stmt->bindparam(":dob",$dob);
			$stmt->bindparam(":gender",$gender);
			$stmt->bindparam(":address",$address);
			$stmt->bindparam(":city",$city);
			$stmt->bindparam(":zipcode",$zipcode);
			$stmt->bindparam(":country",$country);
			$stmt->bindparam(":state",$state);
			$stmt->bindparam(":currency",$currency);
			$stmt->bindparam(":empname",$empname);
			$stmt->bindparam(":emptype",$emptype);
			$stmt->bindparam(":salary",$salary);
			$stmt->bindparam(":bname",$bname);
			$stmt->bindparam(":boccu",$boccu);
			$stmt->bindparam(":badd",$badd);
			$stmt->bindparam(":q1",$q1);
			$stmt->bindparam(":ans1",$ans1);
			$stmt->bindparam(":q2",$q2);
			$stmt->bindparam(":ans2",$ans2);
			$stmt->bindparam(":password",$password);
			$stmt->bindparam(":pin",$pin);
			$stmt->bindparam(":acctype",$acctype);
// 			$stmt->bindparam(":image",$image);
			$stmt->bindparam(":cot",$cot);
			$stmt->bindparam(":tax",$tax);
			$stmt->bindparam(":imf",$imf);
			$stmt->bindparam(":atc",$atc);
			$stmt->bindparam(":telex_code",$telex_code);
			$stmt->bindparam(":code",$code);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function transfer($email,$amount,$acc_no,$acc_name,$bank_name,$swift,$routing,$type,$remarks)
	{
		try
		{							
			
			$stmt = $this->conn->prepare("INSERT INTO transfer(email,amount,acc_no,acc_name,bank_name,type,swift,routing,remarks) 
			                                             VALUES(:email, :amount, :acc_no, :acc_name, :bank_name, :type, :swift, :routing, :remarks)");
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":amount",$amount);
			$stmt->bindparam(":acc_no",$acc_no);
			$stmt->bindparam(":acc_name",$acc_name);
			$stmt->bindparam(":bank_name",$bank_name);
			$stmt->bindparam(":type",$type);
			$stmt->bindparam(":swift",$swift);
			$stmt->bindparam(":routing",$routing);
			$stmt->bindparam(":remarks",$remarks);
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function his($uname,$amount,$sender_name,$type,$remarks,$date,$time)
	{
		try
		{							
			$stmt = $this->conn->prepare("INSERT INTO alerts(uname,amount,sender_name,type,remarks,date,time) 
			                                             VALUES(:uname, :amount, :sender_name, :type, :remarks, :date, :time)");
			
			$stmt->bindparam(":uname",$uname);
			$stmt->bindparam(":amount",$amount);
			$stmt->bindparam(":sender_name",$sender_name);
			$stmt->bindparam(":type",$type);
			$stmt->bindparam(":remarks",$remarks);
			$stmt->bindparam(":date",$date);
			$stmt->bindparam(":time",$time);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function temp($email,$amount,$acc_no,$acc_name,$bank_name,$swift,$routing,$type,$remarks)
	{
		try
		{							
			
			$stmt = $this->conn->prepare("INSERT INTO temp_transfer(email,amount,acc_no,acc_name,bank_name,type,swift,routing,remarks) 
			                                             VALUES(:email, :amount, :acc_no, :acc_name, :bank_name, :type, :swift, :routing, :remarks)");
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":amount",$amount);
			$stmt->bindparam(":acc_no",$acc_no);
			$stmt->bindparam(":acc_name",$acc_name);
			$stmt->bindparam(":bank_name",$bank_name);
			$stmt->bindparam(":type",$type);
			$stmt->bindparam(":swift",$swift);
			$stmt->bindparam(":routing",$routing);
			$stmt->bindparam(":remarks",$remarks);
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function ticket($tc,$sender_name,$sub,$msg)
	{
		try
		{							
			
			$stmt = $this->conn->prepare("INSERT INTO ticket(tc,sender_name,subject,msg) 
			                                             VALUES(:tc, :sender_name, :subject, :msg)");
			$stmt->bindparam(":tc",$tc);
			$stmt->bindparam(":sender_name",$sender_name);
			$stmt->bindparam(":subject",$sub);
			$stmt->bindparam(":msg",$msg);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function message($sender_name,$reci_name,$subject,$msg)
	{
		try
		{							
			
			$stmt = $this->conn->prepare("INSERT INTO message(sender_name,reci_name,subject,msg) 
			                                             VALUES(:sender_name, :reci_name, :subject, :msg)");
			
			$stmt->bindparam(":sender_name",$sender_name);
			$stmt->bindparam(":reci_name",$reci_name);
			$stmt->bindparam(":subject",$subject);
			$stmt->bindparam(":msg",$msg);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function delaccount($id)
	{
		try
		{							
			
			$stmt = $this->conn->prepare("DELETE FROM account WHERE id = :id"); 
			                                            
			$stmt->bindparam(":id",$id);
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function update($email,$phone,$addr)
	{
		$update = "UPDATE account SET
				email = :email,
				phone = :phone,
				addr = :addr,
				
				WHERE id = :id";
		try
		{							
			$stmt = $this->conn->prepare($update); 
			                                         
			$stmt->bindparam(':email', $_POST['email'], PDO::PARAM_STR);
			$stmt->bindparam(':phone', $_POST['phone'], PDO::PARAM_STR);
			$stmt->bindparam(':addr', $_POST['addr'], PDO::PARAM_STR);
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function bal($t_bal)
	{
		$update = "UPDATE account SET
				t_bal = :t_bal,
				
				WHERE id = :id";
		try
		{							
			$stmt = $this->conn->prepare($update); 
			                                         
			$stmt->bindparam(':t_bal', $_POST['t_bal'], PDO::PARAM_STR);
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function login($acc_no,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM account WHERE acc_no=:acc_no");
			$stmt->execute(array(":acc_no"=>$acc_no));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				if($userRow['upass']==md5($upass))
					{
						$_SESSION['userSession'] = $userRow['acc_no'];
						return true;
					}
					else
					{
						header("Location: login?error");
						exit;
					}
			}
				
			
			else
			{
				header("Location: login?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['userSession'] = false;
	} 
	
	// 	function send_mail($email,$messag,$subject)
	// {						
	// require_once('mailer/class.phpmailer.php');
	// $mail = new PHPMailer();
	// $mail->IsSMTP(); 
	// $mail->SMTPDebug  = 0;                     
	// $mail->SMTPAuth   = true;                  
	// $mail->MessageID = "<" . md5('HELLO'.(idate("U")-1000000000).uniqid()).'@grandsumban.online>';
	// $mail->SMTPSecure = "ssl";                 
	// $mail->Host       = "mail.grandsumban.online"; 
	// $mail->Port       = 465;             
	// $mail->AddAddress($email);
	// $mail->Username="support@grandsumban.online";  
	// $mail->Password="usertheadmin";            
	// $mail->SetFrom('support@grandsumban.online','Grand Summit Bank');
	// $mail->AddReplyTo("support@grandsumban.online","Grand Summit Bank");
	// $mail->Subject    = $subject;
	// $mail->MsgHTML($messag);
	// $mail->Send();
	// }

	function sms($receiver, $message){

	    $nonce = rawurlencode(uniqid());
	    $ts = rawurlencode(time());
	    $key = rawurlencode('OCAwb2NrAlBOxKlS7ArK3VYd');
	    $secret = rawurlencode('ivH^PcC0iJ#heGsXzrPK-ZNkKbk!0weg1k(vY!sb');
	    $uri = 'https://gatewayapi.com/rest/mtsms';
	    $method = 'POST';

	    // OAuth 1.0a - Signature Base String
	    $oauth_params = array(
	        'oauth_consumer_key' => $key,
	        'oauth_nonce' => $nonce,
	        'oauth_signature_method' => 'HMAC-SHA1',
	        'oauth_timestamp' => $ts,
	        'oauth_version' => '1.0',
	    );
	    $sbs = $method . '&' . rawurlencode($uri) . '&';
	    $it = new ArrayIterator($oauth_params);
	    while ($it->valid()) {
	        $sbs .= $it->key() . '%3D' . $it->current();$it->next();
	        if ($it->valid()) $sbs .= '%26';
	    }

	    // OAuth 1.0a - Sign SBS with secret
	    $sig = base64_encode(hash_hmac('sha1', $sbs, $secret . '&', true));
	    $oauth_params['oauth_signature'] = rawurlencode($sig);

	    // Construct Authorization header
	    $it = new ArrayIterator($oauth_params);
	    $auth = 'Authorization: OAuth ';
	    while ($it->valid()) {
	        $auth .= $it->key() . '="' . $it->current() . '"';$it->next();
	        if ($it->valid()) $auth .= ', ';
	    }

	    // Request body
	    $req = array(
	        'recipients' => array(array('msisdn' => $receiver)),
	        'message' => $message,
	        'sender' => 'Frixty',
	);


	// Send request with cURL
	$c = curl_init($uri);
	curl_setopt($c, CURLOPT_HTTPHEADER, array(
	    $auth,
	    'Content-Type: application/json'
	));
	curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($req));
    curl_exec($c);
    curl_close($c);
	}


}
 