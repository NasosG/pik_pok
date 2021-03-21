<?php
include('db/auth.php'); //include auth.php file on all secure pages
require('db/db.php');

$sender_id = $_GET["sender_id"];
$receiver_id = $_GET["receiver_id"];

$query_show_messages = mysqli_query($con, "SELECT * FROM chat_message WHERE (by_user_id='$sender_id' OR to_user_id='$sender_id') AND (by_user_id='$receiver_id' OR to_user_id='$receiver_id') ");
$num = mysqli_num_rows($query_show_messages);

function fetchRowsByUserId($id, $con): ?array
{
    $query_rows = mysqli_query($con, "SELECT * FROM members WHERE id='$id'");
    return mysqli_fetch_array($query_rows);
}

$sender_row = fetchRowsByUserId($sender_id, $con);
$receiver_row = fetchRowsByUserId($receiver_id, $con);

$output = "";
while ($row_show_messages = mysqli_fetch_array($query_show_messages)) {
    if ($row_show_messages['by_user_id'] == $sender_id) {
        $output .= '<div class="main-message-box st3">'
            . '    <div class="message-dt st3">'
            . '        <div class="message-inner-dt">'
            . '            <p>' . $row_show_messages['message'] . '</p>'
            . '        </div>'
            . '        <span>' . date("F j, Y, g:i a", strtotime($row_show_messages['time_sent'])) . '</span>'
            . '    </div>'
            . '    <div class="messg-usr-img">'
            . '      <img src="' . $sender_row['picture_path'] . $sender_row['profile_pic'] . '" alt="users photo"/>'
            . '    </div>'
            . '</div> ';
    }
    else {
        $output .= '<div class="main-message-box ta-right">'
            . '    <div class="message-dt">'
            . '        <div class="message-inner-dt message-inner-dt2">'
            . '            <p>' . $row_show_messages['message'] . '</p>'
            . '        </div>'
            . '        <span>' . date("F j, Y, g:i a", strtotime($row_show_messages['time_sent'])) . '</span>'
            . '    </div>'
            . '    <div class="messg-usr-img">'
            . '      <img src="' . $receiver_row['picture_path'] . $receiver_row['profile_pic'] . '" alt="users photo"/>'
            . '    </div>'
            . '</div>';
    }
}

$success_text = 'Request Sent';
// return all our data to an AJAX call
$data['success'] = true;
$data['message'] = $success_text;
echo $output;
?>