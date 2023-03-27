<form action="" method="POST">
  <label>Фио:</label>
  <input name="fio" />
  <div></div>
  <div></div>
  <label>email:</label>
  <input class="email" name="email">
  <div></div>
  <div></div>
  <label for="">Выберите год рождения:</label>
  <select name="year">
    <?php
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    }
    ?>
  </select>
  <div></div>
  <label for="">Пол:</label>
  <span><input type="radio" checked="checked" name="sex" value="0" />Мужской</span>
  <span><input type="radio" name="sex" value="1" />Женский</span>
  <p></p>
  <label for="">Конечности:</label>
  <span><input type="radio" checked="checked" name="arms" value="1" />1</span>
  <span><input type="radio" name="arms" value="2" />2</span>
  <span><input type="radio" name="arms" value="3" />3</span>
  <span><input type="radio" name="arms" value="4" />4</span>
  <span><input type="radio" name="arms" value="5" />5</span>
  <p></p>
  <select name="ability[]" multiple="multiply">
    <option select="selected" value="0">нет</option>
    <option value="1">невидимость</option>
    <option value="2">телепортация</option>
    <option value="3">полет</option>
    <option value="4">лингвист</option>
  </select>
  <p></p>
  <div>Биография:</div>
  <textarea name="biografy" id="" cols="30" rows="10"></textarea>
  <p></p>
  <input type="submit" value="ok" />
</form>



<!-- <form action="/"
      method="POST">

    

  

      <p><label>
      Ваш пол:<br />
     <input type="radio" checked="checked"
        name="radio-group-1" value="Значение1" />
        Мужской </label>
      <label><input type="radio"
        name="radio-group-1" value="Значение2" />
        Женский </label><br /></p>

       <p><label>
            Количество конечностей:<br />
           <input type="radio" checked="checked"
              name="radio-group-1" value="Значение1" />
              0 - 4 конечности </label>
            <label><input type="radio"
              name="radio-group-1" value="Значение2" />
              4 - 16 </label><br />
            <label><input type="radio"
              name="radio-group-1" value="Значение3" />
            16 и больше</label><br /></p>
    
    <p><label>
    <br>Ваша сверхспособность:
        <br />
        <select name="field-name-4[]"
          multiple="multiple">
          <option value="Значение1">бессмертие</option>
          <option value="Значение2" selected="selected">прохождение сквозь стены</option>
          <option value="Значение3" selected="selected">левитация</option>
     </select></p>

     <p><label>
       Ваша биография :<br />
        <textarea name="field-name-2">Меня зовут...</textarea>
      </label><br /></p>

    <p><label><input type="checkbox" checked="checked"
        name="check-1" />
        С контрактом ознакомлен(-а)</label><br /></p>
        
     <input type="submit" value="Отправить" />
 </form> -->