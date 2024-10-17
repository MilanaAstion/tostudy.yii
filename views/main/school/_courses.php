<div class="tab tab2" id="js-tab2">
    <ul>
        <? foreach($school->courses as $course): ?>
            <li class="item">
                <a href="#" class="question js-question" data-answer-id="#question-<?= $course->col_id ?>">
                    <?= $course->col_title_ru ?>			
                    <span class="icon">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1px" fill="none" fill-rule="evenodd" stroke-linecap="square"><g transform="translate(1.000000, 1.000000)" stroke="#222222"> <path d="M0,11 L22,11"></path> <path d="M11,0 L11,22"></path></g></g></svg>
                    </span>
                </a>
                <div class="answer js-answer" id="question-<?= $course->col_id ?>"><?= $course->col_description_ru ?></div>
            </li>
        <? endforeach; ?>
    </ul>
</div>