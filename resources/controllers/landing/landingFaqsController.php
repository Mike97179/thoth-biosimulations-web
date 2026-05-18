<?php
    function getFaqsLanding() {
        $res = query("SELECT * FROM faqs WHERE active = 1 ORDER BY numOrder ASC");
        while ($row = arrayAssoc($res)) {
            $question = $row['question'];
            $answer = $row['answer'];

            $faq = <<<DELIMITER
                <div class="homeFAQ__container__box--item">
                    <div class="homeFAQ__container__box--item-q">
                        $question
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </div>
                    <div class="homeFAQ__container__box--item-a">
                        $answer
                    </div>
                </div>
DELIMITER;
            echo $faq;
        }
    }
?>
