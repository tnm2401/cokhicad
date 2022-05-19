<li >
    <i></i>
    <label>
        <input name=permission[] value="feeship_all"  data-id="feeship_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'feeship_all') }}/>
        <span class="label label-warning">Phí vận chuyển</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="feeship_add" class="hummingbird-end-node"
                    data-id="feeship_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'feeship_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="feeship_edit" class="hummingbird-end-node"
                    data-id="feeship_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'feeship_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="feeship_del" class="hummingbird-end-node"
                    data-id="feeship_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'feeship_all') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
