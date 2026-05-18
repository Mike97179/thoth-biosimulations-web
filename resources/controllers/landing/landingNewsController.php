<?php
    function getNewsLanding() {
        $res = query("SELECT * FROM news WHERE published = 1 ORDER BY created_at DESC");
        while ($row = arrayAssoc($res)) {
            $id = $row['id'];
            $title = $row['title'];
            $summary = $row['summary'];
            $category = $row['category'];
            $date = date('M d, Y', strtotime($row['created_at']));
            $categoryClass = strtolower($category);

            $news = <<<DELIMITER
                <div class="news__container__grid--item">
                    <div class="news__container__grid--item-top">
                        <span class="news__container__grid--item-top-category label label--$categoryClass">$category</span>
                        <span class="news__container__grid--item-top-date">
                            <i class="fa-regular fa-calendar"></i>
                            $date
                        </span>
                    </div>
                    <h3>$title</h3>
                    <p>$summary</p>
                </div>
DELIMITER;
            echo $news;
        }
    }
?>
