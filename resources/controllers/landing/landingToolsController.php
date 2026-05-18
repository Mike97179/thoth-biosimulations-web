<?php
    function getToolsLanding() {
        $res = query("SELECT * FROM tools WHERE active = 1 ORDER BY numOrder ASC");
        while ($row = arrayAssoc($res)) {
            $name = $row['name'];
            $description = $row['description'];
            $icon = $row['icon'];
            $category = $row['category'];

            $tool = <<<DELIMITER
                <div class="tools__container__grid--item">
                    <div class="tools__container__grid--item-icon">
                        <i class="fa-solid fa-$icon"></i>
                    </div>
                    <span>$category</span>
                    <h3>$name</h3>
                    <p>$description</p>
                </div>
DELIMITER;
            echo $tool;
        }
    }
?>
