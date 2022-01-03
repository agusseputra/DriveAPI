<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '../vendor/autoload.php'; 
class M_drive extends CI_Model
{
    private $client;
    function __construct()
    {
        parent::__construct();
        $this->client=$this->getClient();
    }
    function getClient(){
        $client = new Google_Client();
        $client->setApplicationName('Google Drive API PHP Quickstart');
        $client->setRedirectUri('http://localhost/aps/oauth2callback');
        $client->setScopes(Google_Service_Drive::DRIVE);
        $client->setAuthConfig(APPPATH . '../credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = APPPATH .'../token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }
        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));
                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);
                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
        }
        function get_files_and_folders2($id='root'){
            $service = new Google_Service_Drive($this->client);
        
             $parameters['q'] = " '$id' in parents and trashed=false ";
             $files1 = $service->files->listFiles($parameters);
            $files = $service->files->listFiles([
                'fields' => 'nextPageToken, files(thumbnailLink, webViewLink,mimeType,id,iconLink,kind,fileExtension)',
                'q'=>" '$id' in parents and trashed=false "
            ]);
            pre( $files);
            echo "<ul>";
            foreach( $files1 as $k => $file ){ 
                //pre($file);
                echo "<li> 
                
                    {$file['name']} - {$file['id']} ---- ".$file['mimeType'];
        
                    // try {
                    //     // subfiles
                    //     $sub_files = $service->files->listFiles(array('q' => "'{$file['id']}' in parents"));
                    //     echo "<ul>";
                    //     foreach( $sub_files as $kk => $sub_file ) {
                    //         echo "<li&gt {$sub_file['name']} - {$sub_file['id']}  ---- ". $sub_file['mimeType'] ." </li>";
                    //     }
                    //     echo "</ul>";
                    // } catch (\Throwable $th) {
                    //     // pre($th);
                    // }
                
                echo "</li>";
            }
            echo "</ul>";
            foreach($files as $k =>$val){?>
                <div class="col-md-4 col-lg-2">
							<div class="flip-entry" id="entry-<?=$val['id']?>" tabindex="0" role="link"><div class="flip-entry-info">
								<a href="https://drive.google.com/file/d/<?=$val['id']?>/view?usp=drive_web" target="_blank">
								<div class="flip-entry-visual"><div class="flip-entry-visual-card">
									<div class="flip-entry-thumb">
										<img src="<?=$val['thumbnailLink']?>" alt="PNG Image">
									</div></div></div><div class="flip-entry-list-icon">
								</div><div class="flip-entry-title"><?= $val['name']; ?></div></a>
							</div>
							<div class="flip-entry-last-modified"><div>00.32</div>
							<div class="flip-entry-last-writer">D3 INFORMATIKA Undiksha</div></div>
							</div>
							</div>	
            <?php } 
        }
        function get_files_and_folders($id='root'){
            $service = new Google_Service_Drive($this->client);        
            $files = $service->files->listFiles([
                'fields' => 'nextPageToken, files(thumbnailLink, webViewLink,mimeType,id,iconLink,kind,fileExtension,name,originalFilename,modifiedTime,webContentLink)',
                'q'=>" '$id' in parents and trashed=false ",
                'orderBy'=>'name asc'
            ]);
            //pre($files);
            return $files;
        }
        function get_detail($id='root'){
            $service = new Google_Service_Drive($this->client);        
            $files = $service->files->get($id);
            //pre($files);
            return $files;
        }
        function upload(){
            if( isset( $_POST['submit'] ) ){
        
                if( empty( $_FILES["file"]['tmp_name'] ) ){
                    echo "Go back and Select file to upload.";
                    exit;
                }
                
                $file_tmp  = $_FILES["file"]["tmp_name"];
                $file_type = $_FILES["file"]["type"];
                $file_name = basename($_FILES["file"]["name"]);
                $path =APPPATH . "uploads/".$file_name;    
                $folder_id = $this->create_folder( "google-drive-test-folder" );
                //move_uploaded_file($file_tmp, $path);
                $success = $this->insert_file_to_drive( $_FILES["file"]["tmp_name"] , $file_name, $folder_id);
                //$success =insertFile($_FILES["file"]["tmp_name"], $file_name,  $folder_id, 'application/pdf') ;
                if( $success ){
                    echo "file uploaded successfully";
                } else { 
                    echo "Something went wrong.";
                }
            }
        }
        function insert_file_to_drive( $file_path, $file_name, $parent_file_id = null ){
            $service = new Google_Service_Drive($this->client);
            $file = new Google_Service_Drive_DriveFile();
        
            $file->setName( $file_name );
        
            if( !empty( $parent_file_id ) ){
                $file->setParents( [ $parent_file_id ] );        
            }
        
            $result = $service->files->create(
                $file,
                array(
                    'data' => file_get_contents($file_path),
                    'mimeType' => 'application/octet-stream',
                )
            );
        
            $is_success = false;
            
            if( isset( $result['name'] ) && !empty( $result['name'] ) ){
                $is_success = true;
            }
        
            return $is_success;
        }
        function create_folder( $folder_name, $parent_folder_id=null ){
    
            $folder_list = $this->check_folder_exists( $folder_name );
        
            // if folder does not exists
            if( count( $folder_list ) == 0 ){
                $service = new Google_Service_Drive($this->client);
                $folder = new Google_Service_Drive_DriveFile();
            
                $folder->setName( $folder_name );
                $folder->setMimeType('application/vnd.google-apps.folder');
                if( !empty( $parent_folder_id ) ){
                    $folder->setParents( [ $parent_folder_id ] );        
                }
        
                $result = $service->files->create( $folder );
            
                $folder_id = null;
                
                if( isset( $result['id'] ) && !empty( $result['id'] ) ){
                    $folder_id = $result['id'];
                }
            
                return $folder_id;
            }
        
            return $folder_list[0]['id'];
            
        }
        function check_folder_exists( $folder_name ){
        
            $service = new Google_Service_Drive($this->client);
        
            $parameters['q'] = "mimeType='application/vnd.google-apps.folder' and name='$folder_name' and trashed=false";
            $files = $service->files->listFiles($parameters);
        
            $op = [];
            foreach( $files as $k => $file ){
                $op[] = $file;
            }
        
            return $op;
        }
        function deleteFile($fileId) {
            $return['success']=1;
            $service = new Google_Service_Drive($this->client);
            try {
                $service->files->delete($fileId);              
            } catch (Exception $e) {     
                $return['success']=0;
                $return['message']=$e->getMessage();
            }
            return $return;
        }
        function renameFile($fileId, $newTitle) {
            $service = new Google_Service_Drive($this->client);
            try {
            $file = new Google_Service_Drive_DriveFile();
            $file->setName($newTitle);
        
            $updatedFile = $service->files->update($fileId, $file);
        
            return $updatedFile;
            } catch (Exception $e) {
            print "An error occurred: " . $e->getMessage();
            }
        }
        
}
?>