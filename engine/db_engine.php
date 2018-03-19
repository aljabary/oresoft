<?php
/**
@DB Class
@Proxtrasoft v.1.1.0
@license: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author: Abu Zidane Asadudin Shakir Al-Jabary
this class handling server and database name, username and password server.
we used mysqli driver, if your server support PDO driver you can use PDO Driver
**/
namespace Prox\System;
class DB{
	public $db ;
	public $permission	=	'false';
	function __construct($bc) {
		
	if($bc !='pxpermission'){
		$bcn = get_class($bc);
		if($bcn !='Manager_Plug_handler')		
		$q = mysqli_query(Xcon(),"select * from permission where plugins='$bcn' and permission='DATABASE'");
		while($g=mysqli_fetch_array($q)){
			$this->permission = $g['val'];
		}
        switch ($this->permission) {
            case 'false':
                // throw custom exception
                throw new PxException(BCL('px','ex_perm'), 1);
                break;
		default: 
                // No exception, object will be created.
                $this->var = $val;
                break;
        }
    }
	
}
public function connect(){
	
	/*try{
		$this->db = new PDO("dbtype:host=localhost;dbname=prox;charset=utf8","root","");
	}catch(PDOException  $e ){
		echo "Error: ".$e;
	}*/
	set_time_limit(300);
		$bd = mysqli_connect('localhost', 'root', '') or die("Opps some thing went wrong");
		mysqli_select_db($bd, 'prox') or die("Opps some thing went wrong");
		return $bd;
}

}
/*
class Exception
{
    protected $message = 'Unknown exception';   // exception message
    private   $string;                          // __toString cache
    protected $code = 0;                        // user defined exception code
    protected $file;                            // source filename of exception
    protected $line;                            // source line of exception
    private   $trace;                           // backtrace
    private   $previous;                        // previous exception if nested exception

    public function __construct($message = null, $code = 0, Exception $previous = null){}

    final private function __clone();           // Inhibits cloning of exceptions.

  /*  final public  function getMessage();        // message of exception
    final public  function getCode();           // code of exception
    final public  function getFile();           // source filename
    final public  function getLine();           // source line
    final public  function getTrace();          // an array of the backtrace()
    final public  function getPrevious();       // previous exception
    final public  function getTraceAsString();  // formatted string of trace

    // Overrideable
    public function __toString();               // formatted string for display
}
*/

class PxException extends \Exception
{
	protected $code=0;
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Exception $previous = null) {
        // some code
    $this->code = $code;
        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}.\n {$this->Message()} => ".$this->line();
    }
public function line(){
	//$line = $this->getLine().$this->getFile();
		/*$c = count($this->getTrace());
	for($i=0;$i<$c;$i++){
		$tcc = $this->getTrace();
		$tc=$tcc[$i];
		echo'terjadi error pada '.$tc['file'].' di baris '.$tc['line'].'</br>';
	}*/
		$tcc = $this->getTrace();
		$tc=$tcc[0];
		$line .=BCL('px','ex_perm_line').$tc['file'].BCL('px','ex_perm_line_on').$tc['line']."\n";
		$tc=$tcc[1];
		$line .='=> '.BCL('px','ex_perm_source').$tc['file'].BCL('px','ex_perm_line_on').$tc['line']."\n";
	
	return $line;
}
    public function Message() {
		$msg ='';
		switch($this->code){
			case 1:$msg= BCL('px','ex_perm_db');
			break;
			case 2:$msg= BCL('px','ex_perm_cat_w');
			break;
			case 3:$msg= BCL('px','ex_perm_cat_r');
			break;
			case 4:$msg= BCL('px','ex_readonly_msg');
			break;
			case 5:$msg= BCL('px','ex_template_msg');
			break;
			case 6:$msg= BCL('px','ex_need_msg');
			break;
			case 7:$msg= BCL('px','ex_perm_article_w');
			break;
			case 9:$msg= BCL('px','ex_perm_media_r');
			break;
			case 10:$msg= BCL('px','ex_perm_media_w');
			break;
			case 11:$msg= BCL('px','ex_meta_msg');
			break;
			case 12:$msg= BCL('px','ex_app_local_api_msg');
			break;
			case 13:$msg= BCL('px','ex_perm_article_r');
			break;
			case 14:$msg= BCL('px','ex_hook_msg');
			break;
			case 15:$msg= BCL('px','ex_perm_page_w');
			break;
			case 16:$msg= BCL('px','ex_perm_page_r');
			break;
			case 17:$msg= BCL('px','ex_perm_analityc');
			break;
			case 18:$msg= BCL('px','ex_perm_msg_w');
			break;			
			case 19:$msg= BCL('px','ex_perm_msg_r');
			break;			
			case 20:$msg= BCL('px','ex_trialkey');
			break;
			case 21:$msg= BCL('px','ex_keystore_msg');
			break;
			case 22:$msg= BCL('px','ex_perm_com_w');
			break;			
			case 23:$msg= BCL('px','ex_perm_com_r');
			break;
			case 24:$msg= BCL('px','ex_perm_user_w');
			break;			
			case 25:$msg= BCL('px','ex_perm_user_r');
			break;
			case 26:$msg= BCL('px','ex_perm_notif_w');
			break;			
			case 27:$msg= BCL('px','ex_perm_notif_r');
			break;
			case 28:$msg= BCL('px','ex_perm_adm');
			break;
			case 29:$msg= BCL('px','ex_user_role');
			break;
			
		}
        return XLog($msg);
    }
}
?>