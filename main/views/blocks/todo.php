<p style=" background-color: #f3f3f3; font-size:16px; padding-top:5px; padding-bottom: 5px; border-bottom: 1px solid #f3f3f3;" id='<?=$todo["id"]?>'>
	<input style="float:left; width: 20px; height:20px; margin: 6px 20px 0px 16px;" type="checkbox" value="None" id="todo-check" <?if ($todo["done"]==1) echo "checked"?>/>
	<span <?if ($todo["done"]==1) echo "class='line-through'"?> style="display:inline-block;    margin: 5px 0px 5px 0px; "><?=$todo["titolo"];?></span>
	<a style="float: right; margin: 7px 15px 0px 0px; " id='remove-todo' href="javascript:;" class="todo-remove"><i style="font-size: 20px;" class="fa fa-times fa-2x"></i></a>
</p>

