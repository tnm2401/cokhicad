<li >
    <i></i>
    <label>
        <input name=permission[] value="post_all"  data-id="post_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'post_all') }}/>
        <span class="label label-warning">Bài viết</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="post_add" class="hummingbird-end-node"
                    data-id="post_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'post_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="post_edit" class="hummingbird-end-node"
                    data-id="post_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'post_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="post_del" class="hummingbird-end-node"
                    data-id="post_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'post_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
