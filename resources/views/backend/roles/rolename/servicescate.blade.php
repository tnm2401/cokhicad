<li >
    <i></i>
    <label>
        <input name=permission[] value="svcate_all"  data-id="svcate_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'svcate_all') }}/>
        <span class="label label-warning">Danh mục dịch vụ</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="svcate_add" class="hummingbird-end-node"
                    data-id="svcate_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'svcate_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="svcate_edit" class="hummingbird-end-node"
                    data-id="svcate_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'svcate_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="svcate_del" class="hummingbird-end-node"
                    data-id="svcate_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'svcate_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
