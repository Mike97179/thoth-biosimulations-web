<?php
    function getPartnersLanding() {
        $res = query("SELECT * FROM partners WHERE active = 1 ORDER BY numOrder ASC");
        while ($row = arrayAssoc($res)) {
            $name = $row['name'];
            $logo = $row['logo'];
            $url = $row['url'];

            $partner = <<<DELIMITER
                <div class="homePartnerships__container--box-item">
                    <a href="$url" target="_blank">
                        <img src="img/home/$logo" alt="$name">
                    </a>
                </div>
DELIMITER;
            echo $partner;
        }
    }
?>
