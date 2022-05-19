<li >
    <i></i>
    <label>
        <input name=permission[] value="slider_all"  data-id="slider_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'slider_all') }}/>
        <span class="label label-warning">Slider</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="slider_add" class="hummingbird-end-node"
                    data-id="slider_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'slider_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="slider_edit" class="hummingbird-end-node"
                    data-id="slider_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'slider_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="slider_del" class="hummingbird-end-node"
                    data-id="slider_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'slider_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
