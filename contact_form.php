<h2>Contact Form</h2>
<form action="" method="POST">
    <table>
        <tr>
            <td>Name : </td>
            <td><input name="txtName" value="" maxlength="20"/> </td>
        </tr>
        <tr>
            <td>Email Address : </td>
            <td><input name="txtEmailAddress" value="" maxlength="30"/> </td>
        </tr>
        <tr>
            <td>Message : </td>
            <td><textarea name="txt_message" rows="6" cols="25" maxlength="150"> </textarea></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="btn_send" value="Send"/></td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['btn_send'])) {
    if(!empty($_POST["txtName"]) && !empty($_POST["txtEmailAddress"])) {

        if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST["txtEmailAddress"]))
        {
             echo "Invalid email address.";
             return false;
        }

        $name = (isset($_POST["txtName"])) ? $_POST["txtName"] : '';
        $email = (isset($_POST["txtEmailAddress"])) ? $_POST["txtEmailAddress"] : '';
        $subject = 'Conatct Form - Message';
        $content = $_POST["txt_message"];

        $toEmail = "admin@codetest.com";
        $mailHeaders = "From: " . $name . "<". $email .">\r\n";
        if(mail($toEmail, $subject, $content, $mailHeaders)) {
			$conn = mysqli_connect("localhost", "root", "test", "db123") or die("Connection Error: " . mysqli_error($conn));
			mysqli_query($conn, "INSERT INTO tblcontactform (user_fullname, user_email, mail_subject, content) VALUES ('" . $name. "', '" . $email. "','" . $subject. "','" . $content. "')");
			$insert_id = mysqli_insert_id($conn);
			if(!empty($insert_id)) {
				echo "Thank You! Your contact information send successfully.";;
				return true;
			}
        }

    } else {
        echo "Please fill in all fields.";
    }
}