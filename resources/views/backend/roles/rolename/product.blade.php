<li >
    <i></i>
    <label>
        <input name=permission[] value="product_all"  data-id="product_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'product_all') }}/>
        <span class="label label-warning">Sản phẩm</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="product_add" class="hummingbird-end-node"
                    data-id="product_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'product_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="product_edit" class="hummingbird-end-node"
                    data-id="product_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'product_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="product_del" class="hummingbird-end-node"
                    data-id="product_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'product_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
