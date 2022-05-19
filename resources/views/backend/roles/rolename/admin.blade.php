<li >
    <i></i>
    <label>
        <input name=permission[] value="admin_all"  data-id="admin_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'admin_all') }}/>
        <span class="label label-warning">Quản trị viên</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="admin_add" class="hummingbird-end-node"
                    data-id="admin_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'admin_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="admin_edit" class="hummingbird-end-node"
                    data-id="admin_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'admin_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="admin_del" class="hummingbird-end-node"
                    data-id="admin_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'admin_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
