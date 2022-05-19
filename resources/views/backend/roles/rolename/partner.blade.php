<li >
    <i></i>
    <label>
        <input name=permission[] value="partner_all"  data-id="partner_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'partner_all') }}/>
        <span class="label label-warning">Đối tác</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="partner_add" class="hummingbird-end-node"
                    data-id="partner_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'partner_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="partner_edit" class="hummingbird-end-node"
                    data-id="partner_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'partner_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="partner_del" class="hummingbird-end-node"
                    data-id="partner_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'partner_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
