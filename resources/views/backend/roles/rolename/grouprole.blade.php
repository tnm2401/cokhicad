<li >
    <i></i>
    <label>
        <input name=permission[] value="grouprole_all"  data-id="grouprole_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'grouprole_all') }}/>
        <span class="label label-warning">Nhóm và phân quyền</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="grouprole_add" class="hummingbird-end-node"
                    data-id="grouprole_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'grouprole_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="grouprole_edit" class="hummingbird-end-node"
                    data-id="grouprole_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'grouprole_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="grouprole_del" class="hummingbird-end-node"
                    data-id="grouprole_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'grouprole_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
