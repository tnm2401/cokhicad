<li >
    <i></i>
    <label>
        <input name=permission[] value="procatthree_all"  data-id="procatthree_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procatthree_all') }}/>
        <span class="label label-warning">Danh mục sản phẩm cấp 3</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="procatthree_add" class="hummingbird-end-node"
                    data-id="procatthree_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procatthree_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="procatthree_edit" class="hummingbird-end-node"
                    data-id="procatthree_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procatthree_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="procatthree_del" class="hummingbird-end-node"
                    data-id="procatthree_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procatthree_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
