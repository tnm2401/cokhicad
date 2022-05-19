<li >
    <i></i>
    <label>
        <input name=permission[] value="newcatone_all"  data-id="newcatone_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'newcatone_all') }}/>
        <span class="label label-warning">Danh mục bài viết cấp 1</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="newcatone_add" class="hummingbird-end-node"
                    data-id="newcatone_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'newcatone_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="newcatone_edit" class="hummingbird-end-node"
                    data-id="newcatone_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'newcatone_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="newcatone_del" class="hummingbird-end-node"
                    data-id="newcatone_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'newcatone_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
