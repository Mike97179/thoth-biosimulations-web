<?php
    function getDashboardStats() {
        $news = arrayAssoc(query("SELECT COUNT(*) as total FROM news"));
        $tools = arrayAssoc(query("SELECT COUNT(*) as total FROM tools"));
        $team = arrayAssoc(query("SELECT COUNT(*) as total FROM team"));
        $tickets = arrayAssoc(query("SELECT COUNT(*) as total FROM tickets"));
        $newTickets = arrayAssoc(query("SELECT COUNT(*) as total FROM tickets WHERE status = 'new'"));
        $careers = arrayAssoc(query("SELECT COUNT(*) as total FROM careers WHERE active = 1"));

        return [
            'news'       => $news['total'],
            'tools'      => $tools['total'],
            'team'       => $team['total'],
            'tickets'    => $tickets['total'],
            'newTickets' => $newTickets['total'],
            'careers'    => $careers['total']
        ];
    }

    function getRecentTickets() {
        $res = query("SELECT * FROM tickets ORDER BY created_at DESC LIMIT 3");
        while ($row = arrayAssoc($res)) {
            $name = $row['name'];
            $organization = $row['organization'] ?? 'No organization';
            $message = $row['message'];
            $status = $row['status'];
            $dotClass = $status === 'new' ? 'adminMain__recent__list--item-dot--new' : '';

            $ticket = <<<DELIMITER
                <div class="adminMain__recent__list--item">
                    <div class="adminMain__recent__list--item-dot $dotClass"></div>
                    <div class="adminMain__recent__list--item-info">
                        <p class="adminMain__recent__list--item-info-name">
                            $name
                            <span>· $organization</span>
                        </p>
                        <p class="adminMain__recent__list--item-info-message">$message</p>
                    </div>
                </div>
DELIMITER;
            echo $ticket;
        }
    }
?>
