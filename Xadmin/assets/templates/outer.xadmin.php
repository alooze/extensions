<h2>[*pagetitle*]</h2>
<div class="demo-info">
    <div class="demo-tip icon-tip"></div>
    <div>Выделите строку в таблице и нажмите кнопку для редактирования.</div>
</div>

<table id="dg" title="[+title+]" class="peasyui-datagrid" style="[+style+]">
        <purl="[+url+]?action=data-json"
        toolbar="#toolbar" 
        rownumbers="[+rownumbers+]" 
        fitColumns="[+fitColumns+]" 
        singleSelect="[+singleSelect+]"
        data-options="[+options+]"
        pagePosition="both"
        pagination="[+pagination+]"/>
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
        <button type="button" class="btn btn-default" onclick="doSearch()">
            Искать
        </button>
        <button type="button" class="btn btn-default" onclick="resetSearch()">
            Сбросить
        </button>
        <!-- <a href="[~[*id*]~]#" class="easyui-linkbutton" onclick="doSearch()">Искать</a>
        <a href="[~[*id*]~]" class="easyui-linkbutton" onclick="resetSearch()">Сбросить</a> -->
    </div>
</div>

[+fform+]
<div id="dlg" class="easyui-dialog" style="[+style+]"
            buttons="#dlg-buttons"></div>

<script type="text/javascript" src="assets/extensions/Xadmin/assets/js/locale/easyui-lang-ru.js"></script>
<script type="text/javascript">
    var url;
    var rowData;

    $(function() {
        $('#dlg').dialog({
            href: '[+url+]?action=form',
            closed: true,
            closable: true,
            modal: true,
            onLoad: loadForm()
        });

        $('#fm').form({
            onLoadSuccess: function(){ alert('wow'); },
            onLoadError: function(){ alert('foo'); },
            onBeforeLoad: function(){ alert('now'); }
        });

        $('#dg').datagrid({
            url: "[+url+]?action=data-json",
            toolbar: "#toolbar", 
            rownumbers: false,
            fitColumns: true,
            singleSelect: true,
            pageList: [ 10,50,100,500 ],
            method: "post",
            pagePosition: "both",
            pagination: true,
            onDblClickRow: function(rowIndex,row){
              if (row){
                rowData = row;
                $('#dlg').dialog('open')
                    .dialog('refresh','[+url+]?action=form&id='+row.id)
                    .dialog('setTitle','Редактирование');
                // $('body #fm').form('clear');
                // $('body #fm').form('load',row);
                // alert(row.id);
                // alert(row.menuindex);
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
    });

    function loadForm() {
        $('body #fm').form('clear');
        $('body #fm').form('load',rowData);
    }

    function addRow(){
        $('#dlg').dialog('open')
            .dialog('setTitle','Добавить');        
        $('#fm').form('clear');
        // $('#fm').form('');
        url = '[+url+]?action=save';
    }
    function editRow(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            alert(row.id);
            alert(row.menuindex);
            $('#dlg').dialog('open').dialog('setTitle','Редактировать').dialog('refresh','[+url+]?action=form&id='+row.id);
                // .dialog('refresh','[+url+]?action=form&id='+row.id)                
                // .dialog('setTitle','Редактировать');

            $('body #fm').form('load',row);
            // alert(row.id);
            // alert(row.menuindex);
            // $('#fm').form('reset');
            // $('#fm').form('load',row);
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

    

    /* VALIDATION RULES */
    // $.extend($.fn.validatebox.defaults.rules, {
    //     minLength: {
    //         validator: function(value, param){
    //             return value.length >= param[0];
    //         },
    //         message: 'Please enter at least {0} characters.'
    //     }
    // });

    /* SEARCH */
    // function doSearch(){
    //     $('#dg').datagrid('load',{
    //         //serch: $('#serch').val()
    //         [+searchRowJs+]
    //     });
    // }

    // function resetSearch(){
    //     $('#dg').datagrid('reload');
    // }

</script>
<style type="text/css">
    #fm{
      margin:0;
      padding:30px 50px;
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