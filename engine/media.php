<?php
/**
@Media Core Class
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling media processing data, insert, update, delete, upload
**/
namespace Prox\Engine;
use Prox\System\Permission;
use Prox\Engine\Photo;
use Prox\Engine\Document;
use Prox\Engine\Media\Core;
use Prox\Engine\Media\ImageSizer;
class Media extends Core{
	private $permission;
	public $tp;
	/**
	initialize permission for plugins
	*/
function __construct(/*Plugins Base_Class*/ $bc, $id=0,$tp=''){
		parent::__construct($id,$tp);
		$this->tp = $tp;
		$this->permission 	= new Permission($bc);
	
}	
function VideoUpload($file, $title){		
if($_SERVER['REQUEST_METHOD']=='POST'){
	$today 	= date('Y-m-d H:i:s'); 
	$user = new User();
	$ida = $user->id;
	

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
	{$name = $file['name'];$size = $file['size']; $ext =pathinfo($name, PATHINFO_EXTENSION);
	if($name !=""){
	if($size<(500024*500024))
	{
	$actual_name 	= time().substr(str_replace(" ", "_", date('Y-m-d')), 5).str_replace(" ", "-",$name);//.".".$ext;
	$tmp 			= $file['tmp_name'];
	
			$ext 	=	strtolower($ext);
			switch($ext){
				case 'mp4':$folder='video';$tp='video';break;
				case 'mov':$folder='video';$tp='video';break;
				case '3gp':$folder='video';$tp='video';break;
				case 'ogp':$folder='video';$tp='video';break;
				case 'mp3':$folder='video';$tp='sound';break;
				case 'wav':$folder='video';$tp='sound';break;
				case 'wmv':$folder='video';$tp='video';break;				
				case 'ogg':$folder='video';$tp='sound';break;
				default:$folder='file';$tp="document";break;				
			}
	$path 	= PROX_Domain.'/media_pref/'.$folder.'/';			
	$stat 			= stat( dirname( $path.$actual_name ));
	$perms 			= $stat['mode'] & 0777;
	@ chmod( $path.$actual_name, $perms );
	if(move_uploaded_file($tmp, $path.$actual_name))
		{	
				$upfile	=	PROX_URL.'media_pref/'.$folder.'/'.str_replace(' ','-',$actual_name);
				$con = Xcon(PERMISSION);
				mysqli_query($con,"insert into media (title,source,tp,dt) values('$title','$upfile','$tp','$today')");
				$idf = mysqli_insert_id($con);
				$message[]	= 	'Success Upload';$code=1;$id=$idf;
		}else{
				$message[]='Failed';$code=0;$id=$idf;
				}
		}
		else{
				$message[]='Max size 5 MB';$code=0;$id=$idf;
				}			
		}
		else{
			$message[]='File not found';$code=0;$id=$idf;
				
		}
		}}else{
			$message[]='Unknown error';$code=0;$id=$idf;
				
		}	
		return array("code"=>$code,"message"=>$message, "id"=>$idf);
	}
function PhotoUpload($title){
	$this->permission->validate('MEDIA', 'WRITE', 10); //required permission	
	
	$path 	= PROX_Domain.'/media_pref/photo/';	
if ($_FILES)
  {
   foreach ($_FILES as $key => $value)
   {
		$ok =false;
	    if ($value["type"] == "image/jpeg"){ $ext = ".jpg";$ok =true; }
		if ($value["type"] == "image/png") { $ext = ".png";$ok =true; }
		if ($value["type"] == "image/gif") { $ext = ".gif";$ok =true; }
		$fni 	= time().substr(str_replace(" ", "_", date('Y-m-d')), 5).str_replace(" ", "-",$value['name']);
		$xt 	= ".".pathinfo($fn, PATHINFO_EXTENSION);
		$fn 	=	str_replace($xt,"_".$xt,$fni);
		$fn75 	=	str_replace($xt,"thumb_75".$xt,$fni);
		$fn15 	=	str_replace($xt,"thumb_150".$xt,$fni);
		$fn25 	=	str_replace($xt,"thumb_250".$xt,$fni);
		$newfile= $path."/" . $fn;
		if($ok){
			if (move_uploaded_file($value["tmp_name"], $newfile))
			{
				$con =Xcon(PERMISSION);
				$upfile	=	PROX_URL.'media_pref/photo/'.str_replace(' ','-',$fn);				
				$today 	= date('Y-m-d H:i:s'); 
				mysqli_query($con,"insert into media (title,source,tp,dt) values('$title','$upfile','photo','$today')");
				$idf = mysqli_insert_id($con);	
				$m[75] 	= $this->thumb2($newfile, $path. "/" . $fn75, 75,75);
				$m[75] 	= array_merge($m[75],array('id'=>$idf));
				$m[150] = $this->thumb2($newfile, $path . "/" . $fn15, 150, 150);
				$m[150] = array_merge($m[150],array('id'=>$idf));
				$m[250] = $this->thumb2($newfile, $path . "/" .$fn25, 250, 250);
				$m[250] = array_merge($m[250],array('id'=>$idf));
			}
		}else{
			$m[0] = $this->VideoUpload($value,$title);
		}
   }
  }
	return $m;
}
function thumb2($newfile,$fn,$h,$w){
	
// Load the original image
$image = new ImageSizer($newfile);
$image->resize($h,$w);
$image->save($fn);
return array("code"=>$ok,"message"=>$message);
}
function thumb($file, $bigname, $thumbname, $maxwidth, $maxheight)
 {
   // determine the image type
    $message = array();

   if ($file["type"] == "image/jpeg") { $ext = ".jpg"; }
   if ($file["type"] == "image/png") { $ext = ".png"; }
   if ($file["type"] == "image/gif") { $ext = ".gif"; }

   $newfile = $bigname;
  
    // get old image size and convert to a maximum width/height combo
    $size = getimagesize($newfile);
    // only do the conversion if the width is greater than zero, otherwise there could be a division by zero error
    if ($size[1] != 0)
    {

     // Calculate the thumbnail's width an height, based on the max sized allowed and the original's dimensions
     if ($size[0]/$size[1] > $maxwidth/$maxheight)
     { $newwidth = $maxwidth; $newheight = floor(($size[1] * $maxwidth) / $size[0]);
 }
      else
     { $newheight = $maxheight; $newwidth = ceil(($size[0] * $maxheight) / $size[1]); 
	}

     // Create the thumbnail imagecreatetruecolor($newwidth 
    // $i = imagecreate($newwidth, $newheight);
$i = imagecreatetruecolor($newwidth, $newheight);
     if ($ext == ".jpg") { $j = imagecreatefromjpeg($newfile);  $imgFunc = 'imagejpeg';}
     if ($ext == ".png") { $j = imagecreatefrompng($newfile);	 $imgFunc = 'imagepng';
		//ImageAlphaBlending($j,true); 
		//ImageSaveAlpha($j,true); 
		}
     if ($ext == ".gif") { $j = imagecreatefromgif($newfile);	 $imgFunc = 'imagegif';
		$transparent_index = ImageColorTransparent($j); 
        if($transparent_index!=(-1)){ $transparent_color = ImageColorsForIndex($j,$transparent_index); }
	 }
     if($ext=='.png') 
     { 
          //  ImageAlphaBlending($i,false); 
           // ImageSaveAlpha($i,true); 
     } 
     if(!empty($transparent_color)) 
     { 
            $transparent_new = ImageColorAllocate($i,$transparent_color['red'],$transparent_color['green'],$transparent_color['blue']); 
            $transparent_new_index = ImageColorTransparent($i,$transparent_new); 
            ImageFill($i, 0,0, $transparent_new_index); 
      } 
     if ($j)
     { //imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		//imagecopyresampled
      // Copy the original image and paste into the new image, resized
      if (imagecopyresized($i, $j, 0, 0, 0, 0, $newwidth, $newheight, $size[0], $size[1]))
      {
       if ($imgFunc($i, $thumbname, 100))
       {
		   $ok =1;
        $message[] = "Image thumb created successfully";
       } else {
		   $ok =0;
        $message[] = "Image thumb would not export";
       }
      } else {
		   $ok =0;
       $message[] = "Image resize failure";
      }
     } else {
		   $ok =0;
      $message[] = "Image type not recognized";
     }
    } else { // size[1] != 0	
		   $ok =0;
     $message[] = "Image size invalid";
    }
   
 
  return array("code"=>$ok,"message"=>$message);
 
 }

/**
* get list of photo media
* @param int $st : page index
* @param int $nd : number media count per page
* @return array $data : list of photo media
*/
function getPhoto($st,$nd){
	$this->permission->validate('MEDIA', 'READ', 9); //required permission	
	$data = $this->getList("Photo",$st,$nd);
	return $data;
}
/**
* get list of document media
* @param int $st : page index
* @param int $nd : number media count per page
* @return array $data : list of document media
*/
function getDocument($st,$nd){
	$this->permission->validate('MEDIA', 'READ', 9); //required permission	
	$data = $this->getList("document",$st,$nd);
	return $data;
}
/**
* get list of video and audio media
* @param int $st : page index
* @param int $nd : number media count per page
* @return array $dat : list of video and audio media
*/
function getAuvi($st,$nd){
	$this->permission->validate('MEDIA', 'READ', 9); //required permission	
	$data = $this->getList("audio",$st,$nd);
	$datv = $this->getList("video",$st,$nd);
	$dat = array_merge($data,$datv);
	return $dat;
}
/**
* Get total page of media by type, by number perpage
* @param String $tp : type of media
* @param int $num 	: number media per page
* @return int $pg 	: count of page
*/
function getPageCount($tp, $num){
	$this->permission->validate('MEDIA', 'READ', 9); //required permission	
	if($num < 1){$num =1;}
	$db 	= Xcon(PERMISSION);
	$q = mysqli_query($db,"select * from media where tp = '$tp' ");
	$c = mysqli_num_rows($q);
	$pg = $c/$num;
	if($pg < 1){		
		$pg = 1;
	}
	$pgs = explode(".",$pg);
	if(!empty($pgs[1])){
		$pg = $pg+1;
	}
	return $pg;
	}
/**
* get list media by type
* @param string $tp : type of media
* @param int $st 	: index page
* @param int $nd 	: number media count perpage
*/	
function getList($tp, $st, $nd){
	$db 	= Xcon(PERMISSION);
	$this->Obj[$tp]	= array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	$q = mysqli_query($db,"select * from media where tp = '$tp' order by id desc limit $ix,$nd");
	while($g = mysqli_fetch_array($q)){
		$this->gen($g,$tp);		
	}
	
	return $this->Obj[$tp];
}
/**
* this method for call media browser
* call by ajax
*/
function getMediaAjax(){
	$data = $this->getList($_GET['tp'],$_GET['pg'],12);
	$js = array();
	for($i=0;$i<count($data);$i++){
		$md = $data[$i];
		if($md->type =='video' || $md->type =='sound'){
			$fol ='video';$ico='fa-file-'.$md->type.'-o';
		}
		if($md->type =='photo'){
			$fol = 'photo';
		}
		if($md->type =='document'){
			$fol = 'file';$ico ='fa-file-word-o';
			}
		$js[$i] = array('id'=>$md->id,'title'=>$md->title,'date'=>$md->date,
		'source'=>$md->source, 'thumb'=>$md->thumb, 'type'=>$md->type,
		'filename'=>str_replace(PROX_URL.'media_pref/'.$fol.'/','',$md->source),
		'icon'=>$ico
		);
	}
	header("Content-Type: application/json;charset=utf-8");
	echo json_encode($js);
}
/**
* remove media from databse and remove file from disk
* @param Media $media;
* @return bool $ok;
*/
function Remove($media){
		$this->permission->validate('MEDIA', 'WRITE', 10); //required permission
		$ok = false;
		if(!empty($media)){
		$db = Xcon(PERMISSION);
		mysqli_query($db,"delete from media where id='$media->id'");
		if($media->type =='video' || $media->type =='sound'){
			$fol ='video';$ico='fa-file-'.$media->type.'-o';
		}
		if($media->type =='photo'){
			$fol = 'photo';
		}
		if($media->type =='document'){
			$fol = 'file';
		}
		$fn =str_replace(PROX_URL,'',$media->source);
		unlink(PROX_Domain.'/'.$fn);
		$ok = true;
	}
	return $ok;
}

}
?>