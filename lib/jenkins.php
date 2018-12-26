<?php

class jenkins{
    protected $user='j_username=lifei';
    protected $pwd='j_password=Bffmlov0LGcm3GjYkkb7';
    protected $from='from=/';
    protected $Submit='Submit=登录';
    protected $json='{"j_username":+"lifei",+"j_password":+"Bffmlov0LGcm3GjYkkb7",+"remember_me":+false,+"from":+"/"}';
   
      
    public function get_url($url,$cook=null,$str=null,$type=null){
        $ch=curl_init();
        $av=array('Content-Type:application/x-www-form-urlencoded; charset=UTF-8');
        if($type) {  
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$str);
            curl_setopt($ch, CURLOPT_COOKIE, $cook);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $av);
            $output=curl_exec($ch);
        }
        else {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_COOKIE, $cook);
            $output=curl_exec($ch);
        }
        if(!$output){
            echo curl_error($ch);         
        }
        curl_close($ch);
        return $output;
    }
    
    public function login_jen(){
        $url='http://223.223.184.83:8065/j_acegi_security_check';
        $str=$this->user.'&'.$this->pwd.'&'.$this->from.'&'.$this->Submit.'&Json='.$this->json;
        $res=$this->get_url($url,0,$str,1);
        $cookie=$this->get_cookies($res);
        return $cookie?$cookie:false;
    }
    
    public function info_lottery($web_project){
        $url='http://223.223.184.83:8065/job/'.$web_project.'/build';
        $str='delay=0sec';
        $cook=$this->login_jen();
        if($cook){
            $res=$this->get_url($url, $cook,$str,1);
            if($this->check_suc($res)){
                return true;
            }
            return false;
        }
        else return false;
    }
    
    public function check_suc($str){
        if($str){
            $arr=explode("\n",$str);
            foreach ($arr as $v){
                if(strstr($v, 'Created',true)){
                        $res=strpos($v, '201');
                        if($res) {
                            sync_log($str);
                            return $res;
                        };
                }
            }
        }
        return false;
    }
    
    public function get_cookies($res){
        if($res){
            $arr=explode("\n",$res);
            foreach ($arr as $v){
                if(strstr($v,'Set-Cookie')){
                    $str=strstr(strstr($v,'JSESSIONID'), ';',true);
                    return $str;
                }
            }
            return false;
        }
        else return false;
    }
    
    public function cat_sig($web_project){
        $url='http://223.223.184.83:8065/job/'.$web_project;
        $cook=$this->login_jen();
        if($cook){
            $res=$this->get_url($url, $cook,0,0);
            if($this->check_suc($res)){
                return true;
            }
            return false;
        }
        else return false;
    }
    
    
}
