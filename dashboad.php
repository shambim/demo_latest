<?php
include('includes/autoload.inc.php');




$user=new User();
$all_users=$user->getUsers();
$all_users=$all_users['data'];


if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $user_info=$user->getUserById($id);
    $name=(isset($user_info['name'])&& $user_info['name']!='')?$user_info['name']:'';
    $email=(isset($user_info['name'])&& $user_info['name']!='')?$user_info['name']:'';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboad</title>
</head>
<body>
    <div id="wrapper">
        <form name="frm_add_users" action="includes/user.inc.php" method="post" enctype="multipart/form-data"> 
        <table>
            <input type="text" name="name" value="" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="file" name="profile" placeholder="Profile">
            <input type="submit" name="register_user" vale="Register">
            
        </table>
        </form>
    </div>
    

    <div id="wrapper">
        <table>
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
            </thead>
            <tbody>
            <?php
            
            if(isset($all_users) && count($all_users)>0){
                foreach($all_users as $user_info){ 
            ?>
                <tr>
                    <td><?php echo $user_info['name'];?></td>
                    <td><?php echo $user_info['email'];?></td>
                    <td><?php
                    if(file_exists(BASE_PATH.'assets/uploads/'.$user_info['profile'])) {
                    ?>
                        <img src="<?php echo BASE_URL.'assets/uploads/'.$user_info['profile'];?>" width="100"/>
                    <?php    
                    }
                    
                    ?></td>
                </tr>
            <?php
                }
            }
            ?>    
                            </tbody>
        </table>
    </div>
</body>
</html>



