<?php

function inputElement($icon, $placeholder, $name, $value, $id){
    $element = "
    <div class='input-group mb-2'>
        <span class='input-group-text bg-secondary text-light' id='basic-addon1'><i class='$icon'></i></span>
        <input type='text' autocomplete='off' name='$name' id='$id' value='$value' class='form-control' placeholder='$placeholder'>
    </div>
    ";

    echo $element;
}

function buttonElement($btnid, $styleclass, $text, $icon, $name, $attr) {
    $btn = "
    <button id='$btnid' '$attr' class='$styleclass' name='$name'>$text<i class='$icon'></i></button> 
    ";

    echo $btn;
}

?>