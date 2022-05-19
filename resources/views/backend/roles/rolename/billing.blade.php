<li >
    <i></i>
    <label>
        <input name=permission[] value="billing_all"  data-id="billing_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'billing_all') }}/>
        <span class="label label-warning">Đơn hàng</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="billing_edit" class="hummingbird-end-node"
                    data-id="billing_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'billing_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="billing_del" class="hummingbird-end-node"
                    data-id="billing_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'billing_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
