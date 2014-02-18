<<<<<<< HEAD
<h2>Категории каталога</h2>
<div class="demo-info">
    <div class="demo-tip icon-tip"></div>
    <div>Кликните на строке для ее быстрого редактирования.</div>
</div>
<div style="margin:10px 0;"></div>

<table id="dg" class="easyui-datagrid" title="Быстрое редактирование" style="width:800px;height:auto"
        data-options="
            iconCls: 'icon-edit',
            singleSelect: true,
            toolbar: '#tb',
            url: '[+url+]?action=data-json',
            method: 'post',
            onDblClickRow: onDblClickRow
        ">
    <thead>
        <tr>
            [+inner+]
            <!--
            <th data-options="field:'itemid',width:80">Item ID</th>
            <th data-options="field:'productid',width:100,
                    formatter:function(value,row){
                        return row.productname;
                    },
                    editor:{
                        type:'combobox',
                        options:{
                            valueField:'productid',
                            textField:'productname',
                            url:'products.json',
                            required:true
                        }
                    }">Product</th>
            <th data-options="field:'listprice',width:80,align:'right',editor:{type:'numberbox',options:{precision:1}}">List Price</th>
            <th data-options="field:'unitcost',width:80,align:'right',editor:'numberbox'">Unit Cost</th>
            <th data-options="field:'attr1',width:250,editor:'text'">Attribute</th>
            <th data-options="field:'status',width:60,align:'center',editor:{type:'checkbox',options:{on:'P',off:''}}">Status</th>
        -->
        </tr>
    </thead>
</table>

<div id="tb" style="height:auto">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">Добавить</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeit()">Удалить</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="accept()">Применить</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-undo',plain:true" onclick="reject()">Отменить</a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-search',plain:true" onclick="getChanges()">GetChanges</a> -->
</div>

<script type="text/javascript">
    var editIndex = undefined;
    function endEditing(){
        if (editIndex == undefined){return true}
        if ($('#dg').datagrid('validateRow', editIndex)){
            var ed = $('#dg').datagrid('getEditor', {index:editIndex,field:'productid'});
            var productname = $(ed.target).combobox('getText');
            $('#dg').datagrid('getRows')[editIndex]['productname'] = productname;
            $('#dg').datagrid('endEdit', editIndex);
            editIndex = undefined;
            return true;
        } else {
            return false;
        }
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
    function append(){
        if (endEditing()){
            $('#dg').datagrid('appendRow',{status:'P'});
            editIndex = $('#dg').datagrid('getRows').length-1;
            $('#dg').datagrid('selectRow', editIndex)
                    .datagrid('beginEdit', editIndex);
        }
    }
    function removeit(){
        if (editIndex == undefined){return}
        $('#dg').datagrid('cancelEdit', editIndex)
                .datagrid('deleteRow', editIndex);
        editIndex = undefined;
    }
    function accept(){
        if (endEditing()){
            $('#dg').datagrid('acceptChanges');
        }
    }
    function reject(){
        $('#dg').datagrid('rejectChanges');
        editIndex = undefined;
    }
    function getChanges(){
        var rows = $('#dg').datagrid('getChanges');
        alert(rows.length+' rows are changed!');
    }
=======
<h2>Категории каталога</h2>
<div class="demo-info">
    <div class="demo-tip icon-tip"></div>
    <div>Кликните на строке для ее быстрого редактирования.</div>
</div>
<div style="margin:10px 0;"></div>

<table id="dg" class="easyui-datagrid" title="Быстрое редактирование" style="width:800px;height:auto"
        data-options="
            iconCls: 'icon-edit',
            singleSelect: true,
            toolbar: '#tb',
            url: '[+url+]?action=data-json',
            method: 'post',
            onDblClickRow: onDblClickRow
        ">
    <thead>
        <tr>
            [+inner+]
            <!--
            <th data-options="field:'itemid',width:80">Item ID</th>
            <th data-options="field:'productid',width:100,
                    formatter:function(value,row){
                        return row.productname;
                    },
                    editor:{
                        type:'combobox',
                        options:{
                            valueField:'productid',
                            textField:'productname',
                            url:'products.json',
                            required:true
                        }
                    }">Product</th>
            <th data-options="field:'listprice',width:80,align:'right',editor:{type:'numberbox',options:{precision:1}}">List Price</th>
            <th data-options="field:'unitcost',width:80,align:'right',editor:'numberbox'">Unit Cost</th>
            <th data-options="field:'attr1',width:250,editor:'text'">Attribute</th>
            <th data-options="field:'status',width:60,align:'center',editor:{type:'checkbox',options:{on:'P',off:''}}">Status</th>
        -->
        </tr>
    </thead>
</table>

<div id="tb" style="height:auto">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">Добавить</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeit()">Удалить</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="accept()">Применить</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-undo',plain:true" onclick="reject()">Отменить</a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-search',plain:true" onclick="getChanges()">GetChanges</a> -->
</div>

<script type="text/javascript">
    var editIndex = undefined;
    function endEditing(){
        if (editIndex == undefined){return true}
        if ($('#dg').datagrid('validateRow', editIndex)){
            var ed = $('#dg').datagrid('getEditor', {index:editIndex,field:'productid'});
            var productname = $(ed.target).combobox('getText');
            $('#dg').datagrid('getRows')[editIndex]['productname'] = productname;
            $('#dg').datagrid('endEdit', editIndex);
            editIndex = undefined;
            return true;
        } else {
            return false;
        }
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
    function append(){
        if (endEditing()){
            $('#dg').datagrid('appendRow',{status:'P'});
            editIndex = $('#dg').datagrid('getRows').length-1;
            $('#dg').datagrid('selectRow', editIndex)
                    .datagrid('beginEdit', editIndex);
        }
    }
    function removeit(){
        if (editIndex == undefined){return}
        $('#dg').datagrid('cancelEdit', editIndex)
                .datagrid('deleteRow', editIndex);
        editIndex = undefined;
    }
    function accept(){
        if (endEditing()){
            $('#dg').datagrid('acceptChanges');
        }
    }
    function reject(){
        $('#dg').datagrid('rejectChanges');
        editIndex = undefined;
    }
    function getChanges(){
        var rows = $('#dg').datagrid('getChanges');
        alert(rows.length+' rows are changed!');
    }
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
</script>