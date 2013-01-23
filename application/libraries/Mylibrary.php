<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mylibrary {

    public function uploader($tid, $fieldName = 'file'){

        if(isset($_FILES[$fieldName])) {
            $th =& get_instance();

            if(!is_dir($_SERVER['DOCUMENT_ROOT'] . base_url(). 'application/views/templates/' . $tid))
                    mkdir($_SERVER['DOCUMENT_ROOT'] . base_url(). 'application/views/templates/' . $tid);

            $th->load->library('upload');  // NOTE: always load the library outside the loop
            $th->total_count_of_files = count($_FILES[$fieldName]['name']);
            $data = array();
             /*Because here we are adding the "$_FILES['userfile']['name']" which increases the count, and for next loop it raises an exception, And also If we have different types of fileuploads */

                $_FILES['filename']['name']    = $_FILES[$fieldName]['name'];
                $_FILES['filename']['type']    = $_FILES[$fieldName]['type'];
                $_FILES['filename']['tmp_name'] = $_FILES[$fieldName]['tmp_name'];
                $_FILES['filename']['error']       = $_FILES[$fieldName]['error'];
                $_FILES['filename']['size']    = $_FILES[$fieldName]['size'];

                $config['file_name']     = $_FILES['filename']['name'];
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . base_url(). 'application/views/templates/' . $tid;
                $config['allowed_types'] = '*';
                $config['max_size']      = '0';
                $config['overwrite']     = FALSE;

                $th->upload->initialize($config);

                $error = 0;
                if($th->upload->do_upload('filename')){
                    $uploadData = $th->upload->data();
                    $data = array(
                        'filename' => $uploadData['file_name'],
                        'size' => $uploadData['file_size']
                        );
                    
                    $error += 0;
                }else{
                    $error += 1;
                    echo $th->upload->display_errors();
                }

            if($error > 0) { 
                return FALSE; 
            } else { 
                return $data; 
            }
        } else {
            return FALSE;
        }
    }
}