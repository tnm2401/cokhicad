<li >
    <i></i>
    <label>
        <input name=permission[] value="procatone_all"  data-id="procatone_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procatone_all') }}/>
        <span class="label label-warning">Danh mục sản phẩm cấp 1</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="procatone_add" class="hummingbird-end-node"
                    data-id="procatone_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procatone_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="procatone_edit" class="hummingbird-end-node"
                    data-id="procatone_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procatone_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="procatone_del" class="hummingbird-end-node"
                    data-id="procatone_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procatone_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
