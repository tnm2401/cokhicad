<li >
    <i></i>
    <label>
        <input name=permission[] value="coupon_all"  data-id="coupon_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'coupon_all') }}/>
        <span class="label label-warning">Mã giảm giá</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="coupon_add" class="hummingbird-end-node"
                    data-id="coupon_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'coupon_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="coupon_edit" class="hummingbird-end-node"
                    data-id="coupon_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'coupon_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="coupon_del" class="hummingbird-end-node"
                    data-id="coupon_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'coupon_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
