<?php
    /**
    * 
    * @param string $url
    * @param string $data
    * @param number $timeount
    * @return boolean|mixed
    */
    function post_contents($url, $data = "", $timeount = 15) {
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        //curl_setopt ( $ch, CURLOPT_HEADER, false );
       // curl_setopt ( $ch, CURLOPT_VERBOSE, true );
        // curl_setopt($ch, CURLOPT_USERAGENT,'');
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $http_response = curl_exec ( $ch );
        if (curl_errno ( $ch )) {
            $errno = curl_errno ( $ch );
            $errmsg = curl_error ( $ch );
            curl_close ( $ch );
            unset ( $ch );
            return false;
        }
        return $http_response;
    }
    /**
    *
    * @param string $url        	
    * @param number $timeount        	
    * @return boolean|mixed
    */
    function get_contents($url, $timeount = 15) {
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        //curl_setopt ( $ch, CURLOPT_HEADER, false );
        //curl_setopt ( $ch, CURLOPT_VERBOSE, true );
        // curl_setopt($ch, CURLOPT_USERAGENT,'');
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        $http_response = curl_exec ( $ch );
        if (curl_errno ( $ch )) {
            $errno = curl_errno ( $ch );
            $errmsg = curl_error ( $ch );
            curl_close ( $ch );
            unset ( $ch );
            return false;
        }
        return $http_response;
    }
	
	function random_char($len , $chars="0123456789"){  
		//$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";  
		$ret_char = "";  
		$num = strlen($chars);  
		for($i = 0; $i < $len; $i++) {  
			$ret_char.= $chars[rand()%$num];  
			$ret_char.="";   
		}  
		return $ret_char;   
	}  

	function check_userid($userid){

      if(trim($userid) == ""){ return "Invalid_1"; }
      if(strpos($userid, " ") >= 1){ return "Invalid_2"; }
      $llu3 = strtolower(substr($userid, 0, 3));
      $pattern = "";
      if(substr($userid,2,1) != "@"){    //เคส Winner VIP
       if(strlen($userid) < 6 || strlen($userid) > 12){ return "Invalid_3"; }
       $pattern = "^[a-zA-Z0-9]+$";
      } else if(strpos( "wl@|yh@", $llu3) != 0){  //เคส Windows live/Yahool id
       if(strlen($userid) < 6 || strlen($userid) > 50){ return "Invalid_4"; }
       $pattern = "^(wl\@|yh\@)[a-zA-Z0-9]+$";
      }else{     //เคส Facebook/mThai/Google/Hi Rich Club
       if(strlen($userid) < 6 || strlen($userid) > 50){ return "Invalid_5"; }
       $pattern = "^(fb\@|mt\@|wm\@|wn\@|gg\@|hi\@|is\@)[0-9]+$";
      }

      //echo "Pattern: '$pattern'<br>";
      if(!ereg($pattern, $userid)){
       return "Invalid";
      }else{
       return "ok";
      }
	}
 
    /**
    *
    * @return boolean
    */
    function CheckIPOffice() {
        if ( !preg_match('/\|'.$_SERVER['REMOTE_ADDR'].'\|/', IP_LIST_ACCESS) ) {
            return false;
        } else {
            return true;
        }
    }
    /**
    *
    * @return string
    */
    function GetIP() {
        if ($_SERVER ["HTTP_X_FORWARDED_FOR"]) {
            $ip = $_SERVER ["HTTP_X_FORWARDED_FOR"]; // ***** ip จริง proxy
        } else {
            $ip = $_SERVER ["REMOTE_ADDR"]; // ****** เก็บค่า ip จริง
        }
        return $ip;
    }
    /**
    *
    * @param string $strWords        	
    * @return string
    */
    function killChars($strWords) {
        $newChars = "";
        $OldChar = "";
        $OldChar = $strWords;
        $badChars = array ("select ", "insert ", "update ", "delete ", "drop ", "exec ", "execute ", "truncate ", "shutdown ", "create ", "sysobjects", "table ", "database ", "user ", "schema ", "adodb ", "master ", "cast(", "convert(", "char(", "db_name", " and ",  " or ", "<script", "select+", "insert+", "update+", "delete+", "drop+", "exec+", "execute+", "truncate+", "shutdown+", "create+", "sysobjects+", "table+", "database+", "user+", "schema+", "adodb+", "master+", "+and+", "+or+", ";", "--", "xp_", "'", "- -", "' '", "%", "%20", "1=1", "*", "**", "=", "@@"); 
        $newChars = $strWords;
        for($x = 0; $x <= count ( $badChars )-1; $x ++) {
            $newChars = str_Replace ( $badChars [$x], "", $newChars );
        }
        return $newChars;
    }
    /**
    *
    * @param string $code        	
    * @param string $debug_msg        	
    * @param string $price        	
    * @param string $point        	
    * @return string
    */
    function topup_to_json($code, $debug_msg, $price = NULL, $point = NULL) {
        global $vLogFileAll;
        if (empty ( $price ) && empty ( $point )) {
            WriteText ( $vLogFileAll, 'response data:' . json_encode ( array (
            'code' => $code,
            'debug_msg' => $debug_msg 
            ) ) );
            return json_encode ( array (
            'code' => $code,
            'debug_msg' => $debug_msg 
            ) );
        } else {
            WriteText ( $vLogFileAll, 'response data:' . json_encode ( array (
            'code' => $code,
            'price' => $price,
            'point' => $point,
            'debug_msg' => $debug_msg 
            ) ) );
            return json_encode ( array (
            'code' => $code,
            'price' => $price,
            'point' => $point,
            'debug_msg' => $debug_msg 
            ) );
        }
    }
    /**
    *
    * @param string $filename        	
    * @param string $message        	
    */

function Now() {
	$today=mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y"));
	$datein=date("Y-m-d H:i:s",$today);
	return $datein;
}

    function WriteText($filename, $message) {
        $parts = explode ( '/', $filename );
        $file = array_pop ( $parts );
        $filename = '';
        foreach ( $parts as $part ) {
            if (! is_dir ( $filename .= "/$part" ))
                mkdir ( $filename );
        }
        file_put_contents ( "$filename/$file", $message . "\r\n", FILE_APPEND );
    }

    function encode64($str1){
        $e_str1 = $str1;
        for($n=1;$n<=3;$n++){
            if($n != 2){
                $e_str1 = base64_encode($e_str1);
            }else{
                $e_str1 = base64_encode(strrev($e_str1));
            }
            $e_str1 = str_replace("=","",$e_str1);
        }
        return strrev($e_str1);
    }
    
    function decode64($str1) {
        $d_str1 = strrev($str1);
        for($n=1;$n<=3;$n++){
            if($n != 2){
                $d_str1 = base64_decode($d_str1);
            }else{
                $d_str1 = strrev(base64_decode($d_str1));
            }
        }
        return $d_str1;
    }


    function current_uri() {
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
	
	function get_data_payment($country,$typeid){
        $strReturn = "";
        if($country == 'TH') {
            if ($typeid == "URLLogin") {
                $strReturn = "https://wincash.winner.co.th/action/payment.php";
            } else if ($typeid == "URLVerifySerial") {
                $strReturn = "https://wincash.winner.co.th/action/VerifyWCSerial.php";
            } else if ($typeid == "Key1") {
                $strReturn = "iWry8sFqKoFaW2oMT9";
            } else if ($typeid == "Key2") {
                $strReturn = "JD8WrGrW79aKu8yJ51Q7nE4wI7LoUa";    
            }
        }else if($country == 'ID'){
            if ($typeid == "URLLogin") {
                $strReturn = "https://wincash.winnerinter.co.id/action/payment.php";
            } else if ($typeid == "URLVerifySerial") {
                $strReturn = "https://wincash.winnerinter.co.id/action/VerifyWCSerial.php";
            } else if ($typeid == "Key1") {
                $strReturn = "hRge6lQnXiAkS3oMV9";
            } else if ($typeid == "Key2") {
                $strReturn = "G3aHiGjZ90bKk5tU71q4mN3dI6IoFp";    
            }
        }else if($country == 'SG'){
            if ($typeid == "URLLogin") {
                $strReturn = "https://wincash.winneronline.sg/action/payment.php";
            } else if ($typeid == "URLVerifySerial") {
                $strReturn = "https://wincash.winneronline.sg/action/VerifyWCSerial.php";
            } else if ($typeid == "Key1") {
                $strReturn = "xThq5iMnXiGkZ3oMV7";
            } else if ($typeid == "Key2") {
                $strReturn = "B5aYiGjS50bKg5Tu51q3mX6dJ6roFB";    
            }
        } else if($country == 'MY'){
            if ($typeid == "URLLogin") {
                $strReturn = "https://wincash.winneronline.my/action/payment.php";
            } else if ($typeid == "URLVerifySerial") {
                $strReturn = "https://wincash.winneronline.my/action/VerifyWCSerial.php";
            } else if ($typeid == "Key1") {
                $strReturn = "mQht4kXwJiDkZ1oMH7";
            } else if ($typeid == "Key2") {
                $strReturn = "bN6DpGjS30aDk2tJ51Q7nM4bI1LoWz";    
            }
        }else if($country == 'TW'){
            if ($typeid == "URLLogin") {
                $strReturn = "https://wincash.winneronline.com.tw/action/payment.php";
            } else if ($typeid == "URLVerifySerial") {
                $strReturn = "https://wincash.winneronline.com.tw/action/VerifyWCSerial.php";
            } else if ($typeid == "Key1") {
                $strReturn = "ArHR8lYnKiAkZ7oNV2";
            } else if ($typeid == "Key2") {
                $strReturn = "H6aGiFjS98bKh5tU21q3pQ5dv6uoEl";    
            }
		}else if($country == 'CN'){
			if ($typeid == "URLLogin") {
				$strReturn = "https://wincash.winneronline.com.tw/china/action/payment.php";
			} else if ($typeid == "URLVerifySerial") {
				$strReturn = "https://wincash.winneronline.com.tw/china/action/VerifyWCSerial.php";
			} else if ($typeid == "Key1") {
				$strReturn = "G5Ry3lQmKiKkX4pNHz";
			} else if ($typeid == "Key2") {
				$strReturn = "L8bKiFtS42bKT5uM26w1pX5kv5uPdK";	
			}
		}else if($country == 'HK'){
			if ($typeid == "URLLogin") {
				$strReturn = "https://wincash.winneronline.com.tw/hongkong/action/payment.php";
			} else if ($typeid == "URLVerifySerial") {
				$strReturn = "https://wincash.winneronline.com.tw/hongkong/action/VerifyWCSerial.php";
			} else if ($typeid == "Key1") {
				$strReturn = "VgJR7lYzmAikks7pNW9";
			} else if ($typeid == "Key2") {
				$strReturn = "P3bQihjS46hDR3tY25i3Nq3gv6uEkx";	
			}
        }else if($country == 'PH'){
            if ($typeid == "URLLogin") {
                $strReturn = "https://wincash.winneronline.my/philippines/action/payment.php";
            } else if ($typeid == "URLVerifySerial") {
                $strReturn = "https://wincash.winneronline.my/philippines/action/VerifyWCSerial.php";
            } else if ($typeid == "Key1") {
                $strReturn = "Y6AM5ORjLySkx76rB1";
            } else if ($typeid == "Key2") {
                $strReturn = "H6qGiHnl6XTbj7S3vTX5hH3Zv5RckP";    
            }
        }else if($country == 'AU'){
            if ($typeid == "URLLogin") {
                $strReturn = "https://wincash.winneronline.com.au/action/payment.php";
            } else if ($typeid == "URLVerifySerial") {
                $strReturn = "https://wincash.winneronline.com.au/action/VerifyWCSerial.php";
            } else if ($typeid == "Key1") {
                $strReturn = "J7b3APEkGQnXe24kB3";
            } else if ($typeid == "Key2") {
                $strReturn = "B2rHeXM25TxsW2N5NRC3gJ7Jb5HcLO";    
            }
        }else if($country == 'ZZ'){
            if ($typeid == "URLLogin") {
                $strReturn = "https://wincash.winneronline.my/global/action/payment.php";
            } else if ($typeid == "URLVerifySerial") {
                $strReturn = "https://wincash.winneronline.my/global/action/VerifyWCSerial.php";
            } else if ($typeid == "Key1") {
                $strReturn = "FpQn5OzGLyEkX7ouV9";
            } else if ($typeid == "Key2") {
                $strReturn = "q7yDiJjS3tbNj5tS6Wq6rH7hv8QcAK";    
            }
        }
        return $strReturn;     
    }

	function fetchURL($uri) {
	$handle = curl_init();
	curl_setopt($handle, CURLOPT_URL, $uri);
	curl_setopt($handle, CURLOPT_POST, false);
	curl_setopt($handle, CURLOPT_BINARYTRANSFER, false);
	curl_setopt($handle, CURLOPT_HEADER, true);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 10);
	
	$response = curl_exec($handle);
	$hlength  = curl_getinfo($handle, CURLINFO_HEADER_SIZE);
	$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
	$body = substr($response, $hlength);
	 curl_close($handle);
	
	// If HTTP response is not 200, throw exception
	if ($httpCode != 200) {
	   //throw new Exception($httpCode);
	   $body = getSslPage($uri);
	}
	
	return $body;
}

function getSslPage($url,$data = "") {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	if ($data != "") {
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//--------------- misja 2014-11-14
class Cookie
{
  const Session = null;
  const OneH = 3600;
  const OneDay = 86400;
  const SevenDays = 604800;
  const ThirtyDays = 2592000;
  const SixMonths = 15811200;
  const OneYear = 31536000;
  const Lifetime = -1; // 2030-01-01 00:00:00

  /**
   * Returns true if there is a cookie with this name.
   *
   * @param string $name
   * @return bool
   */
  static public function Exists($name)
  {
    return isset($_COOKIE[$name]);
  }

  /**
   * Returns true if there no cookie with this name or it's empty, or 0,
   * or a few other things. Check http://php.net/empty for a full list.
   *
   * @param string $name
   * @return bool
   */
  static public function IsEmpty($name)
  {
    return empty($_COOKIE[$name]);
  }

  /**
   * Get the value of the given cookie. If the cookie does not exist the value
   * of $default will be returned.
   *
   * @param string $name
   * @param string $default
   * @return mixed
   */
  static public function Get($name, $default = '')
  {
    return (isset($_COOKIE[$name]) ? $_COOKIE[$name] : $default);
  }

  /**
   * Set a cookie. Silently does nothing if headers have already been sent.
   *
   * @param string $name
   * @param string $value
   * @param mixed $expiry
   * @param string $path
   * @param string $domain
   * @return bool
   */
  static public function Set($name, $value, $expiry = self::OneYear, $path = '/', $domain = false)
  {
    $retval = false;
    if (!headers_sent())
    {
      if ($domain === false)
        $domain = $_SERVER['HTTP_HOST'];

      if ($expiry === -1)
        $expiry = 1893456000; // Lifetime = 2030-01-01 00:00:00
      elseif (is_numeric($expiry))
        $expiry += time();
      else
        $expiry = strtotime($expiry);

      $retval = @setcookie($name, $value, $expiry, $path, $domain);
      if ($retval)
        $_COOKIE[$name] = $value;
    }
    return $retval;
  }

  /**
   * Delete a cookie.
   *
   * @param string $name
   * @param string $path
   * @param string $domain
   * @param bool $remove_from_global Set to true to remove this cookie from this request.
   * @return bool
   */
  static public function Delete($name, $path = '/', $domain = false, $remove_from_global = false)
  {
    $retval = false;
    if (!headers_sent())
    {
      if ($domain === false)
        $domain = $_SERVER['HTTP_HOST'];
      $retval = setcookie($name, '', time() - 3600, $path, $domain);

      if ($remove_from_global)
        unset($_COOKIE[$name]);
    }
    return $retval;
  }
}

Function trackads($ext_link) {
	GLOBAL $HostWeb;
	GLOBAL $UserWeb;
	GLOBAL $PassWeb;
	GLOBAL $DBWeb;
	 Try {	          
		 if ($_SESSION["ch_id"] != NULL){
			//$ConWeb = @mysql_connect($HostWeb, $UserWeb, $PassWeb);
			$cn = new MySQLClass();
			$cn->connect2web(); 
            /*mysql_query("SET character_set_results=tis620");
            mysql_query("SET character_set_client=tis620");
            mysql_query("SET character_set_connection=tis620");*/
            if (!$cn) {
                //echo"ERROR :Can't Connect Database 5 !!! ";
            }
            //mysql_select_db($DBWeb, $ConWeb);
			$cn->dbname(WebDB); 
			$strSQL = "insert into visitor_track (ch_id,ext_link_id,track_date,userid,frm_link_id,ip) values(" . $_SESSION["ch_id"] . "," . $ext_link . ",now(),'" . $_SESSION ["Username"] . "', " . $_SESSION["frm_link_id"] . ", '" . GetIP() . "' )";
			//$Query = mysql_query($strSQL);
			$cn->execute($strSQL);
			$cn->closedb();
		 }	
		//mysql_close($ConWeb);

	} Catch (Exception $e) {
		
	}
}


function RandomLinkDownload($filename) 
{
	GLOBAL $PathIPDownload;
	GLOBAL $FolderDownload;
	$arrIPDownload=array();
	$fp = fopen($PathIPDownload,"r");
	$filesize=filesize($PathIPDownload);
	if($fp) {
		$ln=0;
			while(!feof($fp)) 		{
				$pretext = fgets($fp,$filesize);
				if (is_numeric(substr($pretext,0,2))){ 
					$arrTmp= explode('|', $pretext);						
					for ($i=0;$i<$arrTmp[1];$i++)
					{
							$arrIPDownload[$ln+$i] = $arrTmp[0];	
					}
				}
				$ln += $i;
			}
	fclose($fp);
	}
/*	foreach ($arrIPDownload as $key => $value) {
		echo  $key  .  " " . $value . '<br/>';
	}
*/
	$ran = rand(0,count($arrIPDownload)-1);
	$strReturn = "http://" . $arrIPDownload[$ran] . "/" . $FolderDownload . "/" . $filename;
	$nc = str_replace('.','_',$filename);
	if (empty($_COOKIE[$nc])) {
		//echo "empty : ".$_COOKIE[$nc];
		setcookie($nc,"yes",time()+3600);
			$cn = new MySQLClass();
			$cn->connect2web(); 
			 
			 $filename = str_replace("rar","exe", $filename ,$var);
			 $strSQL = "select * from download where FileName='" . $filename . "'";
			 $rs = $cn->select($strSQL);
			 if (count($rs) > 0) {	
			 	 $strSQL = "update download set total = total + 1 where FileName='" . $filename . "'";
				 $cn->execute($strSQL);	
				 $date = new DateTime();
				 $strDate = $date->format('Y-m-d');
				 $strSQL = "select Count(FileName) as TID from download_sub where FileName='" . $filename . "' And CreateDate ='" . $strDate . "'";
				 $rs = $cn->select($strSQL);
				 if ($rs[0]->TID == 0)  $strSQL = "Insert into download_sub(CreateDate,FileName,Amount) values(Now(),'" . $filename . "',1)";
				 else  $strSQL = "update download_sub set Amount = Amount + 1 where FileName='" . $filename . "' And CreateDate ='" . $strDate . "'";
				 $cn->execute($strSQL);	
				 $strSQL = "insert into download_log (FileName,ip,datetime) values('" . $filename . "','" . GetIP()  . "',NOW());";
				 $cn->execute($strSQL);	
			}
	}
	Return $strReturn;
}