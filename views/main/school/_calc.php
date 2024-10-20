<div class="calc" id="js-calc">
    <h2>Калькулятор</h2>
    <label class="input__label">
        <span>Тип курса</span>
        <span class="price" id="js-course-price"></span>
    </label>
    
    <div class="input__field input__select js-open-form-select"
            data-value="0"
            data-school="<?=$school->col_id?>"
            id="js-course" data-id="#js-form-course">
        <span class="js-selected"></span>
        <?= $this->render('@app/views/svg/arrow.php')?>
        <!-- class="form-select js-form-select" -->
        <select id="js-form-course" name="course_id" data-school="<?=$school->col_id?>">
            <option value="">Не выбрано</option>
            <!-- class="js-course-option" -->
            <?foreach($school->courses as $item):?>
                <?php if (!isset($course) || !is_object($course)): ?>
                    <option value="<?=$item->col_id?>"><?=$item->col_title_ru?></option>
                <?php else: ?>
                    <?php if ($course->col_id == $item->col_id): ?>
                        <option selected value="<?=$item->col_id?>"><?=$item->col_title_ru?></option>
                    <?php else: ?> 
                        <option value="<?=$item->col_id?>"><?=$item->col_title_ru?></option>
                    <?php endif; ?>  
                <?php endif; ?>
            <?endforeach;?>
        </select> <!-- /.form-select -->
    </div> <!-- /.input__field -->
    
    <label class="input__label">
        <span>Количество недель</span>
    </label>
    
    <div class="input__field input__select js-open-form-select" data-weeks="0" id="js-weeks" data-id="#js-form-weeks">
        <span class="js-selected">Выберите количество недель</span>
        <?//= $this->render('@app/views/svg/arrow.php')?>
        <!-- class="form-select js-form-select" -->
        <select id="js-form-weeks">
            <option value="">Не выбрано</option>
            <? if($course): ?>
                <? foreach($course->weeks as $week):?>
                    <!-- class="js-weeks-option filtered"  -->
                    <option   
                        data-course="<?= $course->col_id ?>" 
                        data-weeks="<?= $week["num"] ?>" 
                        data-price="<?= $week["price"] ?>">
                        <?= $week["num"] ?>
                    </option>
                <? endforeach;?>
            <? endif; ?>
        </select> <!-- /.form-select -->
    </div> <!-- /.input__field -->
    
    <label class="input__label">
        <span>Тип проживания</span>
        <span class="price" id="js-accommodation-price"></span>
    </label>

    <div class="input__field input__select js-open-form-select" data-value="0" data-price="0" id="js-accommodation" data-id="#js-form-accommodation">
        <span class="js-selected">Выберите тип проживани</span>
        <?= $this->render('@app/views/svg/arrow.php')?>
        <select id="js-form-course" name="accommodation_id" data-school="<?=$school->col_id?>">
            <option value="">Не выбрано</option>
            
            <!-- class="js-course-option" -->
            <?foreach($school->accommodation as $item):?>
                <option value="<?=$item->col_id?>"><?=$item->col_title_ru?></option>   
            <?endforeach;?>
        </select>
        <!-- /.form-select -->
    </div> <!-- /.input__field -->
    
    <div class="registration-fee row">
        <span>Регистрационный сбор школы:</span>
        <span class="price" id="js-registration-fee" data-price="<?=$row['col_registration_fee']?>"><?=$row['col_registration_fee'] .' '. $arr_currency[$row['col_currency']]?></span>
    </div>
    
<!-- 			<div class="discount row">
        <span><?//=$ini_file['calc']['discount']?>:</span>
        <span class="price" id="js-discount"></span>
    </div> -->
    
    <div class="to-pay">
        <span>Итого:</span>
        <span id="js-to-pay" data-currency="<?=$arr_currency[$row['col_currency']]?>"></span>
    </div>

    <div class="action">
        <a href="#" class="btn btn2 js-open-modal" data-modal-id="#js-modal-order"><?=$ini_file['calc']['btn']?></a>
    </div>

</div> <!-- /.calc -->

<script>
    let course_select = document.querySelector("#js-form-course");
    course_select.onchange = function(){
        let course_id = course_select.value;

        $.ajax({ 
            url: "/main/weeks-course?course_id=" + course_id, 
            type: "GET", 
            dataType: "json", 
            success: function(weeks){ 
                let str = "<option>Не выбрано</option>";
                for(let i = 0; i < weeks.length; i++){
                    str += `<option price="${weeks[i].price}">${weeks[i].num}</option>`;
                }
                document.querySelector("#js-form-weeks").innerHTML = str;
            }, 
            error: function(xhr, status, error){ 
                console.error(xhr.responseText); 
            } 
        });

        //let school_id = course_select.dataset.school;
        // let school_id = course_select.getAttribute("data-school");
        // return console.log(school_id);
        //if(course_id){
            //location.href = "/school/" + school_id + "/" + course_id;
        //}
        //else{
            //location.href = "/school/" + school_id;
        //}
    }
    // console.log(course_select);
</script>