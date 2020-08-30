<?php
      function inputElement($icon, $placeholder, $name, $value){
            $ele = '
                  <div class="input-group mb-2">
                        <div class="input-group-prepend">
                              <div class="input-group-text bg-info">'.$icon.'</div>
                        </div>
                        <input type="text" class="form-control" name='.$name.' autocomplete="off" placeholder='.$placeholder.' autofocus value='.$value.'> 
                  </div>';
      echo $ele;
      }
      

      function buttonElement($btn_id, $styleclass, $text, $name, $attr){
            $btn = '
                  <button name="'.$name.'" class="'.$styleclass.'" id="'.$btn_id.'" '.$attr.'">'.$text.'</button>
            ';
            echo $btn;
      }


      
?>