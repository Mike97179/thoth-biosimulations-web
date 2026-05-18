<?php
    function getTickets() {
        $res = query("SELECT * FROM tickets ORDER BY created_at DESC");
        while ($row = arrayAssoc($res)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $organization = $row['organization'];
            $area = $row['area'];
            $message = $row['message'];
            $status = $row['status'];
            $date = date('M d', strtotime($row['created_at']));
            $labelClass = "label--$status";

            $ticket = <<<DELIMITER
                <div class="adminList__item adminList__item--clickable"
                    data-id="$id"
                    data-name="$name"
                    data-email="$email"
                    data-organization="$organization"
                    data-area="$area"
                    data-message="$message"
                    data-status="$status"
                    data-date="$date">
                    <div class="adminList__item--info">
                        <div class="adminList__item--info-title">
                            <i class="fa-regular fa-message"></i>
                            <h3>$name</h3>
                            <span class="label $labelClass">$status</span>
                        </div>
                        <p class="adminList__item--info-email">$email</p>
                        <p>$message</p>
                    </div>
                    <span class="adminList__item--date">$date</span>
                </div>
DELIMITER;
            echo $ticket;
        }
    }

    function postUpdateTicketStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = escape(trim($_POST['id']));
            $status = escape(trim($_POST['status']));
            query("UPDATE tickets SET status = '$status' WHERE id = $id");
            redirect('/admin/tickets');
        }
    }

    function getDeleteTicket() {
        if (isset($_GET['id'])) {
            $id = escape($_GET['id']);
            query("DELETE FROM tickets WHERE id = $id");
            setSwal('Success', 'Ticket deleted successfully.', 'success');
            redirect('/admin/tickets');
        }
    }

    function getNewTicketsCount() {
        $res = query("SELECT COUNT(*) as total FROM tickets WHERE status = 'new'");
        $row = arrayAssoc($res);
        return $row['total'];
    }
?>
