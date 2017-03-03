<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
//		$this->load->view('welcome_message');
//        $url = 'http://www.getfavicon.org/get.pl?url=blog.gdvodka.cn&submitget=get+favicon';
        $url = 'http://favicon.byi.pw/?url=blog.gdvodka.cn';
        $saveto = FCPATH.'images/dir/gdvodkaa.png';
        $this->grab_image($url, $saveto);
    }

    function grab_image($url,$saveto){
        $t1 = microtime(true);
        $this->load->helper('file');
        $ch = curl_init ($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        $raw=curl_exec($ch);
        curl_close ($ch);
        $t2 = microtime(true);
        if(file_exists($saveto)){
            unlink($saveto);    //删除该文件
        }
        if (!is_dir(FCPATH.'images/dir')) {
            mkdir(FCPATH.'images/dir', 0777, TRUE);
        }
//        echo "<pre>";
//        print_r(write_file($saveto, $raw));
//        echo "</pre>";die;
        if (write_file($saveto, $raw) == FALSE)
        {
            echo 'Unable to write the file';

        } else
        {
            echo 'File written!';
        }
        $t3 = microtime(true);
        echo '耗时'.round($t2-$t1,3).'秒';
        echo '耗时'.round($t3-$t1,3).'秒';
    }
}