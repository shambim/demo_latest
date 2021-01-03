<?php
class User extends Database{

    public function getUsers(){
        $sql="select * from tbl_users";
        try{
            $all_users=$this->connect()->query($sql)->fetchAll();
            if(isset($all_users) && count($all_users)>0) $res=array('status'=>'success','data'=>$all_users);
            else $res=array('status'=>'fail','data'=>[],'msg'=>'Record not found');
            return $res;

        }catch(PDOExcepion $e){
            die('Error:-'.$e->getMeassage());
        }
        
        
    }

    public function getUserById($id){
        $sql="select * from tbl_users where id=:id";
        try{
            $user_info=$this->connect()->query($sql)->fetchAll();
            if(isset($user_info) && count($user_info)>0) $res=array('status'=>'success','data'=>$user_info);
            else $res=array('status'=>'fail','data'=>[],'msg'=>'Record not found');
            return $res;

        }catch(PDOExcepion $e){
            die('Error:-'.$e->getMassage());
        }
        
        return $all_users;
        
    }

    public function setUser($name,$email,$password,$profile){
        $sql="INSERT INTO tbl_users (`name`,`password`,`email`,`profile`) values(:name,:password,:email,:profile)";
        try{
            $data=[
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'profile'=>$profile,
                
            ];
            $ins=$this->connect()->prepare($sql)->execute($data);
            if($ins) $res=array('status'=>'success','msg'=>'Record Inserted successfully');
            else $res=array('status'=>'fail','msg'=>'Record not inserted');
            return $res;

        }catch(PDOExcepion $e){
            die('Error:-'.$e->getMessage());
        }
        
        return $all_users;
        
    }

    public function deleteUser($id){

        $user_info=$this->getUserById($id);
        if(isset($user_info) && count($user_info)>0){
            $sql="DELETE FROM tbl_users where id=:id";
            try{
                $data=[
                    'id'=>$id,
                ];
                $del=$this->connect()->prepare($sql)->execute($data);
                if($del) $res=array('status'=>'success','data'=>$user_info,'msg'=>'Record deleted successfully');
                else $res=array('status'=>'fail','msg'=>'Record not deleted');
                return $res;
            }catch(PDOExcepion $e){
                die('Error:-'.$e->getMessage());
            }
        }
   }
}