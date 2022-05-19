<li >
    <i></i>
    <label>
        <input name=permission[] value="services_all"  data-id="services_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'services_all') }}/>
        <span class="label label-warning">Dịch vụ</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="services_add" class="hummingbird-end-node"
                    data-id="services_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'services_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="services_edit" class="hummingbird-end-node"
                    data-id="services_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'services_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="services_del" class="hummingbird-end-node"
                    data-id="services_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'services_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
