<?php
require_once("admin.php");
require_once("dbClass.php");

class adminDBclass
{

  public function getAdmins() //Function puts all individual admin objects from table in database into an array.
  {
    $db = new dbClass;
    $db->connect();
    $adminsArray = array();
    $result = $db->connection->query("SELECT * FROM tbl_admin");
    while ($row = $result->fetchObject('Admin')) { //While there's still data to be retreived, we extract it to an array.
      $adminsArray[] = $row;
    }
    $db->disconnect();
    return $adminsArray;
  }

  public function addadmin($fullname, $username, $password)
  { //Function is used to add an admin into the admin table in the database.
    $db = new dbClass;
    $db->connect();
    //Insert information into a new row in tbl_admin
    $result = $db->connection->query("INSERT INTO tbl_admin SET
      fullname='$fullname',
      username='$username',
      password='$password'
      ");

    $db->disconnect();
    return $result;
  }

  public function deleteAdmin($id)
  { //Finds a unique admin ID that is passed as a parameter, and deletes that specific admin.
    $db = new dbClass;
    $db->connect();
    $result = $db->connection->query("DELETE FROM tbl_admin WHERE id=$id");

    $db->disconnect();
    return $result;
  }

  public function updatePass($id, $current_password, $new_password, $confirm_password)
  { //Update admin password according to parameters provided.
    $db = new dbClass;
    $db->connect();
    $res = $db->connection->query("SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'");

    if ($res == true) {
      $count = $res->rowCount();
      if ($count == 1) {
        //user exists and password can be changed
        if ($new_password == $confirm_password) {
          $res2 = $db->connection->query("UPDATE tbl_admin SET 
              password='$new_password'
              where id=$id
              ");

          if ($res2 == true) { //Check different cases of sucess/failure according to user's input 
            $res = "<div class='success'>Password changed successfully. </div>";
            $db->disconnect();
            return $res;
          } //Redirect to same page and send message

          else {
            $res = "<div class='error'>Failed to change password. </div>";
            $db->disconnect();
            return $res;
          }
          //Redirect to same page and send message
        } else { //Redirect to same page and send message
          $res = "<div class='error'>Password did not match. </div>";
          $db->disconnect();
          return $res;
        }
      } else {
        //user does not exist
        $res = "<div class='error'>User not found. </div>";
        $db->disconnect();
        return $res;
      }
    }

    $db->disconnect();
    return $res;
  }
}
