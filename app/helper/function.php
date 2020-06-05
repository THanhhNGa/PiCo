<?php
function showError($errors,$nameInput)
{
    if($errors->has($nameInput))
    {
    echo '<div class="alert alert-danger" role="alert">';
    echo '<strong>'.$errors->first($nameInput).'</strong>';
    echo '</div>';
    }
}
function GetCategory($mang,$parent,$tab,$idSelect)
{
    foreach ($mang as $value) {
        if($value['parent']==$parent)
        {
            if($value['id']==$idSelect){
                echo '<option selected value="'.$value['id'].'">'.$tab.$value['name'].'</option>';
            }
            else{
                echo '<option value="'.$value['id'].'">'.$tab.$value['name'].'</option>';
            }
           GetCategory($mang,$value['id'],$tab.'----|',$idSelect);
        }
    }
}


function ShowCategory($mang,$parent,$tab)
{
    foreach ($mang as $value) {
        if($value['parent']==$parent)
        {
           echo '
           <div class="item-menu"><span>'.$tab.$value['name'].'</span>
                <div class="category-fix">
                    <a class="btn-category btn-primary" href="/admin/category/edit/'.$value['id'].'"><i class="fa fa-edit"></i></a>
                    <a class="btn-category btn-danger" href="/admin/category/del/'.$value['id'].'"><i class="fa fa-trash-o"></i></i></a>
                </div>
            </div>
           ';
           ShowCategory($mang,$value['id'],$tab.'----|');
        }
    }
}
function attr_values($mang){
    $result =array();
    foreach($mang as $value){
        $attr= $value->attribute->name;
        $result[$attr][] =$value->value;
    }
    return $result;
}

function get_combinations($arrays) {
    $result = array(array());
    foreach ($arrays as $property => $property_values) {
        $tmp = array();
        foreach ($result as $result_item) {
            foreach ($property_values as $property_value) {
                $tmp[] = array_merge($result_item, array($property => $property_value));
            }
        }
        $result = $tmp;
    }
    return $result;
}
function check_value($product, $value_check){
    foreach($product->values as $value){
        if($value->id ==$value_check){
            return true;
        }
    }
    return false;
}

//kiểm tra biến thể
function check_var($product,$array)
{
    foreach($product->variant as $row)
    {
        $mang=array();
        foreach ($row->values as $value) {
            $mang[]=$value->id;
        }
        if(array_diff($mang,$array)==NULL)
        {
            return false;
        }
    }
    return true;
}
