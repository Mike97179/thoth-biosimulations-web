<?php
    function getTeamLanding() {
        $res = query("SELECT * FROM team WHERE active = 1 AND founder = 0 ORDER BY numOrder ASC");
        while ($row = arrayAssoc($res)) {
            $name = $row['name'];
            $role = $row['role'];
            $photo = $row['photo'] ? "img/team/{$row['photo']}" : 'img/team/placeholder.webp';
            $initial = strtoupper(substr($name, 0, 1));

            $member = <<<DELIMITER
                <div class="aboutMembers__container__grid--item">
                    <div class="aboutMembers__container__grid--item-image">
                        <img src="$photo" alt="$name">
                    </div>
                    <h3>$name</h3>
                    <h4>$role</h4>
                </div>
DELIMITER;
            echo $member;
        }
    }

    function getFounderLanding() {
        $res = query("SELECT * FROM team WHERE active = 1 AND founder = 1 LIMIT 1");
        $row = arrayAssoc($res);
        if ($row) {
            $name = $row['name'];
            $role = $row['role'];
            $bio = $row['bio'];
            $linkedin = $row['linkedin'];
            $photo = $row['photo'] ? "img/team/{$row['photo']}" : 'img/team/placeholder.webp';

            echo <<<DELIMITER
                <div class="aboutFounder__container__card">
                    <div class="aboutFounder__container__card--image">
                        <img src="$photo" alt="$name">
                    </div>
                    <div class="aboutFounder__container__card--info">
                        <span class="label label--yellow">Founder</span>
                        <h2>$name</h2>
                        <h3>$role</h3>
                        <p>$bio</p>
                        <a href="$linkedin" target="_blank">LinkedIn Profile →</a>
                    </div>
                </div>
DELIMITER;
        }
    }
?>
