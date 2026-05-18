<?php
    function getCareersLanding() {
        $res = query("SELECT * FROM careers WHERE active = 1 ORDER BY id ASC");
        while ($row = arrayAssoc($res)) {
            $title = $row['title'];
            $department = $row['department'];
            $type = $row['type'];
            $location = $row['location'];

            $career = <<<DELIMITER
                <div class="careers__container__list--item">
                    <div class="careers__container__list--item-info">
                        <h3>$title</h3>
                        <div class="careers__container__list--item-info-tags">
                            <span class="label label--tag">$department</span>
                            <span class="label label--grey">$type</span>
                            <span class="careers__container__list--item-info-location">
                                <i class="fa-regular fa-circle-dot"></i>
                                $location
                            </span>
                        </div>
                    </div>
                    <a href="/contact" class="btn btn--yellow">Apply →</a>
                </div>
DELIMITER;
            echo $career;
        }
    }
?>
