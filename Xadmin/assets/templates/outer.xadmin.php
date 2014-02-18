<h2>[*pagetitle*]</h2>
<div class="demo-info">
    <div class="demo-tip icon-tip"></div>
    <div>Выделите строку в таблице и нажмите кнопку для редактирования.</div>
</div>

<table id="dg" title="[+title+]" class="easyui-datagrid" style="[+style+]"
        url="[+url+]?action=data-json"
        toolbar="#toolbar" 
        pagination="[+pagination+]"
        rownumbers="[+rownumbers+]" 
        fitColumns="[+fitColumns+]" 
        singleSelect="[+singleSelect+]"
        data-options="[+options+]">
    <thead>
        <tr>
            [+inner+]
        </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addRow()">Создать</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editRow()">Редактировать</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeRow()">Удалить</a>
    <div>
        [+searchData+]
        <a href="[~[*id*]~]#" class="easyui-linkbutton" onclick="doSearch()">Искать</a>
        <a href="[~[*id*]~]" class="easyui-linkbutton" onclick="resetSearch()">Сбросить</a>
    </div>
</div>

[+form+]
<script type="text/javascript" src="assets/extensions/Xadmin/assets/js/locale/easyui-lang-ru.js"></script>
<script type="text/javascript">
    var url;
    function addRow(){
        $('#dlg').dialog('open').dialog('setTitle','Добавить');
        $('#fm').form('clear');
        url = '[+url+]?action=save';
    }
    function editRow(){
        var row = $('#dg').datagrid('getSelected');
        // alert(row.id);
        if (row){
            $('#dlg').dialog('open').dialog('setTitle','Редактировать');
            $('#fm').form('load',row);
//            alert(row.active);
            url = '[+url+]?action=update&id='+row.id;
        }
    }
    function saveRow(){
        $('#fm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if (result.success){
                    $('#dlg').dialog('close');      // close the dialog
                    $('#dg').datagrid('reload');    // reload the user data
                } else {
                    $.messager.show({
                        title: 'Ошибка',
                        msg: result.msg
                    });
                }
            }
        });
    }
    function onDblClickRow(index){
        
        if (editIndex != index){
            if (endEditing()){
                $('#dg').datagrid('selectRow', index)
                        .datagrid('beginEdit', index);
                editIndex = index;
            } else {
                $('#dg').datagrid('selectRow', editIndex);
            }
        }

	}
    
	function removeRow(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('Подтвердите','Вы уверены, что хотите удалить строку?',function(r){
                if (r){
                    $.post('[+url+]?action=remove',{id:row.id},function(result){
                        if (result.success){
                            $('#dg').datagrid('reload');    // reload the user data
                        } else {
                            $.messager.show({   // show error message
                                title: 'Ошибка',
                                msg: result.msg
                            });
                        }
                    },'json');
                }
            });
        }
    }

    $('#dg').datagrid({
        onDblClickRow: function(rowIndex,row){
          if (row){
            $('#dlg').dialog('open').dialog('setTitle','Редактирование');
            $('#fm').form('load',row);
            url = '[+url+]?action=update&id='+row.id;
          }
        },
        rowStyler: function(index,row){
            if (row.active != 1){
                return 'background-color:#6293BB;color:#fff;'; // return inline style
                // the function can return predefined css class and inline style
                // return {class:'r1', style:{'color:#fff'}};   
            }
        }
    });

    /* VALIDATION RULES */
    $.extend($.fn.validatebox.defaults.rules, {
        minLength: {
            validator: function(value, param){
                return value.length >= param[0];
            },
            message: 'Please enter at least {0} characters.'
        }
    });

    /* SEARCH */
    function doSearch(){
        $('#dg').datagrid('load',{
            //serch: $('#serch').val()
            [+searchRowJs+]
        });
    }

    function resetSearch(){
        $('#dg').datagrid('reload');
    }

</script>
<style type="text/css">
    #fm{
      margin:0;
      padding:10px 30px;
    }
    .ftitle{
      font-size:14px;
      font-weight:bold;
      padding:5px 0;
      margin-bottom:10px;
      border-bottom:1px solid #ccc;
    }
    .fitem{
      margin-bottom:5px;
    }
    .fitem label{
      display:inline-block;
      width:80px;
    }
</style>